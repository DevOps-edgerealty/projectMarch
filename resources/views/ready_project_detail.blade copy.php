
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


@section('content')

<style>
  p{
    line-height: 1.6 !important;
  }
  input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
    }
    .card {
        background-color: #000 !important;
        color: #fff !important;
    }
    td > a {
        color: #fff !important;
    }
    @media only screen and (max-width: 800px) {
        .slick-track {
            height: 200px !important;
        }
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
   $near_by_places_var = "near_by_places_" . trans('backLang.boxCode');
   $title_var = "title_" . trans('backLang.boxCode');
   $address_var = "address_" . trans('backLang.boxCode');
   $ownership_var = "ownership_" . trans('backLang.boxCode');

   $community_var = "community_" . trans('backLang.boxCode');
   $feature_title_var = "name_" . trans('backLang.boxCode');
   $description_var = "description_" . trans('backLang.boxCode');
   $payment_plan_var = "payment_plan_" . trans('backLang.boxCode');
   $unit_size_var = "unit_size_" . trans('backLang.boxCode');
   $firstimage=true;
   $secondimage=true;



?>


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

                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}" style="height: 800px;background-color: #000" class="card-img-top" alt="">

                <div  style=" position: absolute; top: 250px; color:#fff ">
                    <h1 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->$title_var}}</b></h1>
                    <h3 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->locationz->$name_var}}</b></h3>
                    <style>
                        .testbutton:hover {
                            background-color: #ffffff !important;
                            color: black !important;
                            border: #fff solid !important;

                        }
                    </style>
                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn bg-black text-white btn-lg mt-4 rounded-0 w-100 testbutton shadow-none">
                        {{ trans('frontLang.requestdetail') }}
                    </a>

                </div>
            @endif
    @endforeach
    </div>
</section>








@if ($langSeg == 'ar')
    <section class="desktop-show" style="direction: rtl">
        <div class="container-fluid containerization">

            <div class="row shadow p-3 mb-5 bg-black" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-7" >
                    <div class="row ">
                        <div class="col-lg-3">
                            <h5><b>إسم المشروع</b> </h5>
                            <h5><b>{{ trans('frontLang.projectType') }} </b></h5>
                            <h5><b>{{ trans('frontLang.Developer') }}</b></h5>
                        </div>
                        <div class="col-lg-9">
                            <h5> <span style="font-weight:400;font-size: 15px;">{{$project_detail->$title_var}}</span></h5>
                            <h5>

                                <span style="font-weight:400;font-size: 15px;">
                                    @foreach ($project_detail->project_types as $project_type)
                                        {{$project_type->$type_title_var}}
                                    @endforeach
                                </span>

                            </h5>
                            <h5> <span style="font-weight:400;font-size: 15px;"> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}" class="text-white"> {{$developers->$name_var}}</a></span></h5>



                        </div>
                    </div>


                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5><b>{{ trans('frontLang.location') }}</b></h5>
                            <h5><b>{{ trans('frontLang.bedrooms') }}</b> </h5>
                            <h5><b>{{ trans('frontLang.communitytype') }}</b></h5>
                        </div>
                        <div class="col-lg-8">
                            <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->locationz->$name_var}}</span></h5>
                            <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->bedrooms_ar}}</span></h5>
                            <h5> <span style="font-weight:400;font-size: 15px;"> {{$project_detail->$ownership_var}}</span></h5>
                        </div>
                    </div>


                </div>
            </div>





        </div>
    </section>





    <section class="mobile-show" style="direction: rtl">
        <div class="container">
            <div class="row bg-black border border-1 border-white" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5 " >
                    <h3>إسم المشروع : {{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b>{{ trans('frontLang.projectType') }} </b> :
                        @foreach ($project_detail->project_types as $project_type)
                            {{$project_type->$type_title_var}}
                        @endforeach
                    </p>

                    <p><b> {{ trans('frontLang.Developer') }} </b> : <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}" class="text-white"> {{$developers->$name_var}}</a></p>
                    <p><b> {{ trans('frontLang.bedrooms') }} </b>: {{$project_detail->bedrooms}} </p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> : تملك حر</p>
                    <div class="col-lg-12">
                        <style>
                            .testbutton:hover {
                                background-color: #ffffff !important;
                                color: black !important;
                                border: 0.5px #fff solid !important;

                            }
                        </style>
                        {{-- <a data-mdb-toggle="modal" data-mdb-target="#requestDetails"  class="btn bg-black text-white testbutton btn-lg btn-block mt-4 rounded-0 shadow-none" style="border: 0.5px #fff solid">
                            {{ trans('frontLang.requestdetail') }}
                        </a> --}}
                        <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn bg-black text-white btn-lg rounded-0 w-100 p-0 m-0 testbutton shadow-none">
                            {{ trans('frontLang.requestdetail') }}
                        </a>
                    </div>

                </div>
            </div>


        </div>
    </section>


@else
    <section class="desktop-show" >
        <div class="container-fluid containerization">
            <div class="row shadow p-3 mb-5 bg-black border border-1 border-white" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-7" >
                    <div class="row">
                        <div class="col-lg-4">
                            <h3>
                                <b>
                                    {{ trans('frontLang.startingfrom') }}
                                </b>
                            </h3>
                            <h5><b>{{ trans('frontLang.projectname') }}</b> </h5>
                            <h5><b>{{ trans('frontLang.projectType') }} </b></h5>
                            <h5><b>{{ trans('frontLang.Developer') }}</b></h5>
                        </div>
                        <div class="col-lg-8">
                            <h3>
                                <b>
                                    Price On Request
                                </b>
                            </h3>
                            <h5> <span style="font-weight:400;font-size: 15px;">{{$project_detail->$title_var}}</span></h5>
                            <h5>

                                <span style="font-weight:400;font-size: 15px;">
                                    @foreach ($project_detail->project_types as $project_type)
                                        {{$project_type->$type_title_var}}
                                    @endforeach
                                </span>

                            </h5>
                            <h5>
                                <span style="font-weight:400;font-size: 15px;">
                                    <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}" class="text-white">
                                        {{$developers->$name_var}}
                                    </a>
                                </span>
                            </h5>
                        </div>
                    </div>






                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-5">

                            <h5><b>{{ trans('frontLang.location') }}</b></h5>
                            <h5><b>{{ trans('frontLang.bedrooms') }}</b> </h5>
                            <h5><b>{{ trans('frontLang.communitytype') }}</b></h5>
                        </div>
                        <div class="col-lg-7">
                            <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->locationz->$name_var}}</span></h5>
                            <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->bedrooms}}</span></h5>
                            <h5> <span style="font-weight:400;font-size: 15px;"> {{$project_detail->$ownership_var}}</span></h5>
                        </div>
                    </div>




                </div>
            </div>





        </div>
    </section>

    <section class="mobile-show">
        <div class="container">
            <div class="row bg-black border border-1 border-white" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> :  <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}" class="text-white"> {{$developers->$name_var}}</a></p>
                    <p>
                        <b>{{ trans('frontLang.projectType') }} </b>:

                        @foreach ($project_detail->project_types as $project_type)
                            {{$project_type->$type_title_var}}
                        @endforeach
                    </p>

                    <p><b> {{ trans('frontLang.communitytype') }} </b> : {{$project_detail->$ownership_var}}</p>
                    <p><b> {{ trans('frontLang.bedrooms') }} </b>: {{$project_detail->bedrooms}} </p>
                    <p><b>{{ trans('frontLang.startingfrom') }}</b> : Price On Request</p>

                    <div class="col-lg-12">
                        <style>
                            .testbutton:hover {
                                background-color: #ffffff !important;
                                color: black !important;
                                border: 0.5px #fff solid !important;
                            }

                            .testbutton {
                                border: 0.5px #848484 solid !important;
                            }
                        </style>
                        <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn bg-black text-white btn-lg rounded-0 w-100 m-0 testbutton shadow-none">
                            {{ trans('frontLang.requestdetail') }}
                        </a>
                    </div>

                </div>
            </div>


        </div>
    </section>
@endif

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





{{-- @if ( $project_detail->pro_status == '1')
    @if  ($project_detail->payment_en != '')
        <section class="mt-4 desktop-show">
            <div class="container-fluid containerization">
                    <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                    <div class="row ">
                        <span style="text-align: justify !important;">
                            {!! $project_detail->payment_en !!}
                        </span>
                    </div>


                </div>
            </div>
        </section>

        <section class="mt-4 mobile-show">
            <div class="container">
                    <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                    <div class="row">
                        {!! $project_detail->payment_plan_mob_en !!}
                    </div>


                </div>
            </div>
        </section>

    @endif
@endif --}}

@if ($langSeg == 'ar')
    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="mb-3">عن المشروع</h3>
                    <span style="text-align: justify !important; color: #848484 !important;">
                        {!! $project_detail->$description_var !!}

                    </span>
                </div>


            </div>

        </div>



    </section>
@else
    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="mb-3">{{ trans('frontLang.aboutproject') }}</h3>
                    <span style="text-align: justify !important; color: #848484 !important;">
                        {!! $project_detail->$description_var !!}

                    </span>
                </div>


            </div>

        </div>



    </section>
@endif


<!--<section class="desktop-show">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                @foreach ($project_detail->documents as $document)-->
<!--                    <a href="#"  class="btn btn-dark btn-lg mx-5"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-download" >{{ trans('frontLang.brochure') }}</a>-->
<!--                @endforeach-->

<!--            </div>-->
<!--        </div>-->

<!--    </div>-->
<!--</section>-->


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
                                @honeypot
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
                                @honeypot
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


<!--<section class="mobile-show">-->
<!--    <div class="container ">-->
<!--        <div class="row ">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                @foreach ($project_detail->documents as $document)-->
<!--                <a href="#"  class="btn btn-dark btn-lg mx-5"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-download" >{{ trans('frontLang.brochure') }}</a>-->
<!--                @endforeach-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<section class="mt-5 mb-5">
    <div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">

        <div class="wrapper-2">


            <div class="carousel-2">
                @foreach ($project_detail->images as $image)
                    <div>
                        <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="crousal-img-height">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</section>


@if ($langSeg == 'ar')
    <section class="mt-5 mb-5 desktop-show" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                                <div class="col-lg-3 mb-4" style="color: #848484 !important;">
                                    <i class="far fa-check-circle"> </i> {!!  $feature_name[$name_var] !!}
                                </div>
                            @endif
                        @endforeach
                    @endforeach

            </div>

        </div>
    </section>

    <section class="mt-5 mobile-show" style="direction: rtl">
        <div class="container">
            <div class="row">
                <h3 class="mb-5 ">{{ trans('frontLang.amenities') }}</h3>

                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)


                        @if($feature == $feature_id)

                            <div class="col-lg-3 mb-2" style="width: 50%; color: #848484 !important;">
                                <i class="far fa-check-circle"> </i> {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="second mt-5 mb-5">
        <div class="container-fluid containerization mobile-show">
            <div class=" row">
                <h3 class="text-center mb-5">{{ trans('frontLang.requestdetail') }}</h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_project_detail/submit')}}">
                        @csrf
                        @honeypot
                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                        <input type="text" name="utm_medium" class="utm_parameters" hidden>

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
                            <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="mt-5 mb-5 " style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">مناطق قريبة</h3>
                    <div class="col-lg-12">

                        <div class="row" >

                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}

                        </div>

                    </div>



            </div>

        </div>
    </section> --}}

    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">حول المجتمع</h3>
                {!!html_entity_decode($project_detail->community_ar)!!}

            </div>

            <div class="row d-flex h-100">

                <div class="col-md-6">
                    <h3 class="mb-3">عن المنطقة</h3>
                    <style>
                        p {
                            color: #848484 !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->community_ar)!!}
                </div>

                <div class="col-md-6">
                    <h3 class="mb-3">
                        {{ trans('frontLang.Aboutthecoomunity') }}
                    </h3>
                    <style>
                        p {
                            color: #848484 !important;
                            text-align: justify !important;
                        }
                        iframe {
                            width: 100% !important;
                            max-height: 350px !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>



            </div>

        </div>
    </section>
@else
    <section class="mt-5 mb-5 desktop-show">
        <div class="container-fluid containerization">
            <div class="row">
                    <h3 class="mb-3">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                                <div class="col-lg-3 mb-4" style="color: #848484 !important;">
                                    <i class="far fa-check-circle"> </i> {!!  $feature_name[$name_var] !!}
                                </div>
                            @endif
                        @endforeach
                    @endforeach

            </div>

        </div>
    </section>

    <section class="mt-5 mobile-show">
        <div class="container">
            <div class="row">
                <h3 class="mb-3">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)


                        @if($feature == $feature_id)
                            <div class="col-lg-3 mb-1" style="width: 50%; color: #848484 !important;">
                                <i class="far fa-check-circle"> </i> {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

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
                        @honeypot
                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                        <input type="text" name="utm_medium" class="utm_parameters" hidden>
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
                            <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="mt-5 mb-5 ">
        <div class="container">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">
                        <div class="row">

                                {!!html_entity_decode($project_detail->$near_by_places_var)!!}

                        </div>
                    </div>
            </div>
        </div>
    </section> --}}

    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row d-flex h-100">

                <div class="col-md-6">
                    <h3 class="mb-3">{{ trans('frontLang.locationMap') }}</h3>
                    <style>
                        p {
                            color: #848484 !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>

                <div class="col-md-6">
                    <h3 class="mb-3">
                        {{ trans('frontLang.Aboutthecoomunity') }}
                    </h3>
                    <style>
                        p {
                            color: #848484 !important;
                            text-align: justify !important;
                        }
                        iframe {
                            width: 100% !important;
                            max-height: 350px !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->$community_var)!!}
                </div>



            </div>
        </div>
    </section>
@endif




{{-- <section class="">
    <div class="container">
        <div class="row mt-5 mb-5">
            <h3>Near By Places</h3>
                <div class="col-lg-12">

                </div>



        </div>

    </div>
</section> --}}



<hr>

@if ($langSeg == 'ar')
    <section class="mt-5" style="background-color: #000;direction:rtl" >
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h3 class="mt-5 mb-5">مشاريع مماثلة</h3>
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">

                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" ><h6 class="card-title">{{$projects->$project_title_var}}</h6></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$project_detail->locationz->$name_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>

                                <hr>

                                <p class="card-text">
                                    {{ trans('frontLang.projectType') }} : @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach


                                </p>

                                </div>
                                {{-- <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div> --}}

                            </div>
                        </div>
                        {{-- <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">Request Details </h5>
                                        <button type="button" class="btn-close" style="margin:0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($projects->images  as $single_img)
                                                    @if($projects->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$projects->$project_title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                                <form class="contact-form" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                    <input type="hidden" name="project" value="{{$projects->id}}" />
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
                                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                                        {{ trans('frontLang.submit') }}
                                                    </button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="modal fade" style="background-color: rgb(0, 0, 0, .7);"  id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body bg-black rounded-0 border border-1 border-white">
                                        <div class="row p-4">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($projects->images  as $single_img)
                                                    @if($projects->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$projects->$project_title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>


                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                    <input type="hidden" name="project" value="{{$projects->id}}" />
                                                    <div class=" mb-4">
                                                        <input type="text" style="direction: rtl" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="phone" style="direction: rtl" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="email" style="direction: rtl" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-dark btn-lg btn-block ">
                                                        {{ trans('frontLang.submit') }}
                                                    </button> --}}
                                                    <button class="submit btn btn-outline-white btn-lg btn-block" type="submit">
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

                </div>

            </div>
            <!-- Button trigger modal -->
        </div>

    </section>
@else
    <section class="mt-5" style="background-color: #000">
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h3 class="mt-5 mb-5">{{ trans('frontLang.similarProjects') }}</h3>
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card ">

                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" class="text-white"><h6 class="card-title">{{$projects->$project_title_var}}</h6></a>
                                    <p> {{$project_detail->locationz->$name_var}}</p>
                                    <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>

                                    <p class="card-text">
                                        {{ trans('frontLang.projectType') }} : @foreach ($projects->project_types as $project_type)
                                        {{$project_type->$type_title_var}}
                                        @endforeach
                                    </p>

                                </div>
                                {{-- <div class="card-footer text-muted " style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div> --}}

                            </div>
                        </div>
                        <div class="modal fade" style="background-color: rgb(0, 0, 0, .7);"  id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div> --}}
                                <div class="modal-body bg-black rounded-0 border border-1 border-white">
                                    <div class="row p-4">
                                        <div class="col-lg-6 mb-3">
                                            @foreach($projects->images  as $single_img)
                                                @if($projects->images->first()==$single_img)
                                                    <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$projects->$project_title_var}}">
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>


                                            <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                @csrf
                                                @honeypot
                                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                <input type="text" name="utm_medium" class="utm_parameters" hidden>

                                                <input type="hidden" name="project" value="{{$projects->id}}"/>

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
                                                {{-- <button type="submit" class="btn btn-dark btn-lg btn-block ">
                                                    {{ trans('frontLang.submit') }}
                                                </button> --}}
                                                <button class="submit btn btn-outline-white btn-lg btn-block" type="submit">
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





                </div>

            </div>
            <!-- Button trigger modal -->



        </div>
    </section>
@endif



@endsection
