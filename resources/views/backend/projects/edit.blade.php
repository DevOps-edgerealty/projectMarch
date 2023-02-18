@extends('backend.layouts.master')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">

                <form method="POST" action="{{url('admin/projects/update/'. $projects->id )}}" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header">


                            <h3 class="card-title">New Project</h3>
                            <a href="{{url('admin/projects/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>

                        <div class="card-header p-0">
                        <ul class="nav nav-pills ml-auto p-2 nav-fill">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Feature</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Meta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Uploads</a></li>

                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Status</label>
                                                <select name="status" id="status"  class="form-control col-md-12">
                                                <option {{ ($projects->status) == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ ($projects->status) == '2' ? 'selected' : '' }} value="2">Deative</option>
                                            </select>
                                          </div>

                                    </div>




                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Project Status</label>
                                            {!! Form::select('project_status', $status_array, $projects->pro_status,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_status','required'=>''])!!}

                                            </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Type</label>
                                            {!! Form::select('project_type', $sub_types_array, $projects->sub_type_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}

                                            </div>

                                    </div>

                                </div>
                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Community</label>
                                                {!! Form::select('community', $community_array, $projects->community_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'community','required'=>''])!!}


                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Developer</label>
                                                {!! Form::select('developer', $developer_array, $projects->agent_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'developer','required'=>''])!!}

                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select City</label>
                                                {!! Form::select('city', $cities_array, $projects->citys->id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'city','required'=>''])!!}
                                              </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Location</label>
                                                {!! Form::select('location', $locations_array, $projects->location,  ['placeholder' => 'Select','class' => 'form-control','id'=>'location','required'=>''])!!}

                                              </div>

                                        </div>

                                    </div>


                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Price </label>
                                                {!! Form::text('price', $projects->project_price , array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Price USD</label>
                                                {!! Form::text('price_usd',$projects->project_price_usd, array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Estimated Completed Year [ English ]</label>
                                            {!! Form::text('est_complete_year', $projects->est_completion_en , array('placeholder' => '','class' => 'form-control','id'=>'est_completion_en','required'=>'')) !!}


                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ English ]</label>
                                            {!! Form::text('title_en', $projects->title_en , array('placeholder' => '','class' => 'form-control','id'=>'title','required'=>'')) !!}
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ Russian ]</label>
                                            {!! Form::text('title_ru', $projects->title_ru , array('placeholder' => '','class' => 'form-control','id'=>'title','required'=>'')) !!}
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ العربية ]</label>
                                            {!! Form::text('title_ar', $projects->title_ar , array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'title_en','required'=>'')) !!}
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Bedrooms [ English ]</label>
                                                {!! Form::text('bedrooms', $projects->bedrooms , array('placeholder' => '','class' => 'form-control','id'=>'bedrooms','required'=>'')) !!}
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Bedrooms [ Russian ]</label>
                                                {!! Form::text('bedrooms', $projects->bedrooms , array('placeholder' => '','class' => 'form-control','id'=>'bedrooms','required'=>'')) !!}
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Bedrooms [ العربية ]</label>
                                            {!! Form::text('bedrooms_ar', $projects->bedrooms_ar , array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'bedrooms_ar','required'=>'')) !!}


                                        </div>
                                    </div>

                                    <div class="form-group row">


                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ English ]</label>
                                            {!! Form::text('address_en', $projects->address_en , array('placeholder' => '','class' => 'form-control','id'=>'address','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ Russian ]</label>
                                            {!! Form::text('address_ru', $projects->address_ru , array('placeholder' => '','class' => 'form-control','id'=>'address','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ العربية ]</label>
                                            {!! Form::text('address_ar', $projects->address_ar  , array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'address_en','required'=>'')) !!}


                                        </div>




                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ English ]</label>
                                            {!! Form::text('neighbourhood_en', $projects->neighbourhood_en , array('placeholder' => '','class' => 'form-control','id'=>'neighbourhood','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ English ]</label>
                                            {!! Form::text('neighbourhood_ru', $projects->neighbourhood_ru , array('placeholder' => '','class' => 'form-control','id'=>'neighbourhood','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ العربية ]</label>
                                            {!! Form::text('neighbourhood_ar', $projects->neighbourhood_ar , array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'neighbourhood_en','required'=>'')) !!}


                                        </div>

                                    </div>

                                   <div class="form-group row">


                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Ownership [ English ]</label>
                                            {!! Form::text('ownership_en',$projects->ownership_en, array('placeholder' => '','class' => 'form-control','id'=>'ownership_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Ownership [ العربية ]</label>
                                            {!! Form::text('ownership_ar',$projects->ownership_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'ownership_ar','required'=>'')) !!}


                                        </div>


                                    </div>







                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Google Map Embed</label>
                                            {!! Form::textarea('map_embed_code', $projects->map_embed_code , array('placeholder' => '','class' => 'form-control','id'=>'map_embed_code','required'=>'')) !!}
                                        </div>

                                    </div>




                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                        <label for="exampleInputName">Description [ English ]</label>
                                        {!! Form::textarea('description_en',$projects->description_en, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                        <label for="exampleInputName">Description [ Russian ]</label>
                                        {!! Form::textarea('description_ru',$projects->description_ru, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                            <label for="exampleInputName">Description [ العربية ]</label>
                                            {!! Form::textarea('description_ar',$projects->description_ar, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [English]</label>
                                        {!! Form::textarea('community_en',$projects->community_en, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [ Russian ]</label>
                                        {!! Form::textarea('community_ru',$projects->community_ru, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [العربية]</label>
                                        {!! Form::textarea('community_ar',$projects->community_ar, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [English]</label>
                                        {!! Form::textarea('payment_plan_en', $projects->payment_en , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [Russian]</label>
                                        {!! Form::textarea('payment_plan_ru', $projects->payment_ru , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [العربية]</label>
                                        {!! Form::textarea('payment_plan_ar', $projects->payment_ar , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [English]</label>
                                        {!! Form::textarea('payment_plan_mob_en', $projects->payment_plan_mob_en , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [Russian]</label>
                                        {!! Form::textarea('payment_plan_mob_ru', $projects->payment_plan_mob_ru , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [العربية]</label>
                                        {!! Form::textarea('payment_plan_mob_ar', $projects->payment_plan_mob_ar , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>


                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [English]</label>
                                        {!! Form::textarea('near_by_places_en', $projects->near_by_places_en , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [Russian]</label>
                                        {!! Form::textarea('near_by_places_ru', $projects->near_by_places_ru , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [العربية]</label>
                                        {!! Form::textarea('near_by_places_ar', $projects->near_by_places_ar , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>




                            </div>

                            <div class="tab-pane" id="tab_2">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 form-control-label">Features</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                @foreach ($features_array as $feature_id => $name)
                                                    <div class="col-sm-4">
                                                        <?php $pos=0; ?>
                                                        @foreach ($features as $feature)
                                                            @if($feature == $feature_id)
                                                                {!! Form::checkbox('features[]', $feature_id, true, array('id'=>'features')) !!} {!! $name !!}
                                                                <?php $pos=1; ?>
                                                            @endif
                                                        @endforeach
                                                        <?php
                                                        if($pos==0)
                                                        {
                                                            ?>
                                                            {!! Form::checkbox('features[]', $feature_id, null, array('id'=>'features')) !!} {!! $name !!}
                                                            <?php
                                                        }?>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_3">
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en',$projects->meta_title_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru',$projects->meta_title_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar',$projects->meta_title_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_title_ar','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keyword_en',$projects->meta_keywords_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keyword_ru',$projects->meta_keywords_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar',$projects->meta_keywords_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_description_en',$projects->meta_description_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ Russian ]</label>
                                        {!! Form::text('meta_description_ru',$projects->meta_description_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>




                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_description_ar',$projects->meta_description_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>


                                </div>





                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Embed Video </label>
                                            <textarea name="video_embed" id="video_embed" class="form-control" rows="3" placeholder="Enter Video Link"></textarea>
                                         </div>
                                    </div>

                                    <div class="col-sm-12">
                                        Note : (Please Upload images of each dimensions with same extensions)(jpeg,png,jpg only)

                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="filename[]" class="custom-file-input" >
                                            <label class="custom-file-label" for="exampleInputFile">Image 1</label>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="filename[]" class="custom-file-input"  >
                                                <label class="custom-file-label" for="exampleInputFile">Image 2</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="filename[]" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Image 3</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="filename[]" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Image 4</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="filename[]" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Image 5</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-lg-12 mb-5">
                                        <label for="exampleInputFile">Uploaded Image:  </label>
                                        <div class="row">

                                            @foreach ($projects->images as $image)
                                                <div class="col-lg-2" style="max-width: 100%">
                                                    <span onclick="delete_image({{ $projects->id }})" style="float:right; color:red; cursor:pointer;">Delete</span>
                                                    <img src="{{ URL::asset('uploads/projects/images/'. $projects->id .'/'.$image->image) }}" alt="Listing" style=" width: 300px; height: 200px;">

                                                </div>

                                            @endforeach
                                        </div>
                                    </div>


                                    <hr>
                                    <hr>
                                    <div class="col-sm-12">
                                        <p style="color: red">Note : Upload Documents (PDF ONLY)</p>

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputFile">Upload Document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="document[]" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>


                                        </div><br>
                                        <label for="exampleInputFile">Uploaded Document: </label>
                                        @foreach ($projects->documents as $item)
                                        <a href="{{ URL::asset('uploads/projects/documents/'.$projects->id.'/'.$item->document) }}" target="_blank">{{$item->document}}</a>
                                        @endforeach
                                    </div><br>
                                    <div class="form-group col-sm-6">

                                    </div>

                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{url('admin/projects/show')}}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                    <!-- ./card -->



                </form>

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script type="text/javascript">

        function delete_image(id)
        {
            jQuery.get( '{{URL::to("/")}}/admin/project_images/delete_image/'+{!! $projects->id !!}+'/'+id, function(response) {
                $('#imgdiv_'+id).remove();
            });
        }
        function delete_document(id)
        {
            jQuery.get( '{{URL::to("/")}}/admin/project_images/delete_document/'+{!! $projects->id !!}+'/'+id, function(response) {
                $('#docdiv_'+id).remove();
            });
        }
    </script>

@endsection


