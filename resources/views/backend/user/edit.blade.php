@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                                <h3 class="card-title">Edit</h3>

                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/user/update'.'/'. $users->id)}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-8">
                                            <label for="exampleInputName">User</label>
                                            {!! Form::text('user', $users->name , array('placeholder' => '','class' => 'form-control','id'=>'user','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-8">
                                            <label for="exampleInputName">Login Email</label>
                                            {!! Form::text('email', $users->email , array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-8">
                                            <label for="exampleInputName">Login Password</label>
                                            {!! Form::text('password', '' , array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
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
