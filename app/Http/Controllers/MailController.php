<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class MailController extends Controller
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


    public function send_email( Request $request)
    {
        \Mail::send('email/contact_email',
        array(
            'name' => $request->get('contact_name'),
            'email' => $request->get('contact_email'),
            'phone_ext' => $request->get('contact_ext_code'),
            'phone_number' => $request->get('contact_phone'),
            'user_message' => $request->get('contact_message'),
        ), function($message) use ($request)
          {
            $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
    }

    public function send_email_project( Request $request)
    {

        \Mail::send('email/project_email',
        array(
            'project_name' => $request->get('project_name'),
            'name' => $request->get('contact_name'),
            'email' => $request->get('contact_email'),
            'phone_ext' => $request->get('contact_ext_code'),
            'phone_number' => $request->get('contact_phone'),
            'user_message' => $request->get('contact_message'),
        ), function($message) use ($request)
          {

             $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
    }

    public function send_email_community( Request $request)
    {

        \Mail::send('email/community_email',
        array(
            'community_name' => $request->get('community_name'),
            'name' => $request->get('contact_name'),
            'email' => $request->get('contact_email'),
            'phone_ext' => $request->get('contact_ext_code'),
            'phone_number' => $request->get('contact_phone'),
            'user_message' => $request->get('contact_message'),
        ), function($message) use ($request)
          {

             $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
    }



    public function send_email_developer( Request $request)
    {

        \Mail::send('email/developer_email',
        array(
            'developer_name' => $request->get('developer_name'),
            'name' => $request->get('contact_name'),
            'email' => $request->get('contact_email'),
            'phone_ext' => $request->get('contact_ext_code'),
            'phone_number' => $request->get('contact_phone'),
            'user_message' => $request->get('contact_message'),
        ), function($message) use ($request)
          {

             $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
    }


    public function contactus( Request $request)
    {

        \Mail::send('email/contactus_email',
        array(
            'name' => $request->get('contact_name'),
            'email' => $request->get('contact_email'),
            'phone_ext' => $request->get('contact_ext_code'),
            'phone_number' => $request->get('contact_phone'),
            'user_message' => $request->get('contact_message'),
        ), function($message) use ($request)
          {

             $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
    }


    public function valuation_email( Request $request )
    {
        //return $request;

        \Mail::send('email/valuation',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'property_type' => $request->get('propertyType'),
            'condition' => $request->get('condition'),
            'bedrooms' => $request->get('bedrooms'),
            'bathrooms' => $request->get('bathrooms'),
            'addtional' => $request->get('additionalRooms'),
            'size' => $request->get('squareFeet'),
            'comments' => $request->get('comments'),

        ), function($message) use ($request)
          {

             $message->to('edgdxb1@gmail.com')->subject('Dxb Properties');
          });

        return back()->with('success', 'Thank you for contact us!');
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
}
