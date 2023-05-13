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
                                <h3 class="card-title">Landing Page SEO Edit</h3>
                                <a href="{{url('admin/landingpageseo/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="POST" action="{{url('admin/landingpageseo/update'.'/'.$landingpage->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [ English ]</label>
                                            {!! Form::text('meta_title_en',$landingpage->meta_title_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [ Russian ]</label>
                                            {!! Form::text('meta_title_ru',$landingpage->meta_title_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Title [ العربية ]</label>
                                            {!! Form::text('meta_title_ar',$landingpage->meta_title_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_title_ar','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keyword [ English ]</label>
                                            {!! Form::text('meta_keywords_en',$landingpage->meta_keywords_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                            {!! Form::text('meta_keywords_ru',$landingpage->meta_keywords_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                            {!! Form::text('meta_keywords_ar',$landingpage->meta_keywords_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_keyword_ar','required'=>'')) !!}
                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Discription [ English ]</label>
                                            {!! Form::text('meta_discription_en',$landingpage->meta_description_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Discription [ English ]</label>
                                            {!! Form::text('meta_description_en',$landingpage->meta_description_en, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Discription [ Russian ]</label>
                                            {!! Form::text('meta_description_ru',$landingpage->meta_description_ru, array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="exampleInputName">Meta Discription [ العربية ]</label>
                                            {!! Form::text('meta_description_ar',$landingpage->meta_description_ar, array('placeholder' => '','class' => 'form-control','dir'=>trans('backLang.rtl'),'id'=>'meta_discription_ar','required'=>'')) !!}
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
