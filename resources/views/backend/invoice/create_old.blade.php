@extends('backend.layouts.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">invoice</li>
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
                                <h3 class="card-title">invoice Create</h3>
                                <a href="{{url('admin/invoice/show')}}" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{url('admin/invoice/store')}}" enctype="multipart/form-data">
                                @csrf
                                @honeypot
                                <div class="card-body">
                                    <div class="form-group row">


                                        <div class="col-sm-6">
                                            <label for="title_ar"
                                                   class="col-sm-4 form-control-label">  Name

                                            </label>
                                            <div class="col-sm-12">
                                                {!! Form::text('name','', array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'', 'dir'=>trans('backLang.ltr'))) !!}

                                            </div>
                                        </div>



                                        <div class="col-sm-6">
                                            <label for="title_en"
                                                   class="col-sm-4 form-control-label">  Address

                                            </label>
                                            <div class="col-sm-12">
                                                {!! Form::text('address','', array('placeholder' => '','class' => 'form-control','id'=>'address','required'=>'', 'dir'=>trans('backLang.ltr'))) !!}

                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group row">


                                        <div class="col-sm-6">
                                            <label for="title_ar"
                                                   class="col-sm-4 form-control-label">  Email

                                            </label>
                                            <div class="col-sm-12">
                                                {!! Form::text('email','', array('placeholder' => '','class' => 'form-control','id'=>'name', 'dir'=>trans('backLang.rtl'))) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Phone</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('phone','', array('class' => 'form-control','id'=>'phone')) !!}
                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Invoice Number</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('invoice_number','', array('class' => 'form-control','id'=>'invoice_number','required'=>'')) !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-4 form-control-label">Emirates</label>
                                            <div class="col-sm-12">
                                                {!! Form::select('city_id', $cities_array, null,  ['placeholder' => 'Select','class' => 'form-control','id'=>'city_id','required'=>''])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Invoice Date</label>
                                            <div class="col-sm-12">
                                                {!! Form::date('invoice_date','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Contract Date</label>
                                            <div class="col-sm-12">
                                                {!! Form::date('contract_date','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        {{-- <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Contract No</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('contract_no','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Trn Number</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('trn_number','', array('class' => 'form-control','id'=>'phone')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Unit Price</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('unit_price','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Amount</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('amount','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Unit Price 2</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('unit_price_2','', array('class' => 'form-control','id'=>'phone')) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Amount 2 </label>
                                            <div class="col-sm-12">
                                                {!! Form::text('amount_2','', array('class' => 'form-control','id'=>'phone')) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Gross</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('gross_amount','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">VAT 5% Amount</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('vat_amount','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="name" class="col-sm-4 form-control-label">Total Amount</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('total_amount','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="name" class="col-sm-2 form-control-label">Amount in Words</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('amount_words','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="name" class="col-sm-2 form-control-label">VAT Amount in Words</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('vat_amount_words','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="name" class="col-sm-2 form-control-label">Description 1</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('description','', array('class' => 'form-control','id'=>'phone','required'=>'')) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="name" class="col-sm-2 form-control-label">Description 2</label>
                                            <div class="col-sm-12">
                                                {!! Form::text('description_2','', array('class' => 'form-control','id'=>'phone')) !!}
                                            </div>
                                        </div>

                                    </div>



                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{url('admin/invoice/show')}}" class="btn btn-default">Cancel</a>
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
