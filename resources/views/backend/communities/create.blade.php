@extends('backend.layouts.master')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Community</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Community</li>
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

                <form method="POST" action="{{url('admin/communities/store')}}" enctype="multipart/form-data">
                @csrf
                @honeypot
                <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Community</h3>
                            <a href="{{url('admin/communities/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-header p-0">
                            <ul class="nav nav-pills ml-auto p-2 nav-fill">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Meta</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Uploads</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">


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
                                            {!! Form::text('title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'title_ar','required'=>'')) !!}
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
                                            {!! Form::text('address_ar','', array('placeholder' => '','class' => 'form-control','id'=>'address_ar','required'=>'')) !!}


                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Select Location</label>
                                                    <select name="location" id="location"  class="form-control col-md-12">
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


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Google Map Embed</label>
                                            {!! Form::textarea('map_embed','', array('placeholder' => '','class' => 'form-control','id'=>'map_embed','required'=>'')) !!}


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


                                        <label for="exampleInputName">Description [ Russian ]</label>
                                        <textarea name="description_ru" id="description_ru"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                        <label for="exampleInputName">Description [ العربية ]</label>
                                        <textarea name="description_ar" id="description_en"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                        </div>
                                        <!-- /.col-->

                                    </div>



                            </div>


                            <div class="tab-pane" id="tab_2">
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ru','required'=>'')) !!}
                                    </div>




                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ar','required'=>'')) !!}
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
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keyword_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Discription [ English ]</label>
                                        {!! Form::text('meta_discription_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Discription [ Russian ]</label>
                                        {!! Form::text('meta_discription_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Discription [ العربية ]</label>
                                        {!! Form::text('meta_discription_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ar','required'=>'')) !!}
                                    </div>


                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_3">
                                <div class="row">


                                    <div class="col-sm-12">
                                        Note : (Please Upload images of each dimensions with same extensions)(jpeg,png,jpg only)

                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="filename[]" class="custom-file-input" required="required">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('admin/agents/show')}}" class="btn btn-default">Cancel</a>
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




@endsection


