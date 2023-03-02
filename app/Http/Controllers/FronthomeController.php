<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\ProjectType;
use App\Models\Banner;
use App\Models\Bed;
use App\Models\Project;
use App\Models\Invoice;
use App\Models\Agents;
use App\Models\Property;
use App\Models\Community;
use App\Models\Landingpageseos;
use App\Models\Location;
use App\Models\Leads;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\Dld;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;




use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;


class FronthomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function HomePage()
    {
        return $this->index("");
    }


    public function autocomplete(Request $request)
    {
        $results = [];

        if($request->has('q')){
            $search = $request->q;

            $results = Property::select('title_en AS title')
            ->where(function($q) use ($search) {
                $q->where('title_en', 'LIKE', '%' . $search . '%');
			})
			->get();

            $address = Property::select('address_en AS title')
            ->where(function($q) use ($search) {
                $q->where('address_en', 'LIKE', '%' . $search . '%');
			})
			->get();

            $results->merge($address);
        }

        return response()->json($results);
    }




    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('opt_locations')
                ->where('name_en', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;  list-style-type: none;padding: 0; border: 1px solid #ddd;border-radius: 0px;">';
            foreach($data as $row)
            {
            $output .= '
            <li class="li-2" style="padding: 3px; font-size: 16px;"><a href="#">'.$row->name_en.'</a></li>
            ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


    public function fetch_dld(Request $request)
    {
     if($request->get('query'))
     {
        $query = $request->get('query');




        $data = DB::table('opt_dld_transactions')
                 ->select('area_name_en', DB::raw('count(*) as total'))
                 ->where('area_name_en', 'LIKE', "%{$query}%")

                 ->groupBy('area_name_en')


                 ->take(10)
                 ->get();

                 $building = DB::table('opt_dld_transactions')
                 ->select('building_name_en', DB::raw('count(*) as total' ))
                 ->where('building_name_en', 'LIKE', "%{$query}%")
                 ->groupBy('building_name_en')


                 ->take(10)
                 ->get();





        $output = '<ul class="dropdown-menu" style="display:block; position:absolute;  list-style-type: none;padding: 0; border: 1px solid #ddd;border-radius: 0px;">';
        foreach($building as $row)
        {
        $output .= '
        <li class="li-2" style="padding: 3px; font-size: 16px;"><a href="#">'.$row->building_name_en.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;


        $output = '<ul class="dropdown-menu" style="display:block; position:absolute;  list-style-type: none;padding: 0; border: 1px solid #ddd;border-radius: 0px;">';
        foreach($data as $row)
        {
        $output .= '
        <li class="li-2" style="padding: 3px; font-size: 16px;"><a href="#">'.$row->area_name_en.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;
     }
    }


    public function fetch_arabic(Request $request)
    {
     if($request->get('query'))
     {
        $query = $request->get('query');
        $data = DB::table('opt_locations')
            ->where('name_ar', 'LIKE', "%{$query}%")
            ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative;  list-style-type: none;padding: 0; border: 1px solid #ddd;border-radius: 0px;">';
        foreach($data as $row)
        {
        $output .= '
        <li class="li-2" style="padding: 3px; font-size: 16px;text-align:right;"><a href="#">'.$row->name_ar.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;
     }
    }





    public function index($lang = "")
    {

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $project = Project::with(['images','developers','project_types'])->orderBy('id', 'desc')->take(6)->get();

        $off_plan_projects = Project::with(['images','developers','project_types'])->where('project_status', '1')->orderBy('id', 'desc')->take(4)->get();

        $projectmobile = Project::with(['images','developers','project_types'])->orderBy('id', 'desc')->take(3)->get();

        $properties_for_sale = Property::with(['images', 'locationss','cityss'])->where('cat_id','1')->where('type_id','1')->inRandomOrder()->take(6)->get();

        $properties_for_rent = Property::with(['images', 'locationss','cityss'])->where('cat_id','1')->where('type_id','2')->inRandomOrder()->take(6)->get();

        $communities = Community::with(['images'])->limit(4)->get();

        $banner = Banner::where('status', '1')->get();

        $agents = Agents::where('status', 1)->get();

        $landingpageseo = Landingpageseos::where('id','1')->first();

        //return $properties_for_sale;

        $this->data['communities'] = $communities;


        $this->data['off_plan_projects'] = $off_plan_projects;

        $this->data['agents'] = $agents;

        $this->data['banner'] = $banner;

        $this->data['project'] = $project;

        $this->data['landingpageseo'] = $landingpageseo;

        $this->data['projectsmobile'] = $projectmobile;

        $this->data['properties_for_sale'] = $properties_for_sale;

        $this->data['properties_for_rent'] = $properties_for_rent;

        // dd($agents[0]);

        return view('index',$this->data);

    }




    public function searchbyproject( Request $request )
    {

        $search = $request->search;

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $project = Project::where('title_en', 'Like' , '%' . $search . '%' )->where('status','1')->orderBy('id', 'desc')->get();

        //return $project;

        $this->data['project'] = $project;

        return view('search',$this->data);

    }




    public function thankyou($lang = '' )
    {



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;




        return view('thankyou',$this->data);

    }

    public function sell($lang = '' )
    {



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $landingpageseo = Landingpageseos::where('id','7')->first();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        $this->data['landingpageseo'] = $landingpageseo;




        return view('sell',$this->data);

    }



    public function sitemap($lang = '')
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $Dubaiareas = Community::where([['status', 1]])->orderby('title_en')->get();


        $Dubaiprojects = Project::where([['status', 1]])->where([['pro_status', 1]])->orderby('title_en')->get();

        $Dubaireadyprojects = Project::where([['status', 1]])->where([['pro_status', 2]])->orderby('title_en')->get();

        $Dubailuxuryprojects = Project::where([['status', 1]])->where([['pro_status', 3]])->orderby('title_en')->get();

        $dubaiproperties_sale = Property::where([['status', 1]])->where([['type_id', 1]])->orderby('title_en')->get();

        $dubaiproperties_rent = Property::where([['status', 1]])->where([['type_id', 2]])->orderby('title_en')->get();




        $this->data['dubaicommunity'] = $Dubaiareas;

        $this->data['dubaiprojects'] = $Dubaiprojects;

        $this->data['dubaireadyprojects'] = $Dubaireadyprojects;

        $this->data['dubailuxuryprojects'] = $Dubailuxuryprojects;

        $this->data['properties_sale'] = $dubaiproperties_sale;

        $this->data['properties_rent'] = $dubaiproperties_rent;



        return view('sitemap',$this->data);

    }


    public function services($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $landingpageseo = Landingpageseos::where('id','4')->first();



        $this->data['landingpageseo'] = $landingpageseo;



        return view('services',$this->data);

    }





    public function mortgage($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();




        return view('mortgage',$this->data);

    }





     public function sale_transaction($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        $dld = Dld::orderBy('id', 'desc')->paginate(30);

        //return $dld;

        $this->data['dld'] = $dld;

        return view('sale_transaction',$this->data);

    }





    public function sale_transaction_search(Request $request, $lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();


        // $dld = Dld::where( 'property_type_en', 'LIKE', '%' . $request->area_name_en . '%' )
        // ->where('area_name_en', 'LIKE', '%' . $request->search . '%')
        // ->where('procedure_name_en', 'LIKE', '%' . $request->transtion_type . '%')
        // ->where('reg_type_en', 'LIKE', '%' . $request->status . '%')
        // ->where('instance_date', '>=', $date_from)
        // ->where('instance_date', '<=', $date_to)
        // ->orderBy('instance_date', 'desc')
        // ->paginate($request->records);

        $dld = Dld::where('area_name_en', 'LIKE', "%{$request->search}%");




        if($request->property_type != null){
            $dld->where('property_type_en' , $request->property_type);
        }
        if($request->transtion_type != null){
            $dld->where('procedure_name_en', $request->transtion_type);
        }
        if($request->status != null){
            $dld->where('reg_type_en', $request->status);
        }
        if($request->date_from != null){
            $dld->where('instance_date', '>=', $request->date_from);
        }
        if($request->date_to != null){
            $dld->where('instance_date', '<=', $request->date_to);
        }


        $dld = $dld->orderBy('id', 'desc')->paginate($request->records);

              if($dld->isEmpty())
        {
            $dld = Dld::where('building_name_en', 'LIKE', "%{$request->search}%");

            if($request->property_type != null){
                $dld->where('property_type_en' , $request->property_type);
            }
            if($request->transtion_type != null){
                $dld->where('procedure_name_en', $request->transtion_type);
            }
            if($request->status != null){
                $dld->where('reg_type_en', $request->status);
            }
            if($request->date_from != null){
                $dld->where('instance_date', '>=', $request->date_from);
            }
            if($request->date_to != null){
                $dld->where('instance_date', '<=', $request->date_to);
            }


            $dld = $dld->orderBy('id', 'desc')->paginate($request->records);
        }



        $this->data['request'] = $request;


        $this->data['dld'] = $dld;

        return view('sale_transaction',$this->data);

    }





    public function aboutus($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $project = Project::with(['images','developers','project_types'])->orderBy('id', 'desc')->take(6)->get();


        //return $project;

        $this->data['projects'] = $project;

        return view('aboutus',$this->data);

    }






    public function faqs($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        return view('faqs',$this->data);

    }





    public function onlinepayments($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        return view('onlinepayments',$this->data);

    }





    public function book_a_viewing($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        return view('book_viewing',$this->data);

    }





    public function privacyandpolicy($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        return view('privacypolicy',$this->data);

    }




    public function termsandconditions($lang = '' )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();





        return view('terms',$this->data);

    }




    public function valuation(  )
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        return view('valuation', $this->data);
    }


    public function career($lang = "")
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $landingpageseo = Landingpageseos::where('id','5')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        return view('career',$this->data);

    }





    public function contactus($lang = "")
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $landingpageseo = Landingpageseos::where('id','5')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        return view('contactus',$this->data);

    }


    public function check_invoice($lang = "")
    {




        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $landingpageseo = Landingpageseos::where('id','5')->first();

        $this->data['landingpageseo'] = $landingpageseo;

        return view('check_invoice',$this->data);

    }


    public function find_invoice(Request $request)
	{

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


		$name = $request->name;
		$invoice_no = $request->invoice_no;
		$contract_no = $request->contract_no;

		$invoice = Invoice::where('invoice_no', $invoice_no)->where('contract_no',$contract_no)->first();



        if ( $invoice )
        {


			$invoice_details = Invoice::where('invoice_no', $invoice_no)->first();


			return view('invoice-2',compact("invoice_details"));

        }

        else
        {

            return Redirect::to('/invoice')->with('message','Your Invoice is Not Available !');

        }

	}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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



    public function request_detail_project(Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $project_id=$request->project;

		$Project = Project::find($project_id);



		$Leads = new Leads();

		$Leads->full_name = $request->name;
		$Leads->lead_name = $Project->title_en;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        \Mail::send('email/project_email',
        array(
            'project_name' => $Project->title_en,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
        ), function($message) use ($request)
          {
             $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        /**
         * Mail Jet Mail Method
         */
        // $mj = new \Mailjet\Client('4167d66f4899cf11e786c48d160c4e43','88345b5201f534a26a6123b82f75a5fa',true,['version' => 'v3.1']);
        // $body = [
        //     'Messages' => [
        //     [
        //         'From' => [
        //             'Email' => "alert@dubai-offers.online",
        //             'Name' => "EDGE REALTY REAL ESTATE"
        //         ],
        //         'To' => [
        //             [
        //                 'Email' => "web@edgerealty.ae",
        //                 'Name' => "Edge"
        //             ]
        //         ],
        //             'Subject' => "Greetings from Mailjet.",
        //             'TextPart' => "My first Mailjet email",
        //             'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
        //             'CustomID' => "AppGettingStartedTest"
        //         ]
        //     ]
        // ];
        // $response = $mj->post(Resources::$Email, ['body' => $body]);
        // $response->success() && var_dump($response->getData());
        /**
         * Mail Jet Mail Method ---end--
         */


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

        return redirect('/en/thankyou');



    }


    public function request_detail_project_detail(Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $project_id=$request->project;

		$Project = Project::find($project_id);



		$Leads = new Leads();



		$Leads->full_name = $request->name;
		$Leads->lead_name = $Project->title_en;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        \Mail::send('email/project_email',
        array(
            'project_name' => $Project->title_en,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
        ), function($message) use ($request)
          {

             $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });

        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');



    }

    public function request_detail_property(Request $request)
    {


        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $property_id = $request->property;

		$property = Property::find($property_id);

        $field_ip = $_SERVER['REMOTE_ADDR'];

        $currentURL = $request->page_url;

        $agent = Agents::where('id', $request->agent_id)->get();

        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->where('id', $request->property_id)->get();

        // dd($agent[0]->name_en);



		$Leads = new Leads();

		$Leads->full_name = $request->name;
		$Leads->lead_name = $property->title_en;
		$Leads->agent = $agent[0]->name_en;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();


        \Mail::send('email/property_email',
        array(
            'property_name' => $property->title_en,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
            'field_ip' => $field_ip,
            'property_name' => $properties[0]->title_en,
            'agent_name' => $agent[0]->name_en,
            'currentURL' => $currentURL,
        ), function($message) use ($request)
        {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
        });

        // \Mail::send('email/user_email',
        // array(

        //   ), function($message) use ($request)
        // {

        //     $message->to($request->email)->subject('Edge Realty Registration');
        // });

          return redirect('/en/thankyou');



    }

    public function request_detail_community(Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


        $Leads = new Leads();

		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        $community_id=$request->project;

		$community = community::find($community_id);



        \Mail::send('email/community_email',
        array(
            'community_name' => $community->title_en,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
        ), function($message) use ($request)
          {

             $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');



    }

    public function contactus_email( Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        \Mail::send('email/contactus_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });

        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');
    }

    public function mortgage_email( Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();


        \Mail::send('email/mortgage_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');
    }




    public function request_detail( Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        \Mail::send('email/request_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),

        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');
    }


    public function book_view_email( Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();

        $property_detail = Property::with(['images', 'locationss', 'property_type','agentss'])->where('id',$request->property_id)->first();



        \Mail::send('email/book_view_email',
        array(
            'property_name' => $property_detail->title_en,
            'date' => $request->get('book_date'),
            'time' => $request->get('book_time'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),

        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });

        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');
    }


    public function book_viewing_email( Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();


        \Mail::send('email/book_viewing_email',
        array(

            'date' => $request->get('book_date'),
            'time' => $request->get('book_time'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),

        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });

          return redirect('/en/thankyou');
    }


    public function career_email(Request $request)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        // $Leads = new Leads();


        // $Leads->page_url = $request->url_path;
        // $Leads->full_name = $request->name;
        // $Leads->phone = $request->phone;
        // $Leads->email = $request->email;
        // $Leads->page_url = url()->previous();
        // $Leads->ip_address = $_SERVER["REMOTE_ADDR"];
        // $Leads->type_id = 1;
        // $Leads->save();


        $validator = Validator::make($request->all(), [
            "file_name" => "required|mimes:pdf|max:5000",
        ]);



        \Mail::send('email/career_email',
        array(
            'category' => $request->get('category'),
            'name' => $request->get('name'),
			'language' => $request->get('language'),
			'nationality' => $request->get('nationality'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),

        ), function($message) use ($request)
          {

			 $message->to('hr@edgerealty.ae')->subject('Edge Realty');
			 $message->attach($request->file_name->getRealPath(), array(
				'as' => $request->file_name->getClientOriginalName(),           // If you want you can chnage original name to custom name
				'mime' => $request->file_name->getMimeType())
			);



        });

        // \Mail::send('email/user_email',
        // array(

        // ), function($message) use ($request)
        //   {

        //      $message->to($request->email)->subject('Edge Realty Registration');
        //   });



		return redirect('/en/thankyou');


	}




    public function book_valuation_email(Request $request)

    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();


        \Mail::send('email/book_valuation_email',
        array(

            'address' => $request->get('address'),
            'type' => $request->get('type'),
            'property_type' => $request->get('property_type'),
            'bedrooms' => $request->get('bedrooms'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),

        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        // \Mail::send('email/user_email',
        // array(

        // ), function($message) use ($request)
        // {

        //     $message->to($request->email)->subject('Edge Realty Registration');
        // });


		return redirect('/en/thankyou');


	}


    public function project_documentSubmit(Request $request)

    {
        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;


		$Leads = new Leads();


		$Leads->page_url = $request->url_path;
		$Leads->full_name = $request->name;
		$Leads->phone = $request->phone;
		$Leads->email = $request->email;
		$Leads->page_url = url()->previous();
		$Leads->ip_address = $_SERVER["REMOTE_ADDR"];
		$Leads->type_id = 1;
		$Leads->save();


		$project_id=$request->project;

		$Project = Project::find($project_id);



        \Mail::send('email/project_document_email',
        array(


            'Project_name' => $Project->title_en,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),

        ), function($message) use ($request)
          {

            $message->to('lead@edgerealty.ae')->subject('Edge Realty');
          });


        //   \Mail::send('email/user_email',
        //   array(

        //   ), function($message) use ($request)
        //     {

        //        $message->to($request->email)->subject('Edge Realty Registration');
        //     });


		$file=  "https://edgerealty.ae/"."uploads/projects/documents/".$request->document_id."/".$request->document_name;

		$headers = array(
				'Content-Type: application/pdf',
				);

		//Response::download($file, "$request->document_name", $headers);

		return redirect($file);

	}



    public function team($lang = '' ) {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

		// General Webmaster Settings

		$conLag = App::getLocale();

        $agents = Agents::orderBy('id', 'asc')->where('status', 1)->get();


        $this->data['blogs'] = $agents;

        // dd($agents);

        return view('team',$this->data);
    }





    public function team_detail($lang = '', $id)
    {

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $slug_link = $id;
        //
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }


		$conLag = App::getLocale();


        $projects = Project::with(['images','developers','project_types'])->where('status', '1')->where('agent_id',$slug_link)->get();

        $properties = Property::with(['images', 'locationss','cityss'])->where('status', '1')->where('agent_id',$slug_link)->get();

        $agent = Agents::where('id', $slug_link)->where('status', '1')->get();

        // dd($properties);

        $this->data['projects'] = $projects;

        $this->data['properties'] = $properties;

        $this->data['agent'] = $agent[0];

        return view('team_detail',$this->data);
    }




    public function maps($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->take(3)->get();


        $original_data = json_decode($properties, JSON_PRETTY_PRINT);

        // dd($original_data);

        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['property_locations']['longitude']);

            $features[] = array(
                    'type' => 'Feature',
                    'properties' => array('name' => $value['title_en'], 'id' => $value['id'], 'price' => $value['price'], 'address' => $value['address_en']),
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['property_locations']['latitude'],(float)$value['property_locations']['longitude'])),
                    );
            };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;

        return view('mapbox.maps',$this->data);
    }

    public function maps7($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->take(3)->get();


        $original_data = json_decode($properties, JSON_PRETTY_PRINT);

        // dd($original_data);

        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['property_locations']['longitude']);

            $features[] = array(
                    'type' => 'Feature',
                    'properties' => array('name' => $value['title_en'], 'id' => $value['id'], 'price' => $value['price'], 'address' => $value['address_en']),
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['property_locations']['latitude'],(float)$value['property_locations']['longitude'])),
                    );
            };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;

        return view('mapbox.map7',$this->data);
    }









    public function maps2($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;

        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->orderBy('id', 'desc')->get();


        $original_data = json_decode($properties, JSON_PRETTY_PRINT);

        // dd($original_data);


        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['images'][0]['image']);
            if( $value['price'] > 1000 ) {

                $x = round($value['price']);
                $x_number_format = number_format($x);
                $x_array = explode(',', $x_number_format);
                $x_parts = array('k', 'm', 'b', 't');
                $x_count_parts = count($x_array) - 1;
                $x_display = $x;
                $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                $x_display .= $x_parts[$x_count_parts - 1];
            }

            if($value['property_locations'] != null)
            {
                $crs = array(
                    "type" => "name",
                    "properties" => array(
                        "name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
                    )
                );


                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['property_locations']['longitude'], (float)$value['property_locations']['latitude'])),
                    'properties' => array(
                        'name' => $value['title_en'],
                        'id' => $value['id'],
                        'priceLong' => 'AED '.number_format($value['price']),
                        'price' => $x_display,
                        'address' => $value['address_en'],
                        'image' => $value['images'][0]['image'],
                        'image_url' => 'uploads/properties/'.$value['id'].'/'.$value['images'][0]['image'],
                        'slug_link' => $value['slug_link'],
                        'bed' => $value['bedrooms'],
                        'bath' => $value['bathrooms'],
                        'area' => $value['area'],
                        'description' => $value['description_en'],
                        )
                    );
            }
        };

        $allfeatures = array(
            'type' => 'FeatureCollection',
            // 'crs' => $crs,
            'features' => $features
        );

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;




        // $file = Storage::get('Geospatial/properties.geojson');
        // $exists = Storage::disk('public')->exists('Geospatial/properties.geojson');

        // $contents = Storage::disk('public')->get('Geospatial/properties.geojson');
        // dd($exists, $contents);
        // $this->data['file'] = $file;
        // $uploadPath = "uploads/properties/"
        // return json_encode($allfeatures, JSON_PRETTY_PRINT);

        return view('mapbox.map4',$this->data);
    }















    public function luxury_projects_map($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types',])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        $luxuryProjects = Project::with(['images','developers','project_types', 'project_locations'])->where('project_status', '3')->orderBy('id', 'desc')->get();


        $original_data = json_decode($luxuryProjects, JSON_PRETTY_PRINT);

        // dd($original_data);


        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['images'][0]['image']);
            if( $value['project_price'] > 1000 ) {

                $x = round($value['project_price']);
                $x_number_format = number_format($x);
                $x_array = explode(',', $x_number_format);
                $x_parts = array('k', 'm', 'b', 't');
                $x_count_parts = count($x_array) - 1;
                $x_display = $x;
                $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                $x_display .= $x_parts[$x_count_parts - 1];
            }

            if($value['project_locations'] != null)
            {
                $crs = array(
                    "type" => "name",
                    "properties" => array(
                        "name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
                    )
                );

                $area = 0;
                if($value['size'] == null )
                {
                    $area = 'n/a';
                } else {
                    $area = $value['size'];
                }

                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['project_locations']['longitude'], (float)$value['project_locations']['latitude'])),
                    'properties' => array(
                        'name' => $value['title_en'],
                        'id' => $value['id'],
                        // 'priceLong' => 'AED '.number_format($value['project_price']),
                        // 'price' => $x_display,
                        'address' => $value['address_en'],
                        'image' => $value['images'][0]['image'],
                        'image_url' => 'uploads/projects/images/'.$value['id'].'/'.$value['images'][0]['image'],
                        'slug_link' => $value['slug_link'],
                        'bed' => $value['bedrooms'],
                        'floors' => $value['no_floors'],
                        'area' => $area,
                        'description' => $value['description_en'],
                        )
                    );
            }
        };

        $allfeatures = array(
            'type' => 'FeatureCollection',
            // 'crs' => $crs,
            'features' => $features
        );

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;




        // $file = Storage::get('Geospatial/properties.geojson');
        // $exists = Storage::disk('public')->exists('Geospatial/properties.geojson');

        // $contents = Storage::disk('public')->get('Geospatial/properties.geojson');
        // dd($exists, $contents);
        // $this->data['file'] = $file;
        // $uploadPath = "uploads/properties/"
        // return json_encode($allfeatures, JSON_PRETTY_PRINT);

        return view('mapbox.luxuryProjectsMap',$this->data);
    }







    public function ready_projects_map($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types',])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        $readyProjects = $project = Project::with(['images','developer','locationz','project_locations'])->where('pro_status', '=' , 2 )->orderBy('id', 'DESC')->where('status', '1')->get();



        $original_data = json_decode($readyProjects, JSON_PRETTY_PRINT);

        // dd($original_data);


        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['images'][0]['image']);
            if( $value['project_price'] > 1000 ) {

                $x = round($value['project_price']);
                $x_number_format = number_format($x);
                $x_array = explode(',', $x_number_format);
                $x_parts = array('k', 'm', 'b', 't');
                $x_count_parts = count($x_array) - 1;
                $x_display = $x;
                $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                $x_display .= $x_parts[$x_count_parts - 1];
            }

            if($value['project_locations'] != null)
            {
                $crs = array(
                    "type" => "name",
                    "properties" => array(
                        "name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
                    )
                );

                $area = 0;
                if($value['size'] == null )
                {
                    $area = 'n/a';
                } else {
                    $area = $value['size'];
                }

                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['project_locations']['longitude'], (float)$value['project_locations']['latitude'])),
                    'properties' => array(
                        'name' => $value['title_en'],
                        'id' => $value['id'],
                        // 'priceLong' => 'AED '.number_format($value['project_price']),
                        // 'price' => $x_display,
                        'address' => $value['address_en'],
                        'image' => $value['images'][0]['image'],
                        'image_url' => 'uploads/projects/images/'.$value['id'].'/'.$value['images'][0]['image'],
                        'slug_link' => $value['slug_link'],
                        'bed' => $value['bedrooms'],
                        'floors' => $value['no_floors'],
                        'area' => $area,
                        'description' => $value['description_en'],
                        )
                    );
            }
        };

        $allfeatures = array(
            'type' => 'FeatureCollection',
            // 'crs' => $crs,
            'features' => $features
        );

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;




        // $file = Storage::get('Geospatial/properties.geojson');
        // $exists = Storage::disk('public')->exists('Geospatial/properties.geojson');

        // $contents = Storage::disk('public')->get('Geospatial/properties.geojson');
        // dd($exists, $contents);
        // $this->data['file'] = $file;
        // $uploadPath = "uploads/properties/"
        // return json_encode($allfeatures, JSON_PRETTY_PRINT);

        return view('mapbox.readyProjectsMap',$this->data);
    }





    public function offplan_projects_map($lang = '')
    {
        if ($lang != "") {
            // Set Language
            App::setLocale($lang);
            \Session::put('locale', $lang);
        }

        $footerLuxuryProjects = Project::with(['images','developers','project_types',])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $footerCommunities = Community::with(['images'])->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;

        $this->data['footerCommunities'] = $footerCommunities;



        $offplan = Project::with(['images','developer','locationz', 'project_locations'])->orderBy('id', 'desc')->where('pro_status', '=' , 1 )->where('status', '1')->get();



        $original_data = json_decode($offplan, JSON_PRETTY_PRINT);

        // dd($original_data);


        $features = array();

        foreach($original_data as $key => $value) {

            // dd($value['images'][0]['image']);
            if( $value['project_price'] > 1000 ) {

                $x = round($value['project_price']);
                $x_number_format = number_format($x);
                $x_array = explode(',', $x_number_format);
                $x_parts = array('k', 'm', 'b', 't');
                $x_count_parts = count($x_array) - 1;
                $x_display = $x;
                $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                $x_display .= $x_parts[$x_count_parts - 1];
            }

            if($value['project_locations'] != null)
            {
                $crs = array(
                    "type" => "name",
                    "properties" => array(
                        "name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
                    )
                );

                $area = 0;
                if($value['size'] == null )
                {
                    $area = 'n/a';
                } else {
                    $area = $value['size'];
                }

                $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['project_locations']['longitude'], (float)$value['project_locations']['latitude'])),
                    'properties' => array(
                        'name' => $value['title_en'],
                        'id' => $value['id'],
                        // 'priceLong' => 'AED '.number_format($value['project_price']),
                        // 'price' => $x_display,
                        'address' => $value['address_en'],
                        'image' => $value['images'][0]['image'],
                        'image_url' => 'uploads/projects/images/'.$value['id'].'/'.$value['images'][0]['image'],
                        'slug_link' => $value['slug_link'],
                        'bed' => $value['bedrooms'],
                        'floors' => $value['no_floors'],
                        'area' => $area,
                        'description' => $value['description_en'],
                        )
                    );
            }
        };

        $allfeatures = array(
            'type' => 'FeatureCollection',
            // 'crs' => $crs,
            'features' => $features
        );

        $this->data['allfeatures'] = json_encode($allfeatures, JSON_PRETTY_PRINT);

        Storage::disk('public')->put("Geospatial/properties.geojson",  response()->json($allfeatures));

        $file2 = URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson');
        $this->data['file2'] = json_encode($file2, JSON_PRETTY_PRINT);

        $this->data['allfeatures'] = $allfeatures;




        // $file = Storage::get('Geospatial/properties.geojson');
        // $exists = Storage::disk('public')->exists('Geospatial/properties.geojson');

        // $contents = Storage::disk('public')->get('Geospatial/properties.geojson');
        // dd($exists, $contents);
        // $this->data['file'] = $file;
        // $uploadPath = "uploads/properties/"
        // return json_encode($allfeatures, JSON_PRETTY_PRINT);

        return view('mapbox.offplanProjectsMap',$this->data);
    }






}
