
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
            color: #000 !important;
        }
        a {
            color: #000 !important;
        }
    </style>

@section('content')

<style>
  p{
    line-height: 1.6 !important;
    color: #fff !important;
  }
  .card {
        color: #fff !important;
        background-color: #000 !important;
        border: 0.5px solid gray !important;
        border-radius: 0 !important;
    }
    td > a {
        color: #fff !important;
    }
    input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
    }

    @media only screen and (max-width: 800px) {
        .slick-track {
            height: 200px !important;
        }
    }

    .card {
        z-index: 1 !important;
    }

    .slick-slide {
        height: auto !important;
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
</style>

<section class="mobile-show">

        <div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
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
        </div>
</section>


<section class="desktop-show " style="text-align: center">
    <div class="d-flex justify-content-center">


    @foreach($project_detail->images  as $single_img)
            @if($project_detail->images->first()==$single_img)
                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}" style="height: 700px" class="card-img-top" alt="">
                <div class="" style=" position: absolute; top: 250px; color:#fff ">
                    <h1 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->$title_var}}</b></h1>
                    <h3 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->locationz->$name_var}}</b></h3>

                    <style>
                        .testbutton:hover {
                            background-color: #ffffff !important;
                            color: black !important;
                            border: #fff solid !important;
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
            <div class="modal-body bg-black rounded-0">
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




{{-- project description desktop & mobile--}}
@if ($langSeg == 'ar')
    <section class="desktop-show" dir="RTL">
        <div class="container-fluid containerization mt-5" >

            <div class="row">
                <div class="col-md-8">
                    <h3 class="mb-4">Overview</h3>
                </div>
                <div class="col-md-4 mx-auto text-left">
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white btn-lg rounded-0 w-50 mx-auto testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <span style="color: grey !important; text-align: justify">{!! $project_detail->$description_var !!}</span>
                </div>

                <div class="col-md-4">
                    <style>
                        .bullet_points {
                            font-size: 20px !important;
                            text-align: left !important;
                        }

                        .point_highlighted {
                            font-weight: 800 !important;
                        }
                    </style>
                    <span class="text-left">
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>
                        <p class="m-0 p-0 bullet_points">
                            <div class="AED skill" style="display: block !important">
                                <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">

                                    {{ $project_detail->project_price }}
                                    {{ trans('frontLang.AED') }}

                                </p>
                            </div>

                            <div class="USD skill">
                                <p class="card-title p-auto m-auto  m-0 p-0 bullet_points" point_highlighted >

                                    {{ $project_detail->project_price_usd }}
                                    USD

                                </p>
                            </div>
                        </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->bedrooms_ar}} </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->locationz->$name_var}} </p>


                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectname') }} </p>
                        <p class="m-0 p-0 bullet_points point_highlighted"> {{$project_detail->$title_var}} </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">
                            @foreach ($project_detail->project_types as $project_type)
                                {{$project_type->$type_title_var}}
                            @endforeach
                        </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$developers->$name_var}} </p>

                    </span>

                </div>
            </div>


            {{-- <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Overview</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span style="color: grey !important; text-align: justify">{!! $project_detail->$description_var !!}</span>
                </div>
            </div> --}}


        </div>
    </section>



    <section class="mobile-show" style="direction: rtl">
        <div class="container">
            <div class="row" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5  bg-black text-white border border-1 border-white" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> : <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></p>
                    <p><b> {{ trans('frontLang.bedrooms') }}  </b> : {{$project_detail->bedrooms}} </p>
                    <p><b> {{ trans('frontLang.completionYear') }} </b> : {{$project_detail->est_completion_en}}</p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> :  ???????? ????</p>
                    <h3>{{ trans('frontLang.startingfrom') }} <b> :  {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h3>

                    <div class="col-lg-12">
                        <button class="first btn btn-white rounded-0 shadow-none btn-lg btn-block mt-4 " >{{ trans('frontLang.requestdetail') }} </button>
                    </div>

                </div>
            </div>


        </div>
    </section>


@else
    <section class="desktop-show" >
        <div class="container-fluid containerization my-5" >

            <div class="row">
                <div class="col-md-8">
                    <h3 class="mb-4">Overview</h3>
                </div>

                <div class="col-md-4 mx-auto text-left">
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white btn-lg rounded-0 w-50 mx-auto testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <span style="color: grey !important; text-align: justify">{!! $project_detail->$description_var !!}</span>
                </div>

                <div class="col-md-4">
                    <style>
                        .bullet_points {
                            font-size: 20px !important;
                            text-align: left !important;
                        }

                        .point_highlighted {
                            font-weight: 800 !important;
                        }
                    </style>
                    <span class="text-left">
                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.startingfrom') }} </p>
                        <p class="m-0 p-0 bullet_points">
                            <div class="AED skill" style="display: block !important">
                                <p class="card-title p-auto m-auto m-0 p-0 bullet_points point_highlighted">

                                    {{ $project_detail->project_price }}
                                    {{ trans('frontLang.AED') }}

                                </p>
                            </div>

                            <div class="USD skill">
                                <p class="card-title p-auto m-auto  m-0 p-0 bullet_points" point_highlighted >

                                    {{ $project_detail->project_price_usd }}
                                    USD

                                </p>
                            </div>
                        </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.bedrooms') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->bedrooms_ar}} </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.location') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$project_detail->locationz->$name_var}} </p>


                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectname') }} </p>
                        <p class="m-0 p-0 bullet_points point_highlighted"> {{$project_detail->$title_var}} </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.projectType') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">
                            @foreach ($project_detail->project_types as $project_type)
                                {{$project_type->$type_title_var}}
                            @endforeach
                        </p>

                        <br>

                        <p class="m-0 p-0 bullet_points">{{ trans('frontLang.Developer') }}</p>
                        <p class="m-0 p-0 bullet_points point_highlighted">  {{$developers->$name_var}} </p>

                    </span>

                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Overview</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span style="color: grey !important; text-align: justify">{!! $project_detail->$description_var !!}</span>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-md-12 mx-auto text-center">
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-outline-white btn-lg rounded-0 w-50 mx-auto testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a>
                </div>
            </div> --}}
        </div>
    </section>

    <section class="mobile-show">
        <div class="container">
            <div class="row" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5 bg-black text-white border border-1 borrder-white" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> : <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></p>
                    <p><b> {{ trans('frontLang.bedrooms') }}  </b> : {{$project_detail->bedrooms}}</p>
                    <p><b> {{ trans('frontLang.completionYear') }}  </b> : {{$project_detail->est_completion_en}}</p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> : {{$project_detail->$ownership_var}}</p>
                    <div class="col-lg-12" style="display:flex;align-items: baseline">
                        <p style="margin-right: 10px"><b>{{ trans('frontLang.startingfrom') }}</b> </p>

                        <div class="AED skill" style="display: block !important"> <h6 style="color: #fff"> {{$project_detail->project_price}} {{ trans('frontLang.AED') }}</h6></div>
                        <div class="USD skill"> <h6 style="color: #fff">  {{ $project_detail->project_price_usd }} USD </h6></div>
                        {{-- <select class="" name="skill_dropdown" id="skill_dropdown" style="width: 80px;margin-left:10px;margin-top: -9px;">

                            <option value="AED">AED</option>
                            <option value="USD">USD</option>

                        </select> --}}
                    </div>
                        <button class="first btn btn-white btn-lg btn-block mt-4  rounded-0 shadow-none">{{ trans('frontLang.requestdetail') }} </button>
                    </div>

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
                height: 400px !important;
            }
        </style>
        <div class="">

            <div class=" autoplay  slick-dotted">
                @foreach ($project_detail->images as $image)
                    <div>
                        <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="crousal-img-height" style="">
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

    <section class="mt-5 mobile-show"  dir="rtl">
        <div class="container">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)
                        @if($feature == $feature_id)
                            <div class="col-lg-3 mb-2" style="width: 50%; color: #fff !important;" >
                                <i class="far fa-check-circle"></i> {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>


    <section class="mt-5 mb-5"  dir="rtl">
        <div class="container-fluid containerization">
            <hr>
            <div class="row">
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

    <section class="mt-5 mb-5 desktop-show">
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

    <section class="mt-5 mb-5 mobile-show">
        <div class="container">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)
                        @if($feature == $feature_id)
                            <div class="col-lg-3 mb-2" style="width: 50%; color: #fff !important;" >
                                <i class="far fa-check-circle"></i> {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

    @if ( $project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')
            <section class="mt-4 desktop-show">
                <div class="container-fluid containerization">
                        <h3 class="text-left mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row bg-black">
                            <style>
                                .inner {
                                    background-color: #000 !important;
                                    color: #fff !important;
                                    border: 0px #848484 solid !important;
                                    text-align: left !important;
                                }
                                .icon {
                                    color: #fff !important;
                                }
                            </style>
                            {!! $project_detail->$payment_var !!}
                        </div>


                    </div>
                </div>
            </section>

            <section class="mt-4 mobile-show">
                <div class="container">
                        <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row">
                            {!! $project_detail->$payment_plan_mob_var !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif



    <section class="mt-5 mb-5 ">
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
                                    color: #fff !important;
                                }
                            </style>
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="my-5 mobile-show">
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
    </section>

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


    <section class="mb-5">
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
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>

            </div>

        </div>
    </section>

@endif



@if ($langSeg == 'ar')
    <div class="modal fade" id="exampleModal-download" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="direction: rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        ?????????? ???????????? </h5>
                    <button type="button" class="btn-close" style="margin:0; " data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <p>???????? ?????????? ???????????????? ???????????? ???? ???????????? ????????????</p>
                        <div class="col-lg-12">

                            <form class="contact-form" method="post" action="{{URL('/project_document/submit')}}">
                                @csrf
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
        slidesToShow: 3,
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
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

        // fade: true,
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
@endsection
