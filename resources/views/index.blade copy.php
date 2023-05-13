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
            html{
                scroll-behavior: smooth !important;
            }
            p{
                line-height: 1.6 !important;
            }
            .card {
                color: #fff !important;
                background-color: #000 !important;
                border: 0.5px solid gray !important;
                border-radius: 0 !important;
            }
            .nav-pills .nav-link.active {
                background-color: black !important;
                color: #fff !important;
                border: 1px solid #fff !important;
                border-radius: 0 !important;

                }

            .nav-link {
                background-color: #000 !important;
                color: #fff !important;
                border: 1px solid #fff !important;
                border-radius: 0 !important;

            }
            a {
                color: #fff !important;
            }
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
                                <a href="#main_content" class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3"  >
                                    Explore more
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="text-left">
                            <h2 style="text-align: left;" class="fw-bolder">Find Your Dream Home</h2>
                            <p style="text-align: left;" class="fw-bolder">Buy, Rent, Sell & Off Plan Properties in Dubai</p>
                            <div class="d-flex mr-auto mt-4">
                                <a href="#main_content" class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3">
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
                            <h4 style="text-align: center;" class="fw-lighter">شراء,ايجار,بيع,عقارات قيد الانشاء</h4>
                            <a href="#main_content" class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 mt-3" style="min-width: 200px !important;">
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
                                <form action="{{URL('/'.$langSeg.'/properties_search_ar')}}" method="GET" style="direction: rtl">
                                    @csrf
                                    @honeypot


                                    <input type="hidden" name="property_type_id" value="1" />
                                    <div class="input-group">

                                        <input type="search" name="search" id="search-arabic" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbysale') }}" aria-label="Search"/>
                                        <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                    </div>


                                    <div id="List-arabic"></div>
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
                                <form action="{{URL('/'.$langSeg.'/properties_search_ar')}}" method="GET" style="direction: rtl">
                                    @csrf
                                    @honeypot


                                    <input type="hidden" name="property_type_id" value="2" />
                                    <div class="input-group">

                                        <input type="search" name="search" id="search-arabic-1" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbysale') }}" aria-label="Search"/>
                                        <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                    </div>


                                    <div id="List-arabic-1"></div>
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
                                <form action="{{URL('/'.$langSeg.'/offplan_search_ar')}}" method="post" style="direction: rtl">
                                    @csrf
                                    @honeypot

                                    <div class="input-group">

                                        <input type="search" name="search" id="search-arabic-2" class="form-control form-control-lg" placeholder="البحث عن طريق المشاريع" aria-label="Search"/>
                                        <button type="submit" class="btn btn-light"><i class="fas fa-search"></i></button>
                                    </div>
                                    <div id="List-arabic-2"></div>
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </div>
                    </div> --}}
                    <!-- Pills content -->
                    @else
                        <div class="mb-4" style="margin-top: 5rem !important;">
                            <h1 style="text-align: center;" class="fw-bolder">{{ trans('frontLang.findyourdreamhome') }}</h1>
                            <h4 style="text-align: center;" class="fw-lighter">{{ trans('frontLang.home2line') }}</h4>
                            <a href="#main_content" class="text-uppercase btn btn-outline-white bg-black opacity-50 rounded-0 mt-3 py-3 fw-normal" style="min-width: 250px !important; font-size: 1rem; letter-spacing: .1rem">
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





<section id="main_content">
    @if ($langSeg == "ar")
        <section class="mb-5" style="margin-top: 40px ">
            <div class="container">
                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-lg-none">
                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Plot
                        </a>
                    </div>

                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Commercial
                        </a>

                    </div>
                </div>


                {{-- desktop view --}}
                <div class="slider d-md-block d-lg-block d-none">


                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Plot
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Commercial
                        </a>



                    {{-- <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/villa.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/townhouses.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/offplan.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/commercial.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/furnished.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/plot.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/mortgage');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/mortgage.png')}}" />
                    </a> --}}

                </div>
            </div>
        </section>
    @elseif ($langSeg == "ru")
        <section class="mb-5" style="margin-top:40px " >
            <div class="container">
                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-lg-none">
                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Plot
                        </a>
                    </div>

                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Commercial
                        </a>

                    </div>
                </div>


                {{-- desktop view --}}
                <div class="slider d-md-block d-lg-block d-none">


                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Plot
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Commercial
                        </a>



                    {{-- <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/villa.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/townhouses.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/offplan.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/commercial.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/furnished.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/plot.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/mortgage');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/mortgage.png')}}" />
                    </a> --}}

                </div>
            </div>
        </section>
    @else
        <section class="mb-5" style="margin-top:40px " >
            <div class="container">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-lg-none">
                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Plot
                        </a>
                    </div>

                    <div class="row mx-2">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                            Commercial
                        </a>

                    </div>
                </div>


                {{-- desktop view --}}
                <div class="slider d-md-block d-lg-block d-none">


                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Apartment
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Villa
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Plot
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Townhouse
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-2 fw-bold text-capitalize" style="font-size: 1.1rem;;letter-spacing: .1rem !important;">
                            Commercial
                        </a>



                    {{-- <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/villa.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/townhouses.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/offplan.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/commercial.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/furnished.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/plot.png')}}" />
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/mortgage');?>" target="_blank" >
                        <img class="shadow p-3 mb-4 bg-white " style="height:140px; width:240px !important; " src="{{URL('public/assets/images/slider/mortgage.png')}}" />
                    </a> --}}

            </div>
            </div>
        </section>
    @endif
</section>


@if ($langSeg == "ar")
<section class="mt-5 mb-5" style="direction: rtl">
    <div class="container">
        <h3 class="text-center">{{ trans('frontLang.latestProjects') }}</h3>
        <P style="font-size: 16px;line-height:25px; text-align: justify !important;" class="text-justify">{{ trans('frontLang.latestProjectsDetails') }}</P>
    </div>

</section>
@else
<section class="mt-5 mb-5">
    <div class="container">
        <h3 class="text-center">{{ trans('frontLang.latestProjects') }}</h3>
        <P  style="font-size: 16px;line-height:25px; text-align: justify !important;" class="text-justify">{{ trans('frontLang.latestProjectsDetails') }}</P>
    </div>

</section>
@endif






<section class="desktop-show">
    <div class="container" style="">

        <div class="row">
            <div class="col-lg-12">

                <!-- Pills content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            {{-- {{$off_plan_projects}} --}}
                            @foreach ($off_plan_projects as $property)

                            <div class="col-lg-3 mb-5 d-flex align-items-stretch px-1">
                                @if ($langSeg == 'ar')

                                <div class="card" style="direction: rtl; border: 0px !important; ">

                                @else

                                <div class="card" style="border: 0px !important;">

                                @endif

                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                                <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                            </a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                        <div class="row d-flex h-100">
                                             <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                                    <h6 class="card-title fw-bolder text-uppercase mt-3 flex-grow-1 mb-0" style="font-size: 1.2rem; line-height: 1.3 !important;">{{ $property->$title_var }}</h6>
                                                </a>


                                                <p class="fw-light mt-1 my-0"> {{ $property->locationss->$name_var }}</p>

                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1rem;" class="fw-bolder mt-0"> <span style="color: #fff;">  {{ ($property->project_price_usd) }} $</span></b></h5>
                                                    @else
                                                        <h5 style=" font-size: 1rem;" class="fw-bolder mt-0"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></b></h5>
                                                    @endif
                                                @else
                                                    <h5 style=" font-size: 1rem;" class="fw-bolder mt-0"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }}</b> </span></h5>
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
        </div>
    </div>
</section>


<section class="mobile-show">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">


                <!-- Pills content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1-mobile" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            @foreach ($off_plan_projects as $property)

                                @if ($langSeg == 'ar')
                                    <div class="card mb-3" style="direction: rtl">
                                        <div class="row g-0">
                                        <div class="col-md-4" style="width: 40%">

                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)

                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-md-8" style="width: 60%">
                                            <div class="card-body" style="padding: 0.6rem;">
                                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" ><p class="card-text" style="margin-bottom: 0.3rem; font-size: 1.5rem !important"> {{ $property->$title_var }} </p></a>
                                                <h6 class="card-title my-3">{{ trans('frontLang.Price') }} <span style="color: #fff"> {{ ($property->project_price) }} {{ trans('frontLang.AED') }}</span></h6>
                                                <p class="my-3"> {{ $property->$address_var }}</p>

                                                <table style="width: 100%">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card mb-3" >
                                        <div class="row g-0">
                                        <div class="col-md-4" style="width: 40%">

                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)

                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-md-8" style="width: 60%">
                                            <div class="card-body" style="padding: 0.6rem;">
                                                <a  href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" class="fw-bold" style="">
                                                    <p style="line-height: 20px" class="card-text" style="margin-bottom: 0.3rem; font-size: 1.5rem !important"> {{ $property->$title_var }} </p>
                                                </a>

                                                <h6 class="card-title text-light my-3"  style="font-size: 1rem;">{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ ($property->project_price) }} {{ trans('frontLang.AED') }}</span></h6>
                                                <p class="my-3 fw-light" style="line-height: 20px;font-size: .9rem !important;"> {{ $property->$address_var }}</p>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>




                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
</section>





@if ($langSeg == "ar")
<section class="mt-5 mb-5" style="direction: rtl">
    <div class="container">
        <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
        <P style="font-size: 16px;line-height:25px;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
    </div>

</section>
@else
<section class="mt-5 mb-5">
    <div class="container">
        <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
        <P  style="font-size: 16px;line-height:25px;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
    </div>

</section>
@endif






<section class="desktop-show">
    <div class="container" style="">

        <div class="row">
            <div class="col-lg-12">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-3 "  id="ex1" role="tablist" style="margin-left: 34rem;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mx-0 px-5 py-2" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true" >{{ trans('frontLang.buy') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mx-0 px-5 py-2" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false" >{{ trans('frontLang.Rent') }}</a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            @foreach ($properties_for_sale as $property)

                            <div class="col-lg-4 mb-5 d-flex align-items-stretch px-1">
                                @if ($langSeg == 'ar')

                                <div class="card" style="direction: rtl;  ">

                                @else

                                <div class="card" style="">

                                @endif

                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="border-bottom: 0.5px solid grey !important;" >
                                                <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                            </a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                        <div class="row d-flex h-100">
                                            <div class="col-8  d-flex flex-column h-100">
                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                    @else
                                                        <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} </span></b></h5>
                                                    @endif
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.yealry') }} </b> </span></h5>
                                                @endif

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <h6 class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.3 !important;">{{ $property->$title_var }}</h6>
                                                </a>
                                                <p class="fw-light"> {{ $property->locationss->$name_var }}</p>
                                                <p class="card-text">
                                                </p>
                                            </div>

                                            <div class="col-4 ">

                                                @foreach($agents  as $agent)
                                                    @if($property->agent_id==$agent->id)
                                                        @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                            <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @else
                                                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>



                                        <div class="row" style="display:block; bottom: 0% !important;" >

                                                <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> |

                                                <span style="color: #848484">{{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> |

                                                <span style="color: #848484">{{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                        </div>

                                    </div>
                                    @if ($langSeg =='ar')
                                    <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
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
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-dark btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>

                        </div>

                    </div>











                    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                            @foreach ($properties_for_rent as $property)
                            <div class="col-lg-4 mb-5 d-flex align-items-stretch px-1">
                                @if ($langSeg == 'ar')
                                    <div class="card" style="direction: rtl;">
                                @else
                                    <div class="card">
                                @endif
                                    <div class="communities-newlaunch"></div>

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="Listing"></a>
                                        @endif
                                    @endforeach



                                    <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                    <div class="row d-flex h-100">
                                        <div class="col-8 d-flex flex-column h-100">
                                            @if ($property->type_id == '1')
                                                @if ($langSeg == 'ru')
                                                    <h5 style=" font-size: 1.5rem;" class="mt-3"> <b>$ <span style="color: #fff;">  {{ number_format($property->price_usd) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.Price') }}</span></span></b></h5>
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="mt-3"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.Price') }}</span></span></b></h5>
                                                @endif
                                            @else
                                                @if ($langSeg == 'ru')
                                                    <h5 style=" font-size: 1.5rem;" class="mt-3"> <b> $ <span style="color: #fff;">  {{ number_format($property->price_usd) }}  <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span></b> </span></h5>
                                                @else
                                                    <h5 style=" font-size: 1.5rem;" class="mt-3"> <b> {{ trans('frontLang.AED') }}<span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span></b> </span></h5>
                                                @endif


                                            @endif

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <h6 class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.2 !important;">{{ $property->$title_var }}</h6>
                                            </a>
                                            <p class="fw-light mt-0" style="font-size: 1.2 !important"> {{ $property->locationss->$name_var }}</p>
                                            <p class="card-text">
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            @foreach($agents  as $agent)
                                                @if($property->agent_id==$agent->id)
                                                    @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                        <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                    @else
                                                        <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                    @endif
                                                    {{-- <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="border-bottom: 0.5px solid grey !important;" > --}}

                                                    {{-- </a> --}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>







                                    <div class="row " style="display:block; bottom: 0% !important;"  >

                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bedrooms') }} </span> |

                                        <span style="color: #848484">  {{$property->bathrooms}} {{ trans('frontLang.bathrooms') }}</span> |

                                        <span style="color: #848484"> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                    </div>

                                    </div>

                                    @if ($langSeg =='ar')
                                    <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
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
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-dark btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
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

                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                        <input type="text" name="utm_medium" class="utm_parameters" hidden>

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

                        <button type="submit" class="btn btn-dark btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>



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
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1-mobile" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">
                            @foreach ($properties_for_sale as $property)
                            @if ($langSeg == 'ar')
                            <div class="card mb-3" style="direction: rtl">
                                <div class="row g-0">
                                  <div class="col-md-4" style="width: 40%">

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                        @endif
                                    @endforeach

                                  </div>
                                  <div class="col-md-8" style="width: 60%">
                                    <div class="card-body" style="padding: 0.6rem;">
                                        <h6 class="card-title"><b>{{ trans('frontLang.Price') }} <span style="color: #fff"> {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><p class="card-text" style="margin-bottom: 0.3rem;"> {{ $property->$title_var }} </p></a>
                                        <p class="mb-2"> {{ $property->$address_var }}</p>
                                        <table style="width: 100%">
                                            <tr>

                                                <td style="width: 50%; text-align: right"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                <td style="width: 50%; text-align: right"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @else
                            <div class="card mb-3" >
                                <div class="row g-0">
                                  <div class="col-md-4" style="width: 40%">

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                        @endif
                                    @endforeach

                                  </div>
                                  <div class="col-md-8" style="width: 60%">
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
                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>




                    </div>
                    <div class="tab-pane fade" id="ex1-pills-2-mobile" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                            @foreach ($properties_for_rent as $property)

                            @if ($langSeg == 'ar')
                            <div class="card mb-3" style="direction: rtl">
                                <div class="row g-0">
                                  <div class="col-md-4" style="width: 40%">

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                        @endif
                                    @endforeach

                                  </div>
                                  <div class="col-md-8" style="width: 60%">
                                    <div class="card-body" style="padding: 0.6rem;">
                                        <h6 class="card-title"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><p style="line-height: 20px" class="card-text" style="margin-bottom: 0.3rem;"> {{ $property->$title_var }} </p></a>
                                        <p class="mb-2" style="line-height: 20px"> {{ $property->$address_var }}</p>
                                        <table style="width: 100%">
                                            <tr>

                                                <td style="width: 50%; text-align: right"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                <td style="width: 50%; text-align: right"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @else
                            <div class="card mb-3" >
                                <div class="row g-0">
                                  <div class="col-md-4" style="width: 40%">

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 160px !important;"></a>


                                        @endif
                                    @endforeach

                                  </div>
                                  <div class="col-md-8" style="width: 60%">
                                    <div class="card-body" style="padding: 0.6rem;">
                                        <h6 class="card-title"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6>
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" ><p class="card-text" style="margin-bottom: 0.3rem;line-height: 20px"> {{ $property->$title_var }} </p></a>
                                        <p class="mb-2" style="line-height: 20px"> {{ $property->$address_var }}</p>
                                        <table style="width: 100%">
                                            <tr>

                                                <td style="width: 50%; text-align: left"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                <td style="width: 50%; text-align: center"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @endif

                            @endforeach
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
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left">

                <br>
                <br>

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
    </div>
    <div class="container mb-5">
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

@endsection
