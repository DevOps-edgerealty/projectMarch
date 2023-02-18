@extends('backend.layouts.master')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Properties</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Properties</li>
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

                <form method="POST" action="{{url('admin/properties/store')}}" enctype="multipart/form-data">
                @csrf
                @honeypot
                <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Propertis</h3>
                            <a href="{{url('admin/properties/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-header p-0">
                        <ul class="nav nav-pills ml-auto p-2 nav-fill">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Property Detail</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Amenities</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Meta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Uploads</a></li>
                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-group row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Status</label>
                                                <select name="status" id="status" class="form-control col-md-12">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Type</label>
                                                    <select name="type_id" id="type" class="form-control col-md-12">
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
                                                <label>Select Catogories Type</label>
                                                    <select name="cat_id" id="cat" class="form-control col-md-12">
                                                    @if ($catogory)
                                                        @foreach ($catogory as $cat)
                                                            <option value="{{ $cat->id}}">{{ $cat->cat_name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Agent</label>
                                                <select name="agent" id="agent" class="form-control col-md-12">
                                                    @if ($agents)
                                                        @foreach ($agents as $agent)
                                                            <option value="{{ $agent->id}}">{{ $agent->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>

                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Project</label>
                                                <select name="project" id="project" class="form-control col-md-12">
                                                    @if ($projects)
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id}}">{{ $project->title_en }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>

                                        </div>
                                        {{-- <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select Community</label>
                                                    <select name="community" id="community" class="form-control col-md-12">
                                                        @if ($communities)
                                                            @foreach ($communities as $community)
                                                                <option value="{{ $community->id}}">{{ $community->title_en }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                              </div>

                                        </div> --}}
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Select City</label>
                                                    <select name="city" id="city" class="form-control col-md-12">
                                                    @if ($cities)
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id}}">{{ $city->city_name_en }}</option>
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


                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Reference Number</label>
                                                {!! Form::text('ref_no','', array('placeholder' => '','class' => 'form-control','id'=>'ref_no'  , 'dir'=>'ltr')) !!}
                                              </div>

                                        </div>

                                    </div>



                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Title [ English ]</label>
                                            {!! Form::text('title_en','', array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Title [ Russian ]</label>
                                            {!! Form::text('title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'title_ru','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Title [ العربية ]</label>
                                            {!! Form::text('title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'', 'dir'=>'rtl')) !!}


                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ English ]</label>
                                            {!! Form::text('address_en','', array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ Russian ]</label>
                                            {!! Form::text('address_ru','', array('placeholder' => '','class' => 'form-control','id'=>'address_ru','required'=>'')) !!}


                                        </div>

                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ العربية ]</label>
                                            {!! Form::text('address_ar','', array('placeholder' => '','class' => 'form-control','id'=>'address_ar','required'=>'', 'dir'=>'rtl')) !!}


                                        </div>




                                    </div>

                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Google Map Embed</label>
                                            {!! Form::textarea('map','', array('placeholder' => '','class' => 'form-control','id'=>'map','required'=>'')) !!}

                                        </div>


                                    </div>





                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <label>Bedroom</label>

                                            {!! Form::number('bed','', array('placeholder' => '','class' => 'form-control','id'=>'bed','required'=>'')) !!}

                                          </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bathroom</label>

                                            {!! Form::number('bath','', array('placeholder' => '','class' => 'form-control','id'=>'bath','required'=>'')) !!}

                                          </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Permit Number</label>
                                        {!! Form::number('permit_no','', array('placeholder' => '','class' => 'form-control','id'=>'unit_ar','required'=>'')) !!}


                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Area Sq.feet</label>
                                        {!! Form::number('area','', array('placeholder' => '','class' => 'form-control','id'=>'area','required'=>'')) !!}


                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Parking </label>
                                        {!! Form::number('parking','', array('placeholder' => '','class' => 'form-control','id'=>'parking','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Floor No</label>
                                        {!! Form::number('unit_ar','', array('placeholder' => '','class' => 'form-control','id'=>'unit_ar','required'=>'')) !!}


                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Price</label>
                                        {!! Form::number('price','', array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}


                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Price USD</label>
                                        {!! Form::number('price_usd','', array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}


                                    </div>




                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ English ]</label>
                                        <textarea name="description_en" id="description_en" class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                    <!-- /.col-->

                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ Russian ]</label>
                                        <textarea name="description_ru" id="description_ru" class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                    <!-- /.col-->

                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ العربية ]</label>
                                        <textarea name="description_ar" id="description_ar" class="textarea"  placeholder="Place some text here" dir="rtl" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                    <!-- /.col-->

                                </div>



                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 form-control-label">Amenities</label>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                @foreach ($aminities as $aminity )
                                                    <div class="col-sm-4">

                                                            <div class="form-check">
                                                            <input class="form-check-input" name="amenities[]" value="{{$aminity->id}}" type="checkbox">
                                                            <label class="form-check-label">{{$aminity->amenity_name_en}}</label>
                                                            </div>

                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_4">
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ar','required'=>'', 'dir'=>'rtl')) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ar','required'=>'', 'dir'=>'rtl')) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keyword_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_description_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ar','required'=>'', 'dir'=>'rtl')) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_description_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keyword_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ru','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Meta Description [ Russian ]</label>
                                        {!! Form::text('meta_description_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_description_ru','required'=>'')) !!}
                                    </div>


                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_5">
                                <div class="row">

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

                            </div>
                        </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('admin/agents/show')}}" class="btn btn-default">Cancel</a>
                        </div>
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


