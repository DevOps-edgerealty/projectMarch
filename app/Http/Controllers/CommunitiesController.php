<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Community;
use App\Models\Project;
use App\Models\Type;
use App\Models\ProjectType;
use App\Models\Banner;
use App\Models\Bed;
use App\Models\Bath;
use App\Models\Category;
use App\Models\Agents;
use App\Models\Location;
use App\Models\City;
use App\Models\Aminities;
use App\Models\Destinations;
use App\Models\Developer;
use App\Models\Features;
use App\Models\Project_status;
use App\Models\Life_style;
use App\Models\Facilities;
use App\Models\Schools;
use App\Models\Stores;
use App\Models\Communities_image;
use App\Models\Landingpageseos;
use App\Models\Property;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App;

class CommunitiesController extends Controller
{
    private $uploadPath = "uploads/communities/images/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $lang = '' )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $communities = Community::withCount(['projects','images'])->orderBy('title_en')->paginate(15);


        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;



         //return $communities;



        $landingpageseo = Landingpageseos::where('id','3')->first();

        $this->data['communities'] = $communities;

        $this->data['landingpageseo'] = $landingpageseo;



        return view('communities',$this->data);

    }


    public function detail(   $lang = '', $id )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $communities = Community::with(['images'])->where('slug_link',$slug_link)->first();

        //return $communities;

        $communities_id = $communities->id ;



        $project = Project::with(['images','project_types'])->where('status', '1')->orderBy('id', 'desc')->where('community_id', $communities_id)->where('pro_status' , 1)->get();

        $luxury_project = Project::with(['images','project_types'])->where('status', '1')->orderBy('id', 'desc')->where('community_id', $communities_id)->where('pro_status' , 3)->get();

        //return $communities;

        $this->data['communities'] = $communities;

        $this->data['project'] = $project;

        $this->data['luxury_project'] = $luxury_project;


        return view('communities_detail',$this->data);

    }

    public function showindex()
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
        $this->data['community'] = Community::withCount(['projects'])->get();



        return view('backend.communities.show',$this->data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $this->data['types'] = Type::all();

        $this->data['catogory'] = Category::all();

        $this->data['agents'] = Agents::all();

        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();

        $this->data['beds'] = Bed::all();

        $this->data['baths'] = Bath::all();

        $this->data['features'] = Features::all();

        $this->data['facilities'] = facilities::all();



        $this->data['schools'] = Schools::all();

        $this->data['developers'] = Developer::all();

        $this->data['project_type'] = ProjectType::all();

        $this->data['project_status'] = Project_status::all();

        $this->data['life_style'] = Life_style::all();

        $this->data['destinations'] = Destinations::all();



        return view('backend.communities.create',$this->data);
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

         //return $request;
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
             $communities = new Community();


             $communities->title_en = $request->title_en;
             $communities->title_ru = $request->title_ru;
             $communities->title_ar = $request->title_ar;
             $communities->slug_link = $this->createSlug($request->title_en);
             $communities->location = $request->location;
             $communities->address_en = $request->address_en;
             $communities->address_ru = $request->address_ru;
             $communities->address_ar = $request->address_ar;
             $communities->map_embed_code = $request->map_embed;
             $communities->description_en = $request->description_en;
             $communities->description_ru = $request->description_ru;
             $communities->description_ar = $request->description_ar;
             $communities->meta_title_en = $request->meta_title_en;
             $communities->meta_title_ru = $request->meta_title_ru;
             $communities->meta_title_ar = $request->meta_title_ar;
             $communities->meta_keywords_en = $request->meta_keyword_en;
             $communities->meta_keywords_ru = $request->meta_keyword_ru;
             $communities->meta_keywords_ar = $request->meta_keyword_ar;
             $communities->meta_description_en = $request->meta_description_en;
             $communities->meta_description_ru = $request->meta_description_ru;
             $communities->meta_description_ar = $request->meta_description_ar;
             $communities->status = 1;



             $communities->save();

             $communities_id = $communities->id;


             $communities_images = new Communities_image();

             if($request->hasfile('filename'))
             {
                 foreach($request->file('filename') as $image)
                 {
                     $image_name = 'cpcommunities-'.time().'.'.$image->guessExtension();
                     $path = $this->uploadPath;
                     $image->move($path."$communities_id/", $image_name);

                     $file_name=$image_name;
                     $orig_path = $path."$communities_id/".$image_name;

                     $dest_path = $orig_path;



                     $communities_images->image = $image_name;
                     $communities_images->community_id = $communities_id;

                     $communities_images->save();
                 }
             }



             return Redirect::to('admin/communities/show')->withSuccess('message','Record has Been Uploaded.');
         }
         else
         {
             return Redirect::to('admin/communities/show')->withErrors(['message', 'Record is already Exist']);
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


        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();


        $locations_array = array();
        $Locations = Location::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
        foreach($Locations as $Location)
        {
            $locations_array[$Location->id] = $Location->name_en;
        }

        $cities_array=array();
        $Cities = City::where('id', '>=', '1')->orderby('city_name_en', 'asc')->get();
        foreach($Cities as $City)
        {
            $cities_array[$City->city_name_en] = $City->city_name_en;
        }

        $images_array=array();
        $Images = Communities_image::where('community_id', '=', $id)->get();

        foreach($Images as $Image)
        {

            $images_array[$Image->id] = $Image->image;
        }



        $communities = Community::with(['images' , 'locationss' ])->where('id', $id )->first();

        //return $communities;

        $this->data['communities'] = $communities;

        $this->data['cities_array'] = $cities_array;

        $this->data['locations_array'] = $locations_array;

        $this->data['images_array'] = $images_array;

        return view('backend.communities.edit',$this->data);

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

        //return $request->location;

        $communities = Community::find($id);



        if (!empty($communities)) {

            $communities->title_en = $request->title_en;
            $communities->title_ru = $request->title_ru;
            $communities->title_ar = $request->title_ar;
            $communities->slug_link = $this->createSlug($request->title_en);
            $communities->location = $request->location;
            $communities->address_en = $request->address_en;
            $communities->address_ru = $request->address_ru;
            $communities->address_ar = $request->address_ar;
            $communities->map_embed_code = $request->map_embed;
            $communities->description_en = $request->description_en;
            $communities->description_ru = $request->description_ru;
            $communities->description_ar = $request->description_ar;
            $communities->meta_title_en = $request->meta_title_en;
            $communities->meta_title_ru = $request->meta_title_ru;
            $communities->meta_title_ar = $request->meta_title_ar;
            $communities->meta_keywords_en = $request->meta_keyword_en;
            $communities->meta_keywords_ru = $request->meta_keyword_ru;
            $communities->meta_keywords_ar = $request->meta_keyword_ar;
            $communities->meta_description_en = $request->meta_description_en;
            $communities->meta_description_ru = $request->meta_description_ru;
            $communities->meta_description_ar = $request->meta_description_ar;



             $communities->save();

            return redirect('admin/communities/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/communities/show');
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
