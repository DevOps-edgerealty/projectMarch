@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h3 class="card-title">New Banner</h3>
                                <a href="{{url('admin/banner/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/banner/store')}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Title [ English ]</label>
                                            {!! Form::text('title_en','', array('placeholder' => '','class' => 'form-control','id'=>'title','required'=>'')) !!}
                                        </div>




                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Link [ English ]</label>
                                            {!! Form::text('link_url_en','', array('placeholder' => '','class' => 'form-control','id'=>'link_url','required'=>'')) !!}

                                        </div>


                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" name="filename[]" class="custom-file-input" required="required">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                              </div>

                                        </div>
                                    </div>





                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{url('admin/banner/show')}}" class="btn btn-default">Cancel</a>
                                </div>
                                {{Form::close()}}
                            </div>
                            <!-- /.card -->




                        </div>
                        <!--/.col (left) -->

                    </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
