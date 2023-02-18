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
        <style>

            html, body {
                overflow-x: hidden;
                scroll-behavior: smooth !important;
            }
            body {
                position: relative
            }
            p{
                line-height: 1.6 !important;
            }

            .nav-pills .nav-link.active {
                background-color: black !important;
                color: #fff !important;
                border: 1px solid #fff !important;
                border-radius: 0 !important;

            }

            .nav-link {
                /* background-color: #000 !important; */
                color: #000 !important;
                border: 1px solid #fff !important;
                border-radius: 0 !important;

            }
            a {
                color: #fff !important;
            }

            .btn {
                /* transition: transform 5s  !important; */
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.125s !important;

            }
            .btn:hover {
                /* box-shadow: -5px 5px 1px #a2a2a2 !important; */
                /* translate: 2px -2px !important; */
                opacity: 1 !important;
                background-color: #fff !important;
                color: #000 !important;
                transform: scale(1) !important;
                border: 2px solid #000 !important;

                cursor: pointer !important;
            }

            /* .containerization {
                padding-right: 130px !important;
                padding-left: 130px !important;
            } */
            .card {
                margin: 12px !important;
                color: #fff !important;
                background-color: #000 !important;
                border: 0.5px solid rgb(86, 86, 86) !important;
                border-radius: 0 !important;
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.5s !important;


            /* }
            .card:hover {
                /* box-shadow: 0px 0px 5px #fff !important; */
                opacity: 1 !important;
                transform: scale(1.07) !important;
                z-index: 1000 !important;
                /* margin-left: 20px !important;
                margin-right: 20px !important; */
                /* border: 5px solid #000 !important; */
            } */


        </style>

@endsection
@section('content')

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

    <header class="mobile-show">

        <!-- Background image -->
        <div id="intro-home" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white">
                    {{-- <ul class="nav nav-pills " id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-home2" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="margin-right: 5px;">
                                    {{ trans('frontLang.buy') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="margin-right: 5px;">
                                    {{ trans('frontLang.Rent') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                                    {{ trans('frontLang.off-plan') }}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder=" {{ trans('frontLang.searchbysale') }}" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">

                                </div>
                            </div>
                            <div class="tab-pane" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="{{ trans('frontLang.searchbysale') }}" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">

                                </div>
                            </div>
                            <div class="tab-pane" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="{{ trans('frontLang.searchbyprojects') }}">

                                </div>
                            </div>
                    </div> --}}
                    @if ($langSeg == 'ar')
                        <div class="text-right mt-0">

                            <h2 style="text-align: right;" class="fw-bolder">ابحث عن عقار وبيت أحلامك</h2>
                            <p style="text-align: right;" class="fw-bolder">شراء,ايجار,بيع,عقارات قيد الانشاء</p>
                            <div class="d-flex ml-auto mt-4">

                                <div class="header-item-right">
                                    <a href="#" style="margin-right: 1rem;"  class="menu-icon" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                        <img src="{{url::asset('public/assets/asset/loupe.png')}}" alt=""/>
                                    </a>

                                    <button type="button" class="menu-mobile-trigger" >
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>

                                <a class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3"  data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    Explore more
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="text-left">
                            <h2 style="text-align: left;" class="fw-bolder">Find Your Dream Home</h2>
                            <p style="text-align: left;" class="fw-bolder">Buy, Rent, Sell & Off Plan Properties in Dubai</p>
                            <div class="d-flex mr-auto mt-4">
                                <a class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3"  data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">

                                    Explore more
                                </a>
                            </div>

                        </div>


                    @endif

                </div>
                </div>
            </div>
        </div>
        <!-- Background image -->



    </header>

    <header class="desktop-show">

        <!-- Background image -->
        <div id="intro-home" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="container align-items-center  text-center h-100" style="margin-top: 250px;width: 900px;">
                    <div class="text-white">
                        @if ($langSeg == 'ar')
                            <div class="mb-4" style="margin-top: 5rem !important;">
                                <h1 style="text-align: center;" class="fw-bolder">ابحث عن عقار وبيت أحلامك</h1>
                                <h4 style="text-align: center;" class="fw-lighter mb-5">شراء,ايجار,بيع,عقارات قيد الانشاء</h4>
                                <style>
                                    .testbutton:hover {
                                        background-color: #ffffff !important;
                                        color: black !important;
                                        border: #fff solid !important;

                                    }
                                </style>
                                <a class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-25 text-center py-3 testbutton"  data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    Explore more
                                </a>
                            </div>
                        @else
                            <div class="mb-4" style="margin-top: 5rem !important;">
                                <h1 style="text-align: center;" class="fw-bolder">{{ trans('frontLang.findyourdreamhome') }}</h1>
                                <h4 style="text-align: center;" class="fw-lighter mb-5">{{ trans('frontLang.home2line') }}</h4>
                                <style>
                                    .testbutton:hover {
                                        background-color: #ffffff !important;
                                        color: black !important;
                                        border: #fff solid !important;

                                    }
                                </style>
                                <a class="text-uppercase btn  bg-black  rounded-0 w-25 text-center py-3 testbutton"  data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight" >
                                    Explore more
                                </a>
                            </div>



                        <!-- Pills navs -->
                        {{-- <ul class="nav nav-pills nav-fill" id="ex1" role="tablist" >
                            <li class="nav-item" role="presentation">
                            <a class="nav-link active"  id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1-desktop" role="tab" aria-controls="ex2-pills-1" aria-selected="true" style="margin-right:5px" >{{ trans('frontLang.buy') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex2-tab-2"  data-mdb-toggle="pill" href="#ex2-pills-2-desktop" role="tab" aria-controls="ex2-pills-2" aria-selected="false" style="margin-right:5px">{{ trans('frontLang.Rent') }}</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex2-tab-3"  data-mdb-toggle="pill" href="#ex2-pills-3-desktop" role="tab" aria-controls="ex2-pills-3" aria-selected="false" > {{ trans('frontLang.off-plan') }}</a>
                            </li>
                        </ul> --}}
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        {{-- <div class="tab-content" id="ex2-content">
                            <div class="tab-pane show active" id="ex2-pills-1-desktop" role="tabpanel" aria-labelledby="ex2-tab-1" >

                                <div class="form-group">
                                    <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET" >
                                        @csrf
                                        @honeypot
                                        <input type="hidden" name="property_type_id" value="1" />
                                        <div class="input-group">

                                            <input type="search" name="search" id="search" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbysale') }}" aria-label="Search"/>
                                            <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                        </div>


                                        <div id="List"></div>
                                        {{ csrf_field() }}
                                        <div class="row mt-2">
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="property_type"  title="Property Type" style="border: none; background: #ffffff00; color:#fff;">

                                                    <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.propertyType') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="1">{{ trans('frontLang.Apartment') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="3">{{ trans('frontLang.Commercial') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="7">{{ trans('frontLang.Duplex') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="2">{{ trans('frontLang.Villa') }}</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="min_bedroom"  title="{{ trans('frontLang.minBedrooms') }}" style="border: none; background: #ffffff00;color:#fff;">
                                                    <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.minBedrooms') }}</option>

                                                    <option style="color: #fff;background-color: #151515;" value="1">1</option>
                                                    <option style="color: #fff;background-color: #151515;" value="2">2</option>
                                                    <option style="color: #fff;background-color: #151515;" value="3">3</option>
                                                    <option style="color: #fff;background-color: #151515;" value="4">4</option>
                                                    <option style="color: #fff;background-color: #151515;" value="5">5</option>
                                                    <option style="color: #fff;background-color: #151515;" value="6">6</option>
                                                    <option style="color: #fff;background-color: #151515;" value="7">7</option>
                                                    <option style="color: #fff;background-color: #151515;" value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="max_bedroom"  title="{{ trans('frontLang.maxBedrooms') }}" style="border: none; background: #ffffff00;color:#fff;">
                                                        <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option style="color: #fff;background-color: #151515;" value="1">1</option>
                                                        <option style="color: #fff;background-color: #151515;" value="2">2</option>
                                                        <option style="color: #fff;background-color: #151515;" value="3">3</option>
                                                        <option style="color: #fff;background-color: #151515;" value="4">4</option>
                                                        <option style="color: #fff;background-color: #151515;" value="5">5</option>
                                                        <option style="color: #fff;background-color: #151515;" value="6">6</option>
                                                        <option style="color: #fff;background-color: #151515;" value="7">7</option>
                                                        <option style="color: #fff;background-color: #151515;" value="8">8</option>
                                                        <option style="color: #fff;background-color: #151515;" value="9">9</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="min_price"  title="Min Price" style="border: none; background: #ffffff00;color:#fff;">

                                                        <option style="color: #fff;background-color: #151515;" selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  style="color: #fff; background-color: #151515" value="250000">250,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="500000">500,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="750000">750,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="1000000">1,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="2000000">2,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="3000000">3,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="4000000">4,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="5000000">5,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="6000000">6,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="7000000">7,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="8000000">8,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="9000000">9,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="10000000">10,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="20000000">20,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="30000000">30,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="40000000">40,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="50000000">50,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="60000000">60,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="70000000">70,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="80000000">80,000,000</option>


                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="max_price"  title="Max Price" style="border: none; background: #ffffff00;color:#fff;">
                                                    <option style="color: #fff;background-color: #151515;" selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  style="color: #fff; background-color: #151515" value="250000">250,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="500000">500,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="750000">750,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="1000000">1,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="2000000">2,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="3000000">3,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="4000000">4,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="5000000">5,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="6000000">6,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="7000000">7,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="8000000">8,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="9000000">9,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="10000000">10,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="20000000">20,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="30000000">30,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="40000000">40,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="50000000">50,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="60000000">60,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="70000000">70,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="80000000">80,000,000</option>

                                                </select>
                                            </div>

                                        </div>

                                    </form>
                                </div>

                            </div>
                            <div  class="tab-pane" id="ex2-pills-2-desktop" role="tabpanel" aria-labelledby="ex2-tab-2" >
                                <div class="form-group ">
                                    <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="GET" >
                                        @csrf
                                        @honeypot
                                        <input type="hidden" name="property_type_id" value="2" />
                                        <div class="input-group">

                                            <input type="search" name="search" id="search-1" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbysale') }}" aria-label="Search"/>
                                            <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                        </div>


                                        <div id="List-1"></div>
                                        {{ csrf_field() }}
                                        <div class="row mt-2">
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="property_type"  title="Property Type" style="border: none; background: #ffffff00; color:#fff;">

                                                    <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.propertyType') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="1">{{ trans('frontLang.Apartment') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="3">{{ trans('frontLang.Commercial') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="7">{{ trans('frontLang.Duplex') }}</option>
                                                    <option style="color: #fff;background-color: #151515;" value="2">{{ trans('frontLang.Villa') }}</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="min_bedroom"  title="{{ trans('frontLang.minBedrooms') }}" style="border: none; background: #ffffff00;color:#fff;">
                                                    <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.minBedrooms') }}</option>

                                                    <option style="color: #fff;background-color: #151515;" value="1">1</option>
                                                    <option style="color: #fff;background-color: #151515;" value="2">2</option>
                                                    <option style="color: #fff;background-color: #151515;" value="3">3</option>
                                                    <option style="color: #fff;background-color: #151515;" value="4">4</option>
                                                    <option style="color: #fff;background-color: #151515;" value="5">5</option>
                                                    <option style="color: #fff;background-color: #151515;" value="6">6</option>
                                                    <option style="color: #fff;background-color: #151515;" value="7">7</option>
                                                    <option style="color: #fff;background-color: #151515;" value="8">8</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="max_bedroom"  title="{{ trans('frontLang.maxBedrooms') }}" style="border: none; background: #ffffff00;color:#fff;">
                                                        <option style="color: #fff;background-color: #151515;" value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                        <option style="color: #fff;background-color: #151515;" value="1">1</option>
                                                        <option style="color: #fff;background-color: #151515;" value="2">2</option>
                                                        <option style="color: #fff;background-color: #151515;" value="3">3</option>
                                                        <option style="color: #fff;background-color: #151515;" value="4">4</option>
                                                        <option style="color: #fff;background-color: #151515;" value="5">5</option>
                                                        <option style="color: #fff;background-color: #151515;" value="6">6</option>
                                                        <option style="color: #fff;background-color: #151515;" value="7">7</option>
                                                        <option style="color: #fff;background-color: #151515;" value="8">8</option>
                                                        <option style="color: #fff;background-color: #151515;" value="9">9</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="min_price"  title="Min Price" style="border: none; background: #ffffff00;color:#fff;">

                                                        <option style="color: #fff;background-color: #151515;" selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  style="color: #fff; background-color: #151515" value="250000">250,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="500000">500,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="750000">750,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="1000000">1,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="2000000">2,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="3000000">3,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="4000000">4,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="5000000">5,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="6000000">6,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="7000000">7,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="8000000">8,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="9000000">9,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="10000000">10,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="20000000">20,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="30000000">30,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="40000000">40,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="50000000">50,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="60000000">60,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="70000000">70,000,000</option>
                                                        <option  style="color: #fff; background-color: #151515" value="80000000">80,000,000</option>


                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 ">
                                                <select name="max_price"  title="Max Price" style="border: none; background: #ffffff00;color:#fff;">
                                                    <option style="color: #fff;background-color: #151515;" selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                    <option  style="color: #fff; background-color: #151515" value="250000">250,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="500000">500,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="750000">750,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="1000000">1,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="2000000">2,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="3000000">3,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="4000000">4,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="5000000">5,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="6000000">6,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="7000000">7,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="8000000">8,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="9000000">9,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="10000000">10,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="20000000">20,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="30000000">30,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="40000000">40,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="50000000">50,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="60000000">60,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="70000000">70,000,000</option>
                                                    <option  style="color: #fff; background-color: #151515" value="80000000">80,000,000</option>

                                                </select>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div  class="tab-pane" id="ex2-pills-3-desktop" role="tabpanel" aria-labelledby="ex2-tab-3" >
                                <div class="form-group has-search">
                                    <form action="{{URL('/'.$langSeg.'/offplan_search')}}" method="post" >
                                        @csrf
                                        @honeypot
                                        <div class="input-group">

                                            <input type="search" name="search" id="search-2" class="form-control form-control-lg" placeholder="Search By Projects" aria-label="Search"/>
                                            <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                        </div>
                                        <div id="List-2"></div>
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            </div>
                        </div> --}}
                        <!-- Pills content -->
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->



    </header>

</section>




{{-- slider menu--}}
<section class="desktop-show" id="main_content-mobile">
    @if ($langSeg == "ar")
         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }

            </style>

            <div class="container-fluid containerization p-0">




                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 mx-auto text-center">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="fill btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercialindex') }}
                        </a>
                    </div>

                </div>

            </div>

        </section>
    @elseif ($langSeg == "ru")


         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid containerization p-0">

                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 mx-auto text-center">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9em;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercial') }}
                        </a>
                    </div>

                </div>

            </div>

        </section>
    @else
        <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid containerization  p-0">



                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 d-flex ">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold 246px" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercialindex') }}
                        </a>

                    </div>


                </div>

            </div>

        </section>
    @endif
</section>

<section class="mobile-show" id="main_content">
    @if ($langSeg == "ar")
         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }

            </style>

            <div class="container-fluid p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.apartmentindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.villaindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.plotindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.townhouseindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.commercialindex') }}
                    </a>
                </div>


            </div>

        </section>
    @elseif ($langSeg == "ru")


         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            {{ trans('frontLang.villaindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            {{ trans('frontLang.plotindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            {{ trans('frontLang.commercialindex') }}
                        </a>
                    </div>
                </div>



            </div>

        </section>
    @else
        <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid  p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.apartmentindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.villaindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.plotindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.townhouseindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.commercialindex') }}
                    </a>
                </div>
            </div>
        </section>
    @endif
</section>




{{-- Latest Projects Topic | mobile & Desktop--}}
@if ($langSeg == "ar")

    <section class="desktop-show mt-5 mb-5" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.latestProjectsDetails') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.latestProjectsDetails') }}</P>
            </div>
        </div>

    </section>
@else
    <section class="desktop-show mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.latestProjectsDetails') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.latestProjectsDetails') }}</P>
            </div>
        </div>

    </section>
@endif





{{-- Latest PROJECTS Cards | Desktop --}}
<section class="desktop-show">

    <div class="container-fluid mt-4 containerization" style="">

        <div class="row  mb-5">
            <div class="col-lg-12">

                <!-- Pills content -->
                    <div class="row">
                        {{-- {{$off_plan_projects}} --}}
                        @foreach ($off_plan_projects as $property)

                        <div class="col-lg-3 mb-0 d-flex align-items-stretch px-1">
                            @if ($langSeg == 'ar')

                            <div class="card px-2" style="direction: rtl; border: 0px !important;  height: 500px !important;">

                            @else

                            <div class="card px-2" style="border: 0px !important; height: 500px !important;">

                            @endif

                                <div class="communities-newlaunch"></div>

                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                            <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 380px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">

                                            {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                        </a>
                                    @endif
                                @endforeach



                                <div class="card-body d-flex flex-column" style="padding: 0.5rem">
                                    <div class="row d-flex">
                                            <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                                <h6 class="card-title fw-bold text-uppercase mt-3 flex-grow-1 mb-0" style="font-size: 1.2rem; line-height: 1.3 !important;">
                                                {{ $property->$title_var }}
                                                </h6>
                                            </a>

                                            <p class="fw-light mt-1 my-0" style="color: #fff;"> {{ $property->locationss->$name_var }}</p>

                                            @if ($property->type_id == '1')
                                                @if ($langSeg == 'ru')
                                                    <p  class="fw-light mt-0"> <span style="color: #fff;">  {{ ($property->project_price_usd) }} $</span></p>
                                                @else
                                                    <p class="fw-light mt-0"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></p>
                                                @endif
                                            @else
                                                <p class="fw-light mt-0">  {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></p>
                                            @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





{{-- Latest PROJECTS Cards | Mobile --}}
<section class="mobile-show">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-12">

                <!-- Pills content -->
                        <div class="row ">
                            {{-- {{$off_plan_projects}} --}}
                            @foreach ($off_plan_projects as $property)

                            <div class="col-lg-3 mb-5 d-flex align-items-stretch px-1">
                                @if ($langSeg == 'ar')

                                <div class="card my-2" style="direction: rtl; border: 0px !important;  height: 325px !important;">

                                @else

                                <div class="card my-2" style="border: 0px !important; height: 325px !important;">

                                @endif

                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >

                                                <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                {{-- <img src="{{ URL::asset('public/assets/asset/img-error.webp') }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                            </a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100 mt-2" style="padding: 0.5rem">
                                        <div class="row d-flex h-100">
                                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                                    <h6 class="card-title fw-bolder text-center text-uppercase mt-0 flex-grow-1 mb-0" style="font-size: 1.2rem; line-height: 1.3 !important;">
                                                        {{ $property->$title_var }}
                                                    </h6>
                                                </a>

                                                <p class="fw-light mt-1 my-0 text-center"> {{ $property->locationss->$name_var }}</p>

                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <p  class="fw-light mt-0 mx-auto text-center"> <span style="color: #fff;">  {{ ($property->project_price_usd) }} $</span></p>
                                                    @else
                                                        <p  class="fw-light mt-0 mx-auto text-center"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></p>
                                                    @endif
                                                @else
                                                    <p  class="fw-light mt-0 mx-auto text-center">  {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }}</span></p>
                                                @endif

                                        </div>
                                    </div>

                                </div>
                            </div>

                            @endforeach
                        </div>

                    </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
</section>





{{-- PROPERTIES Mobile & Desktop --}}
@if ($langSeg == "ar")
    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
            <P style="font-size: 14px;line-height:1.3 !important;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
        </div>

    </section>


    <section class="desktop-show mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>


@else
    {{-- <section class="mt-5 mb-5">
        <div class="container">
            <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
            <P  style="font-size: 16px;line-height:25px;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
        </div>
    </section> --}}

    <section class="desktop-show mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 14px; line-height: 1.3 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>
@endif





{{-- Buy & Rent properties With Switch | Desktop View--}}
<section class="desktop-show">
    <div class="container-fluid containerization" style="">

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-3 d-flex justify-content-center"  id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mx-0 px-5 py-2" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true" >
                            {{ trans('frontLang.buy') }}
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mx-0 px-5 py-2" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false" >
                            {{ trans('frontLang.Rent') }}
                        </a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="properties-desktop-ex1-content">

                    {{-- Buy Properties --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            @foreach ($properties_for_sale as $property)

                            <div class="col-lg-4 mb-5 px-3 ">
                                @if ($langSeg == 'ar')

                                <div class="card " style="direction: rtl;  ">

                                @else

                                <div class="card " style="">

                                @endif

                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="" >
                                                <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px; width: 100%;" class="card-img-top rounded-0 border-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                            </a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100 p-3" >
                                        <div class="row d-flex h-100">
                                            <div class="col-8 d-flex flex-column h-100 pe-0">
                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1.3rem;" class="fw-bolder mt-0"> <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                    @else
                                                        <h5 style=" font-size: 1.3rem;" class="fw-bolder mt-0"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} </span></b></h5>
                                                    @endif
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-0"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.yealry') }} </b> </span></h5>
                                                @endif

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <p class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.3 !important; color: #848484">
                                                        {{ $property->$title_var }}
                                                    </p>
                                                </a>
                                                {{-- <p class="fw-light" style="color: #848484">
                                                    {{ $property->locationss->$name_var }}
                                                </p> --}}
                                            </div>

                                            <div class="col-4 ">

                                                @foreach($agents  as $agent)
                                                    @if($property->agent_id==$agent->id)
                                                        @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                            {{-- <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-0"  alt="agent"> --}}
                                                            <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0 " alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        @else
                                                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-0"  alt="agent">
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>



                                        <div class="row" style="display:block; bottom: 0% !important;" >

                                                <span style="color: #848484" style="font-size: .9rem !important">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span>

                                                <span style="color: #848484" style="font-size: .9rem !important">{{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                                <span style="color: #848484" style="font-size: .9rem !important">{{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                        </div>

                                    </div>
                                    @if ($langSeg =='ar')
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endif



                                </div>
                            </div>

                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white btn-lg  rounded-0" > {{ trans('frontLang.viewMore') }}</a>
                            </div>

                        </div>

                    </div>



                    {{-- Rent Properties --}}
                    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                            @foreach ($properties_for_rent as $property)
                            <div class="col-lg-4 mb-5 d-flex px-3">
                                @if ($langSeg == 'ar')
                                    <div class="card" style="direction: rtl;">
                                @else
                                    <div class="card">
                                @endif
                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                            </a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100 p-3" >
                                    <div class="row d-flex h-100">
                                        <div class="col-8 d-flex flex-column h-100 pe-0">
                                            @if ($property->type_id == '1')
                                                @if ($langSeg == 'ru')
                                                    <h5 style=" font-size: 1.5rem;" class="mt-0"> <b>$ <span style="color: #fff;">  {{ number_format($property->price_usd) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.Price') }}</span></span></b></h5>
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="mt-0"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.Price') }}</span></span></b></h5>
                                                @endif
                                            @else
                                                @if ($langSeg == 'ru')
                                                    <h5 style=" font-size: 1.5rem;" class="mt-0"> <b> $ <span style="color: #fff;">  {{ number_format($property->price_usd) }}  <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span></b> </span></h5>
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="mt-0"> <b> {{ trans('frontLang.AED') }}<span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span></b> </span></h5>
                                                @endif


                                            @endif

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <h6 class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.2 !important; color: #848484">{{ $property->$title_var }}</h6>
                                            </a>
                                            {{-- <p class="fw-light mt-0" style="font-size: 1.2 !important"> {{ $property->locationss->$name_var }}</p> --}}
                                        </div>
                                        <div class="col-4">
                                            @foreach($agents  as $agent)
                                                @if($property->agent_id==$agent->id)
                                                    @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                        <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-0 "  alt="agent">
                                                    @else
                                                        <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-0 "  alt="agent">
                                                    @endif
                                                    {{-- <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="border-bottom: 0.5px solid grey !important;" > --}}

                                                    {{-- </a> --}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="row " style="display:block; bottom: 0% !important;"  >

                                        <span style="color: #848484" style="font-size: 1rem !important;">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span>

                                        <span style="color: #848484" style="font-size: 1rem !important;">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #848484" style="font-size: 1rem !important;"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                    </div>

                                    </div>

                                    @if ($langSeg =='ar')
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white btn-lg rounded-0"> {{ trans('frontLang.viewMore') }}</a>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>

    <div class="modal modal-lg fade rounded-0"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
            <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                <div class="modal-body p-0 bg-black">
                    <div class="desktop-show row p-0 m-0">
                        <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
                            <div class="my-auto mx-auto p-3">
                                <p class="fw-bold" style="font-size: 2rem !important;">
                                    {{ trans('frontLang.getintouch') }}
                                </p>

                                <p style="font-size: .9rem !important;">{{ trans('frontLang.mobile') }}</p>
                                <p style="font-size: .9rem !important;">{{ trans('frontLang.tele') }}</p>
                                <p style="font-size: .9rem !important;">{{ trans('frontLang.website') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-8 m-0 p-0 bg-white">
                            <div class="p-5">
                                {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit')}}">
                                    @csrf
                                    @honeypot

                                    <div class=" mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                        <input type="text" name="name" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                        <input type="email" name="email" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                        <input type="phone" name="phone" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>

                                    <div class="d-flex mx-auto flex-row">
                                        {{-- <button type="submit" class="btn btn-outline-dark btn-lg rounded-0 mx-auto " id="submit1_btn1" >
                                            {{ trans('frontLang.submit') }}
                                        </button> --}}

                                        <button class="submit btn btn-block btn-lg mx-auto btn-outline-dark" type="submit">
                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                            {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                            <span class="btn-txt">
                                                {{ trans('frontLang.submit') }}
                                            </span>
                                        </button>

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                    <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                        @csrf
                        @honeypot
                        <div class=" mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                        </div>

                        <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}
</section>





{{-- Buy & Rent properties With Switch | Mobile View--}}
<section class="mobile-show">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                 <!-- Pills navs -->
                 <ul class="nav nav-pills mb-3 nav-justified "  id="ex1" role="tablist" >
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1-mobile" data-mdb-toggle="pill" href="#ex1-pills-1-mobile" role="tab" aria-controls="ex1-pills-1-mobile" aria-selected="true" >{{ trans('frontLang.buy') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2-mobile" data-mdb-toggle="pill" href="#ex1-pills-2-mobile" role="tab" aria-controls="ex1-pills-2-mobile" aria-selected="false" >{{ trans('frontLang.Rent') }}</a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="properties-mobile-ex1-content">

                    {{-- Sale --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1-mobile" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            @foreach ($properties_for_sale as $property)
                                @if ($langSeg == 'ar')
                                    <div class="card mb-3 border-none px-0" style="border: 0px !important; direction: rtl">

                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100%;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>

                                            @endif
                                        @endforeach

                                        <div class="card-body" style="padding: 0.6rem;">
                                            <h6 class="card-title" style="font-size: 1.2rem;">
                                                <b>{{ trans('frontLang.Price') }} <span style="color: #fff"> {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b>
                                            </h6>
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                <p class="card-text" style="margin-bottom: 0.3rem;"> {{ $property->$title_var }} </p>
                                            </a>
                                            <p class="mb-2">
                                                {{ $property->$address_var }}
                                            </p>
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 50%; text-align: right"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                    <td style="width: 50%; text-align: right"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="card mb-5 border-none px-0" style="border: 0px !important; " >

                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100% !important;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>

                                            @endif
                                        @endforeach

                                        <div class="card-body" style="padding: 0.6rem;">
                                            <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                            <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light" style=""><p style="line-height: 20px" class="card-text" style="margin-bottom: 0.3rem;font-size: .9rem !important;"> {{ $property->$title_var }} </p></a>
                                            <p class="mb-2 fw-light" style="line-height: 20px;font-size: .9rem !important;"> {{ $property->$address_var }}</p>
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 50%; text-align: left"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                    <td style="width: 50%; text-align: center"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>


                        </div>




                    </div>

                    {{-- Rent --}}
                    <div class="tab-pane fade" id="ex1-pills-2-mobile" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                            @foreach ($properties_for_rent as $property)

                            @if ($langSeg == 'ar')
                            <div class="card mb-5 border-none px-0" style="border: 0px !important; direction: rtl">

                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100%; " onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                        </a>


                                    @endif
                                @endforeach

                                <div class="card-body" style="padding: 0.6rem;">
                                    <h6 class="card-title" style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                        <p style="line-height: 20px" class="card-text" style="margin-bottom: 0.3rem;"> {{ $property->$title_var }} </p>
                                    </a>
                                    <p class="mb-2" style="line-height: 20px"> {{ $property->$address_var }}</p>
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 50%; text-align: right"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                            <td style="width: 50%; text-align: right"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @else
                            <div class="card mb-5 border-none px-0" style="border: 0px !important;">

                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                            <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100%;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                        </a>
                                    @endif
                                @endforeach

                                <div class="card-body" style="padding: 0.6rem;">
                                    <h6 class="card-title" style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light"><p class="card-text" style="margin-bottom: 0.3rem;line-height: 20px"> {{ $property->$title_var }} </p></a>
                                    <p class="mb-2" style="line-height: 20px"> {{ $property->$address_var }}</p>
                                    <table style="width: 100%">
                                        <tr>

                                            <td style="width: 50%; text-align: left"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                            <td style="width: 50%; text-align: center"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
</section>






<section class="mobile-show">

    <div class="container mb-4">
        <div class="row mt-5">

                @if ($langSeg == 'ar')
                <div class="col-12" style="direction: rtl">
                    <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                    <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Findproperties_detail') }}</P>
                </div>
                @else
                    <div class="col-12 text-left">
                        <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                        <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Findproperties_detail') }}</P>
                    </div>
                @endif



        </div>
    </div>
    <div class="container mb-5">
        <div class="row text-center h-100">

            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/bluewaters')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/bluewaters.jpg')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">

                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Bluewaters') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/downtown-dubai')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/downtown.jpg')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">
                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Downtown') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/dubai-hills-estate')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/dubaihills.jpg')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">
                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Dubaihillestate') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/city-walk')}}">
                <div class="card card-block d-flex" style="height: 200px; background-image: url('{{URL::asset('public/assets/asset/citywalk.jpg')}}'); background-size: cover; background-position: center;background-repeat: no-repeat;border-radius: 0px;">
                    <div class="card-body align-items-center d-flex justify-content-center">
                        <h5 class="card-title" style="color:white">{{ trans('frontLang.citywalk') }}</h5>
                    </div>
                </div>
                </a>
            </div>
        </div>

      </div>

</section>







<section id="gallery" class="desktop-show">
    <div class="container-fluid containerization h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left">

                <br>
                <br>

                @if ($langSeg == 'ar')
                <div class="col-12 text-justify" style="direction: rtl">
                    <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                    <P style="font-size: 14px; line-height: 1.3 !important;">{{ trans('frontLang.Findproperties_detail') }}</P>
                </div>
                @else
                    <div class="col-8 text-center mx-auto">
                        <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                        <P style="font-size: 14px; line-height: 1.3 !important;">{{ trans('frontLang.Findproperties_detail') }}</P>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <div class="container-fluid containerization mb-5">
      <div id="image-gallery">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/city-walk')}}">
                <div class="img-wrapper" >

                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.citywalk') }}</h3></div>

                        <img src="{{URL::asset('public/assets/asset/desktop/city-walk-dubai-edgerealty.ae.jpg')}}" class="img-responsive">

                    <div class="img-overlay">

                        <h3 class="text-white">{{ trans('frontLang.citywalk') }}</h3>

                    </div>
                </div>
            </a>

          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/dubai-hills-estate')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Dubaihillestate') }}</h3></div>
                        <img src="{{URL::asset('public/assets/asset/desktop/dubaihillsestate-edgerealty.ae.jpg')}}" class="img-responsive">
                    <div class="img-overlay">
                        <h3 class="text-white">{{ trans('frontLang.Dubaihillestate') }}</h3>
                    </div>
                </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/difc')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.difc') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/difc-edgerealty.ae.jpg')}}" class="img-responsive">
                <div class="img-overlay">
                    <h3 class="text-white">{{ trans('frontLang.difc') }}</h3>
                </div>
                </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/downtown-dubai')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Downtown') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/downtowndubai-edgerealty.ae.jpg')}}" style="width: 100%" class="img-responsive">
                    <div class="img-overlay">
                        <h3 class="text-white">{{ trans('frontLang.Downtown') }}</h3>
                    </div>
                </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/bluewaters')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Bluewaters') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/bluewaiters-edgerealty.ae.jpg')}}" style="width: 100%" class="img-responsive">
                <div class="img-overlay">
                    <h3 class="text-white">{{ trans('frontLang.Bluewaters') }}</h3>
                </div>
                </div>
            </a>
          </div>

        </div><!-- End row -->
      </div><!-- End image gallery -->
    </div><!-- End container -->
</section>



<style>
    #ac-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 1001;
    }
    #ac-wrapper1 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 1001;
    }
    #popup {
        width: 800px;
        height: 400px;
        background: #FFFFFF;
        /* border: 5px solid #000; */
        /* border-radius: 25px; */
        /* -moz-border-radius: 25px; */
        /* -webkit-border-radius: 25px; */
        /* box-shadow: #64686e 0px 0px 3px 3px; */
        /* -moz-box-shadow: #64686e 0px 0px 3px 3px; */
        /* -webkit-box-shadow: #64686e 0px 0px 3px 3px; */
        position: relative;
    }

    #popup2 {
        width: 400px;
        height: 200px;
        background: #FFFFFF;
        /* border: 5px solid #000; */
        /* border-radius: 25px; */
        /* -moz-border-radius: 25px; */
        /* -webkit-border-radius: 25px; */
        /* box-shadow: #64686e 0px 0px 3px 3px; */
        /* -moz-box-shadow: #64686e 0px 0px 3px 3px; */
        /* -webkit-box-shadow: #64686e 0px 0px 3px 3px; */
        position: relative;
    }
</style>

<div id="ac-wrapper" style="display: none !important;" class="d-flex flex-column mx-auto h-100 d-md-block d-lg-block d-none">
    <div id="popup" class="my-auto mx-auto text-dark">
        <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 40px; width:40px;" class="position-absolute ms-2 mt-2">
        <div class="row h-100 p-5 ">
            <div class="col-6 p-2 d-flex flex-column mx-auto my-auto h-100 " style="border-right: 1px solid #000 !important;">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <p class="mx-auto fw-bold" style="font-size: 2.2rem; line-height: 1.2 !important;">
                            Sign Up <br> and Stay Informed
                        </p>
                        <p class="mx-auto mt-3 px-2 text-justify" style="font-size: 1.2rem !important">
                            Join over 20,000 members to get weekly updates on new off-plan launches and latest news & tips
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-6 h-100">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <form>
                            <!-- Email input -->
                            <div class="form-outline rounded-0 mb-4">
                                <input type="text" id="form1Example1" class="form-control rounded-0 "/>
                                <label class="form-label text-center rounded-0" for="form1Example1">Name</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline rounded-0 mb-4">
                                <input type="email" id="form1Example2" class="form-control rounded-0 " />
                                <label class="form-label text-center rounded-0" for="form1Example2">Email</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-black btn-block rounded-0 text-uppercase">SUBSCRIBE</button>

                        </form>
                        {{-- <p class="text-decoration-underline text-dark " onClick="PopUp('hide">I'm not interested</p> --}}

                        <button class="text-decoration-underline mt-3" onClick="PopUp('hide')">I'm Not Interested</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="ac-wrapper1" style="display: none !important;" class="d-flex flex-column mx-auto h-100  d-md-block d-block d-lg-none">
    <div id="popup2" class="my-auto mx-auto text-dark">
        <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 20px; width:20px;" class="position-absolute ms-2 mt-2">
        <div class="row h-100 p-1 ">
            <div class="col-6 p-1 d-flex flex-column mx-auto my-auto h-100 " style="border-right: 1px solid #000 !important;">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <p class="mx-auto fw-bold mb-0 px-0" style="font-size: 1.2rem; line-height: 1 !important;">
                            Sign Up and Stay Informed
                        </p>
                        <p class="mx-auto mt-3 px-0 text-justify" style="font-size: .9rem !important">
                            Join over 20,000 members to get weekly updates on new off-plan launches and latest news & tips
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-6 h-100">
                <div class="row my-auto mx-0 px-0 h-100">
                    <div class="row my-auto mx-0 px-0">
                        <form>
                            <!-- Email input -->
                            <div class="form-outline rounded-0 mb-2">
                                <input type="text" id="form1Example12" class="form-control rounded-0"/>
                                <label class="form-label text-center rounded-0" style="font-size: .9rem !important" for="form1Example12">
                                    Name
                                </label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline rounded-0 mb-2">
                                <input type="email" id="form1Example22" class="form-control rounded-0" />
                                <label class="form-label text-center rounded-0" style="font-size: .9rem !important" for="form1Example22">
                                    Email
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-black btn-block rounded-0 text-uppercase" style="font-size: .9rem !important">
                                SUBSCRIBE
                            </button>

                        </form>
                        {{-- <p class="text-decoration-underline text-dark " onClick="PopUp('hide">I'm not interested</p> --}}

                        <button class="text-decoration-underline mt-1" onClick="PopUp('hide')" style="font-size: .9rem !important" >
                            I'm Not Interested
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
<script scope>
    function PopUp(hideOrshow) {
        if (hideOrshow == 'hide') document.getElementById('ac-wrapper').style.display = "none";
        else document.getElementById('ac-wrapper').removeAttribute('style');
    }

    setTimeout(function() {
            $('#myModal').modal();
        }, 2000);

    window.onload = function () {
        setTimeout(function () {
            PopUp('show');
        }, 3000);

    }

    window.onload = function () {
        setTimeout(function () {
            PopUp2('show');
        }, 3000);
    }


     $(document).ready(function() {
        $('.slider').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 10,
            speed: 1500,
            index: 2,
            focusOnSelect:true,
            responsive: [{
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }]
        });
    });




</script>

@endsection

