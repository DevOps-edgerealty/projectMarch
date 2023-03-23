<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Models\Community;
use App\Models\Developer;
use App\Models\Features;
use App\Models\Project_status;
use App\Models\Life_style;
use App\Models\Facilities;
use App\Models\Project_document;
use App\Models\Project_image;

use App;
use App\Models\Landingpageseos;
use App\Models\Property;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;



class ProjectController extends Controller
{
    private $uploadPath = "uploads/projects/images/";
    private $uploadDocumentPath = "uploads/projects/documents/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;




        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $project = Project::with(['images','developer','locationz'])->orderBy('id', 'desc')->where('pro_status', '=' , 1 )->where('status', '1')->paginate(15);

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        //return $project;

        $landingpageseo = Landingpageseos::where('id','2')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['project'] = $project;



        return view('projects',$this->data);
    }

    public function offplan_search(Request $request , $lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        if($request->search != Null )
        {
            $project = Project::with(['images','developer'])
            ->where('neighbourhood_en', 'LIKE', "%{$request->search}%")
            ->where('pro_status' , '1' )
            ->paginate(50);

            //return $project;
        }
        else
        {
            $project = Project::with(['images','developer','locationz'])->orderBy('id', 'desc')->where('pro_status', '=' , 1 )->where('status', '1')->paginate(15);
        }

        if($request->search != null){
            if ($lang == 'ar') {
                $Pageheading = " مشاريع تحت الإنشاء" . "$request->search";
            }
            elseif($lang == 'ru'){

                $Pageheading = "Проекты в Стадии Строительства в " . "$request->search";
            }
            else {
                $Pageheading = "Off Plan Projects in " . "$request->search";
            }
        } else {
            if ($lang == 'ar') {
                $Pageheading = " عقارات في دبي";
            }

            elseif($lang == 'ru'){
                $Pageheading = "Проекты в процессе стройки " ;
            }

            else {
                $Pageheading = "Off Plan Projects In Dubai";
            }
        }



        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','10')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['project'] = $project;

        return view('projects_search',$this->data);

    }


    public function offplan_search_ar(Request $request , $lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        if($request->search != Null )
        {
            $project = Project::with(['images','developer'])
            ->where('neighbourhood_ar', $request->search)
            ->where('pro_status' , '1' )
            ->paginate(50);
        }
        else
        {
            $project = Project::with(['images','developer','locationz'])->orderBy('id', 'desc')->where('pro_status', '=' , 1 )->where('status', '1')->paginate(15);
        }


        if($request->search != null){
            if ($lang == 'ar') {
                $Pageheading = " عقارات في" . "$request->search";
            }
            elseif($lang == 'ru'){

                $Pageheading = "Недвижимость в " . "$request->search";
            }
            else {
                $Pageheading = "Off Plan Projects in " . "$request->search";
            }
        } else {
            if ($lang == 'ar') {
                $Pageheading = " عقارات في دبي";
            }

            elseif($lang == 'ru'){
                $Pageheading = "Проекты в процессе стройки " ;
            }

            else {
                $Pageheading = "Off Plan Projects In Dubai";
            }
        }



        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','10')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['project'] = $project;

        return view('projects',$this->data);

    }


    public function detail(  $lang = '' , $slug_link)
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

		// General Webmaster Settings




		$conLag = App::getLocale();

        $project_detail = Project::with(['images', 'locationz' ,'developer','documents'])->where('slug_link',$slug_link)->first();



        $location_id = $project_detail->location;


        $features_array=array();
        $Features = Features::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
        foreach($Features as $Feature)
        {
            //$features_array[$Feature->id]=$Feature->name;
            $features_array[$Feature->id]=array('name_en'=>$Feature->name_en,'name_ru'=>$Feature->name_ru,'name_ar'=>$Feature->name_ar);
        }


        $features = array();
        $db_features = $project_detail->features;
        if($db_features!='')
        {
            $db_features = explode(',',$db_features);
            foreach($db_features as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                $features[] = $value;
            }
        }

        //return $features;


        $developer_id = $project_detail->developer->id ;

        $project_type_id = $project_detail->project_type ;


        $developer = Developer::with(['images'])->where('id', $developer_id)->first();

        $project_types = ProjectType::all()->where('id', $project_type_id)->first();


        $this->data['project'] = project::with(['images'])->where('pro_status', 1 )->where('location',$location_id)->limit(3)->get();



        $this->data['project_detail'] = $project_detail;

        $this->data['project_types'] = $project_types;

        $this->data['developers'] = $developer;


        $this->data['features_array'] = $features_array;

        $this->data['Features'] = $Features;

        $this->data['features'] = $features;



        return view('project_detail',$this->data );

    }


    public function luxury_project_detail(  $lang = '' , $slug_link)
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

		// General Webmaster Settings

		$conLag = App::getLocale();

        $project_detail = Project::with(['images', 'location','developer','documents'])->where('slug_link',$slug_link)->first();



        $location_id = $project_detail->location;

        $project_id = $project_detail->id;

        $similar_properties = Property::with(['images', 'locationss','cityss','property_type'])->where([['status', 1], ['project_id', $project_id]])->get();


        //return $similar_properties;

        $features_array=array();
        $Features = Features::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
        foreach($Features as $Feature)
        {
            //$features_array[$Feature->id]=$Feature->name;
            $features_array[$Feature->id]=array('name_en'=>$Feature->name_en, 'name_ru'=>$Feature->name_ru, 'name_ar'=>$Feature->name_ar);
        }
        $features = array();
        $db_features = $project_detail->features;
        if($db_features!='')
        {
            $db_features = explode(',',$db_features);
            foreach($db_features as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                $features[] = $value;
            }
        }



        $developer_id = $project_detail->developer->id ;

        $project_type_id = $project_detail->project_type ;


        $developer = Developer::with(['images'])->where('id', $developer_id)->first();

        $project_types = ProjectType::all()->where('id', $project_type_id)->first();



        $this->data['project'] = project::with(['images'])->where('location',$location_id)->limit(3)->get();



        $this->data['properties'] = $similar_properties;

        $this->data['project_detail'] = $project_detail;

        $this->data['project_types'] = $project_types;

        $this->data['developers'] = $developer;


        $this->data['features_array'] = $features_array;

        $this->data['Features'] = $Features;

        $this->data['features'] = $features;




        return view('luxury_project_detail',$this->data );

    }



    public function ready_detail(  $lang = '' , $slug_link)
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

		// General Webmaster Settings

		$conLag = App::getLocale();

        $project_detail = Project::with(['images', 'location','developer','documents'])->where('slug_link',$slug_link)->first();



        $location_id = $project_detail->location;




        $features_array=array();
        $Features = Features::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
        foreach($Features as $Feature)
        {
            //$features_array[$Feature->id]=$Feature->name;
            $features_array[$Feature->id]=array('name_en'=>$Feature->name_en, 'name_ru'=>$Feature->name_ru, 'name_ar'=>$Feature->name_ar);
        }
        $features = array();
        $db_features = $project_detail->features;
        if($db_features!='')
        {
            $db_features = explode(',',$db_features);
            foreach($db_features as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                $features[] = $value;
            }
        }



        $developer_id = $project_detail->developer->id ;

        $project_type_id = $project_detail->project_type ;


        $developer = Developer::with(['images'])->where('id', $developer_id)->first();

        $project_types = ProjectType::all()->where('id', $project_type_id)->first();



        $this->data['project'] = project::with(['images','locationz'])->where('pro_status',$project_detail->pro_status)->where('location',$location_id)->limit(3)->get();




        $this->data['project_detail'] = $project_detail;

        $this->data['project_types'] = $project_types;

        $this->data['developers'] = $developer;


        $this->data['features_array'] = $features_array;

        $this->data['Features'] = $Features;

        $this->data['features'] = $features;



        return view('ready_project_detail',$this->data );

    }




    public function ready_projects( $lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();




        $project = Project::with(['images','developer','locationz'])->where('pro_status', '=' , 2 )->orderBy('project_order', 'DESC')->where('status', '1')->paginate(15);



        $landingpageseo = Landingpageseos::where('id','8')->first();

        $this->data['project'] = $project;

        $this->data['landingpageseo'] = $landingpageseo;

        return view('ready_projects',$this->data);
    }




    public function luxury_projects( $lang = "")
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $project = Project::with(['images','project_types','locationz'])->where('status','=', 1)->where('pro_status','=', 3)->orderBy('luxury_project_order', 'DESC')->paginate(15);


        $landingpageseo = Landingpageseos::where('id','13')->first();

        $this->data['project'] = $project;

        //return $project;

        $this->data['landingpageseo'] = $landingpageseo;

        return view('luxury_projects',$this->data);
    }




    public function apartment( $lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $projects = project::with(['images'])->where('project_type','1')->orderBy('id', 'desc')->where('status', '1')->get();

        //return $projects;

        $this->data['project'] = $projects;

        return view('project_type',$this->data);

    }

    public function villas( $lang = '' )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }


        $projects = project::with(['images'])->where('project_type','2')->orderBy('id', 'desc')->where('status', '1')->get();

        //return $projects;

        $this->data['project'] = $projects;

        return view('project_type',$this->data);

    }

    public function townhouses($lang = '' )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $projects = project::with(['images'])->where('project_type','3')->orderBy('id', 'desc')->where('status', '1')->get();

        //return $projects;

        $this->data['project'] = $projects;

        return view('project_type',$this->data);

    }

    public function plot($lang = '' )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $projects = project::with(['images'])->where('project_type','4')->orderBy('id', 'desc')->where('status', '1')->get();

        //return $projects;

        $this->data['project'] = $projects;

        return view('project_type',$this->data);

    }









    public function showindex()
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
        $project = Project::with(['images', 'location', 'project_types','developer'])->orderBy('id', 'desc')->get();


        //return $project;

        $this->data['project'] = $project;

        return view('backend.projects.show',$this->data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'asc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //

        $this->data['types'] = Type::all();

        $this->data['catogory'] = Category::all();

        $this->data['communities'] = Community::all();

        $this->data['agents'] = Agents::all();

        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();

        $this->data['beds'] = Bed::all();

        $this->data['baths'] = Bath::all();

        $features_array=array();
        $Features = Features::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
		foreach($Features as $Feature)
		{
			$features_array[$Feature->id]=$Feature->name_en;
		}

        $this->data['developers'] = Developer::all();

        $this->data['project_type'] = ProjectType::all();

        $this->data['project_status'] = Project_status::all();

        $this->data['life_style'] = Life_style::all();


        $this->data['features_array'] = $features_array;




        return view('backend.projects.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
             $project = new Project();

             $agent = 1;

             $project->status = $request->status;
             $project->pro_status = $request->project_status;
             $project->type_id = $request->type_id;
             $project->agent_id = $request->developer;
             $project->community_id = $request->community;
             $project->project_status = $request->project_status;
             $project->sub_type_id = $request->sub_type_id;
             $project->title_en = $request->title_en;
             $project->title_ru = $request->title_ru;
             $project->title_ar = $request->title_ar;
             $project->slug_link = $this->createSlug($request->title_en);
             $project->city_id = $request->city;
             $project->country_id = '207';
             $project->location = $request->location;
             $project->address_en = $request->address_en;
             $project->address_ru = $request->address_ru;
             $project->address_ar = $request->address_ar;
             $project->project_price = $request->price;
             $project->project_price_usd = $request->price_usd;
             $project->bedrooms = $request->bedrooms;
             $project->bedrooms_ru = $request->bedrooms_ru;
             $project->bedrooms_ar = $request->bedrooms_ar;
             $project->neighbourhood_en  = $request->neighbourhood_en;
             $project->neighbourhood_ru  = $request->neighbourhood_ru;
             $project->neighbourhood_ar  = $request->neighbourhood_ar;
             $project->ownership_en  = $request->ownership_en;
             $project->ownership_ru  = $request->ownership_ru;
             $project->ownership_ar  = $request->ownership_ar;
             $project->est_completion_en  = $request->est_complete_year;
             $project->map_embed_code = $request->map_embed_code;
             $project->community_id = $request->community;
             $project->description_en = $request->description_en;
             $project->description_ru = $request->description_ru;
             $project->description_ar = $request->description_ar;
             $project->community_en = $request->community_en;
             $project->community_ru = $request->community_ru;
             $project->community_ar = $request->community_ar;
             $project->payment_en = $request->payment_plan_en;
             $project->payment_ru = $request->payment_plan_ru;
             $project->payment_ar = $request->payment_plan_ar;
             $project->payment_plan_mob_en = $request->payment_plan_mob_en;
             $project->payment_plan_mob_ru = $request->payment_plan_mob_ru;
             $project->payment_plan_mob_ar = $request->payment_plan_mob_ar;
             $project->near_by_places_en = $request->near_by_places_en;
             $project->near_by_places_ru = $request->near_by_places_ru;
             $project->near_by_places_ar = $request->near_by_places_ar;
             $project->meta_title_en = $request->meta_title_en;
             $project->meta_title_ru = $request->meta_title_ru;
             $project->meta_title_ar = $request->meta_title_ar;
             $project->meta_keywords_en = $request->meta_keyword_en;
             $project->meta_keywords_ru = $request->meta_keyword_ru;
             $project->meta_keywords_ar = $request->meta_keyword_ar;
             $project->meta_description_en = $request->meta_description_en;
             $project->meta_description_ru = $request->meta_description_ru;
             $project->meta_description_ar = $request->meta_description_ar;
             $project->video_embed = $request->video_embed;




              $project->save();


             $project_id = $project->id;




             $features = '';
             $request_features = $request->get('features');
             if (is_array($request_features))
             {
                 foreach($request_features as $value)
                 {
                     if($features=='')
                         $features="($value)";
                     else
                         $features.=",($value)";
                 }
             }
             else
             {
                 $features = $request_features;
             }
             $project->features = $features;

             $project->save();



             $project_images = new Project_image();


             $file_names_array = array();

             if($request->hasfile('filename'))
             {
                 $count=1;
                 foreach($request->file('filename') as $image)
                 {
                     //$start_name= $slug_link;
                     //$image_name= $start_name.'-'.time().''.$count.'.'.$image->guessExtension();
                     $image_name= $image->getClientOriginalName();

                     $file_names_array[$count] = $image_name;

                     $path = $this->uploadPath;
                     $image->move($path."$project_id/", $image_name);

                     $ProjectImage = new Project_image;

                     $ProjectImage->project_id = $project_id;
                     $ProjectImage->image = $image_name;
                     if($count==1)
                        $ProjectImage->is_default = 1;
                        $ProjectImage->save();

                    $count++;
                 }
             }

            //  if($request->hasfile('document'))
            //  {
            //      $count=1;
            //      foreach($request->file('document') as $image)
            //      {
            //          $image_name = $image->getClientOriginalName();//'cpproject-'.$count.'-'.time().'.'.$image->guessExtension();
            //          $path = $this->uploadDocumentPath;
            //          $image->move($path."$project_id/", $image_name);

            //          $ProjectDocument = new Project_Document;
            //          $ProjectDocument->project_id = $project_id;
            //          $ProjectDocument->document = $image_name;
            //          $ProjectDocument->save();
            //          $count++;
            //      }
            //  }




             return Redirect::to('admin/projects/show')->withSuccess('message','Record has Been Uploaded.');
         }
         else
         {
             return Redirect::to('admin/projects/show')->withErrors(['message', 'Record is already Exist']);
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

        $this->data['types'] = Type::all();

        $this->data['catogory'] = Category::all();

        $this->data['communities'] = Community::all();

        $this->data['agents'] = Agents::all();

        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();

        $this->data['beds'] = Bed::all();

        $this->data['baths'] = Bath::all();

        $this->data['developers'] = Developer::all();

        $this->data['project_type'] = ProjectType::all();

        $this->data['project_status'] = Project_status::all();

        $this->data['life_style'] = Life_style::all();


        $project = Project::with(['images', 'locationss', 'developer','documents','citys'])->where('id', $id )->first();

        $sub_types_array=array();
        $SubTypes = ProjectType::where('id', '>=', '1')->get();
        foreach($SubTypes as $ProjectType)
        {
            $sub_types_array[$ProjectType->id]=$ProjectType->name_en;
        }

        $community_array=array();
        $Communities = Community::where('id', '>=', '1')->get();
        foreach($Communities as $Community)
        {
            $community_array[$Community->id] = $Community->title_en;
        }

        $developer_array=array();
        $developers = Developer::where('id', '>=', '1')->get();
        foreach($developers as $developer)
        {
            $developer_array[$developer->id] = $developer->name_en;
        }


        $features_array=array();
        $Features = Features::where('id', '>=', '1')->orderby('name_en', 'asc')->get();
        foreach($Features as $Feature)
        {
            $features_array[$Feature->id]=$Feature->name_en;
        }

        $status_array=array();
        $Statuses = Project_status::where('id', '>=', '1')->get();
        foreach($Statuses as $Status)
        {
            $status_array[$Status->id]=$Status->name_en;
        }

        $status_array=array();
        $Statuses = Project_status::where('id', '>=', '1')->get();
        foreach($Statuses as $Status)
        {
            $status_array[$Status->id]=$Status->name_en;
        }


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
            $cities_array[$City->id] = $City->city_name_en;
        }


        $images_array=array();
        $Images = Project_image::where('project_id', '=', $id)->orderby('is_default', 'desc')->get();
        foreach($Images as $Image)
        {
            $images_array[$Image->id]=$Image->image;
        }

        $features = array();
        $db_features = $project->features;
        if($db_features!='')
        {
            $db_features = explode(',',$db_features);
            foreach($db_features as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                $features[] = $value;
            }
        }


        //return $project;



        $this->data['cities_array'] = $cities_array;

        $this->data['locations_array'] = $locations_array;

        $this->data['developer_array'] = $developer_array;

        $this->data['status_array'] = $status_array;

        $this->data['features_array'] = $features_array;

        $this->data['features'] = $features;

        $this->data['community_array'] = $community_array;

        $this->data['sub_types_array'] = $sub_types_array;

        $this->data['images_array'] = $images_array;

        $this->data['projects'] = $project;

        return view('backend.projects.edit',$this->data);
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



        $projects = Project::find($id);


        if (!empty($projects)) {
            $projects->status = $request->status;
            $projects->pro_status = $request->project_status;
            $projects->type_id = $request->project_type;
            $projects->sub_type_id = $request->project_type;
            $projects->agent_id = $request->developer;
            $projects->community_id = $request->community;
            $projects->title_en = $request->title_en;
            $projects->title_ru = $request->title_ru;
            $projects->title_ar = $request->title_ar;
            $projects->slug_link = $this->createSlug($request->title_en);
            $projects->city_id = $request->city;
            $projects->location = $request->location;
            $projects->address_en = $request->address_en;
            $projects->address_ru = $request->address_ru;
            $projects->address_ar = $request->address_ar;
            $projects->project_price = $request->price;
            $projects->project_price_usd = $request->price_usd;
            $projects->bedrooms = $request->bedrooms;
            $projects->bedrooms_ru = $request->bedrooms_ru;
            $projects->bedrooms_ar = $request->bedrooms_ar;
            $projects->neighbourhood_en  = $request->neighbourhood_en;
            $projects->neighbourhood_ru  = $request->neighbourhood_ru;
            $projects->neighbourhood_ar  = $request->neighbourhood_ar;
            $projects->ownership_en  = $request->ownership_en;
            $projects->ownership_ar  = $request->ownership_ar;
            $projects->est_completion_en  = $request->est_complete_year;
            $projects->map_embed_code = $request->map_embed_code;
            $projects->community_id = $request->community;
            $projects->description_en = $request->description_en;
            $projects->description_ru = $request->description_ru;
            $projects->description_ar = $request->description_ar;
            $projects->community_en = $request->community_en;
            $projects->community_ru = $request->community_ru;
            $projects->community_ar = $request->community_ar;
            $projects->payment_en = $request->payment_plan_en;
            $projects->payment_ru = $request->payment_plan_ru;
            $projects->payment_ar = $request->payment_plan_ar;
            $projects->payment_plan_mob_en = $request->payment_plan_mob_en;
            $projects->payment_plan_mob_ru = $request->payment_plan_mob_ru;
            $projects->payment_plan_mob_ar = $request->payment_plan_mob_ar;
            $projects->near_by_places_en = $request->near_by_places_en;
            $projects->near_by_places_ru = $request->near_by_places_ru;
            $projects->near_by_places_ar = $request->near_by_places_ar;
            $projects->meta_title_en = $request->meta_title_en;
            $projects->meta_title_ru = $request->meta_title_ru;
            $projects->meta_title_ar = $request->meta_title_ar;
            $projects->meta_keywords_en = $request->meta_keyword_en;
            $projects->meta_keywords_ru = $request->meta_keyword_ru;
            $projects->meta_keywords_ar = $request->meta_keyword_ar;
            $projects->meta_description_en = $request->meta_description_en;
            $projects->meta_description_ru = $request->meta_description_ru;
            $projects->meta_description_ar = $request->meta_description_ar;
            $projects->video_embed = $request->video_embed;

            $features = '';
			$request_features = $request->get('features');
			if (is_array($request_features))
			{
				foreach($request_features as $value)
				{
					if($features=='')
						$features="($value)";
					else
						$features.=",($value)";
				}
			}
			else
			{
				$features = $request_features;
			}

			$projects->features = $features;

			$projects->save();

            $project_id = $projects->id;

            $project_images = new Project_image();


            $file_names_array = array();

            if($request->hasfile('filename'))
            {
                $count=1;
                foreach($request->file('filename') as $image)
                {
                    //$start_name= $slug_link;
                    //$image_name= $start_name.'-'.time().''.$count.'.'.$image->guessExtension();
                    $image_name= $image->getClientOriginalName();

                    $file_names_array[$count] = $image_name;

                    $path = $this->uploadPath;
                    $image->move($path."$project_id/", $image_name);

                    $ProjectImage = new Project_image;

                    $ProjectImage->project_id = $project_id;
                    $ProjectImage->image = $image_name;
                    if($count==1)
                       $ProjectImage->is_default = 1;
                       $ProjectImage->save();

                   $count++;
                }
            }

            // if($request->hasfile('document'))
            // {
            //     $count=1;
            //     foreach($request->file('document') as $image)
            //     {
            //         $image_name = $image->getClientOriginalName();//'cpproject-'.$count.'-'.time().'.'.$image->guessExtension();
            //         $path = $this->uploadDocumentPath;
            //         $image->move($path."$project_id/", $image_name);

            //         $ProjectDocument = new Project_Document;
            //         $ProjectDocument->project_id = $project_id;
            //         $ProjectDocument->document = $image_name;
            //         $ProjectDocument->save();
            //         $count++;
            //     }
            // }


            return redirect('admin/projects/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/projects/show');
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
