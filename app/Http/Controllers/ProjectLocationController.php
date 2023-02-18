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
use App\Models\ProjectLocation;

use App;
use App\Models\Landingpageseos;
use App\Models\Property;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ProjectLocationController extends Controller
{
    public function index()
    {
		$conLag = App::getLocale();

        $footerLuxuryProjects = Project::with(['images','developers','project_types'])->orderBy('id', 'desc')->get();

        $this->data['projects'] = $footerLuxuryProjects;

        return view('backend.projects.location.LuxuryLocationmgt',$this->data);
    }


    public function make($id)
    {
        $projects = Project::with(['images','developers','project_types'])->where('id', $id )->orderBy('id', 'desc')->get();

        // dd($projects);

        $this->data['projects'] = $projects[0];


        return view('backend.projects.location.make2',$this->data);
    }


    public function update_create(Request $request)
    {
        // dd($request->property_id);
        $property = Project::with(['images','developers','project_types'])->orderBy('id', 'desc')->get();                                                    // find the property
        // dd($property);

        $search_current_location = ProjectLocation::where('project_id', $request->properties_id)->first();
        // dd($request->properties_id);
        // dd($search_current_location);

        if($search_current_location == null)                                                                                                                // check if the collection returns a null
        {
            $new_location = new ProjectLocation();
            $new_location->latitude = $request->coordinate_lat;
            $new_location->longitude = $request->coordinate_lng;
            $new_location->project_id = $request->properties_id;
            $new_location->save();

            // dd($new_location);


            return Redirect::to('admin/projects/locations-mgt')->withSuccess('message', $property[0]->title_en.' has been updated');
        } else {
            $get_location = ProjectLocation::where('project_id', $request->properties_id)->first();                                                        // find for the property ID in locations table
            $get_location->latitude = $request->coordinate_lat;
            $get_location->longitude = $request->coordinate_lng;
            $get_location->project_id = $request->properties_id;
            $get_location->save();

            // dd($get_location);

            return Redirect::to('admin/projects/locations-mgt')->withSuccess('message', $property[0]->title_en.' has been updated');
        }
    }




    public function delete($id)
    {
        try {
            $location = ProjectLocation::where('project_id', $id)->first();
        }
        catch(\Exception $e) {
            return Redirect::to('/admin/projects/locations-mgt')->with('error','Could not deliver request. Error in Location Deletion : Location validation');
        }

        if ($location != null) {

            $location->delete();

            return Redirect::to('admin/projects/locations-mgt')->withSuccess('message', 'Location has been updated');
        }

            return Redirect::to('admin/projects/locations-mgt')->withSuccess('message', 'Location has been updated');



    }

}
