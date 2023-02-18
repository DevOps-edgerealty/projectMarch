@extends('backend.layouts.master')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
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

                <form method="POST" action="{{url('admin/blogs/store')}}" enctype="multipart/form-data">
                @csrf
                @honeypot
                <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Blog</h3>
                            <a href="{{url('admin/blogs/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="card-header p-0">

                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Blog Name [ English ]</label>
                                        {!! Form::text('name_en','', array('placeholder' => '','class' => 'form-control','id'=>'name_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Blog Name [ Russian ]</label>
                                        {!! Form::text('name_ru','', array('placeholder' => '','class' => 'form-control','id'=>'name_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Blog Name [ العربية ]</label>
                                        {!! Form::text('name_ar','', array('placeholder' => '','class' => 'form-control','id'=>'name_ar','required'=>'')) !!}
                                    </div>

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

                                <div class="form-group row">


                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Title [ English ]</label>
                                        {!! Form::text('meta_title_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Title [ Russian ]</label>
                                        {!! Form::text('meta_title_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Title [ العربية ]</label>
                                        {!! Form::text('meta_title_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_title_ar','required'=>'')) !!}
                                    </div>


                                </div>
                                <div class="form-group row">


                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Keyword [ English ]</label>
                                        {!! Form::text('meta_keywords_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Keyword [ Russian ]</label>
                                        {!! Form::text('meta_keywords_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputName">Meta Keyword [ العربية ]</label>
                                        {!! Form::text('meta_keywords_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_keyword_ar','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">


                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ English ]</label>
                                        {!! Form::text('meta_description_en','', array('placeholder' => '','class' => 'form-control','id'=>'meta_discription_en','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ Russian ]</label>
                                        {!! Form::text('meta_description_ru','', array('placeholder' => '','class' => 'form-control','id'=>'meta_description_ru','required'=>'')) !!}
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="exampleInputName">Meta Description [ العربية ]</label>
                                        {!! Form::text('meta_description_ar','', array('placeholder' => '','class' => 'form-control','id'=>'meta_description_ar','required'=>'')) !!}
                                    </div>


                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-12">


                                        <label for="exampleInputName">Description  [ English ]</label>
                                        <textarea name="description_en" id="description"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                    <div class="col-lg-12">


                                        <label for="exampleInputName">Description  [ Russian ]</label>
                                        <textarea name="description_ru" id="description"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                    <div class="col-lg-12">


                                        <label for="exampleInputName">Description  [ العربية ]</label>
                                        <textarea name="description_ar" id="description"  class="textarea"  placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>

                                </div>

                            </div>

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


