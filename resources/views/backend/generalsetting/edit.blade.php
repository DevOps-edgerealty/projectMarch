@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Setting</li>
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
                                <h3 class="card-title">General Setting Edit</h3>
                                <a href="{{url('admin/generalsetting/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="POST" action="{{url('admin/generalsetting/update'.'/'.$generalsetting->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Site Title</label>
                                            {!! Form::text('site_title',$generalsetting->site_title, array('placeholder' => '','class' => 'form-control','id'=>'site_title','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Home Page Text</label>
                                            {!! Form::textarea('home_text', $generalsetting->Home_page_text , array('placeholder' => '','class' => 'form-control','id'=>'home_text','required'=>'')) !!}
                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Email Contact Form</label>
                                            {!! Form::text('email_contact',$generalsetting->Email_Contact_form, array('placeholder' => '','class' => 'form-control','id'=>'email_contact','required'=>'')) !!}
                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Whatsapp Contact</label>
                                            {!! Form::text('whatsapp_contact',$generalsetting->whatsapp_contact, array('placeholder' => '','class' => 'form-control','id'=>'whatsapp_contact','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Phone No</label>
                                            {!! Form::text('phone_no',$generalsetting->phone_no, array('placeholder' => '','class' => 'form-control','id'=>'phone_no','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Click to Call</label>
                                            {!! Form::text('click_to_call',$generalsetting->click_to_call, array('placeholder' => '','class' => 'form-control','id'=>'click_to call','required'=>'')) !!}
                                        </div>


                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
