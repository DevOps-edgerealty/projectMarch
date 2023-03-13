<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

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
use App\Models\Project;
use App\Models\Properties_image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Landingpageseos;

use App;

class PropertiesController extends Controller
{
    private $uploadPath = "uploads/properties/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['types'] = Type::all();

        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','1')->where('type_id','1')->paginate(15);

        $this->data['properties'] = $properties;

        return view('properties',$this->data);
    }


    public function properties_search_arabic(Request $request , $lang = '')
    {


        //return $request;


        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $properties = Property::with(['images', 'locationss','cityss'])
        ->where('type_id' , $request->property_type_id);


        if($request->search != null){
            $properties->where('location_str_ar', 'LIKE', "%{$request->search}%");
        }
        if($request->property_type != null){
            $properties->where('cat_id', $request->property_type);
        }
        if($request->min_bedroom != null){
            $properties->where('bedrooms', '>=', $request->min_bedroom);
        }
        if($request->max_bedroom != null){
            $properties->where('bedrooms', '<=', $request->max_bedroom);
        }
        if($request->min_price != null){
            $properties->where('price', '>=', $request->min_price);
        }
        if($request->max_price != null){
            $properties->where('price', '<=', $request->max_price);
        }

        $properties = $properties->orderby('id','DESC');

        $properties = $properties->paginate(50);



        $this->data = $request->all();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if($request->search != null){
            if ($lang == 'ar') {
                $Pageheading = " عقارات في" . "$request->search";
            }
            elseif($lang == 'ru'){

                $Pageheading = "Недвижимость в " . "$request->search";
            }
            else {
                $Pageheading = "Properties In " . "$request->search";
            }
        } else {
            if ($lang == 'ar') {
                $Pageheading = " عقارات في دبي";
            }

            elseif($lang == 'ru'){
                $Pageheading = "Проекты в процессе стройки " ;
            }

            else {
                $Pageheading = "Properties In Dubai";
            }
        }

        $landingpageseo = Landingpageseos::where('id','5')->first();


        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['PageHeading'] = $Pageheading;

        $this->data['request'] = $request;

        $this->data['properties'] = $properties;

        return view('properties',$this->data);
    }

    public function properties_search(Request $request , $lang = '')
    {


        // dd($this->data);

        //return $request;


        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

            $properties = Property::with(['images', 'locationss'])
            ->where('type_id' , $request->property_type_id);

            if($request->search != null){
                $properties->where('location_str', 'LIKE', "%{$request->search}%");
            }
            if($request->property_type != null){
                $properties->where('cat_id', $request->property_type);
            }
            if($request->min_bedroom != null){
                $properties->where('bedrooms', '>=', $request->min_bedroom);
            }
            if($request->max_bedroom != null){
                $properties->where('bedrooms', '<=', $request->max_bedroom);
            }
            if($request->min_price != null){
                $properties->where('price', '>=', $request->min_price);
            }
            if($request->max_price != null){
                $properties->where('price', '<=', $request->max_price);
            }

            $properties = $properties->orderby('id','DESC');

            $properties = $properties->paginate(50);

            //return $properties;

        $this->data = $request->all();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if($request->search != null){
            if ($lang == 'ar') {
                $Pageheading = " عقارات في" . "$request->search";
            }
            elseif($lang == 'ru'){

                $Pageheading = "Недвижимость в " . "$request->search";
            }
            else {
                $Pageheading = "Properties In " . "$request->search";
            }
        } else {
            if ($lang == 'ar') {
                $Pageheading = " عقارات في دبي";
            }

            elseif($lang == 'ru'){
                $Pageheading = "Проекты в процессе стройки " ;
            }

            else {
                $Pageheading = "Properties In Dubai";
            }
        }





        // dd($Pageheading);

        $landingpageseo = Landingpageseos::where('id','5')->first();


        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['PageHeading'] = $Pageheading;

        $this->data['request'] = $request;



        $this->data['properties'] = $properties;



        return view('properties',$this->data);
    }


    public function detail( $lang = '' , $slug_link )
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //
         //
         if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		$conLag = App::getLocale();

        $property_detail = Property::with(['images', 'locationss', 'property_type','agentss'])->where('slug_link',$slug_link)->first();

        $agent = Agents::where('status', 1)->where('id', $property_detail->agent_id)->first();

        $location_id  = $property_detail->location;

        $amenities_array=array();

        $Amenities = Aminities::where('id', '>=', '1')->orderby('amenity_name_en', 'asc')->get();

        foreach($Amenities as $Amenity)
        {
            $amenities_array[$Amenity->id]=array('amenity_name_en'=>$Amenity->amenity_name_en,'amenity_name_ru'=>$Amenity->amenity_name_ru,'amenity_name_ar'=>$Amenity->amenity_name_ar,'amenity_image'=>$Amenity->image);
        }
        $amenities = array();

        $db_amenities = $property_detail->amenities;

        if($db_amenities!='')
        {
            $db_amenities = explode(',',$db_amenities);
            foreach($db_amenities as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                 $amenities[] = $value;
            }
        }




        $properties = Property::with(['images', 'locationss','cityss','agentss'])->where('location' , $location_id )->where('cat_id','1')->where('type_id','1')->paginate(3);

        // dd($amenities);


        $this->data['properties'] = $properties;

        $this->data['agent'] = $agent;

        $this->data['property_detail'] = $property_detail;

        // $this->data['property_detail'] = $property_detail->;

        $this->data['amenities_array'] = $amenities_array;

        $this->data['amenities'] = $amenities;






        return view('properties_detail',$this->data);

    }



    public function apartment_for_sale($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //

           //
           if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings



		$conLag = App::getLocale();
        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "شقق في دبي للبيع";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Apartment For Sale in Dubai";
        }

        $landingpageseo = Landingpageseos::where('id','14')->first();


        $this->data['landingpageseo'] = $landingpageseo;




        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','1')->where('type_id','1')->orderby('id','DESC')->paginate(15);



        //return $properties;

        $this->data['properties'] = $properties;

        $this->data['PageHeading'] = $Pageheading;


        return view('properties',$this->data);

    }


    public function villas_for_sale($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        //

        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        // General Webmaster Settings



        $conLag = App::getLocale();

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        $landingpageseo = Landingpageseos::where('id','15')->first();


        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','2')->where('type_id','1')->orderby('id','DESC')->paginate(15);

        //return $properties;


        if ($lang == 'ar') {
            $Pageheading = "فلل للبيع في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Villa For Sale in Dubai";
        }

        $this->data['properties'] = $properties;

        $this->data['PageHeading'] = $Pageheading;




        return view('properties',$this->data);

    }


    public function commercial_for_sale($lang = '')
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


        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "عقارات تجارية للبيع";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Commercial For Sale in Dubai";
        }


        $landingpageseo = Landingpageseos::where('id','16')->first();


        $this->data['landingpageseo'] = $landingpageseo;


        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','3')->where('type_id','1')->orderby('id','DESC')->paginate(15);



        //return $properties;

        $this->data['properties'] = $properties;

        $this->data['PageHeading'] = $Pageheading;


        return view('properties',$this->data);

    }


    public function townhouses_for_sale($lang = '')
    {$footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $footerDevelopers = Developer::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerDevelopers'] = $footerDevelopers;

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
    //

        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        // General Webmaster Settings



        $conLag = App::getLocale();

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "تاون هاوس للبيع في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Townhouses For Sale In Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','12')->first();


        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','8')->where('type_id','1')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;

        return view('properties',$this->data);

    }

    public function furnished_properties_for_sale($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "عقارات مفروشة للبيع في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Furnished Properties For Sale in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','20')->first();

        $this->data['landingpageseo'] = $landingpageseo;


        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','5')->where('type_id','1')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }


    public function plots_for_sale($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "أراضي للبيع في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Plot For Sale in Dubai";
        }


        $landingpageseo = Landingpageseos::where('id','21')->first();

        $this->data['landingpageseo'] = $landingpageseo;


        $this->data['PageHeading'] = $Pageheading;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','6')->where('type_id','1')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }





    public function apartment_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "شقق للإيجار في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Apartment For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;


        $landingpageseo = Landingpageseos::where('id','17')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','1')->where('type_id','2')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }


    public function villas_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "فلل للايجار في دبي";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Villas For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','18')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','2')->where('type_id','2')->where('status','1')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }


    public function commercial_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "عقارات تجارية للبيع";
        }

        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Commercial For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;


        $landingpageseo = Landingpageseos::where('id','19')->first();

        $this->data['landingpageseo'] = $landingpageseo;


        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','3')->where('type_id','2')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }


    public function townhouses_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "تاون هاوس للإيجار في دبي";
        }


        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Townhouses For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;


        $landingpageseo = Landingpageseos::where('id','22')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','4')->where('type_id','2')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;




        return view('properties',$this->data);

    }

    public function furnished_properties_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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

        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();

        if ($lang == 'ar') {
            $Pageheading = "عقارات مفروشة للايجار في دبي";
        }


        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        }

        else {
            $Pageheading = "Furnished Properties For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;


        $landingpageseo = Landingpageseos::where('id','20')->first();

        $this->data['landingpageseo'] = $landingpageseo;


        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','5')->where('type_id','2')->orderby('id','DESC')->paginate(15);

        //return $properties;

        $this->data['properties'] = $properties;



        return view('properties',$this->data);

    }


    public function luxury_properties_for_rent($lang = '')
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

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


        $this->data['types'] = Type::all();


        $this->data['project_types'] = ProjectType::all();

        $this->data['beds'] = Bed::all();


        if ($lang == 'ar') {
            $Pageheading = "عقارات فاخرة للايجار في دبي";
        }


        elseif($lang == 'ru'){

            $Pageheading = "Квартиры на продажу в Дубай";

        } else {
            $Pageheading = "Luxury Properties For Rent in Dubai";
        }

        $this->data['PageHeading'] = $Pageheading;

        $landingpageseo = Landingpageseos::where('id','23')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        $properties = Property::with(['images', 'locationss','cityss'])->where('cat_id','6')->where('type_id','2')->orderby('id','DESC')->paginate(15);

        $this->data['properties'] = $properties;

        return view('properties',$this->data);

    }













    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showindex()
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $properties = Property::with(['images', 'locationss','cityss'])->get();

        $this->data['properties'] = $properties;

        return view('backend.properties.show',$this->data);

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


        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $this->data['types'] = Type::all();

        $this->data['catogory'] = Category::all();

        $this->data['agents'] = Agents::all();

        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();

        $this->data['beds'] = Bed::all();

        $this->data['baths'] = Bath::all();

        $this->data['aminities'] = Aminities::all();

        $this->data['projects'] = Project::all();

        $this->data['communities'] = Community::all();

        return view('backend.properties.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
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
            $properties = new Property();

            $properties->type_id = $request->type_id;
            $properties->ref_no = $request->ref_no;
            $properties->cat_id = $request->cat_id;
            $properties->project_id = $request->project;
            $properties->agent_id = $request->agent;
            $properties->is_premium = $request->premium;
            $properties->is_feature = $request->feature;
            $properties->is_exclusive = $request->exclusive;
            $properties->title_en = $request->title_en;
            $properties->title_ru = $request->title_ru;
            $properties->title_ar = $request->title_ar;
            $properties->slug_link = $this->createSlug($request->title_en);
            $properties->price = $request->price;
            $properties->price_usd = $request->price_usd;
            $properties->city_id = $request->city;
            $properties->location = $request->location;
            $properties->address_en = $request->address_en;
            $properties->address_ru = $request->address_ru;
            $properties->address_ar = $request->address_ar;
            $properties->map_embed_code = $request->map;
            $properties->bedrooms = $request->bed;
            $properties->bathrooms = $request->bath;
            $properties->permit_no = $request->permit_no;
            $properties->area = $request->area;
            $properties->parking = $request->parking;
            $properties->description_en = $request->description_en;
            $properties->description_ru = $request->description_ru;
            $properties->description_ar = $request->description_ar;
            $properties->meta_title_en = $request->meta_title_en;
            $properties->meta_title_ru = $request->meta_title_ru;
            $properties->meta_title_ar = $request->meta_title_ar;
            $properties->meta_keywords_en = $request->meta_keyword_en;
            $properties->meta_keywords_ru = $request->meta_keyword_ru;
            $properties->meta_keywords_ar = $request->meta_keyword_ar;
            $properties->meta_description_en = $request->meta_description_en;
            $properties->meta_description_ru = $request->meta_description_ru;
            $properties->meta_description_ar = $request->meta_description_ar;
            $properties->status = 1;




            $amenities = '';
			$request_amenities = $request->get('amenities');
			if (is_array($request_amenities))
			{
				foreach($request_amenities as $value)
				{
					if($amenities=='')
						$amenities="($value)";
					else
						$amenities.=",($value)";
				}
			}
			else
			{
				$amenities = $request_amenities;
			}
			$properties->amenities = $amenities;

            $properties->save();

            $properties_id = $properties->id;

            $properties_images = new Properties_image();

            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'cpproperties-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    $image->move($path."$properties_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$properties_id/".$image_name;

                    $dest_path = $orig_path;


                    $properties_images->image = $image_name;
                    $properties_images->property_id = $properties_id;

                    $properties_images->save();
                }
            }


            return Redirect::to('admin/properties/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/properties/show')->withErrors(['message', 'Record is already Exist']);
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
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        $this->data['banners'] = Banner::all()->where('status','1');
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
        $this->data['types'] = Type::all();

        $this->data['catogory'] = Category::all();

        $this->data['agents'] = Agents::all();

        $this->data['locations'] = Location::all();

        $this->data['cities'] = City::all();

        $this->data['beds'] = Bed::all();

        $this->data['baths'] = Bath::all();

        $this->data['aminities'] = Aminities::all();

        $this->data['projects'] = Project::all();

        $this->data['communities'] = Community::all();


        $properties = Property::with(['images', 'locationss', 'property_type','agentss'])->where('id',$id)->first();


        $project_array=array();
        $Projects = Project::where('id', '>=', '1')->orderby('title_en', 'asc')->get();
        foreach($Projects as $Project)
        {
            $project_array[$Project->id]=$Project->title_en;
        }



        $types_array=array();
        $Types = Type::where('id', '>=', '1')->get();
        foreach($Types as $ProjectType)
        {
            $types_array[$ProjectType->id]=$ProjectType->type_name_en;
        }

        $community_array=array();
        $Communities = Community::where('id', '>=', '1')->get();
        foreach($Communities as $Community)
        {
            $community_array[$Community->id] = $Community->title_en;
        }


        $category_array=array();
        $Category = Category::where('id', '>=', '1')->get();
        foreach($Category as $CategoryType)
        {
            $category_array[$CategoryType->id]=$CategoryType->cat_name_en;
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

        $amenities_array=array();
        $Amenities = Aminities::where('id', '>=', '1')->orderby('amenity_name_en', 'asc')->get();
        foreach($Amenities as $Amenity)
        {
            $amenities_array[$Amenity->id]=$Amenity->amenity_name_en;
        }


        $amenities = array();
        $db_amenities = $properties->amenities;
        if($db_amenities!='')
        {
            $db_amenities = explode(',',$db_amenities);
            foreach($db_amenities as $value)
            {
                $value=str_replace('(','',$value);
                $value=str_replace(')','',$value);

                $amenities[] = $value;
            }
        }





        //return $category_array;



        //return $properties;



        $this->data['amenities_array'] = $amenities_array;

        $this->data['amenities'] = $amenities;

        $this->data['community_array'] = $community_array;

        $this->data['cities_array'] = $cities_array;

        $this->data['locations_array'] = $locations_array;

        $this->data['types_array'] = $types_array;

        $this->data['category_array'] = $category_array;

        $this->data['projects_array'] = $project_array;

        $this->data['properties'] = $properties;


        return view('backend.properties.edit',$this->data);
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


        $properties = Property::find($id);



        if (!empty($properties)) {



            $properties->type_id = $request->type_id;
            $properties->ref_no = $request->ref_no;
            $properties->cat_id = $request->cat_id;
            $properties->project_id = $request->project;
            $properties->agent_id = $request->agent;
            $properties->is_premium = $request->premium;
            $properties->is_feature = $request->feature;
            $properties->is_exclusive = $request->exclusive;
            $properties->title_en = $request->title_en;
            $properties->title_ru = $request->title_ru;
            $properties->title_ar = $request->title_ar;
            $properties->slug_link = $this->createSlug($request->title_en);
            $properties->price = $request->price;
            $properties->price_usd = $request->price_usd;
            $properties->city_id = $request->city_id;
            $properties->location = $request->location;
            $properties->address_en = $request->address_en;
            $properties->address_ru = $request->address_ru;
            $properties->address_ar = $request->address_ar;
            $properties->map_embed_code = $request->map;
            $properties->bedrooms = $request->bed;
            $properties->bathrooms = $request->bath;
            $properties->permit_no = $request->permit_no;
            $properties->area = $request->area;
            $properties->parking = $request->parking;
            $properties->description_en = $request->description_en;
            $properties->description_ru = $request->description_ru;
            $properties->description_ar = $request->description_ar;
            $properties->meta_title_en = $request->meta_title_en;
            $properties->meta_title_ru = $request->meta_title_ru;
            $properties->meta_title_ar = $request->meta_title_ar;
            $properties->meta_keywords_en = $request->meta_keyword_en;
            $properties->meta_keywords_ru = $request->meta_keyword_ru;
            $properties->meta_keywords_ar = $request->meta_keyword_ar;
            $properties->meta_description_en = $request->meta_description_en;
            $properties->meta_description_ru = $request->meta_description_ru;
            $properties->meta_description_ar = $request->meta_description_ar;
            $properties->status = $request->status;


            $amenities = '';
			$request_amenities = $request->get('amenities');
			if (is_array($request_amenities))
			{
				foreach($request_amenities as $value)
				{
					if($amenities=='')
						$amenities="($value)";
					else
						$amenities.=",($value)";
				}
			}
			else
			{
				$amenities = $request_amenities;
			}
			$properties->amenities = $amenities;

            $properties->save();


            $properties_id = $properties->id;

            $properties_images = new Properties_image();

            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'cpproperties-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    $image->move($path."$properties_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$properties_id/".$image_name;

                    $dest_path = $orig_path;


                    $properties_images->image = $image_name;
                    $properties_images->property_id = $properties_id;

                    $properties_images->save();
                }
            }

            return redirect('admin/properties/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/properties/show');
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
