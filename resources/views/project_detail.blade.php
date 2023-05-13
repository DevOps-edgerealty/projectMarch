
@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title>{{$project_detail->$meta_var }}</title>
        <meta name="description" content="{{$project_detail->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$project_detail->$meta_keywords_var}} "/>

@endsection
<style>
        a, h1, h2, h3, h4, h5, h6, p, {
            color: #1c1c1c !important;
        }
        a {
            color: #1c1c1c !important;
        }
    </style>

@section('content')

<style>
    p{
        line-height: 1.6 !important;
        color: #ccc !important;
    }
    td > a {
        color: #ccc !important;
    }
    input, select {
        background-color: #1c1c1c !important;
        color: #ccc !important;
        border-radius: 0px !important;
        border: 1px solid #ccc !important;
    }

    @media only screen and (max-width: 800px) {
        .slick-track {
            height: 200px !important;
        }
    }

    .card {
        margin: 12px !important;
        color: #cccccc !important;
        background-color: #1c1c1c !important;
        border: 0.5px solid rgb(86, 86, 86) !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important;
    }

    .modal-content {
        background-color: #1c1c1c !important;
        border: 0.5px solid rgb(86, 86, 86) !important;
    }

    .submitBtn {
        background-color: #1c1c1c !important;
        color: #fff;
    }

    .slick-slide {
        height: auto !important;
    }


    /*
        PAYMENT PLAN - MOBILE - ENGLISH
    */
    .payment-plan-section .property-info {
        width: 100% !important;
    }

    .payment-plan-section .inner {
        background-color: #1c1c1c !important;
        /* text-align: right !important; */
        color: #ccc !important;
        padding-top: 0 !important;
        padding-bottom: 15 !important;
        font-weight: 400 !important;
        font-size: 1em !important;
    }

    .payment-plan-section .icon {
        color: #ccc !important;
        font-weight: 400 !important;
        font-size: 1em !important;
        margin-bottom: 0px !important;
    }



    /*
        PAYMENT PLAN - MOBILE - ARABIC
    */
    .payment-plan-section-ar .property-info {
        width: 100% !important;
    }

    .payment-plan-section-ar .inner {
        background-color: #1c1c1c !important;
        text-align: right !important;
        color: #ccc !important;
        padding-top: 0 !important;
        padding-bottom: 15 !important;
        font-weight: 400 !important;
        font-size: 1em !important;
    }

    .payment-plan-section-ar .icon {
        color: #ccc !important;
        font-weight: 400 !important;
        font-size: 1em !important;
        margin-bottom: 0px !important;
    }



    /*
        NEARBY PLACES - MOBILE - EN & AR
    */
    .nearby-places-section-mobile .table-bordered {
        background-color: #1c1c1c !important;
        border: 0.5px #ccc solid !important;
        text-align: left !important;
    }

    .nearby-places-section-mobile  td, tr {
        color: #ccc !important;
        padding: 10px !important;
        text-align: left !important;
    }



    /*
        NEARBY PLACES - MOBILE - EN & AR
    */
    .nearby-places-section-mobile-ar .table-bordered {
        background-color: #1c1c1c !important;
        border: 0.5px #ccc solid !important;
        text-align: right !important;
    }
    .nearby-places-section-mobile-ar  td, tr {
        color: #ccc !important;
        padding: 10px !important;
        text-align: right !important;
    }

    span {
        color: #ccc !important;
    }
    span, p, b {
        color: #ccc !important;
    }

    span, font {
        color: #ccc !important;
    }

    span, p {
        color: #ccc !important;
    }

    .project-header-img{
        height: 650px !important;
    }

    .point_highlighted{
        font-weight: bolder !important;
        font-size: 1.2em !important;
    }



</style>

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

<?php
    $finalUrl = '/ar/home';
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if($uri_path == '/' || $uri_path == '/home' )
    {
        $finalUrl = '/ar/home';


    }


    else
    {
        $uri_segments = explode('/', $uri_path);
        $seg1 = $uri_segments[1];
        if($seg1)
        {
            if($seg1 == 'en')
            {
                $replacements2 = array(1 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);


            }
            elseif($seg1 == 'ar')
            {
                $replacements2 = array(1 => "en");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);


            }
        }
        else
        {
                $replacements2 = array(1 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);

        }
    }


?>

<?php

    $project_title_var = "title_" . trans('backLang.boxCode');
    $type_title_var = "name_" . trans('backLang.boxCode');
    $address_title_var = "address_" . trans('backLang.boxCode');
    $name_var = "name_" . trans('backLang.boxCode');
    $title_var = "title_" . trans('backLang.boxCode');
    $near_by_places_var = "near_by_places_" . trans('backLang.boxCode');
    $address_var = "address_" . trans('backLang.boxCode');
    $payment_var = "payment_" . trans('backLang.boxCode');
    $payment_plan_mob_var = "payment_plan_mob_" . trans('backLang.boxCode');
    $ownership_var = "ownership_" . trans('backLang.boxCode');
    $bedrooms_var = "bedrooms_" . trans('backLang.boxCode');



    $community_var = "community_" . trans('backLang.boxCode');
    $feature_title_var = "name_" . trans('backLang.boxCode');
    $description_var = "description_" . trans('backLang.boxCode');
    $payment_plan_var = "payment_plan_" . trans('backLang.boxCode');
    $unit_size_var = "unit_size_" . trans('backLang.boxCode');
    $firstimage=true;
    $secondimage=true;



?>



<style>

    .skill{


        display: none;

    }
    .skill_mobile{


    display: none;

    }

    #mobile-info-section {
        scroll-margin-top: 75px !important;
    }

    .testbutton:hover {
        background-color: #ffffff !important;
        color: black !important;
        border: #848484 solid !important;
    }


</style>


{{-- Mobile Header image --}}
<section class="mobile-show">

    <div class="d-flex justify-content-center">


    @foreach($project_detail->images  as $single_img)
            @if($project_detail->images->first()==$single_img)
                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}"  class="card-img-top project-header-img" alt="{{$project_detail->$title_var}}" style="height: auto !important">
                {{-- <div class="mx-auto" style=" position: absolute; top: 250px; color:#fff !important; width: 100%">
                    <h1 style="text-shadow: 1px 1px 1px #000; text-align: center; text-transform: capitalize; font-weight: bold !important;">{{$project_detail->$title_var}}</h1>-->
                    <h3 style="text-shadow: 1px 1px 1px #000; text-align: center; text-transform: capitalize; font-weight: bold !important;">{{$project_detail->locationz->$name_var}}</h3>-->

                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-dark btn-lg mt-4 rounded-0 w-75 testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a>

                </div> --}}
            @endif
    @endforeach
    </div>

        {{-- <div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-inner">
                @foreach ($project_detail->images as $image)
                <div class="carousel-item <?php if($firstimage){ echo "active"; $firstimage=false;}?>">
                    <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="d-block w-100 slider-project" alt="..." />
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div> --}}

</section>




<section class="desktop-show " style="text-align: center">
    <div class="d-flex justify-content-center">


    @foreach($project_detail->images  as $single_img)
            @if($project_detail->images->first()==$single_img)
                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}" style="height: 700px" class="card-img-top" alt="">
                <div class="" style=" position: absolute; top: 250px; color:#fff !important ">
                    <h1 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold; color: #fff !important; font-weight: bold !important">{{$project_detail->$title_var}}</h1>
                    <h3 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;  color: #fff !important; font-weight: bold !important">{{$project_detail->locationz->$name_var}}</h3>

                    <style>
                        .testbutton:hover {
                            background-color: #ccc !important;
                            color: 1c1c1c !important;
                            border: #ccc solid !important;
                        }
                    </style>

                    {{-- <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-dark btn-lg mt-4 rounded-0 w-75 testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a> --}}

                </div>
            @endif
    @endforeach
    </div>
</section>




{{-- modal request details --}}
<div class="modal fade" style="background-color: rgb(0, 0, 0, .2);"  id="requestDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
        <div class="modal-content rounded-0">
            {{-- <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                <button type="button" class="btn-close" style="margin:0;" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body rounded-0">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        @foreach($project_detail->images  as $single_img)
                            @if($project_detail->images->first()==$single_img)
                                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$project_detail->$project_title_var}}">
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <h4 class="text-center mb-4">{{$project_detail->$project_title_var}}</h4>

                        <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_project/submit')}}">
                            @csrf

                            <input type="text" name="utm_source" class="utm_parameters" hidden>
                            <input type="text" name="utm_id" class="utm_parameters" hidden>
                            <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                            <input type="text" name="utm_medium" class="utm_parameters" hidden>

                            <input type="hidden" name="project" value="{{$project_detail->id}}" />
                            <div class="mb-4">
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
                            @honeypot
                            {{-- <button type="submit" class="btn btn-dark btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button> --}}

                            <button class="submit btn btn-outline-white btn-lg btn-block rounded-0" type="submit">
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



{{-- NEW PROJECT OVERVIEW AND DESCRIPTION - DESKTOP --}}
@if($langSeg == 'ar')
    <section class="desktop-show" dir="rtl" >
        <div class="container-fluid containerization my-5" >
            <div class="d-flex justify-content-between">
                    <div class="col-auto" >
                        {{-- PRICE --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>

                        <p class="m-0 p-0 bullet_points">
                            @if(preg_match('/\d/', $project_detail->project_price))
                                <div class="AED skill" style="display: block !important">
                                    <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">
                                        {{ trans('frontLang.AED') }}
                                        {{ $project_detail->project_price }}
                                    </p>
                                </div>
                                <div class="USD skill">
                                    <p class="card-title p-auto m-auto  m-0 p-0 bullet_points point_highlighted ">
                                        USD
                                        {{ $project_detail->project_price_usd }}

                                    </p>
                                </div>
                            @else
                                <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">
                                    اطلب السعر الان
                                </p>
                            @endif
                        </p>
                        {{-- PRICE --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- BEDROOMS --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->bedrooms}} </p>
                        {{--  --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- LOCATION --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->locationz->$name_var}} </p>
                        {{-- LOCATION --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- PROJECT TYPE --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">
                            @foreach ($project_detail->project_types as $project_type)
                                {{$project_type->$type_title_var}}
                            @endforeach
                        </p>
                        {{-- PROJECT TYPE --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- DEVELOPER --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$developers->$name_var}} </p>
                        {{-- DEVELOPER --}}
                    </div>

            </div>
        </div>
    </section>
@else
    <section class="desktop-show" >
        <div class="container-fluid containerization my-5" >
            <div class="d-flex justify-content-between">
                    <div class="col-auto" >
                        {{-- PRICE --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>

                        <p class="m-0 p-0 bullet_points">
                            @if(preg_match('/\d/', $project_detail->project_price))
                                <div class="AED skill" style="display: block !important">
                                    <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">
                                        {{ trans('frontLang.AED') }}
                                        {{ $project_detail->project_price }}
                                    </p>
                                </div>
                                <div class="USD skill">
                                    <p class="card-title p-auto m-auto  m-0 p-0 bullet_points point_highlighted ">
                                        USD
                                        {{ $project_detail->project_price_usd }}
                                    </p>
                                </div>
                            @else
                                <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">
                                    @if ($langSeg == 'ru')
                                        Цена по запросу
                                    @else
                                        {{ $project_detail->project_price }}
                                    @endif

                                </p>
                            @endif
                        </p>
                        {{-- PRICE --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- BEDROOMS --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->bedrooms}} </p>
                        {{--  --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- LOCATION --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->locationz->$name_var}} </p>
                        {{-- LOCATION --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- PROJECT TYPE --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">
                            @foreach ($project_detail->project_types as $project_type)
                                {{$project_type->$type_title_var}}
                            @endforeach
                        </p>
                        {{-- PROJECT TYPE --}}
                    </div>

                    <div style="height: 75px !important; border: 0.5px solid #ccc !important;"></div>

                    <div class="col-auto" >
                        {{-- DEVELOPER --}}
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$developers->$name_var}} </p>
                        {{-- DEVELOPER --}}
                    </div>

            </div>
        </div>
    </section>
@endif


{{-- project Intro description desktop & mobile--}}
@if ($langSeg == 'ar')
    <section class="desktop-show" dir="rtl">
        <div class="container-fluid containerization my-5" >

            <div class="row">

                <div class="col-md-7">
                    <h3 class="mb-4">{{ trans('frontLang.overview')}}</h3>
                </div>

                <div class="col-md-5 mx-auto">
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white btn-lg rounded-0 w-100 mx-auto testbutton shadow-none" style="background-color: #1c1c1c;">
                        {{ trans('frontLang.requestdetail') }}
                    </a>
                </div>

                <span style="color: grey !important; text-align: justify; pe-5">{!! $project_detail->$description_var !!}</span>

        </div>
    </section>

    <section class="mobile-show" >

        <div class="container-fluid containerization" id="mobile-info-section" dir="rtl">
            <div class="row py-3" style="margin-top: 0; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow py-3 px-1 mb-0 " style="color: #ccc !important;">

                    {{-- <div class="col-lg-12" style="display:flex;align-items: baseline"> --}}
                    <div class="row">


                        {{-- PRICING --}}
                        <div class="col-6" style="">
                            <p style="margin-right: 10px; font-size: .9em !important;" class="my-0">
                                {{ trans('frontLang.name') }}
                            </p>

                            <p style="color: #ccc; font-size: .9em" class="fw-bold">
                                {{ $project_detail->$title_var }}</span>
                            </p>

                        </div>



                        {{-- BEDROOMS --}}
                        <div class="col-6">

                            <p style="margin-right: 10px; font-size: .9em !important;" class="my-0">
                                {{ trans('frontLang.startingfrom') }}
                            </p>

                            @if(preg_match('/\d/', $project_detail->project_price))
                                <div class="AED skill " style="display: block !important">
                                    <p style="color: #ccc; font-size: .9em" class="">
                                        <span class="fw-bold"> {{ trans('frontLang.AED') }}
                                        {{ $project_detail->project_price }}</span>
                                    </p>
                                </div>
                                <div class="USD skill ">
                                    <p style="color: #ccc; font-size: .9em" class="">
                                        <span class="fw-bold">
                                            USD
                                            {{ $project_detail->project_price_usd }}
                                        </span>
                                    </p>
                                </div>
                            @else
                                <p style="color: #ccc; font-size: .9em" class="">
                                    <span class="fw-bold">
                                        اطلب السعر الان
                                    </span>
                                </p>
                            @endif


                        </div>


                    </div>


                    <div class="row">

                        {{-- BEDROOMS --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.bedrooms') }}   <br> <span class="fw-bold"> {{$project_detail->bedrooms}} </span></p>
                        </div>


                        {{-- LOCATION --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.location') }} <br> <span class="fw-bold"> {{$project_detail->locationz->$name_var}}</span></p>

                        </div>

                    </div>


                    <div class="row">

                        {{-- TYPE --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;">
                                @foreach ($project_detail->project_types as $project_type)
                                    {{ trans('frontLang.projectType') }} <br> <span class="fw-bold"> {{$project_type->$type_title_var}}</span>
                                @endforeach
                            </p>
                        </div>


                        {{-- developer --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.Developer') }} <br> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> <span class="fw-bold"> {{$developers->$name_var}}</span></a></p>
                        </div>

                    </div>

                    <div class="row">
                        {{-- COMPLETION YEAR --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.completionYear') }}  <br> <span class="fw-bold"> {{$project_detail->est_completion_en}}</span></p>
                        </div>

                        {{-- COMMUNITY TYPE --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.communitytype') }} <br> <span class="fw-bold"> {{$project_detail->$ownership_var}}</span></p>
                        </div>

                    </div>

                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white w-100 rounded-0">
                        {{ trans('frontLang.requestdetail') }}
                    </a>

                    {{-- <button class="first btn btn-white btn-lg btn-block mt-4  rounded-0 shadow-none">{{ trans('frontLang.requestdetail') }} </button> --}}

                </div>
            </div>


        </div>

        {{-- <div class="container-fluid containerization" id="mobile-info-section" dir="rtl">
            <div class="row" style="margin-top: 0; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow py-3 px-1 mb-0 " >

                    <div class="row">
                        <div class="col-6" style="">
                            <p style="margin-right: 10px" class="my-0">
                                {{ trans('frontLang.startingfrom') }}
                            </p>

                            @if(preg_match('/\d/', $project_detail->project_price))
                                <div class="AED skill " style="display: block !important">
                                    <p style="color: #ccc; font-size: 1em" class="">
                                        <span class="fw-bold"> {{ trans('frontLang.AED') }}
                                        {{ $project_detail->project_price }}</span>
                                    </p>
                                </div>
                                <div class="USD skill ">
                                    <p style="color: #ccc; font-size: 1em" class="">
                                       <span class="fw-bold">
                                            USD
                                            {{ $project_detail->project_price_usd }}
                                        </span>
                                    </p>
                                </div>
                            @else
                                <p style="color: #ccc; font-size: 1em" class="">
                                    <span class="fw-bold">
                                        اطلب السعر الان
                                    </span>
                                </p>
                            @endif

                        </div>

                        <div class="col-6">
                                <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white w-100 rounded-0">
                                    {{ trans('frontLang.requestdetail') }}
                                </a>
                        </div>
                    </div>

                    <p> {{ trans('frontLang.bedrooms') }}   <br> <span class="fw-bold"> {{$project_detail->bedrooms_ar}} </span></p>
                    <p> {{ trans('frontLang.location') }} <br> <span class="fw-bold"> {{$project_detail->locationz->$name_var}}</span></p>
                    <p> {{ trans('frontLang.name') }} <br> <span class="fw-bold"> {{$project_detail->$title_var}}</span></p>
                    <p>
                        @foreach ($project_detail->project_types as $project_type)
                            {{ trans('frontLang.projectType') }} <br> <span class="fw-bold"> {{$project_type->$type_title_var}}</span>
                        @endforeach
                    </p>

                    <p> {{ trans('frontLang.Developer') }} <br> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> <span class="fw-bold"> {{$developers->$name_var}}</span></a></p>

                    <p> {{ trans('frontLang.completionYear') }}  <br> <span class="fw-bold"> {{$project_detail->est_completion_en}}</span></p>

                    <p> {{ trans('frontLang.communitytype') }} <br> <span class="fw-bold"> {{$project_detail->$ownership_var}}</span></p>



                </div>
            </div>


        </div> --}}
    </section>


@else
    <section class="desktop-show" >
        <div class="container-fluid containerization my-5" >

            <div class="row">
                <div class="col-md-7">
                    <h3 class="mb-4">Overview</h3>

                </div>
                <div class="col-md-5 mx-auto">
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white btn-lg rounded-0 w-100 mx-auto testbutton shadow-none" style="background-color: ##1c1c1c;">
                        {{ trans('frontLang.requestdetail') }}
                    </a>
                </div>
                <span style="color: #ccc !important; text-align: justify; pe-5">
                    {!! $project_detail->$description_var !!}
                </span>
            </div>
        </div>
    </section>

    <section class="mobile-show" >
        <div class="container-fluid containerization" id="mobile-info-section">
            <div class="row py-3" style="margin-top: 0; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow py-3 px-1 mb-0 " style="color: #ccc !important;">

                    {{-- <div class="col-lg-12" style="display:flex;align-items: baseline"> --}}
                    <div class="row">


                        {{-- PRICING --}}
                        <div class="col-6" style="">
                            <p style="margin-right: 10px; font-size: .9em !important;" class="my-0">
                                {{ trans('frontLang.name') }}
                            </p>

                            <p style="color: #ccc; font-size: .9em" class="fw-bold">
                                {{ $project_detail->$title_var }}</span>
                            </p>

                        </div>



                        {{-- BEDROOMS --}}
                        <div class="col-6">

                            <p style="margin-right: 10px; font-size: .9em !important;" class="my-0">
                                {{ trans('frontLang.startingfrom') }}
                            </p>

                            @if(preg_match('/\d/', $project_detail->project_price))
                                <div class="AED skill " style="display: block !important">
                                    <p style="color: #ccc; font-size: .9em" class="">
                                        <span class="fw-bold"> {{ trans('frontLang.AED') }}
                                        {{ $project_detail->project_price }}</span>
                                    </p>
                                </div>
                                <div class="USD skill ">
                                    <p style="color: #ccc; font-size: .9em" class="">
                                        <span class="fw-bold">
                                            USD
                                            {{ $project_detail->project_price_usd }}
                                        </span>
                                    </p>
                                </div>
                            @else
                                <p style="color: #ccc; font-size: .9em" class="">
                                    <span class="fw-bold">
                                        @if ($langSeg == 'ru')
                                            Цена по запросу
                                        @else
                                            {{ $project_detail->project_price }}
                                        @endif
                                    </span>
                                </p>
                            @endif


                        </div>


                    </div>


                    <div class="row">

                        {{-- BEDROOMS --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.bedrooms') }}   <br> <span class="fw-bold"> {{$project_detail->bedrooms}} </span></p>
                        </div>


                        {{-- LOCATION --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.location') }} <br> <span class="fw-bold"> {{$project_detail->locationz->$name_var}}</span></p>

                        </div>

                    </div>


                    <div class="row">

                        {{-- TYPE --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;">
                                @foreach ($project_detail->project_types as $project_type)
                                    {{ trans('frontLang.projectType') }} <br> <span class="fw-bold"> {{$project_type->$type_title_var}}</span>
                                @endforeach
                            </p>
                        </div>


                        {{-- developer --}}
                        <div class="col-6">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.Developer') }} <br> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> <span class="fw-bold"> {{$developers->$name_var}}</span></a></p>
                        </div>

                    </div>

                    <div class="row">
                        {{-- COMPLETION YEAR --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.completionYear') }}  <br> <span class="fw-bold"> {{$project_detail->est_completion_en}}</span></p>
                        </div>

                        {{-- COMMUNITY TYPE --}}
                        <div class="col-6" style="">
                            <p style="font-size: .9em !important;"> {{ trans('frontLang.communitytype') }} <br> <span class="fw-bold"> {{$project_detail->$ownership_var}}</span></p>
                        </div>

                    </div>

                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white w-100 rounded-0">
                        {{ trans('frontLang.requestdetail') }}
                    </a>

                    {{-- <button class="first btn btn-white btn-lg btn-block mt-4  rounded-0 shadow-none">{{ trans('frontLang.requestdetail') }} </button> --}}

                </div>
            </div>


        </div>
    </section>
@endif




{{-- Overview Mobile --}}
@if($langSeg == 'ar')
    <section class="my-1 mobile-show" dir="rtl">
        <div class="container-fluid containerization my-3">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">{{ trans('frontLang.overview')}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span style="color: grey !important; text-align: justify; ">
                        {!! $project_detail->description_ar !!}
                    </span>

                    <style>
                        #lessen {
                            text-align: justify !important;
                        }

                        #moreen {
                            text-align: justify !important;
                        }

                        #text {
                            text-align: justify !important;
                        }
                    </style>


                    {{-- <span id="lessen" style="display: inline !important; font-size: 1em !important; line-height: 1.4 !important; font-weight: 300 !important; text-align: justify !important">
                        {{ strip_tags(substr($project_detail->$description_var, 0, 400)) }} ...
                    </span>

                    <br>

                    @if ( strlen(($project_detail->$description_var)) > 100 )

                        <span id="moreen" style="display: none !important; font-size: 1em !important; line-height: 1.4 !important;  font-weight: 300 !important; text-align: justify !important">
                            {{ strip_tags(html_entity_decode($project_detail->$description_var)) }}
                        </span>

                        <br>

                        <button onclick="myFunction2en()" class="btn btn-outline-white btn-sm rounded-0" id="readMoreBtnen">
                            Read more
                        </button>
                    @else
                        <br>
                        {!! html_entity_decode($project_detail->$description_var) !!}
                    @endif --}}
                </div>
            </div>
        </div>
    </section>
@else
    <section class="my-1 mobile-show">
        <div class="container-fluid containerization my-3">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-3">Overview</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span style="color: #ccc !important; text-align: justify; ">
                        {!! $project_detail->$description_var !!}
                    </span>

                    <style>
                        #lessen {
                            text-align: justify !important;
                        }

                        #moreen {
                            text-align: justify !important;
                        }

                        #text {
                            text-align: justify !important;
                        }
                    </style>


                    {{-- <span id="lessen" style="display: inline !important; font-size: 1em !important; line-height: 1.4 !important; font-weight: 300 !important; text-align: justify !important">
                        {{ strip_tags(substr($project_detail->$description_var, 0, 400)) }} ...
                    </span>

                    <br>

                    @if ( strlen(($project_detail->$description_var)) > 100 )

                        <span id="moreen" style="display: none !important; font-size: 1em !important; line-height: 1.4 !important;  font-weight: 300 !important; text-align: justify !important">
                            {{ strip_tags(html_entity_decode($project_detail->$description_var)) }}
                        </span>

                        <br>

                        <button onclick="myFunction2en()" class="btn btn-outline-white btn-sm rounded-0" id="readMoreBtnen">
                            Read more
                        </button>
                    @else
                        <br>
                        {!! html_entity_decode($project_detail->$description_var) !!}
                    @endif --}}
                </div>
            </div>
        </div>
    </section>
@endif



{{-- Image Slider MOBILE --}}
<section class="mobile-show my-5">
    <div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
        <style>
            .crousal-img-height {
                height: 400px !important;
            }
        </style>

        <div class="">

            <div class=" autoplay  slick-dotted">
                @foreach ($project_detail->images as $image)
                    <div>
                        <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}">
                            <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="crousal-img-height" style="height: 200px !important;">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



{{-- Amenities Mobile --}}
@if($langSeg == 'ar')
    <section class="mt-5 mb-5 mobile-show" dir="rtl">
        <div class="container">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)
                        @if($feature == $feature_id)
                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                <i class="far fa-check-circle"></i> &nbsp; {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
@else
    <section class="mt-5 mb-5 mobile-show">
        <div class="container">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)
                        @if($feature == $feature_id)
                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                <i class="far fa-check-circle"></i> &nbsp; {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
@endif



{{-- Payment Plan Mobile --}}
@if($langSeg == 'ar')
    @if ($project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')

            <section class="mt-5 mobile-show" dir="rtl">
                <div class="container-fluid containerization mt-5">
                        <h3 class="text-left mb-4">
                            <b>
                                {{ trans('frontLang.payment') }}
                            </b>
                        </h3>
                        <div class="row payment-plan-section-ar">


                            {!! $project_detail->$payment_plan_mob_var !!}

                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@else
    @if ($project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')

            <section class="mt-5 mobile-show">
                <div class="container-fluid containerization mt-5">
                        <h3 class="text-left mb-4">
                            <b>
                                {{ trans('frontLang.payment') }}
                            </b>
                        </h3>
                        <div class="row payment-plan-section text-left">

                            {!! $project_detail->$payment_plan_mob_var !!}

                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@endif

{{-- NEARBY PLACES MOBILE --}}
@if($langSeg == 'ar')
    <section class="mobile-show mt-5 mb-5 " dir="rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mt-5 mb-3">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row nearby-places-section-mobile-ar" >
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>
@elseif($langSeg == 'en')
    <section class="mobile-show mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mt-5 mb-3">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row nearby-places-section-mobile" >
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endif

{{-- SHARE MOBILE --}}
@if($langSeg == 'ar')
    <div class="my-5 mobile-show">

        <p class="mx-auto text-center my-3 bullet_points" style="text-align: center !important" >
            <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
            {{ trans('frontLang.agentCardShare') }}
        </p>

        <div class="row my-3">
            <div class="col-6 mx-auto mb-2">
                <div class="mx-auto ">
                    <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                        <li class="  text-white  text-center px-1 mx-auto my-2" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@elseIF($langSeg == 'en')
    <div class="my-5 mobile-show">

        <p class="mx-auto text-center my-3 bullet_points" style="text-align: center !important" >
            <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
            {{ trans('frontLang.agentCardShare') }}
        </p>

        <div class="row my-3">
            <div class="col-6 mx-auto mb-2">
                <div class="mx-auto ">
                    <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                        <li class="  text-white  text-center px-1 mx-auto my-2" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>

                        <li class="  text-white  text-center px-1 mx-auto my-2">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 26px !important; width: auto !important">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif


{{-- ABOUT THE COMMUNITY --}}
@if($langSeg =='ar')
    <section class="mb-5 mobile-show" dir="rtl">
        <div class="container-fluid containerization">

            <hr>

            <div class="row mb-5">

                <div class="col-md-6">
                    <h3 class="my-3">{{ trans('frontLang.Aboutthecoomunity') }}</h3>

                    <style>
                        p {
                            text-align: justify !important;
                            font-weight: 300 !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>


                <div class="col-md-6">
                    <style>
                        iframe{
                            width: 100%;
                            height: 300px !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>

            </div>

        </div>
    </section>
@else
    <section class="mb-5 mobile-show">
        <div class="container-fluid containerization">

            <hr>

            <div class="row mb-5">

                <div class="col-md-6">
                    <h3 class="my-3">{{ trans('frontLang.Aboutthecoomunity') }}</h3>

                    <style>
                        p {
                            text-align: justify !important;
                            font-weight: 300 !important;
                            line-height: 1.3 !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>


                <div class="col-md-6">
                    <style>
                        iframe{
                            width: 100%;
                            height: 300px !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>

            </div>

        </div>
    </section>
@endif




{{-- PROJECT BULLET POINT - DESKTOP & MOBILE --}}
{{-- @if($langSeg == 'ar')
     <section class="desktop-show" dir="rtl">
        <div class="container-fluid containerization my-5" >
            <div class="row" >
                <style>
                    .bullet_points {
                        font-size: 20px !important;
                        text-align: center !important;
                    }
                </style>
                <div class="col-md-6">
                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>
                    <p class="m-0 p-0 bullet_points">
                        <div class="AED skill" style="display: block !important">
                            <p class="card-title p-auto m-auto m-0 p-0 bullet_points">

                                {{ $project_detail->project_price }}
                                {{ trans('frontLang.AED') }}

                            </p>
                        </div>

                        <div class="USD skill">
                            <p class="card-title p-auto m-auto  m-0 p-0 bullet_points" >

                                {{ $project_detail->project_price_usd }}
                                USD

                            </p>
                        </div>
                    </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$project_detail->bedrooms_ar}} </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$project_detail->locationz->$name_var}} </p>
                </div>

                <div class="col-md-6">
                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectname') }} </p>
                    <p class="m-0 p-0 bullet_points"> {{$project_detail->$title_var}} </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                    <p class="m-0 p-0 bullet_points">
                        @foreach ($project_detail->project_types as $project_type)
                            {{$project_type->$type_title_var}}
                        @endforeach
                    </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$developers->$name_var}} </p>
                </div>


            </div>
        </div>
    </section>
@else
    <section class="desktop-show" >
        <div class="container-fluid containerization my-5" >
            <div class="row" >
                <style>
                    .bullet_points {
                        font-size: 20px !important;
                        text-align: center !important;
                    }
                </style>
                <div class="col-md-6">
                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>
                    <p class="m-0 p-0 bullet_points">
                        <div class="AED skill" style="display: block !important">
                            <p class="card-title p-auto m-auto m-0 p-0 bullet_points">

                                {{ $project_detail->project_price }}
                                {{ trans('frontLang.AED') }}

                            </p>
                        </div>

                        <div class="USD skill">
                            <p class="card-title p-auto m-auto  m-0 p-0 bullet_points" >

                                {{ $project_detail->project_price_usd }}
                                USD

                            </p>
                        </div>
                    </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$project_detail->bedrooms_ar}} </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$project_detail->locationz->$name_var}} </p>
                </div>

                <div class="col-md-6">
                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectname') }} </p>
                    <p class="m-0 p-0 bullet_points"> {{$project_detail->$title_var}} </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                    <p class="m-0 p-0 bullet_points">
                        @foreach ($project_detail->project_types as $project_type)
                            {{$project_type->$type_title_var}}
                        @endforeach
                    </p>

                    <br>
                    <br>

                    <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                    <p class="m-0 p-0 bullet_points">  {{$developers->$name_var}} </p>
                </div>


            </div>
        </div>
    </section>
@endif --}}



{{-- PROJECT IMAGE CAROUSEL --}}
<section class="desktop-show my-5">
    <div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
        <style>
            .crousal-img-height {
                height: 500px !important;
            }
        </style>

        <div class="">

            <div class=" autoplay  slick-dotted">
                @foreach ($project_detail->images as $image)
                    <div>
                        <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}">
                            <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="crousal-img-height" style="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- PROJECT AMENITIES / COMMUNITY / MAPS --}}
@if ($langSeg == 'ar')

    <section class="mt-5 mb-5 desktop-show" dir="rtl">
        <div class="container-fluid containerization my-5">
            <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)
                            @if($feature == $feature_id)
                                <div class="col-lg-3 mb-4" style="color: #fff">
                                    <span >{!!  $feature_name[$name_var] !!}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

            </div>

        </div>
    </section>

    {{-- PAYMENT PLAN --}}
    @if ( $project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')
            <section class="mt-4 desktop-show" dir="rtl">
                <div class="container-fluid containerization">
                        <h3 class="mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row">
                            <style>
                                .inner {
                                    background-color: #1c1c1c !important;
                                    color: #ccc !important;
                                    border: 0px #ccc solid !important;
                                    text-align: right !important;
                                }
                                .icon {
                                    color: #ccc !important;
                                }
                            </style>
                            {!! $project_detail->$payment_var !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    {{-- NEARBY PLACES --}}
    <section class="desktop-show mt-5 mb-5 " dir="rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row" >
                            <style>
                                .table-bordered {
                                    background-color: #1c1c1c !important;
                                    border: 0.5px #ccc solid !important;
                                    text-align: center !important;
                                }
                                td {
                                    color: #ccc !important;
                                    padding: 10px !important;
                                    text-align: center !important;
                                }
                            </style>
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>


    <section class="mt-5 mb-5 pb-3 desktop-show"  dir="rtl">
        <div class="container-fluid containerization">
            <hr>
            <div class="row pb-5">
                <div class="col-md-6">
                    <style>
                        iframe{
                            width: 100%;
                        }
                    </style>
                    <h3 class="mb-5"> {{ trans('frontLang.locationMap') }}</h3>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>

                <div class="col-md-6">
                    <h3 class="mb-5">{{ trans('frontLang.Aboutthecoomunity') }}</h3>

                    <style>
                        p {
                            text-align: justify !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>

            </div>

        </div>
    </section>

@else

    {{-- AMENITIES --}}
    <section class="mt-5 mb-5 desktop-show">
        <div class="container-fluid containerization my-5">
            <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)
                            @if($feature == $feature_id)
                                <div class="col-lg-3 mb-4" style="color: #ccc">
                                    <i class="far fa-check-circle"></i>  <span >{!!  $feature_name[$name_var] !!}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

            </div>

        </div>
    </section>



    {{-- PAYMENT PLAN --}}
    @if ( $project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')
            <section class="mt-4 desktop-show">
                <div class="container-fluid containerization">
                        <h3 class="text-left mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row">
                            <style>
                                .inner {
                                    background-color: #1c1c1c !important;
                                    color: #ccc !important;
                                    border: 0px #ccc solid !important;
                                    text-align: left !important;
                                }
                                .icon {
                                    color: #ccc !important;
                                }
                            </style>
                            {!! $project_detail->$payment_var !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif


    {{-- NEARBY PLACES --}}
    <section class="desktop-show mt-5 mb-5 ">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row" >
                            <style>
                                .table-bordered {
                                    background-color: #1c1c1c !important;
                                    border: 0.5px #ccc solid !important;
                                    text-align: center !important;
                                }
                                td {
                                    color: #ccc !important;
                                    padding: 10px !important;
                                    text-align: center !important;
                                }
                            </style>
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>



    <section class="desktop-show my-5 py-5 ">
        <div class="container-fluid containerization">
            <div class="row  mx-auto my-5 " style="width: 50% !important;">
                <p class="mx-auto text-center my-3 bullet_points" style="text-align: center !important" >
                    <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
                    {{ trans('frontLang.agentCardShare') }}
                </p>
                <div class="col-12 mx-auto mb-2">
                    <div class="mx-auto ">
                        <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                        <li class=" text-white  text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 26px !important; width: 100% !important">
                            </a>
                        </li>

                        <li class=" text-white text-center px-1 mx-auto">
                            <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 26px !important; width: 100% !important">
                            </a>
                        </li>

                        <li class=" text-white text-center px-1 mx-auto">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 26px !important; width: 100% !important">
                            </a>
                        </li>

                        <li class=" text-white text-center px-1 mx-auto">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 26px !important; width: 100% !important">
                            </a>
                        </li>
                    </ul>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    {{-- <section class="my-5 mobile-show">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Overview</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span style="color: grey !important; text-align: justify">{!! $project_detail->$description_var !!}</span>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="second mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class=" row">
                <h3 class="text-center mb-5">{{ trans('frontLang.requestdetail') }}</h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_project_detail/submit')}}">
                        @csrf

                            <input type="hidden" id="custId" name="url_path" value="{{Request::path()}}">
                            <input type="hidden" name="project" value="{{$project_detail->id}}" />
                            <div class="mb-4">
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
                            @honeypot
                            <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="mt-5 mb-5 ">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row" >
                            <style>
                                .table-bordered {
                                    background-color: #000 !important;
                                    border: 0.5px #848484 solid !important;
                                }
                                td {
                                    color: #848484 !important;
                                }
                            </style>
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section> --}}



    {{-- COMMUNITIES --}}
    <section class="mb-5 desktop-show">
        <div class="container-fluid containerization">
            <hr>
            <div class="row mb-5">
                <div class="col-md-6">
                    <style>
                        iframe{
                            width: 100%;
                            height: 80%;
                        }
                    </style>
                    <h3 class="my-4"> {{ trans('frontLang.locationMap') }}</h3>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>
                <div class="col-md-6">
                    <h3 class="my-4">{{ trans('frontLang.Aboutthecoomunity') }}</h3>
                    <style>
                        p {
                            text-align: justify !important;
                            line-height: 1.8 !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}

                </div>

            </div>

        </div>
    </section>

@endif


{{-- MODALS --}}
@if ($langSeg == 'ar')
    <div class="modal fade" id="exampleModal-download" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="direction: rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        تحميل الكتيب </h5>
                    <button type="button" class="btn-close" style="margin:0; " data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <p>يرجى تقديم التفاصيل الخاصة بك لتنزيل الكتيب</p>
                        <div class="col-lg-12">

                            <form class="contact-form" method="post" action="{{URL('/project_document/submit')}}">
                                @csrf

                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                <input type="text" name="utm_medium" class="utm_parameters" hidden>

                                @foreach ($project_detail->documents as $document)
                                    <input type="hidden" id="custId" name="document_id" value="{{$document->project_id}}">
                                    <input type="hidden" id="custId" name="document_name" value="{{$document->document}}">
                                @endforeach
                                <input type="hidden" id="custId" name="url_path" value="{{Request::path()}}">
                                <input type="hidden" name="project" value="{{$project_detail->id}}" />
                                <div class="mb-4">
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
                                @honeypot
                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                    {{ trans('frontLang.submit') }}
                                </button>
                            </form>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
@else
    <div class="modal fade" id="exampleModal-download" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.brochuredownload') }} </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <p>{{ trans('frontLang.brocuredetails') }}</p>
                        <div class="col-lg-12">

                            <form class="contact-form" method="post" action="{{URL('/project_document/submit')}}">
                                @csrf

                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                <input type="text" name="utm_medium" class="utm_parameters" hidden>

                                @foreach ($project_detail->documents as $document)
                                    <input type="hidden" id="custId" name="document_id" value="{{$document->project_id}}">
                                    <input type="hidden" id="custId" name="document_name" value="{{$document->document}}">
                                @endforeach
                                <input type="hidden" id="custId" name="url_path" value="{{Request::path()}}">
                                <input type="hidden" name="project" value="{{$project_detail->id}}" />
                                <div class="mb-4">
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
                                @honeypot
                                <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                    {{ trans('frontLang.submit') }}
                                </button>
                            </form>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endif

<script>
    $('.autoplay').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        dots: true,
        autoplaySpeed: 1000,
        centerMode: true,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                arrows: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
        ]
    });





    $(document).ready(function () {
        $("#skill_dropdown").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(".skill_mobile").hide();
            $(eleBox).show();
        });
    });


    $(document).ready(function () {
        $("#skill_dropdown_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(".skill_mobile").hide();
            $(eleBox).show();
        });
    });


</script>


<script>
    function myFunction2en() {
        var dots = document.getElementById("lessen");
        var moreText = document.getElementById("moreen");
        var btnText = document.getElementById("readMoreBtnen");

        if (moreText.style.display === "none")
        {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        } else {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        }
    }
</script>
@endsection
