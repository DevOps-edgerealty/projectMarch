<?php

namespace App\Http\Controllers;


use App\Models\Blogs;

use App\Models\Project;
use App\Models\Community;
use App\Models\Developer;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\App;

class BlogsController extends Controller
{
    private $uploadPath = "uploads/blogs/";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

		// General Webmaster Settings

		$conLag = App::getLocale();

        $blogs = blogs::orderby('id','DESC')->paginate(16);

        //return $blogs;

        $this->data['blogs'] = $blogs;




        return view('blogs',$this->data);
    }



    public function blogs_sortBy(Request $request)
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
        if ($request->lang != "") {
            // Set Language
            App::setLocale($request->lang);
            \Session::put('locale', $request->lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

		// General Webmaster Settings

		$conLag = App::getLocale();

        if($request->sort_by == '1')
        {
            $blogs = blogs::orderby('created_at','DESC')->paginate(16);

        } elseif($request->sort_by == '2') {
            $blogs = blogs::orderby('created_at','ASC')->paginate(16);
        }

        $this->data['blogs'] = $blogs;




        return view('blogs',$this->data);
    }


    public function detail( $lang = '', $id )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $slug_link = $id;
        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $blogs = blogs::where('slug_link',$slug_link)->first();

        blogs::find($blogs->id)->increment('views');

        $blog = blogs::inRandomOrder()->take(3)->inRandomOrder()->get();

        //return $blogs;

        $this->data['blogs'] = $blogs;

        $this->data['similarblog'] = $blog;




        return view('blogs_detail',$this->data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.blogs.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //




        $bool=0;
		/*$email=$request->email;
		$Agent = Agent::where('email', '=', $email)->get();
		foreach($Agent as $Agent)
		{
			$bool=1;
		}*/
		if($bool==0)
		{

            //
            $Blogs = new Blogs();

            $Blogs->name_en = $request->name_en;
            $Blogs->name_ru = $request->name_ru;
            $Blogs->name_ar = $request->name_ar;
            $Blogs->slug_link = $this->createSlug($request->name_en);
            $Blogs->description_en = $request->description_en;
            $Blogs->description_ru = $request->description_ru;
            $Blogs->description_ar = $request->description_ar;
            $Blogs->meta_title_en = $request->meta_title_en;
            $Blogs->meta_title_ru = $request->meta_title_ru;
            $Blogs->meta_title_ar = $request->meta_title_ar;
            $Blogs->meta_keywords_en = $request->meta_keywords_en;
            $Blogs->meta_keywords_ru = $request->meta_keywords_ru;
            $Blogs->meta_keywords_ar = $request->meta_keywords_ar;
            $Blogs->meta_description_en = $request->meta_description_en;
            $Blogs->meta_description_ru = $request->meta_description_ru;
            $Blogs->meta_description_ar = $request->meta_description_ar;
            $Blogs->status = 1;

            $Blogs->save();

            $Blogs_id = $Blogs->id;



            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'blogs-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;


                    $image->move($path."$Blogs_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$Blogs_id/".$image_name;

                    $dest_path = $orig_path;

                    $Blogs->image_url = $image_name;

                    $Blogs->save();
                }
            }
            return Redirect::to('admin/blogs/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/blogs/show')->withErrors(['message', 'Record is already Exist']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }



    public function showindex()
    {
        //



        $this->data['blogs'] = Blogs::all();




        return view('backend.blogs.show',$this->data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $blogs = Blogs::where('id', $id )->first();

        $this->data['blogs'] = $blogs;

        return view('backend.blogs.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $Blogs = Blogs::find($id);



        if (!empty($Blogs)) {


            $Blogs->name_en = $request->name_en;
            $Blogs->name_ru = $request->name_ru;
            $Blogs->name_ar = $request->name_ar;
            $Blogs->slug_link = $this->createSlug($request->name_en);
            $Blogs->description_en = $request->description_en;
            $Blogs->description_ru = $request->description_ru;
            $Blogs->description_ar = $request->description_ar;
            $Blogs->meta_title_en = $request->meta_title_en;
            $Blogs->meta_title_ru = $request->meta_title_ru;
            $Blogs->meta_title_ar = $request->meta_title_ar;
            $Blogs->meta_keywords_en = $request->meta_keywords_en;
            $Blogs->meta_keywords_ru = $request->meta_keywords_ru;
            $Blogs->meta_keywords_ar = $request->meta_keywords_ar;
            $Blogs->meta_description_en = $request->meta_description_en;
            $Blogs->meta_description_ru = $request->meta_description_ru;
            $Blogs->meta_description_ar = $request->meta_description_ar;
            $Blogs->status = 1;

            $Blogs->save();

            $Blogs_id = $Blogs->id;


            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'blogs-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    $image->move($path."$Blogs_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$Blogs_id/".$image_name;

                    $dest_path = $orig_path;

                    $Blogs->image_url = $image_name;

                    $Blogs->save();
                }
            }



            return redirect('admin/blogs/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/blogs/show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createSlug($str, $delimiter = '-'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		return $slug;

	}
}
