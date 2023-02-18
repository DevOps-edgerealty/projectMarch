<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aminities;
use Redirect;

class AminitesController extends Controller
{
    private $uploadPath = "uploads/aminities/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showindex()
    {
        //
        $this->data['aminities'] = Aminities::all();


        return view('backend.aminities.show',$this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('backend.aminities.create',$this->data);
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
            $Aminities = new Aminities();

            $Aminities->amenity_name_en = $request->name_en;
            $Aminities->amenity_name_ru = $request->name_ru;
            $Aminities->amenity_name_ar = $request->name_ar;
            $Aminities->status = 1;

            $Aminities->save();


            return Redirect::to('admin/aminites/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/aminites/show')->withErrors(['message', 'Record is already Exist']);
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
        $Aminities = Aminities::where('id' , $id)->first();



        $this->data['aminities'] = $Aminities;

        return view('backend.aminities.edit',$this->data);
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

        $Aminities = Aminities::find($id);


        if (!empty($Aminities)) {


            $Aminities->amenity_name_en = $request->name_en;
            $Aminities->amenity_name_ru = $request->name_ru;
            $Aminities->amenity_name_ar = $request->name_ar;
            $Aminities->status = 1;

            $Aminities->save();
        }

        return Redirect::to('admin/aminites/show')->with('message','Record has Been Updated.');
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
