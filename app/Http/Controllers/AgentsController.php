<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agents;
use App\Models\Property;
use App\Models\Type;
use App\Models\ProjectType;
use App\Models\Banner;
use App\Models\Bed;
use App\Models\Bath;
use App\Models\Category;
use App\Models\Location;
use App\Models\City;
use App\Models\Aminities;
use App\Models\Community;
use App\Models\Developer;
use App\Models\Project;
use App\Models\Properties_image;;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Landingpageseos;
use Auth;

class AgentsController extends Controller
{
    private $uploadPath = "uploads/agents/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function showindex()
    {
        //
        $this->data['agents'] = Agents::where('status', 1)->get();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->where('project_status', '3')->orderBy('id', 'desc')->take(8)->get();

        $this->data['footerLuxuryProjects'] = $footerLuxuryProjects;


        return view('backend.agent.show',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('backend.agent.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bool=0;
		/*$email=$request->email;
		$Agent = Agent::where('email', '=', $email)->get();
		foreach($Agent as $Agent)
		{
			$bool=1;
		}*/

        // dd($request);
		if($bool==0)
		{

            //
            $Agent = new Agents();

            $Agent->name_en = $request->name_en;
            $Agent->name_ar = $request->name_en;
            $Agent->name_ru = $request->name_en;

            $Agent->language_en = $request->language_en;
            $Agent->language_ar = $request->language_ar;
            $Agent->language_ru = $request->language_en;

            $Agent->designation_en = $request->designation_en;
            $Agent->designation_ar = $request->designation_ar;
            $Agent->designation_ru = $request->designation_en;

            $Agent->description_en = $request->description_en;
            $Agent->description_ar = $request->description_ar;
            $Agent->description_ru = $request->description_ru;

            // $Agent->name_ar = $request->name_ar;
            $Agent->slug_link = $this->createSlug($request->name_en);
            $Agent->phone = $request->phone;
            $Agent->email = $request->email;
            $Agent->status = 1;

            $Agent->save();

            $agent_id = $Agent->id;




            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'cpagent-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    // mkdir(storage_path($path.'$agent_id/'), 0775);
                    $image->move($path."$agent_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$agent_id/".$image_name;

                    $dest_path = $orig_path;

                    $Agent->image = $image_name;

                    $Agent->save();

                }
            }
            return Redirect::to('admin/agents/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/agents/show')->withErrors(['message', 'Record is already Exist']);
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

        $this->data['Agents'] = Agents::where('id', $id )->first();



        return view('backend.agent.edit',$this->data);
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



        $Agent = Agents::find($id);


        if (!empty($Agent)) {

			$Agent->name_en = $request->name_en;
            $Agent->name_ar = $request->name_en;
            $Agent->name_ru = $request->name_en;

            $Agent->language_en = $request->language_en;
            $Agent->language_ar = $request->language_ar;
            $Agent->language_ru = $request->language_en;

            $Agent->designation_en = $request->designation_en;
            $Agent->designation_ar = $request->designation_ar;
            $Agent->designation_ru = $request->designation_en;

            $Agent->description_en = $request->description_en;
            $Agent->description_ar = $request->description_ar;
            $Agent->description_ru = $request->description_ru;

			$Agent->slug_link = $this->createSlug($request->name_en);
			$Agent->phone = $request->phone;
            $Agent->email = $request->email;



            $Agent->updated_by = Auth::user()->id;

			$Agent->save();


            $agent_id = $id;


			if($request->hasfile('filename'))
			{
				$count=1;
				foreach($request->file('filename') as $image)
				{
					$image_name = 'cpagent-'.time().'.'.$image->guessExtension();
					$path = $this->uploadPath;
					$image->move($path."$agent_id/", $image_name);

					$Agent = Agents::find($agent_id);
					if($Agent->image!='' && file_exists($path."$agent_id/".$Agent->image))
					{
						unlink($path."$agent_id/".$Agent->image);
					}
                    $Agent->image = $image_name;

					$Agent->save();
				}
            }
            return Redirect::to('admin/agents/show')->withSuccess('message','Record has Been Updated.');
        }
        else
        {
            return redirect()->action('admin/agents/show');
        }




    }


    public function createSlug($str, $delimiter = '-'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		return $slug;

	}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Agents::find($id);

        if(!empty($result))
        {
            try {
                $result->status = 0;
                $result->save();
            }
            catch (\Exception $e)
            {
                return Redirect::back()->with('error','Something went wrong in the Query! Contact administrator');
            }

        }

        return Redirect::back()->with('message','Agent has been successfully deleted!');

    }



    public function properties($id)
    {
        $result = Property::with(['images', 'locationss','cityss'])->where('agent_id',$id)->orderBy('created_at', 'DESC')->get();

        $result2 = Agents::find($id);

        $result3 = Property::with(['locationss','cityss'])->orderBy('created_at', 'DESC')->get();
        // dd($result3);

        $this->data['result'] = $result;

        $this->data['result2'] = $result2;

        $this->data['result3'] = $result3;

        if(!empty($result))
        {
            return view('backend.agent.properties',$this->data);
        }else {
            return Redirect::back()->with('message','Failed to unlist!');
        }


    }



    public function properties_list(Request $request)
    {
        $result = Property::find($request->property_id);

        // dd($result);

        if(!empty($result))
        {
            try {
                $result->agent_id = $request->agent_id;
                $result->save();
            }
            catch (\Exception $e)
            {
                return Redirect::back()->with('error','Failed to assign agent! Contact administrator');
            }
            return Redirect::back()->with('message','Property has been successfully assigned!');
        }else {
            return Redirect::back()->with('error','Failed to find property!');
        }
        // return Redirect::back()->with('message','Property has been successfully assigned!');


    }


    public function properties_unlist($id)
    {
        $result = Property::find($id);

        if(!empty($result))
        {
            try {
                $result->agent_id = 0;
                $result->save();
            }
            catch (\Exception $e)
            {
                return Redirect::back()->with('error','Failed to assign agent! Contact administrator');
            }

            // dd($result);
            return Redirect::back()->with('message','Property has been successfully updated!');
        }else {
            return Redirect::back()->with('error','Failed to find property!');
        }
    }

}
