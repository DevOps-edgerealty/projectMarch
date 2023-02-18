<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Type;

use Redirect;

class TypesController extends Controller
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
        $this->data['type'] = Type::all();


        return view('backend.type.show',$this->data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.type.create');
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
            $Types = new Type();

            $Types->type_name_en = $request->name_en;
            $Types->type_name_ru = $request->name_ru;
            $Types->type_name_ar = $request->name_ar;

            $Types->status = 1;



            $Types->save();

            return Redirect::to('admin/types/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/types/show')->withErrors(['message', 'Record is already Exist']);
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
}
