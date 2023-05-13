
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
    color: grey !important;
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


        <!-- <div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
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
        </div> -->

</section>



<section class="desktop-show " style="text-align: center">
    <div class="d-flex justify-content-center">


    @foreach($project_detail->images  as $single_img)
            @if($project_detail->images->first()==$single_img)
                <img src="{{ URL::asset('uploads/projects/images/'.$project_detail->id.'/'.$single_img->image) }}" style="height: 800px" class="card-img-top" alt="">
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

                    <a data-mdb-toggle="modal" data-mdb-target="#requestDetails" class="btn btn-dark btn-lg mt-4 rounded-0 w-75 testbutton" style="background-color: #000">
                        {{ trans('frontLang.requestdetail') }}
                    </a>

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

{{-- project description card --}}
@if ($langSeg == 'ar')
    <section class="desktop-show" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row shadow p-3 mb-5 bg-black text-white border border-1 border-white" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">
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
                            <h5> <span style="font-weight:400;font-size: 15px;"> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></span></h5>

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
            <div class="row" style="margin-top: -40px; position: relative; padding-right: 10px; padding-left: 10px;">
                <div class="col-lg-12 shadow p-3 mb-5  bg-black text-white border border-1 border-white" >
                    <h3>{{$project_detail->$title_var}}</h3>
                    <p><b>{{ trans('frontLang.location') }}</b> : {{$project_detail->locationz->$name_var}}</p>
                    <p><b> {{ trans('frontLang.Developer') }} </b> : <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></p>
                    <p><b> {{ trans('frontLang.bedrooms') }}  </b> : {{$project_detail->bedrooms}} </p>
                    <p><b> {{ trans('frontLang.completionYear') }} </b> : {{$project_detail->est_completion_en}}</p>
                    <p><b> {{ trans('frontLang.communitytype') }} </b> :  تملك حر</p>
                    <h3>{{ trans('frontLang.startingfrom') }} <b> :  {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h3>r

                    <div class="col-lg-12">
                        <button class="first btn btn-white rounded-0 shadow-none btn-lg btn-block mt-4 " >{{ trans('frontLang.requestdetail') }} </button>
                    </div>

                </div>
            </div>


        </div>
    </section>


@else
    <section class="desktop-show" >
        <div class="container-fluid containerization">
            <div class="row shadow p-3 mb-5 bg-black text-white border border-1 border-white" style="margin-top: -80px; position: relative; padding-right: 10px; padding-left: 10px;">

                <div class="row">
                    <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">

                        <div class="AED skill_mobile" style="display: block !important"><h3>{{ trans('frontLang.startingfrom') }} <b> : {{$project_detail->project_price}} {{ trans('frontLang.AED') }} </b></h3></div>
                        <div class="USD skill_mobile"><h3>{{ trans('frontLang.startingfrom') }} <b> : {{$projeceD </b></h3></div>
                        {{-- <select class="" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px;margin-left:10px;margin-top: -9px;">

                            <option value="AED">AED</option>
                            <option value="USD">USD</option>

                        </select> --}}
                    </div>

                </div>


            <div class="row">
                <div class="col-lg-7" >
                    <div class="row">
                        <div class="col-lg-4 d-flex flex-column">
                            <h5><b>{{ trans('frontLang.projectname') }}</b> </h5>
                            <h5><b>{{ trans('frontLang.projectType') }} </b></h5>
                            <h5><b>{{ trans('frontLang.Developer') }}</b></h5>
                        </div>
                        <div class="col-lg-8 d-flex flex-column">


                            <h5 class="mt-1"> <span style="font-weight:400;font-size: 15px;">{{$project_detail->$title_var}}</span></h5>
                            <h5 class="mt-1">

                                <span style="font-weight:400;font-size: 15px;">
                                    @foreach ($project_detail->project_types as $project_type)
                                        {{$project_type->$type_title_var}}
                                    @endforeach
                                </span>

                            </h5>
                            <h5 class=" mt-1"> <span style="font-weight:400; font-size: 15px;"> <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}"> {{$developers->$name_var}}</a></span></h5>

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
                            <h5 class="mt-1"><span style="font-weight:400;font-size: 15px;">{{$project_detail->locationz->$name_var}}</span></h5>
                            @if ($langSeg == 'ru')
                                <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->bedrooms_ru}}</span></h5>
                            @else
                                <h5><span style="font-weight:400;font-size: 15px;">{{$project_detail->bedrooms}}</span></h5>
                            @endif

                            <h5 class="mt-1"> <span style="font-weight:400;font-size: 15px;"> {{$project_detail->$ownership_var}}</span></h5>
                        </div>
                    </div>

                </div>

            </div>



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




@if ($langSeg == 'ar')
    @if ( $project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')
            <section class="mt-4 desktop-show">
                <div class="container-fluid containerization" style="direction: rtl">
                        <h3 class="text-center mb-4">
                            <b> {{ trans('frontLang.payment') }}</b>
                        </h3>
                        <div class="row">
                            {!! $project_detail->$payment_var !!}
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-4 mobile-show">
                <div class="container"  style="direction: rtl">
                        <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row" style="color: #000 !important;">
                            {!! $project_detail->$payment_plan_mob_var !!}
                        </div>


                    </div>
                </div>
            </section>

        @endif

    @endif
        <section class="mt-5 mb-5" style="direction: rtl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <h3 class="mb-5">عن المشروع</h3>
                        {!! $project_detail->$description_var !!}
                    </div>


                </div>

            </div>



        </section>
    @else

    @if ( $project_detail->pro_status == '1')
        @if  ($project_detail->payment_en != '')
            <section class="mt-4 desktop-show">
                <div class="container">
                        <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row bg-black">
                            <style>
                                .inner {
                                    background-color: #000 !important;
                                    color: #fff !important;
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
                        <h3 class="text-center mb-4"><b> {{ trans('frontLang.payment') }}</b></h3>
                        <div class="row">
                            {!! $project_detail->$payment_plan_mob_var !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif


    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12 " >
                    <h3 class="mb-5">{{ trans('frontLang.aboutproject') }}</h3>

                    <span style="color: grey !important;">{!! $project_detail->$description_var !!}</span>

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
<!--                    <a href="#" style="padding: 15px 100px;" class="btn btn-dark btn-lg mx-5"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-download" >{{ trans('frontLang.brochure') }}</a>-->
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


<!--<section class="mobile-show">-->
<!--    <div class="container ">-->
<!--        <div class="row ">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                @foreach ($project_detail->documents as $document)-->
<!--                <a href="#"  style="padding: 15px 100px;" class="btn btn-dark btn-lg mx-5"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-download" >{{ trans('frontLang.brochure') }}</a>-->
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
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                                <div class="col-lg-2 mb-4">
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

                            <div class="col-lg-3 mb-2" style="width: 50%;">
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
                <h3 class="text-center mb-5">{{ trans('frontLang.requestdetail') }}</h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_project_detail/submit')}}">
                        @csrf
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
                            @honeypot
                            <button type="submit" class="btn btn-outline-white btn-lg btn-block">
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
                <h3 class="mb-5">حول المجتمع</h3>
                {!!html_entity_decode($project_detail->community_ar)!!}

            </div>

        </div>
    </section>

    <section class="mt-5 mb-5 " style="direction: rtl">
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
    </section>

    <section class="mt-5 mb-5" style="direction: rtl;">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">خريطة الموقع</h3>
                {!!html_entity_decode($project_detail->map_embed_code)!!}

            </div>

        </div>
    </section>

@else

    <section class="mt-5 mb-5 desktop-show">
        <div class="container-fluid containerization">
            <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>

                    @foreach ($features_array as $feature_id => $feature_name)
                        @foreach ($features as $feature)


                            @if($feature == $feature_id)

                                <div class="col-lg-3 mb-4" style="color: #848484">
                                    <i class="far fa-check-circle"> </i>
                                    <span >{!!  $feature_name[$name_var] !!}</span>
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
                <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                @foreach ($features_array as $feature_id => $feature_name)
                    @foreach ($features as $feature)
                        @if($feature == $feature_id)
                            <div class="col-lg-3 mb-2" style="width: 50%; color: #848484 !important;" >
                                <i class="far fa-check-circle"></i> {!!  $feature_name[$name_var] !!}
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
                            @honeypot
                            <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                                {{ trans('frontLang.submit') }}
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}

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
                                    color: #848484 !important;
                                }
                            </style>
                            {!!html_entity_decode($project_detail->$near_by_places_var)!!}
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5">{{ trans('frontLang.Aboutthecoomunity') }}</h3>

                <style>
                    p {
                        text-align: justify !important;
                    }
                </style>
                {!!html_entity_decode($project_detail->$community_var)!!}

            </div>

        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <h3 class="mb-5"> {{ trans('frontLang.locationMap') }}</h3>
                {!!html_entity_decode($project_detail->map_embed_code)!!}

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
    <section class="mt-3" style="background-color: #000;direction:rtl" >
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
                                    <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top  rounded-0" alt="{{$projects->$project_title_var}}">
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><h6 class="card-title">{{$projects->$project_title_var}}</h6></a>
                                <p> {{$projects->locationz->$name_var}}</p>
                                <p class="card-text">
                                    @foreach ($projects->project_types as $project_type)
                                    {{ trans('frontLang.projectType') }} : {{$project_type->$type_title_var}}
                                    @endforeach


                                </p>
                                <p class="card-text">
                                    @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                        <h5>{{ trans('frontLang.startingfrom') }} <span style="color: #848484">  {{$projects->project_price}} {{ trans('frontLang.AED') }} </span></h5>
                                    @endif

                                </p>

                                </div>
                                {{-- <div class="card-footer text-muted border-0" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div> --}}

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" >    <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$projects->$project_title_var}}"></a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                                <form class="contact-form" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                    @csrf

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

                        @endforeach


                    </div>





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
@else
    <section class="mt-3" style="background-color: #000">
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h3 class="mt-5 mb-5">{{ trans('frontLang.similarProjects') }}</h3>
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">

                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><h6 class="card-title">{{$projects->$project_title_var}}</h6></a>
                                <p> {{$projects->locationz->$name_var}}</p>
                                <p class="card-text">
                                    @foreach ($projects->project_types as $project_type)
                                    {{ trans('frontLang.projectType') }} : {{$project_type->$type_title_var}}
                                    @endforeach


                                </p>
                                <p class="card-text">
                                    @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                        <div class="AED skill_mobile" style="display: block !important">
                                            <p>

                                                    {{ trans('frontLang.startingfrom') }}
                                                    <span style="color: #848484;">
                                                        {{ $projects->project_price }}
                                                        {{ trans('frontLang.AED') }}

                                                    </span>

                                            </p>
                                        </div>

                                        <div class="USD skill_mobile">
                                            <p>

                                                    {{ trans('frontLang.startingfrom') }}
                                                    <span style="color: #848484;">
                                                        {{ $projects->project_price }} USD
                                                    </span>

                                            </p>
                                        </div>
                                        {{-- <h5>
                                            <span style="color: #fff">
                                                {{$projects->project_price}}
                                                {{ trans('frontLang.AED') }}
                                            </span>
                                        </h5> --}}
                                    @endif

                                </p>

                                </div>
                                {{-- <div class="card-footer text-muted border-0" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
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
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
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
                                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                    <input type="hidden" name="project" value="{{$projects->id}}" />
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
                                                    @honeypot
                                                    <button type="submit" class="btn btn-outline-white btn-lg btn-block ">
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
                            <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                                <div class="modal-content rounded-0">
                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body bg-black rounded-0" >
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

                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                    @csrf
                                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                    <input type="hidden" name="project" value="{{$projects->id}}" />
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
                                                    @honeypot
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
