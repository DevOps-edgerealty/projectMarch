<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\PropertyLocation;

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

class PropertyLocationController extends Controller
{
    public function index()
    {
        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->orderBy('id', 'desc')->get();

        $this->data['properties'] = $properties;

        return view('backend.properties.location.locationmgt',$this->data);
    }

    public function make($id)
    {
        $properties = Property::with(['images', 'locationss','cityss', 'property_locations'])->where('id', $id)->get();

        $this->data['properties'] = $properties[0];

        return view('backend.properties.location.make2',$this->data);
    }

    public function update_create(Request $request)
    {
        // dd($request->property_id);
        $property = Property::with(['images', 'locationss','cityss'])->where('id', $request->properties_id)->get();                                         // find the property

        $search_current_location = PropertyLocation::where('property_id', $request->properties_id)->first();
        // dd($request->properties_id);
        // dd($search_current_location);

        if($search_current_location == null)                                                                                                                // check if the collection returns a null
        {
            $new_location = new PropertyLocation();
            $new_location->latitude = $request->coordinate_lat;
            $new_location->longitude = $request->coordinate_lng;
            $new_location->property_id = $request->properties_id;
            $new_location->save();

            // dd($new_location);


            return Redirect::to('admin/properties/locations')->withSuccess('message', $property[0]->title_en.' has been updated');
        } else {
            $get_location = PropertyLocation::where('property_id', $request->properties_id)->first();                                                        // find for the property ID in locations table
            $get_location->latitude = $request->coordinate_lat;
            $get_location->longitude = $request->coordinate_lng;
            $get_location->property_id = $request->properties_id;
            $get_location->save();

            // dd($get_location);

            return Redirect::to('admin/properties/locations')->withSuccess('message', $property[0]->title_en.' has been updated');
        }
    }

    public function delete($id)
    {
        try {
            $location = PropertyLocation::where('property_id', $id)->first();
        }
        catch(\Exception $e) {
            return Redirect::to('/admin/properties/locations')->with('error','Could not deliver request. Error in Location Deletion : Location validation');
        }

        if ($location != null) {

            $location->delete();

            return Redirect::to('admin/properties/locations')->withSuccess('message', 'Location has been updated');
        }

            return Redirect::to('admin/properties/locations')->withSuccess('message', 'Location has been updated');



    }


    
}
