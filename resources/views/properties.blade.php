
@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title>{{$landingpageseo->$meta_var }}</title>
        <meta name="description" content="{{$landingpageseo->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$landingpageseo->$meta_keywords_var}} "/>


@endsection

@section('content')

<style>
    p{
        line-height: 1.6 !important;
    }
    .nav-pills .nav-link .nav-pills .show > .nav-link {
        border: 0.5px solid #fff !important;
        /* box-shadow: 3px 3px 5px 0px #888888; */
    }
    h6 {
        color: #fff !important;
    }

    #List{
        background-color: #000 !important;
    }

    /*

    html, body {
        max-width: 100%;
        overflow-x: hidden;
        height: 100%;
        scroll-behavior: smooth;
    } */

    input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
    }

    .nav-pills .nav-link.active {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        border-radius: 0 !important;

        }

    .nav-link {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #fff !important;
        border-radius: 0 !important;

    }

    /* .nav-pills .nav-item: hover {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #fff !important;
        border-redius: 0 !important;
    } */

    a {
        color: #fff !important;
    }

    .btn {
        /* transition: transform 5s  !important; */
        transition-timing-function: cubic-bezier(.52,.56,.53,.51) !important;
        transition-duration: 0.1s !important;
    }
    .btn:hover {
        /* box-shadow: -5px 5px 1px #a2a2a2 !important; */
        /* translate: 2px -2px !important; */
        opacity: 1 !important;
        background-color: #fff !important;
        color: #000 !important;
        transform: scale(1) !important;
        /* border: 2px solid #000 !important; */

        cursor: pointer !important;
    }
    .card {
        color: #fff !important;
        background-color: #000 !important;
        border: 0.5px solid gray !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.52,.56,.53,.51) !important;
        transition-duration: 0.1s !important;

    }

    .card-footer {
        font-weight: 700 !important;
    }
    /* .card:hover {*/
        /*box-shadow: 0px 0px 5px #fff !important;*/
        /*opacity: 1 !important;*/
        /*transform: scale(1.02) !important;*/
        /*transition-duration: 0.1s !important;*/
        /*z-index: 1000 !important;*/
        /*margin-left: 20px !important;*/
        /*margin-right: 20px !important;*/
        /*border: 5px solid #000 !important;*/
    /*} */


</style>

<?php

    $name_var = "name_" . trans('backLang.boxCode');

    $title_var = "title_" . trans('backLang.boxCode');

    $type_name_var= "type_name_" . trans('backLang.boxCode');

    $cat_name_var= "cat_name_" . trans('backLang.boxCode');

    $address_var = "address_" . trans('backLang.boxCode');

    $description_var = "description_" . trans('backLang.boxCode');

?>
<?php
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);
	$seg1 = $uri_segments[1];




	if($seg1 == 'en' || $seg1 == 'ar' || $seg1 == 'ru')
	{

		$langSeg = $uri_segments[1];

	}
	else
	{
		$langSeg = 'en';
	}
?>



<section>

    <header>

        <!-- Background image -->
        <div id="intro-page-properties" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                    <div class="text-white">
                        <h3 class="mt-5 mb-5"  style="text-transform: uppercase;">{{$PageHeading}}</h3><br>
                        <div class="row search-width desktop-show" >

                        </div>
                    </div>


                </div>

            </div>

        </div>

    <!-- Background image -->
    </header>



</section>

{{-- SEARCH SECTION --}}
@if ($langSeg == 'ar')
    <style>
        .breadcrumb-item + .breadcrumb-item:before {
        float: right;
        padding-right: 0.5rem;
        color: #fff;
        content: var( --mdb-breadcrumb-divider, "/" );
        }
    </style>

    <section class="my-5" style="direction: rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item bg-black text-white border border-1 border-white"><a href="{{URL('ar/home')}}" class="text-white"><i class="fas fa-home text-white"> </i> {{ trans('frontLang.Home') }}</a></li>
                        <li class="breadcrumb-item active text-white border border-1 border-white" aria-current="page">{{$PageHeading}}</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row desktop-show">
                <div class="col-lg-12">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist" >
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active border border-1 border-white"  id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true" >{{ trans('frontLang.buy') }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border border-1 border-white" id="ex2-tab-2"  data-mdb-toggle="pill" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">{{ trans('frontLang.Rent') }}</a>
                        </li>

                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content" id="ex2-content" style="padding-left: 0px;">
                        <div class="tab-pane show active" id="ex2-pills-1-pro" role="tabpanel" aria-labelledby="ex2-tab-1" >
                            <div class="form-group has-search">
                                <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET" >
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property_type_id" value="1" />

                                    <div class="row">
                                        <div class="col-md-1 pe-0">
                                            <div class="input-group py-auto" style="height: 100%">
                                                <a class="btn  px-2 w-100 mx-0 rounded-0 shadow-none mapBtn2" style=" font-size: 0.75vw; background-color: #0c5e03 !important;  border: 0 !important;" id="ex2-tab-3"  href="{{ url($langSeg."/properties/map/1") }}" > {{ trans('frontLang.map') }}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="input-group">
                                                <span class="fa fa-search form-control-feedback m-0 p-0" style="margin-top: -6px !important;"></span>
                                                <input type="search" value="{{@$request->search}}" name="search" id="search" class="form-control form-control-lg bg-black" placeholder="{{ trans('frontLang.searchh') }}" aria-label="Search"/>
                                                <button type="submit" class="btn btn-white rounded-0 shadow-none"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>



                                    <a id="flip"  class="float-end mt-2 mx-0 fw-bold  text-decoration-underline" style="color: #000" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">{{ trans('frontLang.MoreFilter')}}</a>

                                    <div id="List"></div>
                                    {{ csrf_field() }}

                                    <div id="panel" style="display: none;">

                                        <div class="row mt-3">
                                            <div class="col-lg-2">
                                                <div class=" mb-4">
                                                    <select name="property_type" class="form-select form-select-lg bg-black text-white" aria-label="Default select example" >
                                                        <option value="" {{@$property_type == "" ? 'selected' : ''}}> {{ trans('frontLang.propertyType') }}</option>
                                                        <option value="1" {{@$property_type == "1" ? 'selected' : ''}}>{{ trans('frontLang.Apartment') }}</option>
                                                        <option value="3" {{@$property_type == "3" ? 'selected' : ''}}>{{ trans('frontLang.Commercial') }}</option>
                                                        <option value="7" {{@$property_type == "7" ? 'selected' : ''}}>{{ trans('frontLang.Duplex') }}</option>
                                                        <option value="2" {{@$property_type == "2" ? 'selected' : ''}}>{{ trans('frontLang.Villa') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                    <option value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">{{ trans('frontLang.searchh') }}</button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div  class="tab-pane" id="ex2-pills-2-pro" role="tabpanel" aria-labelledby="ex2-tab-2" >
                            <div class="form-group has-search">
                                <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET">
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property_type_id" value="2" />
                                    <div class="input-group">


                                    <div class="row">
                                        <div class="col-md-1 pe-0">
                                            <div class="input-group py-auto" style="height: 100%">
                                                <a class="btn  px-2 w-100 mx-0 rounded-0 shadow-none mapBtn2" style=" font-size: 0.75vw; background-color: #0c5e03 !important;  border: 0 !important; border: 0 !important;" id="ex2-tab-3"  href="{{ url($langSeg."/properties/map/1") }}" > {{ trans('frontLang.map') }}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="input-group">
                                                <span class="fa fa-search form-control-feedback m-0 p-0" style="margin-top: -6px !important;"></span>
                                                <input type="search" value="{{@$request->search}}" name="search" id="search" class="form-control form-control-lg bg-black" placeholder="{{ trans('frontLang.searchh') }}" aria-label="Search"/>
                                                <button type="submit" class="btn btn-white rounded-0 shadow-none"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <a id="flip2"  class="float-end mt-2 mx-0 fw-bold  text-decoration-underline" style="color: #000" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">{{ trans('frontLang.MoreFilter')}}</a>

                                    <div id="panel2" style="display: none;">
                                        <div id="List-1"></div>
                                        {{ csrf_field() }}
                                        <div class="row mt-3">
                                            <div class="col-lg-2">
                                                <div class=" mb-4">

                                                    <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.propertyType') }}</option>
                                                        <option value="1">{{ trans('frontLang.Apartment') }}</option>
                                                        <option value="3">{{ trans('frontLang.Commercial') }}</option>
                                                        <option value="7">{{ trans('frontLang.Duplex') }}</option>
                                                        <option value="2">{{ trans('frontLang.Villa') }}</option>


                                                    </select>
                                                </div>


                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                    <option value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">{{ trans('frontLang.searchh') }}</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <!-- Pills content -->
                </div>
            </div>

            <h3 class="text-left">{{$PageHeading}}</h3>
            <P style="font-size: 16px;line-height: 25px;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>

        </div>
    </section>
@else
    <section class="mt-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 mb-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home text-white"> </i> {{ trans('frontLang.Home') }}</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{$PageHeading}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row desktop-show">
                <div class="col-lg-12">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist" >
                            {{-- <li class="nav-item" role="presentation" >
                                <a class="nav-link border border-1 border-white" style="background-color: #848484 !important; font-size: 1em; " id="ex2-tab-3"  href="{{ url($langSeg."/properties/map") }}" > {{ trans('frontLang.map') }}</a>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active border border-1 border-white"  style=" font-size: 1em; " id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1-pro" role="tab" aria-controls="ex2-pills-1" aria-selected="true" >{{ trans('frontLang.buy') }}</a>
                            </li>
                            <li class="nav-item" role="presentation" >
                                <a class="nav-link border border-1 border-white" id="ex2-tab-2" style=" font-size: 1em; "  data-mdb-toggle="pill" href="#ex2-pills-2-pro" role="tab" aria-controls="ex2-pills-2" aria-selected="false">{{ trans('frontLang.Rent') }}</a>
                            </li>

                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content" id="ex2-content" style="padding-left: 0px;">
                        <div class="tab-pane show active" id="ex2-pills-1-pro" role="tabpanel" aria-labelledby="ex2-tab-1" >
                            <div class="form-group has-search">
                                <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET" >
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property_type_id" value="1" />

                                    <div class="row">
                                        <div class="col-md-1 pe-0">
                                            <div class="input-group py-auto" style="height: 100%">
                                                <a class="btn  px-2 w-100 mx-0 rounded-0 shadow-none" style=" font-size: 0.75vw; background-color: #0c5e03 !important; border: 0 !important;" id="ex2-tab-3"  href="{{ url($langSeg."/properties/map/1") }}" > {{ trans('frontLang.map') }}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="input-group">
                                                <span class="fa fa-search form-control-feedback m-0 p-0" style="margin-top: -6px !important;"></span>
                                                <input type="search" value="{{@$request->search}}" name="search" id="search" class="form-control form-control-lg bg-black" placeholder="{{ trans('frontLang.searchh') }}" aria-label="Search"/>
                                                <button type="submit" class="btn btn-white rounded-0 shadow-none"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>



                                    <a id="flip"  class="float-end mt-2 mx-0 fw-bold  text-decoration-underline" style="color: #000" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">{{ trans('frontLang.MoreFilter')}}</a>

                                    <div id="List"></div>
                                    {{ csrf_field() }}

                                    <div id="panel" style="display: none;">

                                        <div class="row mt-3">
                                            <div class="col-lg-2">
                                                <div class=" mb-4">
                                                    <select name="property_type" class="form-select form-select-lg bg-black text-white" aria-label="Default select example" >
                                                        <option value="" {{@$property_type == "" ? 'selected' : ''}}> {{ trans('frontLang.propertyType') }}</option>
                                                        <option value="1" {{@$property_type == "1" ? 'selected' : ''}}>{{ trans('frontLang.Apartment') }}</option>
                                                        <option value="3" {{@$property_type == "3" ? 'selected' : ''}}>{{ trans('frontLang.Commercial') }}</option>
                                                        <option value="7" {{@$property_type == "7" ? 'selected' : ''}}>{{ trans('frontLang.Duplex') }}</option>
                                                        <option value="2" {{@$property_type == "2" ? 'selected' : ''}}>{{ trans('frontLang.Villa') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                    <option value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">{{ trans('frontLang.searchh') }}</button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div  class="tab-pane" id="ex2-pills-2-pro" role="tabpanel" aria-labelledby="ex2-tab-2" >
                            <div class="form-group has-search">
                                <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET">
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property_type_id" value="2" />
                                    <div class="input-group">


                                    </div>

                                    <div class="row">
                                        <div class="col-md-1 pe-0">
                                            <div class="input-group py-auto" style="height: 100%">
                                                <a class="btn  px-2 w-100 mx-0 rounded-0 shadow-none mapBtn2" style=" font-size: 0.75vw; background-color: #0c5e03 !important; border: 0 !important;" id="ex2-tab-3"  href="{{ url($langSeg."/properties/map/1") }}" > {{ trans('frontLang.map') }}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="input-group">
                                                <span class="fa fa-search form-control-feedback m-0 p-0" style="margin-top: -6px !important;"></span>
                                                <input type="search" value="{{@$request->search}}" name="search" id="search" class="form-control form-control-lg bg-black" placeholder="{{ trans('frontLang.searchh') }}" aria-label="Search"/>
                                                <button type="submit" class="btn btn-white rounded-0 shadow-none"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <a id="flip2"  class="float-end mt-2 mx-0 fw-bold  text-decoration-underline" style="color: #000" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"> {{ trans('frontLang.MoreFilter')}} </a>

                                    <div id="panel2" style="display: none;">
                                        <div id="List-1"></div>
                                        {{ csrf_field() }}
                                        <div class="row mt-3">
                                            <div class="col-lg-2">
                                                <div class=" mb-4">

                                                    <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.propertyType') }}</option>
                                                        <option value="1">{{ trans('frontLang.Apartment') }}</option>
                                                        <option value="3">{{ trans('frontLang.Commercial') }}</option>
                                                        <option value="7">{{ trans('frontLang.Duplex') }}</option>
                                                        <option value="2">{{ trans('frontLang.Villa') }}</option>


                                                    </select>
                                                </div>


                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                    <option value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 mb-3">
                                                <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                    <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  value="250000">250,000</option>
                                                    <option  value="500000">500,000</option>
                                                    <option  value="750000">750,000</option>
                                                    <option  value="1000000">1,000,000</option>
                                                    <option  value="2000000">2,000,000</option>
                                                    <option  value="3000000">3,000,000</option>
                                                    <option  value="4000000">4,000,000</option>
                                                    <option  value="5000000">5,000,000</option>
                                                    <option  value="6000000">6,000,000</option>
                                                    <option  value="7000000">7,000,000</option>
                                                    <option  value="8000000">8,000,000</option>
                                                    <option  value="9000000">9,000,000</option>
                                                    <option  value="10000000">10,000,000</option>
                                                    <option  value="20000000">20,000,000</option>
                                                    <option  value="30000000">30,000,000</option>
                                                    <option  value="40000000">40,000,000</option>
                                                    <option  value="50000000">50,000,000</option>
                                                    <option  value="60000000">60,000,000</option>
                                                    <option  value="70000000">70,000,000</option>
                                                    <option  value="80000000">80,000,000</option>


                                            </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">{{ trans('frontLang.searchh') }}</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <!-- Pills content -->
                </div>
            </div>

            <h3 class="text-left mt-4">{{$PageHeading}}</h3>
            <P style="font-size: 16px;line-height: 25px; mb-4">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>


        </div>




    </section>
@endif




{{-- CARD SECTION ---- ENG - AR - RU --}}
@if ($langSeg == 'ar')
    <section class="mt-4 mb-5" >
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if($properties->total() == 0)

                            <div class="col-lg-8 offset-md-2">

                                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                                    @csrf
                                    @honeypot
                                    <div class=" mb-4">
                                        <input style="direction: rtl" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Phone input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl" type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl" type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>
                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block rounded-0 mb-4">
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </form>
                            </div>

                        @else

                        @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5" style="direction: rtl;">
                            <div class="card rounded-0"  style="height: 500px !important;">
                                <div class="communities-newlaunch"></div>
                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="Listing">
                                    </a>
                                    @endif
                                @endforeach

                                @if ($langSeg == 'ar')
                                    <div class="card-body  px-3 py-0" style="direction: rtl">

                                        @if ($property->type_id == '1')
                                            <h5 class="my-3" style="font-size: 0.95vw !important"> <b>{{ trans('frontLang.Price') }} <span style="color: ;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h5>
                                        @else

                                            <h5 class="my-3" style="font-size: 0.95vw !important"> <b>{{ trans('frontLang.yearly') }} <span style="color: ;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</b> </span></h5>
                                        @endif


                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <h6 class="card-title" style="color: #848484 !important">
                                                {{ $property->$title_var }}
                                            </h6>
                                        </a>


                                        <!--<p>-->
                                        <!--    {{ $property->locationss->$name_var }} -->
                                        <!--</p>-->


                                        {{-- <hr> --}}


                                        <div class="row" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class=" ps-0 pe-2" style="color: #848484; font-size: 0.95vw !important">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">&#x2022;</span>

                                                <span class=" px-2" style="color: #848484; font-size: 0.95vw !important">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">&#x2022;</span>

                                                <span class=" px-2" style="color: #848484; font-size: 0.95vw !important"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; direction: rtl">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff; font-size: 0.95vw !important"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important; font-size: 0.95vw !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="card-body  px-3 py-0" style="">

                                        @if ($property->type_id == '1')
                                            @if ($langSeg == 'ru')
                                                <h5 class="my-3" style="font-size: 1.2vw !important"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                            @else
                                                <h5 class="my-3" style="font-size: 1.2vw !important"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h5>
                                            @endif

                                        @else

                                            <h5 class="my-3" style="font-size: 1.2vw !important"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</b> </span></h5>
                                        @endif

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <h6 class="card-title" style="color: #848484; font-size: 0.95vw !important">{{ $property->$title_var }}</h6>
                                        </a>
                                        <!--<p class="fw-light"> {{ $property->locationss->$name_var }} </p>-->



                                        {{-- <hr> --}}
                                        <div class="row" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class="ps-0 pe-2" style="color: #848484; font-size: 0.95vw !important">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484; font-size: 0.95vw !important">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484; font-size: 0.95vw !important"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; ">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff; font-size: 0.95vw !important"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important; font-size: 0.95vw !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endif


                            </div>
                        </div>

                        {{-- MODAL FOR REQUEST DETAILS - AR --}}
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" style="margin: 0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$property->$title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="text-center mb-4">{{$property->$title_var}}</h6>


                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="property" value="{{$property->id}}" />
                                                    <div class=" mb-4">
                                                        <input style="direction: rtl" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input style="direction: rtl" type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input style="direction: rtl" type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    <button class="submit btn btn-outline-white btn-lg btn-block" type="submit">
                                                        <i class="loading-icon fa-lg fas fa-spinner text-white fa-spin"></i> &nbsp;

                                                        {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                        <span class="btn-txt">
                                                            {{ trans('frontLang.submit') }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {!! $properties->links() !!}

                    @endif
                </div>

            </div>
            <!-- Button trigger modal -->

        </div>

        {{-- SCRIPT FOR SUBMIT BUTTON --}}
        <script>
            $(document).ready(function() {
            $("#getInTouch").submit(function() {
                $(".result").text("");
                $(".loading-icon").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Processing ...");
            });
            });
        </script>

    </section>




    <section class="mt-4 mb-5" >
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if($properties->total() == 0)

                            <div class="col-lg-8 offset-md-2">

                                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                                    @csrf
                                    @honeypot
                                    <div class=" mb-4">
                                        <input style="direction: rtl" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />
                                    </div>

                                    <!-- Phone input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl" type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl" type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />
                                    </div>

                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block rounded-0 mb-4">
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </form>
                            </div>

                        @else

                        @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5" style="direction: rtl;">
                            <div class="card rounded-0"  style="height: 500px !important;">
                                <div class="communities-newlaunch"></div>
                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="Listing"></a>
                                    @endif
                                @endforeach

                                @if ($langSeg == 'ar')
                                    <div class="card-body  px-3 py-0" style="direction: rtl">

                                        @if ($property->type_id == '1')
                                            <h5 class="my-3" style="font-size: 1.4rem !important"> <b> {{ trans('frontLang.AED') }} <span style="color: ;">  {{ number_format($property->price) }}</span></b></h5>
                                        @else

                                            <h5 class="my-3" style="font-size: 1.4rem !important"> <b> <span style="color: ;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                        @endif


                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <h6 class="card-title" style="color: #848484 !important">
                                                {{ $property->$title_var }}
                                            </h6>
                                        </a>


                                        <!--<p>-->
                                        <!--    {{ $property->locationss->$name_var }} -->
                                        <!--</p>-->


                                        {{-- <hr> --}}


                                        <div class="row" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class="font-size-16 ps-0 pe-2" style="color: #848484;">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">.</span>

                                                <span class="font-size-16 px-2" style="color: #848484;">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">.</span>

                                                <span class="font-size-16 px-2" style="color: #848484;"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; direction: rtl">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="card-body  px-3 py-0" style="">

                                        @if ($property->type_id == '1')
                                            @if ($langSeg == 'ru')
                                                <h5 class="my-3" style="font-size: 1.4rem !important"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                            @else
                                                <h5 class="my-3" style="font-size: 1.4rem !important"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h5>
                                            @endif

                                        @else

                                            <h5 class="my-3" style="font-size: 1.4rem !important"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</b> </span></h5>
                                        @endif

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <h6 class="card-title" style="color: #848484">{{ $property->$title_var }}</h6>
                                        </a>
                                        <!--<p class="fw-light"> {{ $property->locationss->$name_var }} </p>-->



                                        {{-- <hr> --}}
                                        <div class="row" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class="font-size-16 ps-0 pe-2" style="color: #848484;">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">.</span>

                                                <span class="font-size-16 px-2" style="color: #848484;">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">.</span>

                                                <span class="font-size-16 px-2" style="color: #848484;"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; ">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endif


                            </div>
                        </div>

                        {{-- MODAL FOR REQUEST DETAILS - AR --}}
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" style="margin: 0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$property->$title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="text-center mb-4">{{$property->$title_var}}</h6>


                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="property" value="{{$property->id}}" />
                                                    <div class=" mb-4">
                                                        <input style="direction: rtl" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input style="direction: rtl" type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input style="direction: rtl" type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    <button class="submit btn btn-outline-white btn-lg btn-block" type="submit">
                                                        <i class="loading-icon fa-lg fas fa-spinner text-white fa-spin"></i> &nbsp;

                                                        {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                        <span class="btn-txt">
                                                            {{ trans('frontLang.submit') }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {!! $properties->links() !!}

                    @endif
                </div>
            </div>
            <!-- Button trigger modal -->

        </div>

        {{-- SCRIPT FOR SUBMIT BUTTON --}}
        <script>
            $(document).ready(function() {
            $("#getInTouch").submit(function() {
                $(".result").text("");
                $(".loading-icon").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Processing ...");
            });
            });
        </script>

    </section>


@else
    <section class="mobile-show mt-4 mb-5">
        <div class="container ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if($properties->total() == 0)

                            <div class="col-lg-8 offset-md-2">

                                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                                    @csrf
                                    @honeypot

                                    <div class=" mb-4">
                                        <input  type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input  type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input  type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>
                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block rounded-0 ">
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </form>
                            </div>

                        @else

                            @foreach ($properties as $property)
                            <div class="col-lg-4 mb-5">
                                <div class="card rounded-0" style="height: 500px !important;">

                                    <div class="communities-newlaunch"></div>
                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"></a>
                                        @endif
                                    @endforeach

                                    @if ($langSeg == 'ar')
                                        <div class="card-body  px-3 py-0" style="direction: rtl">

                                            @if ($property->type_id == '1')
                                                <h5 class="my-3" style="font-size: 1.4rem !important"> <b> {{ trans('frontLang.AED') }} <span style="color:;">  {{ number_format($property->price) }} </span></b></h5>
                                            @else

                                                <h5 class="my-3" style="font-size: 1.4rem !important"> <b> <span style="color:;">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                            @endif

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <p class="card-title" style="color: #848484 !important;">{{ $property->$title_var }}</p>
                                            </a>
                                            <!--<p><i class="fas fa-map-marker-alt fw-light" style="color: green"> </i> {{ $property->locationss->$name_var }} </p>-->



                                            {{-- <hr> --}}
                                            <div class="row" >
                                                <div class="col-lg-12" style="display:block;" >
                                                    <span class="font-size-16 ps-0 pe-2" style="color: #848484;"> <i class="fas fa-bed"></i>  {{$property->bedrooms}} {{ trans('frontLang.bedrooms') }} </span> <span style="color: #848484">.</span>

                                                    <span class="font-size-16 px-2" style="color: #848484;"><i class="fas fa-bath"></i>  {{$property->bathrooms}} {{ trans('frontLang.bathrooms') }}</span> <span style="color: #848484">.</span>

                                                    <span class="font-size-16 px-2" style="color: #848484;"><i class="fas fa-chart-area"></i>  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="card-footer text-muted" style="padding: 0.75rem 0rem; direction: rtl">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center;border-left: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    @else


                                        <div class="card-body px-3 py-0">

                                            @if ($property->type_id == '1')
                                                @if ($langSeg == 'ru')
                                                    <h5 class="my-3" style="font-size: 1.4rem !important"> <b> <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                @else
                                                    <h5 class="my-3" style="font-size: 1.4rem !important"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} </span></b></h5>
                                                @endif

                                            @else

                                                <h5 class="my-3" style="font-size: 1.4rem !important"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                            @endif

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <p class="card-title"  style="font-size: 16px; color: #848484 !important;">
                                                    {{ $property->$title_var }}
                                                </p>
                                            </a>
                                            <!--<p class=""> {{ $property->locationss->$name_var }} </p>-->



                                            {{-- <hr> --}}
                                            <div class="row mt-2" >
                                                <div class="col-lg-12" style="display:block;" >
                                                    <span class="font-size-16 pe-2 ps-0" style="color: #848484;margin-right: 15px">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">.</span>

                                                    <span class="font-size-16 px-2" style="color: #848484;margin-right: 15px">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">.</span>

                                                    <span class="font-size-16 px-2" style="color: #848484;margin-right: 15px"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                                </div>


                                            </div>

                                        </div>

                                        <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; ">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center;border-right: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif


                                </div>
                            </div>


                            <div class="modal modal-lg fade" style="background-color: rgb(0, 0, 0, .5);" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                                    <div class="modal-content  rounded-0">
                                        {{-- <div class="modal-header border border-1 border-white bg-black rounded-0">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                            <button type="button" class="btn-close bg-white" style="color: white !important;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                        <div class="modal-body bg-black " style="border: 0.25px solid grey !important; ">

                                            <div class="row p-4">
                                                <div class="col-lg-6 mb-3">
                                                    @foreach($property->images  as $single_img)
                                                        @if($property->images->first()==$single_img)
                                                            <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$property->$title_var}}">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6 class="text-center mb-4">
                                                        {{$property->$title_var}}
                                                    </h6>
                                                    <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                        @csrf
                                                        @honeypot
                                                        <input type="hidden" name="property" value="{{$property->id}}" />
                                                        <div class=" mb-4">
                                                            <input  type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                        </div>

                                                        <!-- Email input -->
                                                        <div class="mb-4">
                                                            <input  type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                        </div>

                                                        <!-- Email input -->
                                                        <div class="mb-4">
                                                            <input  type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                        </div>


                                                        {{-- <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                                            {{ trans('frontLang.submit') }}
                                                        </button> --}}
                                                        <button class="submit btn btn-block btn-outline-white" type="submit">
                                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                                            {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                            <span class="btn-txt">
                                                                {{ trans('frontLang.submit') }}
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach


                            </div>
                            <style>
                                .pagination > li > a,
                                .pagination > li > span {
                                    color: #fff !important; // use your own color here
                                }


                                .pagination > .disabled > a,
                                .pagination > .disabled > a:focus,
                                .pagination > .disabled > a:hover,
                                .pagination > .disabled > span,
                                .pagination > .disabled > span:focus,
                                .pagination > .disabled > span:hover {
                                    background-color: #000 !important;
                                    border-color: green;
                                    color: #fff !important;
                                }

                                .pagination > .active > a,
                                .pagination > .active > a:focus,
                                .pagination > .active > a:hover,
                                .pagination > .active > span,
                                .pagination > .active > span:focus,
                                .pagination > .active > span:hover {
                                    background-color: #fff;
                                    border-color: green;
                                    color: #000 !important;
                                }
                            </style>


                            {!! $properties->appends($_GET)->links() !!}
                        @endif
                </div>

            </div>
            <!-- Button trigger modal -->



        </div>
        <script>
            $(document).ready(function() {
            $("#getInTouch").submit(function() {
                $(".result").text("");
                $(".loading-icon").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Processing ...");
            });
            });
        </script>
    </section>


    <section class="desktop-show mt-4 mb-5">
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if($properties->total() == 0)

                            <div class="col-lg-8 offset-md-2">

                                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                                    @csrf
                                    @honeypot

                                    <div class=" mb-4">
                                        <input  type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input  type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input  type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>
                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block rounded-0 mb-4">
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </form>
                            </div>

                        @else

                        @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 px-1">
                            <div class="card rounded-0" style="height: 500px !important;">

                                <div class="communities-newlaunch"></div>
                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"></a>
                                    @endif
                                @endforeach

                                @if ($langSeg == 'ar')
                                    <div class="card-body  px-3 py-0" style="direction: rtl">

                                        @if ($property->type_id == '1')
                                            <h5 class="my-3" style=" font-size: 1vw !important;"> <b> <span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} </span></b></h5>
                                        @else

                                            <h5 class="my-3" style=" font-size: 1vw !important;"> <b><span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                        @endif

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <p class="card-title" style="color: #848484 !important; font-size: 0.75vw !important;">{{ $property->$title_var }}</p>
                                        </a>
                                        <!--<p><i class="fas fa-map-marker-alt fw-light" style="color: green"> </i> {{ $property->locationss->$name_var }} </p>-->



                                        {{-- <hr> --}}
                                        <div class="row" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class="ps-0 pe-2" style="color: #848484;margin-right: 15px;  font-size: 0.75vw !important;"> <i class="fas fa-bed"></i>  {{$property->bedrooms}} {{ trans('frontLang.bedrooms') }} </span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484;margin-right: 15px;  font-size: 0.75vw !important;"><i class="fas fa-bath"></i>  {{$property->bathrooms}} {{ trans('frontLang.bathrooms') }}</span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484;margin-right: 15px;  font-size: 0.75vw !important;"><i class="fas fa-chart-area"></i>  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-footer text-muted" style="padding: 0.75rem 0rem; direction: rtl">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $property->id }}" style="color: #fff;  font-size: 0.75vw !important;"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important;  font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @else


                                    <div class="card-body px-3 py-0">

                                        @if ($property->type_id == '1')
                                            @if ($langSeg == 'ru')
                                                <h5 class="my-3" style=" font-size: 1.2vw !important;"> <b> <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                            @else
                                                <h5 class="my-3" style=" font-size: 1.2vw !important;"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} </span></b></h5>
                                            @endif

                                        @else

                                            <h5 class="my-3" style="font-size: 1.4rem !important"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                        @endif

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <p class=""  style="  font-size: 0.95vw !important; color: #848484 !important;">
                                                {{ $property->$title_var }}
                                            </p>
                                        </a>
                                        <!--<p class=""> {{ $property->locationss->$name_var }} </p>-->



                                        {{-- <hr> --}}
                                        <div class="row mt-2" >
                                            <div class="col-lg-12" style="display:block;" >
                                                <span class="ps-0 pe-2" style="color: #848484;  font-size: 0.95vw !important;">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484;  font-size: 0.95vw !important;">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">&#x2022;</span>

                                                <span class="px-2" style="color: #848484;  font-size: 0.95vw !important;"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; ">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid #848484; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-desk-{{ $property->id }}" style="color: #fff; font-size: 0.95vw !important"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important; font-size: 0.95vw !important"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endif


                            </div>
                        </div>


                        <div class="modal modal-lg fade" style="background-color: rgb(0, 0, 0, .5);" id="exampleModal-desk-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                                <div class="modal-content  rounded-0">
                                    {{-- <div class="modal-header border border-1 border-white bg-black rounded-0">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close bg-white" style="color: white !important;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body bg-black " style="border: 0.25px solid grey !important; ">
                                        <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
                                        <div class="row p-4">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$property->$title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h6 class="text-center mb-4">
                                                    {{$property->$title_var}}
                                                </h6>
                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="property" value="{{$property->id}}" />
                                                    <div class=" mb-4">
                                                        <input  type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input  type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input  type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>


                                                    {{-- <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                                        {{ trans('frontLang.submit') }}
                                                    </button> --}}
                                                    <button class="submit btn btn-block btn-outline-white" type="submit">
                                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                                        {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                        <span class="btn-txt">
                                                            {{ trans('frontLang.submit') }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <style>
                        .pagination > li > a,
                        .pagination > li > span {
                            color: #fff !important; // use your own color here
                        }


                        .pagination > .disabled > a,
                        .pagination > .disabled > a:focus,
                        .pagination > .disabled > a:hover,
                        .pagination > .disabled > span,
                        .pagination > .disabled > span:focus,
                        .pagination > .disabled > span:hover {
                            background-color: #000 !important;
                            border-color: green;
                            color: #fff !important;
                        }

                        .pagination > .active > a,
                        .pagination > .active > a:focus,
                        .pagination > .active > a:hover,
                        .pagination > .active > span,
                        .pagination > .active > span:focus,
                        .pagination > .active > span:hover {
                            background-color: #fff;
                            border-color: green;
                            color: #000 !important;
                        }
                    </style>


                    {!! $properties->appends($_GET)->links() !!}
                    @endif
                </div>

            </div>
            <!-- Button trigger modal -->



        </div>
        <script>
            $(document).ready(function() {
            $("#getInTouch").submit(function() {
                $(".result").text("");
                $(".loading-icon").removeClass("d-none");
                $(".submit").attr("disabled", true);
                $(".btn-txt").text("Processing ...");
            });
            });
        </script>
    </section>
@endif




@endsection
