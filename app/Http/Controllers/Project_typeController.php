<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Project_typeController extends Controller
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
        $this->data['project_type'] = ProjectType::all();


        return view('backend.project_type.show',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('backend.project_type.create',$this->data);
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
             $project_type = new ProjectType();

             $project_type->name_en = $request->name_en;
             $project_type->name_ru = $request->name_ru;
             $project_type->slug_link = $this->createSlug($request->name_en);
             $project_type->status = 1;


             $project_type->save();


             return Redirect::to('admin/project_type/show')->withSuccess('message','Record has Been Uploaded.');
         }
         else
         {
             return Redirect::to('admin/project_type/show')->withErrors(['message', 'Record is already Exist']);
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

    public function createSlug($str, $delimiter = '-'){

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		return $slug;

	}
}
