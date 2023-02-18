<?php

namespace App\Http\Controllers;

use App\Models\Landingpageseos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LandingpageseoController extends Controller
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
        $this->data['landingpageseo'] = Landingpageseos::all();


        return view('backend.landingpage.show',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('backend.landingpage.create',$this->data);
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
        if($bool==0)
        {

            //
            $Landingpageseo = new Landingpageseos();


            $Landingpageseo->meta_title_en = $request->title_en;
            $Landingpageseo->meta_title_ru = $request->title_ru;
            $Landingpageseo->meta_title_ar = $request->title_ar;
            $Landingpageseo->meta_keywords_en = $request->keywords_en;
            $Landingpageseo->meta_keywords_ru = $request->keywords_ru;
            $Landingpageseo->meta_keywords_ar = $request->keywords_ar;
            $Landingpageseo->meta_description_en = $request->description_en;
            $Landingpageseo->meta_description_ru = $request->description_ru;
            $Landingpageseo->meta_description_ar = $request->description_ar;



            $Landingpageseo->save();


            return Redirect::to('admin/landingpageseo/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/landingpageseo/show')->withErrors(['message', 'Record is already Exist']);
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


        $landingpage = Landingpageseos::where('id', $id )->first();


        $this->data['landingpage'] = $landingpage;

        return view('backend.landingpage.edit',$this->data);

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

        $Landingpageseo = Landingpageseos::find($id);


        if (!empty($Landingpageseo)) {


            $Landingpageseo->meta_title_en = $request->title_en;
            $Landingpageseo->meta_title_ru = $request->title_ru;
            $Landingpageseo->meta_title_ar = $request->title_ar;
            $Landingpageseo->meta_keywords_en = $request->keywords_en;
            $Landingpageseo->meta_keywords_ru = $request->keywords_ru;
            $Landingpageseo->meta_keywords_ar = $request->keywords_ar;
            $Landingpageseo->meta_description_en = $request->description_en;
            $Landingpageseo->meta_description_ru = $request->description_ru;
            $Landingpageseo->meta_description_ar = $request->description_ar;



			$Landingpageseo->save();


            return Redirect::to('admin/landingpageseo/show')->withSuccess('message','Record has Been Updated.');
        }
        else
        {
            return redirect()->action('admin/landingpageseo/show');
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
}
