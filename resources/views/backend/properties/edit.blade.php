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

                <form method="POST" action="{{url('admin/properties/update/'. $properties->id)}}" enctype="multipart/form-data">
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
                                            <select name="status" id="status" class="form-control">
                                              <option value="1">Active</option>
                                              <option value="0">Deactive</option>
                                            </select>
                                          </div>

                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Type</label>
                                            {!! Form::select('type_id', $types_array, $properties->type_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}

                                            </select>
                                            </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Catogories Type</label>
                                            {!! Form::select('cat_id', $category_array, $properties->cat_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}

                                            </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Agent</label>
                                            <select name="agent" id="agent" class="form-control">
                                                @if(is_null($properties->agent_id))
                                                    @if ($agents)
                                                        @foreach ($agents as $agent)
                                                            <option value="{{ $agent->id}}">{{ $agent->name_en }}</option>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    @if ($agents)
                                                        @foreach ($agents as $agent)
                                                            @if($agent->id == $properties->agent_id)
                                                                <option value="{{ $agent->id}}">{{ $agent->name_en }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                          </div>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            <label>Select Project</label>
                                            {!! Form::select('project', $projects_array, $properties->project_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}


                                        </div>

                                    </div>
                                    {{-- <div class="col-sm-3">
                                        <div class="form-group">

                                            <label>Select Community</label>
                                            {!! Form::select('community', $community_array, $properties->community_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'community','required'=>''])!!}


                                        </div>

                                    </div> --}}
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select City</label>
                                            {!! Form::select('city_id', $cities_array, $properties->city_id,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}
                                          </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Select Location</label>
                                            {!! Form::select('location', $locations_array, $properties->location,  ['placeholder' => 'Select','class' => 'form-control','id'=>'project_type','required'=>''])!!}
                                          </div>

                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Reference Number</label>
                                            {!! Form::text('ref_no',$properties->ref_no, array('placeholder' => '','class' => 'form-control','id'=>'ref_no'  , 'dir'=>'ltr')) !!}
                                        </div>

                                    </div>




                                </div>




                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Title [ English ]</label>
                                        {!! Form::text('title_en',$properties->title_en, array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Title [ Russian ]</label>
                                        {!! Form::text('title_ru',$properties->title_ru, array('placeholder' => '','class' => 'form-control','id'=>'title_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Title [ العربية ]</label>
                                        {!! Form::text('title_ar',$properties->title_ar, array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'', 'dir'=>'rtl')) !!}


                                    </div>


                                </div>


                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Address [ English ]</label>
                                        {!! Form::text('address_en',$properties->address_en, array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Address [ Russian ]</label>
                                        {!! Form::text('address_ru',$properties->address_ru, array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                    </div>

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Address [ العربية ]</label>
                                        {!! Form::text('address_ar',$properties->address_ar, array('placeholder' => '','class' => 'form-control','id'=>'address_ar','required'=>'', 'dir'=>'rtl')) !!}


                                    </div>




                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Google Map Embed</label>
                                        {!! Form::textarea('map',$properties->map_embed_code, array('placeholder' => '','class' => 'form-control','id'=>'map','required'=>'')) !!}

                                    </div>


                                </div>





                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">


                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            {!! Form::text('bed',$properties->bedrooms, array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'')) !!}

                                          </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            {!! Form::text('bath',$properties->bathrooms, array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'')) !!}

                                            </select>
                                          </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Permit Number</label>
                                            {!! Form::text('permit_no',$properties->permit_no, array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'')) !!}

                                            </select>
                                          </div>

                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Area Sq.feet</label>
                                        {!! Form::number('area',$properties->area, array('placeholder' => '','class' => 'form-control','id'=>'area','required'=>'')) !!}


                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Parking </label>
                                        {!! Form::number('parking',$properties->parking, array('placeholder' => '','class' => 'form-control','id'=>'parking','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Floor No</label>
                                        {!! Form::number('unit_ar',$properties->floor_no, array('placeholder' => '','class' => 'form-control','id'=>'unit_ar')) !!}


                                    </div>

                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Price</label>
                                        {!! Form::number('price',$properties->price, array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}


                                    </div>

                                    <div class="col-sm-6">
                                        <label for="exampleInputName">Price USD</label>
                                        {!! Form::number('price_usd',$properties->price_usd, array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}


                                    </div>



                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ English ]</label>
                                        {!! Form::textarea('description_en',$properties->description_en, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                    </div>
                                    <!-- /.col-->

                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ Russian ]</label>
                                        {!! Form::textarea('description_ru',$properties->description_ru, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

                                    </div>
                                    <!-- /.col-->

                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-12">

                                        <label for="exampleInputName">Description [ العربية ]</label>
                                        {!! Form::textarea('description_ar',$properties->description_ar, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}

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
                                                @foreach ($amenities_array as $amenity_id => $amenity_name_en)
                                                    <div class="col-sm-4">
                                                        <?php $pos=0; ?>
                                                        @foreach ($amenities as $amenity)
                                                            @if($amenity == $amenity_id)
                                                                {!! Form::checkbox('amenities[]', $amenity_id, true, array('id'=>'amenities')) !!} {!! $amenity_name_en !!}
                                                                <?php $pos=1; ?>
                                                            @endif
                                                        @endforeach
                                                        <?php
                                                        if($pos==0)
                                                        {
                                                            ?>
                                                            {!! Form::checkbox('amenities[]', $amenity_id, null, array('id'=>'amenities')) !!} {!! $amenity_name_en !!}
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

                            <div class="tab-pane" id="tab_4">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en', $properties->meta_title_en , array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru', $properties->meta_title_ru , array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar', $properties->meta_title_ar , array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ar','required'=>'', 'dir'=>'rtl')) !!}
                                    </div>



                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keyword_en', $properties->meta_keywords_en , array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keyword_ru', $properties->meta_keywords_ru , array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar', $properties->meta_keywords_ar , array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ar','required'=>'', 'dir'=>'rtl')) !!}
                                    </div>



                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_description_en', $properties->meta_description_en , array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ Russian ]</label>
                                        {!! Form::text('meta_description_ru', $properties->meta_description_ru , array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_description_ar', $properties->meta_description_ar , array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ar','required'=>'', 'dir'=>'rtl')) !!}
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
                                            <input type="file" name="filename[]" class="custom-file-input">
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
                                    <div class="row">
                                        @foreach ($properties->images as $image)
                                        <div class="col-lg-2">
                                            <img src="{{ URL::asset('uploads/properties/'. $properties->id .'/'.$image->image) }}" alt="Listing" height="200px" width="300px">

                                        </div>

                                        @endforeach
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


