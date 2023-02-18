<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;
use Illuminate\Support\Facades\Redirect;

class BannersController extends Controller
{
    private $uploadPath = "uploads/banners/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //




        return view('home',$this->data);

    }


    public function showindex()
    {
        //
        $this->data['banner'] = Banner::all();



        return view('backend.banner.show',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.banner.create');
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
            $Banner = new Banner();

            $Banner->title_en = $request->title_en;
            $Banner->title_ar = $request->title_en;
            $Banner->link_url_en = $request->link_url_en;
            $Banner->link_url_ar = $request->link_url_ar;
            $Banner->status = 1;

            $aminities_id = $Banner->id;


            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $image_name = 'banner-'.time().'.'.$image->guessExtension();
                    $path = $this->uploadPath;
                    $image->move($path."$aminities_id/", $image_name);

                    $file_name=$image_name;
                    $orig_path = $path."$aminities_id/".$image_name;

                    $dest_path = $orig_path;

                    $Banner->image = $image_name;


                    $Banner->save();
                }
            }
            return Redirect::to('admin/banner/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/banner/show')->withErrors(['message', 'Record is already Exist']);
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

        $banner = banner::where('id', $id )->first();

        //return $banner;

        $this->data['banner'] = $banner;

        return view('backend.banner.edit',$this->data);
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
        $banner = Banner::find($id);

        //return $banner;

        if (!empty($banner)) {


            $banner->title = $request->title;
            $banner->link_url = $request->link_url;

            $banner->save();

            return redirect('admin/banner/show')->with('message','Record has Been Updated.');

        }
        else
        {
            return redirect()->action('admin/banner/show');
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
