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

                <form method="POST" action="{{url('admin/projects/store')}}" enctype="multipart/form-data">
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
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select name="type_id" id="project_type" class="form-control col-md-12">
                                                    @if ($types)

                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id}}">{{ $type->type_name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Project Status</label>
                                                <select name="project_status" id="project_status"  class="form-control col-md-12">
                                                    @if ($project_status)
                                                        @foreach ($project_status as $status)
                                                            <option value="{{ $status->id}}">{{ $status->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Type</label>
                                                <select name="sub_type_id"  class="form-control col-md-12">
                                                    @if ($project_type)
                                                        @foreach ($project_type as $project)
                                                            <option value="{{ $project->id}}">{{ $project->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                        </div>



                                </div>

                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Community</label>
                                                <select name="community" id="developer" class="form-control col-md-12">
                                                    @if ($communities)
                                                        @foreach ($communities as $community)
                                                            <option value="{{ $community->id}}">{{ $community->title_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Developer</label>
                                                <select name="developer" id="developer" class="form-control col-md-12">
                                                    @if ($developers)
                                                        @foreach ($developers as $developer)
                                                            <option value="{{ $developer->id}}">{{ $developer->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select City</label>
                                                    <select name="city" id="city" class="form-control col-md-12">
                                                    @if ($cities)
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city_name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Location</label>
                                                    <select name="location" id="location" class="form-control col-md-12">
                                                    @if ($locations)
                                                        @foreach ($locations as $location)
                                                            <option value="{{ $location->id}}">{{ $location->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>

                                        </div>

                                    </div>



                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Price </label>
                                                {!! Form::text('price','', array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                                            </div>

                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Price USD</label>
                                                {!! Form::text('price_usd','', array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                                            </div>

                                        </div>



                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Bedrooms [ English ]</label>
                                                {!! Form::text('bedrooms','', array('placeholder' => '','class' => 'form-control','id'=>'bedrooms','required'=>'')) !!}
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="exampleInputtitle">Bedrooms [ Pусский ]</label>
                                                {!! Form::text('bedrooms','', array('placeholder' => '','class' => 'form-control','id'=>'bedrooms','required'=>'')) !!}
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Bedrooms [ العربية ]</label>
                                            {!! Form::text('bedrooms_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'bedrooms_ar','required'=>'')) !!}


                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ English ] </label>
                                            {!! Form::text('title_en','', array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ Pусский ] </label>
                                            {!! Form::text('title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'title_ru','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ العربية ]</label>
                                            {!! Form::text('title_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'title_en','required'=>'')) !!}
                                        </div>



                                    </div>

                                    <div class="form-group row">


                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ English ]</label>
                                            {!! Form::text('address_en','', array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}

                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ Pусский ]</label>
                                            {!! Form::text('address_ru','', array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}

                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ العربية ]</label>
                                            {!! Form::text('address_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'address_en','required'=>'')) !!}


                                        </div>




                                    </div>

                                    <div class="form-group row">


                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ English ]</label>
                                            {!! Form::text('neighbourhood_en','', array('placeholder' => '','class' => 'form-control','id'=>'neighbourhood_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ Pусский ]</label>
                                            {!! Form::text('neighbourhood_ru','', array('placeholder' => '','class' => 'form-control','id'=>'neighbourhood_ru','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Neighbourhood [ العربية ]</label>
                                            {!! Form::text('neighbourhood_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'neighbourhood_en','required'=>'')) !!}


                                        </div>






                                    </div>

                                    <div class="form-group row">


                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Ownership [ English ]</label>
                                            {!! Form::text('ownership_en','', array('placeholder' => '','class' => 'form-control','id'=>'ownership_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Ownership [ Pусский ]</label>
                                            {!! Form::text('ownership_ru','', array('placeholder' => '','class' => 'form-control','id'=>'ownership_ru','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Ownership [ العربية ]</label>
                                            {!! Form::text('ownership_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'ownership_ar','required'=>'')) !!}


                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Estimated Completed Year [ English ]</label>
                                            {!! Form::text('est_complete_year','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'est_complete_year','required'=>'')) !!}


                                        </div>


                                    </div>






                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Google Map Embed</label>
                                            {!! Form::textarea('map_embed_code','', array('placeholder' => '','class' => 'form-control','id'=>'map_embed','required'=>'')) !!}
                                        </div>

                                    </div>




                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                        <label for="exampleInputName">Description [ English ]</label>
                                        <textarea name="description_en" id="description_en"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                        <label for="exampleInputName">Description [ Pусский ]</label>
                                        <textarea name="description_ru" id="description_ru"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                            <label for="exampleInputName">Description [ العربية ]</label>
                                            <textarea name="description_ar" dir="rtl" id="description_ar"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [English]</label>
                                        {!! Form::textarea('community_en','', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [Pусский]</label>
                                        {!! Form::textarea('community_ru','', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Community [العربية]</label>
                                        {!! Form::textarea('community_ar','', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}





                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [ English ]</label>
                                        <textarea name="payment_plan_en" id="payment_en"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [ Pусский ]</label>
                                        <textarea name="payment_plan_ru" id="payment_ru"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan [ العربية ]</label>
                                        <textarea name="payment_plan_ar" id="payment_ar"  class="textarea"   placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>


                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [ English ]</label>
                                        <textarea name="payment_plan_mob_en" id="payment_en"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [ Pусский ]</label>
                                        <textarea name="payment_plan_mob_ru" id="payment_plan_mob_ru"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Payment Plan Mobile [ العربية ]</label>
                                        <textarea name="payment_plan_mob_ar" id="payment_ar"  class="textarea"   placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [ English ]</label>
                                        {!! Form::textarea('near_by_places_en', '' , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [ Pусский ]</label>
                                        {!! Form::textarea('near_by_places_ru', '' , array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">

                                        <label for="exampleInputName">Near By Places [العربية]</label>
                                        {!! Form::textarea('near_by_places_ar', '', array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

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
                                                        {!! Form::checkbox('features[]', $feature_id, null, array('id'=>'features')) !!} {!! $name !!}
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
                                        {!! Form::text('meta_title_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ Pусский ]</label>
                                        {!! Form::text('meta_title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_title_ar','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keyword_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ Pусский ]</label>
                                        {!! Form::text('meta_keyword_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_description_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ Pусский ]</label>
                                        {!! Form::text('meta_description_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_description_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_discription_en','required'=>'')) !!}
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
                                            <input type="file" name="filename[]" class="custom-file-input" required="required">
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
                                    </div>
                                    <hr>
                                    {{-- <div class="col-sm-12">
                                        Note : Upload Documents (pdf,excel,doc,docx)

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputFile">Upload Document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="document[]" class="custom-file-input" required="required">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
                                    </div> --}}

                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('admin/projects/show')}}" class="btn btn-default">Cancel</a>
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->


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




@endsection


