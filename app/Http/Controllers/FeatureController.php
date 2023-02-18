<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeatureController extends Controller
{
    private $uploadPath = "uploads/feature/";
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
        $this->data['feature'] = Features::all();


        return view('backend.feature.show',$this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.feature.create');
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
             $Feature = new Features();

             $Feature->name_en = $request->name_en;
             $Feature->name_ru = $request->name_ru;
             $Feature->name_ar = $request->name_ar;
             $Feature->status = 1;

            $Feature->save();

             return Redirect::to('admin/features/show')->withSuccess('message','Record has Been Uploaded.');
         }
         else
         {
             return Redirect::to('admin/features/show')->withErrors(['message', 'Record is already Exist']);
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
        $Feature = Features::where('id' , $id)->first();



        $this->data['feature'] = $Feature;

        return view('backend.feature.edit',$this->data);
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


        $Feature = Features::find($id);


        if (!empty($Feature)) {

            $Feature->name_en = $request->name_en;
            $Feature->name_ru = $request->name_ru;
            $Feature->name_ar = $request->name_ar;
            $Feature->status = 1;


            $Feature->save();
        }

        return Redirect::to('admin/features/show')->with('message','Record has Been Updated.');
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
