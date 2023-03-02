
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
    /* button {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #fff !important;
    }

    .btn:hover {
        box-shadow: 0px 0px 30px #9a9a9a !important;
        opacity: 1 !important;
    } */
    @media only screen and (max-width: 800px) {
        .slick-track {
            height: 200px !important;
        }
    }

    body{
        background-color: #000 !important;
    }
    @media only screen and (max-width: 600px) {
        .font-size-ul {
        font-size: 12px !important


        }
    }

    @media  screen and (max-width: 600px) {
        .property-image {
        height: 50px !important;
        width: 400px !important;
        }
    }
    .property-image {
    height: 100px;
    width: 140px;
    }
    @media  screen and (max-width: 600px) {
    .font-table {
        font-size: 11px !important;
    }
    }
    .font-table {
    font-size: 16px;
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
        $seg1 = $uri_segments[2];
        if($seg1)
        {
            if($seg1 == 'en')
            {
                $replacements2 = array(2 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);


            }
            elseif($seg1 == 'ar')
            {
                $replacements2 = array(2 => "en");
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
   $address_var = "address_" . trans('backLang.boxCode');
   $payment_var = "payment_" . trans('backLang.boxCode');
   $payment_plan_mob_var = "payment_plan_mob_" . trans('backLang.boxCode');
   $ownership_var = "ownership_" . trans('backLang.boxCode');
   $community_var = "community_" . trans('backLang.boxCode');
   $feature_title_var = "name_" . trans('backLang.boxCode');
   $description_var = "description_" . trans('backLang.boxCode');
   $near_by_places_var = "near_by_places_" . trans('backLang.boxCode');




   $unit_size_var = "unit_size_" . trans('backLang.boxCode');
   $type_name_var= "type_name_" . trans('backLang.boxCode');
   $cat_name_var= "cat_name_" . trans('backLang.boxCode');
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
        {{-- <button class="carousel-control-prev" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button> --}}
    </div>

</section>

<section class="desktop-show " style="text-align: center">
    <div class="d-flex justify-content-center">


    @foreach($project_detail->images  as $single_img)
            @if($project_detail->images->first()==$single_img)
                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}" style="height: 800px" class="card-img-top" alt="">
                <div class="" style=" position: absolute; top: 250px; color:#fff ">
                    <h1 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->$title_var}}</b></h1>
                    <h3 style="text-shadow: 1px 1px 1px #000; text-transform: capitalize; font-weight: bold;"><b>{{$project_detail->locationz->$name_var}}</b></h3>

                    {{-- <button class="first btn btn-info btn-lg mt-4 rounded-0 ">{{ trans('frontLang.requestdetail') }} </button> --}}
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
            <div class="row shadow p-3 mb-5 bg-black border border-1 border-white" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">
                <h3>{{ trans('frontLang.startingfrom') }} <b> :  {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h3>
                <div class="col-lg-7" >
                    <div class="row">
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
                            <h5>
                                <span style="font-weight:400;font-size: 15px;"> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></span>
                            </h5>
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
                            <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->bedrooms}}</span></h5>
                            <h5> <span style="font-weight:400;font-size: 15px;"> تملك حر</span></h5>
                        </div>
                    </div>


                </div>
            </div>





        </div>
    </section>

    <section class="mobile-show" style="direction: rtl">
        <div class="container">
            <div class="row" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5 bg-black border border-1 border-white" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.community') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> : {{$developers->$name_var}}</p>
                    <p><b> {{ trans('frontLang.bedrooms') }}  : {{$project_detail->bedrooms}}</p>
                    <p><b> {{ trans('frontLang.propertyType') }} </b> : @foreach ($project_detail->project_types as $project_type)
                        {{$project_type->$type_title_var}}
                        @endforeach  </b></p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> : عقد حر</p>
                    <h2 class="text-center"><b> {{ trans('frontLang.startingfrom') }} {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h2>
                    <div class="col-lg-12">
                         <style>
                            .testbutton:hover {
                                background-color: #ffffff !important;
                                color: black !important;
                                border: #fff solid !important;
                            }
                            .testbutton {
                                border: 0.5px #848484 solid !important;
                            }
                        </style>

                        <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-dark btn-lg mt-4 rounded-0 w-100 testbutton" style="background-color: #000">
                            {{ trans('frontLang.requestdetail') }}
                        </a>
                    </div>

                </div>
            </div>


        </div>
    </section>

@else
    <section class="desktop-show">
        <div class="container-fluid containerization">
            <div class="row shadow p-3 mb-5 bg-black border border-1 border-white" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">

                    <div class="AED skill_mobile" style="display: block !important"><h3>{{ trans('frontLang.startingfrom') }} <b> : {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h3></div>
                    <div class="USD skill_mobile"><h3>{{ trans('frontLang.startingfrom') }} <b> : {{$project_detail->project_price_usd}} USD </b></h3></div>
                    {{-- <select class="" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px;margin-left:10px;margin-top: -9px;">

                        <option value="AED">AED</option>
                        <option value="USD">USD</option>

                    </select> --}}
                </div>


                <div class="col-lg-7" >
                    <div class="row">
                        <div class="col-lg-4">
                            <h5><b>{{ trans('frontLang.projectname') }}</b> </h5>
                            <h5><b>{{ trans('frontLang.projectType') }} </b></h5>
                            <h5><b>{{ trans('frontLang.Developer') }}</b></h5>
                        </div>
                        <div class="col-lg-8">
                            <h5> <span style="font-weight:400;font-size: 15px;">{{$project_detail->$title_var}}</span></h5>
                            <h5>

                                <span style="font-weight:400;font-size: 15px;">
                                    @foreach ($project_detail->project_types as $project_type)
                                        {{$project_type->$type_title_var}}
                                    @endforeach
                                </span>

                            </h5>
                            <h5> <span style="font-weight:400; font-size: 15px; "> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}" class="text-decoration-underline text-white"> {{$developers->$name_var}}</a></span></h5>



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
            <div class="row" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5 bg-black border border-1 border-white" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> : {{$developers->$name_var}}</p>
                    <p><b>  {{ trans('frontLang.bedrooms') }} </b> : {{$project_detail->bedrooms}}</p>
                    <p><b> {{ trans('frontLang.projectType') }} </b> :
                        @foreach ($project_detail->project_types as $project_type)
                            {{$project_type->$type_title_var}}
                        @endforeach
                    </p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> : Free Hold</p>

                    <div class="col-lg-12 text-left w-100" style="display:flex;">
                        <p><b> Starting Price </b> : </p>
                        <div class="AED skill" style="display: block !important"><p> <b> {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></p></div>
                        <div class="USD skill"><p> <b> {{$project_detail->project_price_usd}} USD </b></p></div>
                        {{-- <select class="" name="skill_dropdown" id="skill_dropdown" style="width: 80px;margin-left:10px;margin-top: -9px;">

                            <option value="AED">AED</option>
                            <option value="USD">USD</option>

                        </select> --}}
                    </div>
                    <div class="col-lg-12">
                        <style>
                            .testbutton:hover {
                                background-color: #ffffff !important;
                                color: black !important;
                                border: #fff solid !important;
                            }
                            .testbutton {
                                border: 0.5px #848484 solid !important;
                            }
                        </style>

                        <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-dark btn-lg mt-4 rounded-0 w-100 testbutton" style="background-color: #000">
                            {{ trans('frontLang.requestdetail') }}
                        </a>

                        {{-- <button class="first btn bg-black text-white btn-lg btn-block mt-4 " >Request Details </button> --}}
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




@if ( $project_detail->payment_en != '' )
    @if ( $project_detail->pro_status == '1' || $project_detail->pro_status == '3' )

        <section class="mt-4 desktop-show">
            <div class="container-fluid containerization">
                    <h3 class="text-center mb-4" style="color: #fff;"><b> {{ trans('frontLang.payment') }}</b></h3>
                    <div class="row">
                        <style>
                            .inner {
                                background-color: #000 !important;
                                border: 0.5px #848484 solid !important;
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
                    <h3 class="text-center mb-4" style="color: #fff;"><b> {{ trans('frontLang.payment') }}</b></h3>
                    <div class="row">
                        <style>
                            .inner {
                                background-color: #000 !important;
                                border: 0.5px #848484 solid !important;
                            }
                            .icon {
                                color: #fff !important;
                            }
                        </style>
                        {!! $project_detail->$payment_plan_mob_var !!}
                    </div>


                </div>
            </div>
        </section>
    @endif
@endif



@if ($langSeg == 'ar')
    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 " >
                    <h3 class="mb-3" style="color: #fff;">عن المشروع</h3>
                    <style>
                        p {
                            color: #848484 !important;
                            text-align: justify !important;
                        }
                    </style>
                    {!! $project_detail->$description_var !!}
                </div>


            </div>

        </div>



    </section>
@else
    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 " >
                    <h3 class="mb-3" style="color: #fff;">{{ trans('frontLang.aboutproject') }}</h3>
                    <style>
                        p {
                            color: #848484 !important;
                            text-align: justify !important;
                        }
                    </style>
                    {!! $project_detail->$description_var !!}
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
                        تحميل الكتيب </h5>
                    <button type="button" class="btn-close" style="margin:0; " data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <p>يرجى تقديم التفاصيل الخاصة بك لتنزيل الكتيب</p>
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
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
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
                    <h5 class="modal-title text-center" id="exampleModalLabel">Brochure Download </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <p>Please Provide Your Detail For Download Brcohure</p>
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
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
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


    <!--<section>-->
    <!--    <div class="container ">-->
    <!--        <div class="row ">-->
    <!--            <div class="col-lg-12 text-center">-->
    <!--                @foreach ($project_detail->documents as $document)-->
    <!--                <a href="#"  style="padding: 15px 100px;"  class="btn btn-dark btn-lg mx-5"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-download" >{{ trans('frontLang.brochure') }}</a>-->
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
                    <div><img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$image->image) }}" class="crousal-img-height"></div>
                @endforeach
            </div>
        </div>
    </div>

</section>



@if ($langSeg == 'ar')
    <section class="mt-5 mb-5 desktop-show" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                    <h3 class="mb-5" style="color: #fff;">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                            <div class="col-lg-2 mb-4" style="color: #fff;">
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
                <h3 class="mb-5 " style="color: #fff">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)


                        @if($feature == $feature_id)

                            <div class="col-lg-3 mb-2" style="width: 50%;color: #fff;">
                                <i class="far fa-check-circle"> </i> {!!  $feature_name[$name_var] !!}
                            </div>
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

    <section class="second mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class=" row">
                <h3 class="text-center mb-5" style="color: #fff;">{{ trans('frontLang.requestdetail') }}</h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_project_detail/submit')}}">
                        @csrf

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
                            <button type="submit" class="btn btn-dark btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5" style="color: #fff">حول المجتمع</h3>
                {!!html_entity_decode($project_detail->community_ar)!!}

            </div>

        </div>
    </section>

    <section class="mt-5 mb-5 " style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5" style="color: #fff;">مناطق قريبة</h3>
                    <div class="col-lg-12">

                        <div class="row" >

                            {!!html_entity_decode($project_detail->near_by_places_ar)!!}

                        </div>

                    </div>



            </div>

        </div>
    </section>

    <section class="mt-5 mb-5" style="direction: rtl;">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5" style="color: #fff;">خريطة الموقع</h3>
                {!!html_entity_decode($project_detail->map_embed_code)!!}

            </div>

        </div>
    </section>
@else

    <section class="mt-5 mb-5 desktop-show">
        <div class="container-fluid containerization">
            <div class="row">
                    <h3 class="mb-3" style="color:#fff;">{{ trans('frontLang.amenities') }}</h3>


                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                            <div class="col-lg-2 mb-4" style="color: #848484;">
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
                <h3 class="" style="color:#fff;">{{ trans('frontLang.amenities') }}</h3>


                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)


                        @if($feature == $feature_id)

                            <div class="col-lg-3 mb-3" style="width: 50%;color: #848484;">
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
                <h3 class="text-center mb-5" style="color:#fff;"">{{ trans('frontLang.requestdetail') }}</h3>
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
                            <button type="submit" class="btn btn-dark btn-lg btn-block">
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
                <h3 class="mb-5 text-white">{{ trans('frontLang.Nearbyplaces') }}</h3>
                    <div class="col-lg-12">




                        <div class="row" >

                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}

                        </div>










                    </div>



            </div>

        </div>
    </section> --}}


    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-5" style="color: #fff;">{{ trans('frontLang.Aboutthecoomunity') }}</h3>
                    <style scoped>
                        .para {
                            color: #848484 !important;
                            text-align: justify !important;
                        }

                        font {
                            color: #848484 !important;
                        }
                        span {
                            color: #848484 !important;
                        }
                    </style>
                    <span class="para">
                        {!!html_entity_decode($project_detail->$community_var)!!}
                    </span>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-5" style="color: #fff">{{ trans('frontLang.locationMap') }}</h3>
                    <style>
                        iframe {
                            width: 100% !important;
                            height: 350px !important;
                        }
                    </style>
                    {!!html_entity_decode($project_detail->map_embed_code)!!}
                </div>


            </div>

        </div>
    </section>
    @if(count($properties) > 0)
    <section class="mb-5 mt-5 ">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="row text-center">
                    <div class="col-lg-12">
                    <h3 class="mt-3 mb-3" style="color:#fff">{{ trans('frontLang.propertiesForSale') }}/{{ trans('frontLang.Rent') }}</h3>
                    </div>

                </div>
                <div class="col-lg-12" style="overflow-x:auto;">


                    <table class="table table-striped font-table" style="color: #fff;">
                        <thead>
                        <tr>
                            <th class="text-left"></th>
                            <th class="text-left">{{ trans('frontLang.property') }}</th>
                            <th class="text-left">{{ trans('frontLang.propertyType') }}</th>
                            <th class="text-right">{{ trans('frontLang.unitsize') }}</th>

                            <th class="text-right">{{ trans('frontLang.Price') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $similerProperty)
                            <tr>
                            <td style="padding: .35rem;">
                                @foreach($similerProperty->images  as $single_img)
                                    @if($similerProperty->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$similerProperty->slug_link)}}" ><img src="{{ URL::asset('uploads/properties/'.$similerProperty->id.'/'.$single_img->image) }}" class="property-image" alt="Listing"></a>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-left" style="vertical-align: middle; padding: .25rem;">  <a href="/<?php echo $langSeg;?>/dubai-property/{{$similerProperty->slug_link}}" style="color: #fff;" class="img-override" target="_blank">{{$similerProperty->$title_var}}</a></td>
                            <td class="text-left" style="vertical-align: middle; padding: .25rem;">  <a href="/<?php echo $langSeg;?>/dubai-property/{{$similerProperty->slug_link}}" style="color: #fff;" class="img-override" target="_blank">{{$similerProperty->property_type->$cat_name_var}}</a></td>
                            <td class="text-right" style="vertical-align: middle; padding: .25rem;">  <a href="/<?php echo $langSeg;?>/dubai-property/{{$similerProperty->slug_link}}" style="color: #fff;" class="img-override" target="_blank">{{$similerProperty->area}}sq ft</a></td>

                            <td class="text-right" style="vertical-align: middle; padding: .25rem;">  <a href="/<?php echo $langSeg;?>/dubai-property/{{$similerProperty->slug_link}}" style="color: #fff;" class="img-override" target="_blank">{{ trans('frontLang.AED') }} {{ number_format($similerProperty->price) }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    </section>
    @endif

@endif

<script>
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
