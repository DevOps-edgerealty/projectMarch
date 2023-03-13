<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agents;
use App\Models\Property;
use App\Models\Community;
use App\Models\Developer;
use App\Models\Developer_image;
use App\Models\Project;
use App\Models\Landingpageseos;
use Illuminate\Support\Facades\Redirect;
use App;

class DeveloperController extends Controller
{
    private $uploadPath = "uploads/developers/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

         $developer = Developer::get();

         $landingpageseo = Landingpageseos::where('id','4')->first();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

         $this->data['developer'] = $developer;


        $footerLuxuryProjects = Project::with(['images','developers','project_types',])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        //return $developer;

        $this->data['landingpageseo'] = $landingpageseo;


        return view('developer',$this->data);
    }


    public function detail( $lang = '' , $id )
    {




        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $conLag = App::getLocale();

        $developer = Developer::where('slug_link', $id)->first();


         $developer_id = $developer->id ;

         $footerLuxuryProjects = Project::with(['images','developers','project_types',])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

         //return  $developer_id;



         $Projects_luxury = Project::where('agent_id','=', $developer_id)->where('pro_status', '=' , 3 )->orderBy('luxury_project_order', 'DESC')->get();

         $Projects_ready = Project::where('agent_id','=', $developer_id)->where('pro_status', '=' , 2 )->orderBy('project_order', 'DESC')->get();

         $Projects_off_plan = Project::where('agent_id','=', $developer_id)->where('pro_status', '=' , 1 )->orderBy('id', 'DESC')->get();

         $this->data['developer'] = $developer;

         $this->data['project'] = $Projects_off_plan;

         $this->data['project_ready'] = $Projects_ready;

         $this->data['project_luxury'] = $Projects_luxury;


        return view('developers_detail',$this->data);
    }


    public function showindex()
    {
        //
        $this->data['developer'] = Developer::all();


        return view('backend.developer.show',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.developer.create',$this->data);
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
             $developer = new Developer();


             $developer->name_en = $request->name_en;
             $developer->name_ru = $request->name_ru;
             $developer->name_ar = $request->name_ar;
             $developer->slug_link = $this->createSlug($request->name_en);
             $developer->address_en = $request->address_en;
             $developer->address_ru = $request->address_ru;
             $developer->address_ar = $request->address_ar;
             $developer->phone = $request->phone;
             $developer->email = $request->email;
             $developer->description_en = $request->description_en;
             $developer->description_ru = $request->description_ru;
             $developer->description_ar = $request->description_ar;
             $developer->meta_title_en = $request->meta_title_en;
             $developer->meta_title_ru = $request->meta_title_ru;
             $developer->meta_title_ar = $request->meta_title_ar;
             $developer->meta_keywords_en = $request->meta_keyword_en;
             $developer->meta_keywords_ru = $request->meta_keyword_ru;
             $developer->meta_keywords_ar = $request->meta_keyword_ar;
             $developer->meta_description_en = $request->meta_discription_en;
             $developer->meta_description_ru = $request->meta_discription_ru;
             $developer->meta_description_ar = $request->meta_discription_ar;

             $developer->status = 1;

             $developer->save();

             $developer_id = $developer->id;

             if($request->hasfile('filename'))
             {
                 foreach($request->file('filename') as $image)
                 {
                     $image_name = 'cpagent-'.time().'.'.$image->guessExtension();
                     $path = $this->uploadPath;
                     $image->move($path."$developer_id/", $image_name);

                     $file_name=$image_name;
                     $orig_path = $path."$developer_id/".$image_name;

                     $dest_path = $orig_path;

                     $developer->image = $image_name;

                     $developer->save();
                 }
             }


             $developer->save();



             return Redirect::to('admin/developer/show')->withSuccess('message','Record has Been Uploaded.');
         }
         else
         {
             return Redirect::to('admin/developer/show')->withErrors(['message', 'Record is already Exist']);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $developer = Developer::with(['images'])->where('id', $id )->first();

        //return $developer;

        $this->data['developer'] = $developer;

        return view('backend.developer.edit',$this->data);
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
        //return $request->name_en;

        $developer = Developer::find($id);



        if (!empty($developer)) {


            $developer->name_en = $request->name_en;
            $developer->name_ru = $request->name_ru;
            $developer->name_ar = $request->name_ar;
            $developer->slug_link = $this->createSlug($request->name_en);
            $developer->address_en = $request->address_en;
            $developer->address_ru = $request->address_ru;
            $developer->address_ar = $request->address_ar;
            $developer->phone = $request->phone;
            $developer->email = $request->email;
            $developer->description_en = $request->description_en;
            $developer->description_ru = $request->description_ru;
            $developer->description_ar = $request->description_ar;
            $developer->meta_title_en = $request->meta_title_en;
            $developer->meta_title_ru = $request->meta_title_ru;
            $developer->meta_title_ar = $request->meta_title_ar;
            $developer->meta_keywords_en = $request->meta_keyword_en;
            $developer->meta_keywords_ru = $request->meta_keyword_ru;
            $developer->meta_keywords_ar = $request->meta_keyword_ar;
            $developer->meta_description_en = $request->meta_discription_en;
            $developer->meta_description_ru = $request->meta_discription_ru;
            $developer->meta_description_ar = $request->meta_discription_ar;

            $developer->status = 1;

            $developer->save();

            $developer_id = $developer->id;

            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'cpagent-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    $image->move($path."$developer_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$developer_id/".$image_name;

                    $dest_path = $orig_path;

                    $developer->image = $image_name;

                    $developer->save();
                }
            }


            $developer->save();

            return redirect('admin/developer/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/developer/show');
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
