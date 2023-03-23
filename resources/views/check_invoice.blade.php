<style>
  p{
    line-height: 1.6 !important;
  }
</style>
@extends('layout.master')
<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title> Check Your Invoice | Edge Realty Real Estate  </title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with edgerealty. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection

@section('content')

<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3  style="text-transform: uppercase;">Check Your Invoice</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>

<section class="mt-5">
    <div class="container">

        <h3 class="text-center">Check Your Invoice</h3>

    </div>
</section>


<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form class="contact-form" method="post" action="{{URL('/check-your-invoice-submit')}}">
                    @csrf

                        <div class="row">



                            <div class="col-lg-4 mb-4">
                                {!! Form::text('name',"", array('placeholder' => trans('Enter Your First Name'),'class' => 'form-control form-control-lg','id'=>'name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}

                            </div>

                            <!-- Email input -->
                            {{-- <div class="col-lg-3 mb-4">
                                {!! Form::text('contract_no',"", array('placeholder' => trans('Enter You Contract No'),'class' => 'form-control  form-control-lg','id'=>'contract_no', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}

                            </div> --}}

                            <!-- Email input -->
                            <div class="col-lg-4 mb-4">
                                {!! Form::text('invoice_no',"", array('placeholder' => trans('Enter You Invoice No'),'class' => 'form-control  form-control-lg','id'=>'invoice_no', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}

                            </div>
                            <div class="col-lg-4 mb-4">
                                <button type="submit" class="btn btn-dark btn-block btn-lg" >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>
</section>



@endsection
