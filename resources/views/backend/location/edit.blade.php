@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Location</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Location</li>
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
                                <h3 class="card-title">Location Edit</h3>
                                <a href="{{url('admin/location/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/location/update/'.$location->id)}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="exampleInputName">Location Name [ English ]</label>
                                                    {!! Form::text('name_en', $location->name_en , array('placeholder' => '','class' => 'form-control','id'=>'name_en','required'=>'')) !!}
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="exampleInputName">Location Name [ Russian ]</label>
                                                    {!! Form::text('name_ru', $location->name_ru , array('placeholder' => '','class' => 'form-control','id'=>'name_ru','required'=>'')) !!}
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="exampleInputName">Location Name [ العربية ]</label>
                                                    {!! Form::text('name_ar', $location->name_ar , array('placeholder' => '','class' => 'form-control','id'=>'name_ar','required'=>'', 'dir'=>'rtl')) !!}


                                                </div>



                                    </div>



                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{url('admin/agents/show')}}" class="btn btn-default">Cancel</a>
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
