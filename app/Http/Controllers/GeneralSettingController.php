<?php

namespace App\Http\Controllers;
use App\Models\General_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_setting = General_setting::all();

        //return $general_setting;

        $this->data['generalsetting'] = $general_setting;

        return view('backend.generalsetting.show',$this->data);
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
    public function edit()
    {
        //

        $general_setting = General_setting::first();

        //return $general_setting;


        $this->data['generalsetting'] = $general_setting;

        return view('backend.generalsetting.edit',$this->data);

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
        $general_setting = General_setting::find($id);


        if (!empty($general_setting)) {

            $general_setting->site_title = $request->site_title;

            $general_setting->Home_page_text = $request->home_text;

            $general_setting->Email_Contact_form = $request->email_contact;

            $general_setting->whatsapp_contact = $request->whatsapp_contact;

            $general_setting->phone_no = $request->phone_no;

            $general_setting->click_to_call = $request->click_to_call;



			$general_setting->save();


            return Redirect::to('admin/generalsetting/show')->withSuccess('message','Record has Been Updated.');
        }
        else
        {
            return redirect()->action('admin/generalsetting/show');
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
