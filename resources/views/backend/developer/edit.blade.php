@extends('backend.layouts.master')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Developer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Developer</li>
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

                <form method="POST" action="{{url('admin/developer/update/'. $developer->id )}}" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Developer</h3>
                            <a href="{{url('admin/developer/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-header p-0">
                        <ul class="nav nav-pills ml-auto p-2 nav-fill">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Meta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Upload</a></li>

                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">




                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ English ]</label>
                                            {!! Form::text('name_en',$developer->name_en, array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ Russian ]</label>
                                            {!! Form::text('name_ru',$developer->name_en, array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputtitle">Title [ العربية ]</label>
                                            {!! Form::text('name_ar',$developer->name_ar, array('placeholder' => '','class' => 'form-control','id'=>'title_en','required'=>'')) !!}
                                        </div>


                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Phone</label>
                                            {!! Form::text('phone',$developer->phone, array('placeholder' => '','class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Email</label>
                                            {!! Form::email('email',$developer->email, array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                        </div>

                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ English ]</label>
                                            {!! Form::text('address_en',$developer->address_en, array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ Russian ]</label>
                                            {!! Form::text('address_ru',$developer->address_ru, array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputName">Address [ العربية ]</label>
                                            {!! Form::text('address_ar',$developer->address_ar, array('placeholder' => '','class' => 'form-control','id'=>'address_en','required'=>'')) !!}


                                        </div>


                                    </div>



                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                            <label for="exampleInputName">Description [English]</label>
                                            {!! Form::textarea('description_en',$developer->description_en, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}



                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                            <label for="exampleInputName">Description [Russian]</label>
                                            {!! Form::textarea('description_ru',$developer->description_ru, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}



                                        </div>
                                        <!-- /.col-->

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-12">


                                            <label for="exampleInputName">Description [ العربية ]</label>
                                            {!! Form::textarea('description_ar',$developer->description_ar, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control textarea', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}



                                        </div>
                                        <!-- /.col-->

                                    </div>


                            </div>



                            <div class="tab-pane" id="tab_2">
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en',$developer->meta_title_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru',$developer->meta_title_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar',$developer->meta_title_ar, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ar','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keyword_en',$developer->meta_keywords_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keyword_ru',$developer->meta_keywords_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keyword_ar',$developer->meta_keywords_ar, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ar','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_discription_en',$developer->meta_description_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ Russian ]</label>
                                        {!! Form::text('meta_discription_ru',$developer->meta_description_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ru','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_discription_ar',$developer->meta_description_ar, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_ar','required'=>'')) !!}
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
                                            <input type="file" name="filename[]" class="custom-file-input" >
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        @foreach ($developer->images as $image)
                                            <img src="{{ URL::asset('uploads/developers/'.$developer->id.'/'.$image->image) }}" style="object-fit: scale-down;" alt="Listing" height="250px" width="400px">
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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


