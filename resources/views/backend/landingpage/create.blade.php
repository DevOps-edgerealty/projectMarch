@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Landing Page Seo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Landing Page Seo</li>
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
                                <h3 class="card-title">Landing Page Seo</h3>
                                <a href="{{url('admin/landingpageseo/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/landingpageseo/store')}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Page name</label>
                                            {!! Form::text('page_name','', array('placeholder' => '','class' => 'form-control','id'=>'name_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [English]</label>
                                            {!! Form::text('title_en','', array('placeholder' => '','class' => 'form-control','id'=>'name_ar','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [Russian]</label>
                                            {!! Form::text('title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'name_ru','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [ العربية ]</label>
                                            {!! Form::text('title_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'name_ar','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keywords [English]</label>
                                            {!! Form::text('keywords_en','', array('placeholder' => '','class' => 'form-control','id'=>'keywords_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keywords [Russian]</label>
                                            {!! Form::text('keywords_ru','', array('placeholder' => '','class' => 'form-control','id'=>'keywords_ruhyu','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keywords [ العربية ]</label>
                                            {!! Form::text('keywords_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'keywords_ar','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Description [English]</label>
                                            {!! Form::text('description_en','', array('placeholder' => '','class' => 'form-control','id'=>'description_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Description [Russian]</label>
                                            {!! Form::text('description_ru','', array('placeholder' => '','class' => 'form-control','id'=>'description_ru','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Description [ العربية ]</label>
                                            {!! Form::text('description_ar','', array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'description_ar','required'=>'')) !!}
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
