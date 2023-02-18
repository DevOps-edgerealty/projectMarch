<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LocationController extends Controller
{
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
        $this->data['locations'] = Location::all();


        return view('backend.location.show',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.location.create',$this->data);
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
             $Location = new Location();

             $Location->city_id = 1;
             $Location->name_en = $request->name_en;
             $Location->name_ru = $request->name_ru;
             $Location->name_ar = $request->name_ar;
             $Location->status = 1;


             $Location->save();


             return Redirect::to('admin/location/show')->withSuccess('message','Record has Been added.');
         }
         else
         {
             return Redirect::to('admin/location/show')->withErrors(['message', 'Record is already Exist']);
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


        $location = Location::where('id' , $id)->first();



        $this->data['location'] = $location;

        return view('backend.location.edit',$this->data);

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

        $location = Location::find($id);


        if (!empty($location)) {

            $location->city_id = 1;
            $location->name_en = $request->name_en;
            $location->name_ru = $request->name_ru;
            $location->name_ar = $request->name_ar;
            $location->status = 1;


            $location->save();
        }

        return redirect('admin/location/show')->with('message','Record has Been Updated.');
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
}
