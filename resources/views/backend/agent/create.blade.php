@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agents</li>
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
                                <h3 class="card-title">New Agent</h3>
                                <a href="{{url('admin/agents/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/agents/store')}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Name [ English ]</label>
                                            {!! Form::text('name_en','', array('placeholder' => '','class' => 'form-control','id'=>'name_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Email</label>
                                            {!! Form::text('email','', array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <label for="exampleInputName">Name [ العربية ]</label>
                                            {!! Form::text('name_ar','', array('placeholder' => '','class' => 'form-control','id'=>'name_ar','required'=>'', 'dir'=>'rtl')) !!}

                                        </div> --}}


                                    </div>


                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Phone</label>
                                            {!! Form::text('phone','', array('placeholder' => '','class' => 'form-control','id'=>'phone','required'=>'')) !!}
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

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Language [ English ]</label>
                                            {!! Form::text('language_en','', array('placeholder' => '','class' => 'form-control','id'=>'language_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Language [ لغة     ]</label>
                                            {!! Form::text('language_ar','', array('placeholder' => '','class' => 'form-control','id'=>'language_ar','required'=>'', 'dir'=>'rtl')) !!}
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Designation [ English ]</label>
                                            {!! Form::text('designation_en','', array('placeholder' => '','class' => 'form-control','id'=>'designation_en','required'=>'')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputName">Designation [ تعيين ]</label>
                                            {!! Form::text('designation_ar','', array('placeholder' => '','class' => 'form-control','id'=>'designation_ar','required'=>'', 'dir'=>'rtl')) !!}
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="exampleInputNameAbout">About [ English ]</label>
                                            {{-- {!! Form::text('description_en',$Agents->description_en, array('placeholder' => '','class' => 'form-control','id'=>'description_en','required'=>'')) !!} --}}
                                            {!! Form::textarea('description_en','', array('placeholder' => '','class' => 'form-control','id'=>'description_en', 'style'=>'resize:none', 'rows'=>'4', 'cols' => '54')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputNameAboutAR">About [ تعيين ]</label>
                                            {{-- {!! Form::text('description_ar',$Agents->description_ar, array('placeholder' => '','class' => 'form-control','id'=>'description_ar','required'=>'', 'dir'=>'rtl')) !!} --}}
                                            {!! Form::textarea('description_en','', array('placeholder' => '','class' => 'form-control','id'=>'description_en', 'style'=>'resize:none', 'rows'=>'4', 'cols' => '54', 'dir'=>'rtl')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="exampleInputNameAboutAR">About [ Russian ]</label>
                                            {{-- {!! Form::text('description_ar',$Agents->description_ar, array('placeholder' => '','class' => 'form-control','id'=>'description_ar','required'=>'', 'dir'=>'rtl')) !!} --}}
                                            {!! Form::textarea('description_ru','', array('placeholder' => '','class' => 'form-control','id'=>'description_ru', 'style'=>'resize:none', 'rows'=>'4', 'cols' => '54')) !!}
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <a href="{{url('admin/agents/show')}}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-success ">Submit</button>
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
