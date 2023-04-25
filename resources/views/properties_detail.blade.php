

@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');
?>

@section('meta_detail')

        <title>{{$property_detail->$meta_var }}</title>
        <meta name="description" content="{{$property_detail->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$property_detail->$meta_keywords_var}} "/>

@endsection


@section('content')

<style>
    p{
        line-height: 1.6 !important;
    }

    .container {
        position: relative;
    }

    .form-control-input {
        background-color: #fff !important
    }

    .sticky-div {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 0 !important;
        padding: 50px;
        font-size: 20px;
    }

    .sticky-div .card {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        max-width: 600px;
    }

    .iti-phone, .intl-tel-input {
        width: 100% !important;
    }

    section {
        position: relative;
        height: auto;
        display: flex;
    }

    .mapBtn {
        border: 0 !important;
    }

    .mapBtn:hover {
        border: 0 !important;
    }

    .bookViewingBtn{
        color: #fff !important;

    }

    .bookViewingBtn:hover {
        color: black !important;
        background-color: #fff !important;
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

    $name_var = "name_" . trans('backLang.boxCode');

    $language_var = "language_" . trans('backLang.boxCode');

    $designation_var = "designation_" . trans('backLang.boxCode');

    $title_var = "title_" . trans('backLang.boxCode');

    $type_name_var= "type_name_" . trans('backLang.boxCode');

    $cat_name_var= "cat_name_" . trans('backLang.boxCode');

    $address_var = "address_" . trans('backLang.boxCode');

    $amenity_name_var= "amenity_name_" . trans('backLang.boxCode');

    $description_var = "description_" . trans('backLang.boxCode');

    $location_var = "location_" . trans('backLang.boxCode');

    $facilities_var = "facilities_" . trans('backLang.boxCode');

    $city_name_var="city_name_" . trans('backLang.boxCode');

    $unit_view_var="unit_view_" . trans('backLang.boxCode');

    $sub_community_var="sub_community_" . trans('backLang.boxCode');

    $amenity_image = "";

    $firstimage=true;

    $secondimage=true;

    // $para21 = strip_tags(substr($property_detail->$description_var, 0, 100));

    // {{-- {!! substr(html_entity_decode($property_detail->$description_var), 0, 100) !!} --}}




?>

<style>

    .skill{


        display: none;

    }
    .skill_mobile{


    display: none;

    }
    .skill_rent{


    display: none;

    }
    .skill_rent_mobile{


    display: none;

    }

    .scroll-card {
        padding: 0;
        float: right !important;
        right: 150px;
        top: -200 !important;
        position: absolute !important;
        /* padding-top: 45px !important; */
        transition: top 0.3s;
        display: none;
        /* z-index: 1000 !important; */
    }

    .scroll_card_ar {
        padding: 0;
        float: left !important;
        left: 150px;
        top: -200 !important;
        position: absolute !important;
        /* padding-top: 45px !important; */
        transition: top 0.3s;
        display: none;
        /* z-index: 1000 !important; */
    }

    p {
        font-size: 16px !important;
        text-align: justify !important;
    }

    #about_mobile {
        text-align: justify !important;
    }


    .tooltip-inner {
        background-color: #000;
        box-shadow: 0px 0px 4px black;
        opacity: 1 !important;
    }
    .tooltip.bs-tooltip-right .tooltip-arrow::before {
        border-right-color: #000 !important;
    }
    .tooltip.bs-tooltip-left .tooltip-arrow::before {
        border-left-color: #000 !important;
    }
    .tooltip.bs-tooltip-bottom .tooltip-arrow::before {
        border-bottom-color: #000 !important;
    }
    .tooltip.bs-tooltip-top .tooltip-arrow::before {
        border-top-color: #000 !important;
    }
</style>



<section class="mobile-show">
    <div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-inner">
            @foreach ($property_detail->images as $image)
            <div class="carousel-item <?php if($firstimage){ echo "active"; $firstimage=false;}?>">
                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$image->image) }}" class="d-block w-100 slider-project" alt="..." />

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


<section class="desktop-show">
    <div class="mb-5 " style="background-color: #1c1c1c; height: 90px; " >
    </div>
</section>



@if ($langSeg == 'ar')
    <style>
        .breadcrumb-item + .breadcrumb-item:before {
        float: right;
        padding-right: 0.25rem;
        color: #757575;
        content: var( --mdb-breadcrumb-divider, "/" );
        }
    </style>

    {{-- breadcrum --}}
    <section class="desktop-show mt-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }}</a></li>
                            @if ($property_detail->type_id == '1')
                                <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/sale/apartment-for-sale-in-Dubai')}}" class="text-white"> شقق للبيع</a></li>
                            @else
                                <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/rent/apartment-for-rent-in-Dubai')}}" class="text-white"> شقق للايجار</a></li>
                            @endif
                            <li class="breadcrumb-item active text-white" aria-current="page">{{$property_detail->$title_var}}</li>
                        </ol>
                    </nav>

                    <h3 class="fw-bold">
                        {{$property_detail->$title_var}}
                    </h3>
                    <p style="color: #848484">
                        {{ $property_detail->locationss->$name_var}}
                    </p>

                    @if ($property_detail->type_id == '1')

                        <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">

                            <div class="AED skill" style="display: block !important">
                                <h2>
                                    {{-- {{ trans('frontLang.Price') }} <b> : --}}
                                    <span style="color: #fff;">
                                        {{ trans('frontLang.AED') }}
                                        {{ number_format($property_detail->price) }}
                                    </span></b>
                                </h2>
                            </div>

                            <div class="USD skill">
                                <h2>
                                    {{-- {{ trans('frontLang.Price') }} <b> : --}}
                                    <span style="color: #fff;">
                                        USD {{ number_format($property_detail->price_usd) }}  </b>
                                    </span>
                                </h2>
                            </div>

                        </div>
                    @else


                        <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">
                            <div class="AED skill_rent" style="display: block !important">
                                <h4>
                                    {{-- {{ trans('frontLang.yearly') }} --}}
                                    <b>
                                    <span style="color: #fff;">
                                        {{ trans('frontLang.AED') }}
                                        {{ number_format($property_detail->price) }}
                                        <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span>


                                    </span>
                                    </b>
                                </h4>
                            </div>
                            <div class="USD skill_rent"><h4>{{ trans('frontLang.yearly') }} <b>  <span style="color: #fff;"> {{ number_format($property_detail->price_usd) }} USD </b></span></h4></div>
                        </div>
                    @endif

                    <h5 style="color: #848484">
                        {{$property_detail->property_type->$cat_name_var}}
                        |
                        {{$property_detail->bedrooms}} {{ trans('frontLang.bedrooms') }}
                        |
                        {{$property_detail->bathrooms}} {{ trans('frontLang.bathrooms') }}
                        |x`
                        {{ $property_detail->parking }} {{ trans('frontLang.Parking') }}
                        |
                        {{ $property_detail->area}} {{ trans('frontLang.sqFt') }}</span>
                        |
                        {{ trans('frontLang.permitno') }} {{$property_detail->permit_no}}
                    </h5>



                </div>

            </div>

        </div>
    </section>

    {{-- desktop images and carousel --}}
    <section class="desktop-show" style="direction: rtl">
        <div class="container-fluid containerization " >
            <div class="row">
                <div class="col-lg-5 position-relative">
                    <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                        <button class="desktop-show position-absolute btn btn-lg btn-outline-white rounded-0 bg-dark text-white my-auto" style="bottom: 45px; left: 130px; z-index: 100 !important;">
                            إظهار الصور
                        </button>
                    </a>
                    <a href="{{url($langSeg .'/'.'properties/map')}} ">
                        <button class="desktop-show position-absolute btn btn-lg btn-outline-white rounded-0 bg-dark text-white my-auto" style="bottom: 45px; left: 330px; z-index: 100 !important;">
                            {{ trans('frontLang.map') }}
                        </button>
                    </a>
                    <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                        <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}"
                        style="height: 100% !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                        onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                    </a>
                    {{-- <div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($property_detail->images as $image)
                                <div class="carousel-item <?php if($secondimage){ echo "active"; $secondimage=false;}?>">
                                    <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$image->image) }}" class="d-block w-100 slider-property" alt="..." />
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div> --}}

                </div>

                <div class="col-lg-7 d-md-block d-lg-block d-none">
                    <div class="row">
                        @if( $property_detail->images->count() ==  1 OR $property_detail->images->count() <  2 )
                        @else
                        <div class="col-md-6 px-1">
                            @if( $property_detail->images->count() >  1)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[1]->image) }}">
                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[1]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                            {{-- <img src="{{ URL::asset('') }}" style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"> --}}

                            @if( $property_detail->images->count()  > 3)
                            <a data-fslightbo="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[3]->image) }}">

                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[3]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mt-1 mx-0 px-0 pt-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6 px-2">
                            @if( $property_detail->images->count() > 2)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[2]->image) }}">

                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[2]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                            {{-- <img src="{{ URL::asset('') }}" style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"> --}}

                            @if( $property_detail->images->count()  > 4)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[4]->image) }}">
                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[4]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mt-1 mx-0 px-0 pt-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- AGENT CARD STICKY TOP --}}
    <style>
        .sticky-example {
            /* background: cornflowerblue; */
            padding: 0;
            float: left;
            width: 365px;
            margin-left: 200px;
            padding: 0;
            top: 0;
            margin-top: 30px;
            position: relative;
            padding-top: 40px;
        }

        .sticky {
            position: sticky;
            top: 0;
            overflow: hidden;
            z-index: 10 !important;
        }



    </style>
    {{-- <div class="sticky-example desktop-show d-md-block d-lg-block d-none" id="">
        <div class="col-lg-12 p-0 m-0" style="z-index: -1000 !important;" >

        </div>
    </div> --}}



    <section class=" d-md-block d-lg-block d-none scroll_card_1"  style="position: fixed !important; top: -200; left: 100px; float: left !important; z-index: 30000 !important; background-color: ">
        <div class="container-fluid" style="width: 380px; float: right; height: 135px;">
            <div class="row" style="border: 0.5px #848484 solid; background-color: #1c1c1c !important;">
                <div class="col-lg-4 d-flex my-auto">
                    @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"/>
                        </a>
                    @else
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" style="width: 100px; height: 100px;"  alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                        </a>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class=" py-4">
                            <h5 class="card-title" style="font-size: 1.1em;">
                                {{ $agent->name_en }}
                            </h5>
                            <p class="card-text" style="font-size: .9em;">
                                {{ $agent->language_en }}
                            </p>
                            <div class="row mx-auto my-2 w-100">
                                {{-- <div class="col-lg-6 p-0">
                                    <a href="mailto:lead@edgerealty.ae" class="btn btn-sm rounded-0 btn-white w-100 text-decoration-none shadow-none " style="font-size: .8em;">
                                        {{ trans('frontLang.email_footer') }}
                                    </a>
                                </div>
                                <div class="col-lg-6 p-0 ps-1">
                                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" class="btn btn-sm rounded-0 btn-white w-100 text-decoration-none shadow-none " style="font-size: .8em;">
                                        {{ trans('frontLang.whatsapp') }}
                                    </a>
                                </div> --}}
                                <div class="col-lg-6 p-0">
                                    <a href="mailto:lead@edgerealty.ae" class="btn btn-sm rounded-0 btn-outline-white w-100 text-decoration-none " style="font-size: .8em;">
                                        {{ trans('frontLang.email_footer') }}
                                    </a>
                                </div>
                                <div class="col-lg-6 p-0 ps-1">
                                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks"
                                        class="btn btn-sm rounded-0 btn-outline-white w-100 text-decoration-none " style="font-size: .8em;">
                                        {{ trans('frontLang.whatsapp') }}

                                    </a>
                                </div>
                            </div>
                            <div class="mx-auto ">
                                <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                                    <li class=" text-white  text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                            <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="card " style="max-width: 540px; min-width: 540px;">
                <div class="row">
                    <div class="col-md-4 d-flex my-auto">
                        @if (file_exists('public/assets/images/agents/'.$agent->id.'/'.$agent->image))
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                                <img src="{{ URL::asset('public/assets/images/agents/'.$agent->id.'/'.$agent->image) }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" rounded-0 style="width: 130px; height: 130px;" alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"/>
                            </a>
                        @else
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                                <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" style="width: 130px; height: 130px;"  alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-8 py-0">
                        <div class="card-body py-4">
                            <h5 class="card-title">
                                {{ $agent->name_en }}
                            </h5>
                            <p class="card-text">
                                {{ $agent->language_en }}
                            </p>
                            <div class="mx-auto my-2 w-100">
                                <button class="btn btn-sm rounded-0 btn-outline-white" >
                                    EMAIL
                                </button>
                                <button class="btn btn-sm rounded-0 btn-outline-white" >
                                    WhatsApp
                                </button>
                            </div>
                            <div class="mx-auto ">
                                <ul class="list-group list-group-horizontal-sm bg-black text-center mx-auto">
                                    <li class=" bg-black text-white bg-black text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                        <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                            <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>

    {{-- AGENT CARD STICKY TOP --}}



    {{-- mobile images --}}
    <section class=" mobile-show" style="direction: rtl">
        <div class="container mt-2 ">
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12 shadow p-3" >
                    <h5 class=" mb-2" style="font-size: 1.5rem !important;">{{$property_detail->$title_var}}</h5>

                    <p style="color: grey !important; font-size: 16px !important;" class="fw-light my-3"> {{$property_detail->locationss->$name_var}}</p>


                    @if ($property_detail->type_id == '1')
                        <h5 class="USD skill" style="display: none;"> <b> <span style="color: #fff;">  {{ number_format($property_detail->price_usd) }}  $ </span></b></h5>
                        <h5 class="AED skill" style="display: block !important;"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property_detail->price) }}   </span></b></h5>
                    @else

                        <h5 class="USD skill" style="display: none;"> <b> <span style="color: #fff;">   {{ number_format($property_detail->price_usd) }} $ {{ trans('frontLang.yearly') }} </b> </span></h5>
                        <h5 class="AED skill" style="display: block !important;"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">   {{ number_format($property_detail->price) }} {{ trans('frontLang.yearly') }} </b> </span></h5>
                    @endif

                    <hr>
                    <div class="row">
                        <div class="col-lg-6" style="width: 50%">
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.propertyType') }} <br> <span class="fw-bold">{{$property_detail->property_type->$cat_name_var}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.permitno') }}<br> <span class="fw-bold">{{$property_detail->permit_no}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.bedrooms') }}<br> <span class="fw-bold">{{$property_detail->bedrooms}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.bathrooms') }}<br> <span class="fw-bold">{{$property_detail->bathrooms}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.unitsize') }}<br> <span class="fw-bold">{{$property_detail->area}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.Parking') }}<br> <span class="fw-bold">{{ $property_detail->parking }} </span></p>

                        </div>
                    </div>


                </div>

            </div>



        </div>

    </section>

    {{-- short description & agent form desktop --}}
    <section class="desktop-show" style="direction: rtl">
        <div class="container-fluid containerization mt-3">
            <div class="row">
                <div class="col-lg-9 p-3">
                    <span id="about_mobile" class="" style="text-align: justify !important; color: #fff !important; font-size: 1.5em !important; line-height: 1 !important; ">
                            {!! html_entity_decode($property_detail->$description_var) !!}
                    </span>
                </div>


                {{-- agent card --}}
                <div class="col-lg-3 scroll_card_2">
                    <div class="card bg-black rounded-0 p-0 m-0 agent-card" style="border: 0.5px #848484 solid !important; transform: scale(1) !important; margin: 0 !important;">
                        <div class="bg-image hover-overlay ripple mt-4 mb-0" data-mdb-ripple-color="light">
                            @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                                    <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" rounded-0 style="width: 130px; height: 130px;" alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"/>
                                </a>
                            @else
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                                    <img src="{{ URL::asset('public/assets/images/edge.webp') }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" style="width: 130px; height: 130px;"  alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                </a>
                            @endif

                            <div class="text-center mx-auto">
                                <p class="text-white fw-bold mb-0 mt-2 text-center" style="font-size: 1.1rem !important">
                                    {{ $agent->name_en }}
                                </p>
                                <p class=" fw-bold mb-0 text-center" style="font-size: .8rem !important; color: #848484 !important;">
                                    {{ $agent->language_en }}
                                </p>
                            </div>
                        </div>
                        <div class="card-body px-2 py-0">
                            <div class="row my-3">
                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property" value="{{ $property_detail->id }}">
                                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                                    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                                    <input type="hidden" name="property_id" value="{{ $property_detail->id }}">
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control text-white" placeholder="{{ trans('frontLang.name') }}" aria-label="Full Name" name="name" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="phone" name="phone" class="form-control w-100 iti-phone rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #1c1c1c !important; width: 100% !important;" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control text-white" name="email" placeholder="{{ trans('frontLang.email') }}" aria-label="Email" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <button type="submit" class="btn btn-block bg-white text-dark rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #292828">
                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                        <span class="btn-txt">
                                            {{ trans('frontLang.registerInterest') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="row my-3">
                                <p class="mx-auto text-center my-2" >
                                    <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
                                    {{ trans('frontLang.agentCardShare') }}
                                </p>
                                <div class="col-6 mx-auto mb-2">
                                    <div class="mx-auto ">
                                        <ul class="list-group list-group-horizontal-sm text-center mx-auto">
                                            <li class=" text-white text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" text-white text-center px-1 mx-auto">
                                                <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" text-white text-center px-1 mx-auto">
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" text-white text-center px-1 mx-auto">
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--<form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">-->
                    <!--    @csrf-->
                    <!--    @honeypot-->
                    <!--    <input type="hidden" id="custId" name="property" value="{{$property_detail->id}}">-->
                    <!--    <h3 class="text-center">{{ trans('frontLang.requestdetail') }}</h3>-->
                    <!--    <div class=" mb-4">-->
                    <!--        <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />-->

                    <!--    </div>-->
                    <!--    <div class="mb-4">-->
                    <!--        <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />-->

                    <!--    </div>-->

                    <!--    <div class="mb-4">-->
                    <!--        <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />-->

                    <!--    </div>-->
                    <!--    <button type="submit" class="btn btn-dark btn-lg btn-block">-->
                    <!--        {{ trans('frontLang.submit') }}-->
                    <!--    </button>-->
                <!--</form>-->

            </div>

        </div>
    </section>


    {{-- Amenities --}}
    <section class="desktop-show mt-2 mb-2" dir="rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                    @foreach ($amenities_array as $amenity_id => $amenity_name)
                        @foreach ($amenities as $amenity)
                            @if($amenity == $amenity_id)
                                <div class="col-lg-3 mb-4" style="color: #ccc">
                                    <i class="far fa-check-circle"></i>  <span >{!!  $amenity_name[$amenity_name_var] !!}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- map & description Desktop --}}
    {{-- <section class="desktop-show mt-4 mb-2" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-9">
                    <h3 class="mb-2">حول هذا العقار</h3>
                    <span style="text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important; ">

                        <span id="" class="" style="text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important; ">

                            <span id="lessen" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                                {{ strip_tags(substr($property_detail->$description_var, 0, 200)) }} ...
                            </span>

                            <br>

                            @if ( strlen(($property_detail->$description_var)) > 100 )

                                <span id="moreen" style="display: none !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                                    {{ strip_tags(html_entity_decode($property_detail->$description_var)) }}
                                </span>

                                <br>
                                <br>

                                <button onclick="myFunction2en()" class="btn btn-outline-white btn-sm" id="readMoreBtnen">
                                    Read more
                                </button>
                            @else
                                {!! html_entity_decode($property_detail->$description_var) !!}
                            @endif
                        </span>
                    </span>

                </div>
                <div class="col-lg-3 my-5 mx-auto">
                <?php

                    $Property_map_embed_code=str_replace('style="border:0"','',$property_detail->map_embed_code);

                    $Property_map_embed_code=str_replace('frameborder="0"','',$Property_map_embed_code);

                    echo $Property_map_embed_code=str_replace('height="','style="height:200px !important; width: 310px !important;" height="',$Property_map_embed_code);

                ?>
            </div>

            </div>



        </div>
    </section> --}}

    {{-- description & map mobile view --}}
    <section class="mobile-show mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-2">حول هذا العقار</h3>
                    <span >
                        <style>
                            p {
                                color: #ccc !important; font-size: 1rem !important; line-height: 1.8 !important; text-align: justify !important;
                            }
                        </style>

                        {!! html_entity_decode($property_detail->$description_var) !!}

                        {{-- <span id="lessmobilear" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                            {{ strip_tags(substr($property_detail->$description_var, 0, 400)) }} ...
                        </span>

                        <br>

                        @if ( strlen(($property_detail->$description_var)) > 400 )

                            <span id="moremobilear" style="display: none !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                                {{ strip_tags(html_entity_decode($property_detail->$description_var)) }}
                            </span>

                            <br>
                            <br>

                            <button onclick="myFunction2mobilear()" class="btn btn-outline-white btn-sm" id="readMoreBtnmobilear">
                                Read more
                            </button>
                        @else
                            {!! html_entity_decode($property_detail->$description_var) !!}
                        @endif --}}
                    </span>
                </div>
            </div>


            @if($langSeg == 'ar')
                    <section class="mt-5 mb-5 mobile-show" dir="rtl">
                        <div class="container">
                            <div class="row">
                                <h3 class="mb-3 mt-4 fw-light ">{{ trans('frontLang.amenities') }}</h3>
                                @foreach ($amenities_array as $amenity_id => $amenity_name)
                                    @foreach ($amenities as $amenity)
                                        @if($amenity == $amenity_id)
                                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                                <i class="far fa-check-circle"></i> &nbsp; {!!  $amenity_name[$amenity_name_var] !!}
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
                                <h3 class="mb-3 mt-4 fw-light ">{{ trans('frontLang.amenities') }}</h3>
                                @foreach ($amenities_array as $amenity_id => $amenity_name)
                                    @foreach ($amenities as $amenity)
                                        @if($amenity == $amenity_id)
                                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                                <i class="far fa-check-circle"></i> &nbsp; {!!  $amenity_name[$amenity_name_var] !!}
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach

                            </div>
                        </div>
                    </section>
                @endif


            <div class="row mx-auto mb-4 mt-4">

                <div class="col-lg-12">
                    <?php

                    $Property_map_embed_code=str_replace('style="border:0"','',$property_detail->map_embed_code);

                    $Property_map_embed_code=str_replace('frameborder="0"','',$Property_map_embed_code);

                    echo $Property_map_embed_code=str_replace('width="','style="height: 200px !important;width:100%!important" width="',$Property_map_embed_code);

                    ?>
                </div>
            </div>

        </div>

        <div class="container">
            {{-- <div class="row mt-0 mb-3 border-top border-bottom border-white py-3"> --}}
            <div class="row mt-0 mb-3 py-3">

                <div class="row mt-0 mb-0 mx-auto">
                    <div class="col-lg-12 mx-auto">
                        <a style="width:32%" href="tel:{{$property_detail->agentss->phone}}" class="btn btn-outline-white rounded-0 "><i class="fas fa-phone-alt fa-2x"> </i>  </a>

                        <a style="width:32%" href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-mobile-property" class="btn btn-outline-white rounded-0 "><i class="far fa-calendar-check fa-2x"> </i></a>

                        <a style="width:32%" class=" btn btn-outline-white rounded-0 " href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">
                            <i class="fab fa-whatsapp fa-2x"> </i>
                        </a>
                    </div>

                    {{-- mobile book a viewing --}}
                    <div class="modal fade" id="exampleModal-mobile-property" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                            <div class="modal-content " style="background-color: #1c1c1c !important;">
                                <div class="modal-header py-2">
                                    <h5 class="modal-title text-center text-white" id="exampleModalLabel">{{ trans('frontLang.bookaviewing') }} </h5>
                                    {{-- <button type="button" class="btn-close text-white bg-white" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
                                </div>
                                <div class="modal-body ">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h6 class="text-center text-white mb-4">{{$property_detail->$title_var}}</h6>
                                            <form class="contact-form" method="post" id="bookAViewingmobile" action="{{URL('/book_view/submit')}}">
                                                @csrf
                                                @honeypot
                                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selectdate') }}</label>
                                                    <input name="book_date" type="date" class="form-control  form-control-lg border border-white text-white"  name="viewing Date" required>

                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selecttime') }}</label>
                                                    <select name="book_time"  class="form-control  form-control-lg border border-white text-white"  required>
                                                        <option value="9:00 AM">9:00 AM</option>
                                                        <option value="10:00 AM">10:00 AM</option>
                                                        <option value="11:00 AM">11:00 AM</option>
                                                        <option value="12:00 AM">12:00 AM</option>
                                                        <option value="1:00 PM">1:00 PM</option>
                                                        <option value="2:00 PM">2:00 PM</option>
                                                        <option value="3:00 PM">3:00 PM</option>
                                                        <option value="4:00 PM">4:00 PM</option>
                                                        <option value="5:00 PM">5:00 PM</option>
                                                        <option value="6:00 PM">6:00 PM</option>
                                                        <option value="7:00 PM">7:00 PM</option>
                                                        <option value="8:00 PM">8:00 PM</option>
                                                        <option value="9:00 PM">9:00 PM</option>

                                                    </select>
                                                </div>

                                                <div class=" mb-4">
                                                    <input type="text" name="name" class="form-control   form-control-lg border border-white" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="phone" name="phone" class="form-control   form-control-lg iti-phone border border-white" placeholder="{{ trans('frontLang.phone') }}" required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="email" name="email" class="form-control   form-control-lg border border-white" placeholder="{{ trans('frontLang.email') }}" required />

                                                </div>

                                                <button class="submit btn w-100 btn-block btn-lg btn-outline-white rounded-0" type="submit">
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
                </div>
            </div>


        </div>


    </section>

    {{-- <hr class="container-fluid containerization mt-5 mb-3"> --}}


    {{-- similar properties --}}
    {{-- similar properties --}}
    <section class="mt-3 mobile-show" style="background-color: #1c1c1c !important;">
        <div class="container">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)

                    @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 mt-2 d-flex align-items-stretch">
                            <div class="card rounded-0 h-100" style="height: 460px;">
                                <div class="communities-newlaunch"></div>
                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                    </a>
                                    @endif
                                @endforeach

                                <div class="card-body px-3 py-0" style="direction: rtl">
                                    <div class="row" style="height: 100% !important;">


                                        <div class="col-md-12 d-flex align-items-start flex-column">
                                            @if ($property->type_id == '1')
                                                <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> <span style="color:;"> $ {{ number_format($property->price_usd) }} </span></b></h5>
                                                <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b> <span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} </span></b></h5>
                                            @else

                                                <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b><span style="color:;"> $ {{ number_format($property->price_usd) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                                <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b><span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                            @endif

                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                <p class="card-title" style="color: #848484 !important; font-size: 0.95vw !important;">{{ $property->$title_var }}</p>
                                            </a>



                                            {{-- <hr> --}}
                                            <div class="row mt-auto w-100" >
                                                <div class="col-lg-12 d-flex justify-content-around px-0" style="display:block;">
                                                    <span class="ps-0 pe-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"> <i class="fas fa-bed"></i>  {{$property->bedrooms}}  </span> <span style="color: #848484">&#x2022;</span>

                                                    <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-bath"></i>  {{$property->bathrooms}} </span> <span style="color: #848484">&#x2022;</span>

                                                    <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-chart-area"></i>  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div class="col-md-4 align-self-center">
                                            @foreach($agents  as $agent)
                                                @if($property->agent_id == $agent->id)
                                                    <img src="{{ URL::asset('uploads/agents/'.$property->agent_id.'/'.$agent->image) }}" style="height: 100px; width: 100%; border-radius: 50%; border: 0.5px solid #848484 !important;" class="mt-0 pe-0 shadow"  alt="pr-agent" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                                @endif
                                            @endforeach
                                        </div> --}}


                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body">
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
                                                <form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="property" value="{{$property->id}}" />
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
                            </div>
                        </div>

                    @endforeach

                    @else
                        <p class="text-muted my-5">
                            غير متاح وحدات مشابهه
                        </p>
                    @endif

            </div>
        </div>
    </section>

    <section class="mt-3 desktop-show" style="z-index: -100 !important; direction: RTL">
        <div class="container-fluid containerization" style="background-color: #1c1c1c !important;" >
            <div class="row">

                <div class="col-lg-9">
                    <div class="row">
                        <br>
                        <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                        @if($properties->count() != 0)

                        @foreach ($properties as $property)
                            <div class="col-lg-4 mb-5 mt-2 p-0 mx-0 d-flex align-items-stretch">
                                <div class="card rounded-0 h-100" style="height: 460px;">
                                    <div class="communities-newlaunch"></div>
                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                        </a>
                                        @endif
                                    @endforeach

                                    <div class="card-body px-3 py-0 " style="direction: rtl">
                                        <div class="row" style="height: 100% !important;">


                                            <div class="col-md-12 d-flex align-items-start flex-column">
                                                @if ($property->type_id == '1')
                                                    <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> <span style="color:;"> $ {{ number_format($property->price_usd) }} </span></b></h5>
                                                    <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b> <span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} </span></b></h5>
                                                @else

                                                    <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b><span style="color:;"> $ {{ number_format($property->price_usd) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                                    <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b><span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                                @endif

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <p class="card-title" style="color: #848484 !important; font-size: 0.95vw !important;">{{ $property->$title_var }}</p>
                                                </a>



                                                {{-- <hr> --}}
                                                <div class="row mt-auto w-100 pb-2" >
                                                    <div class="col-lg-12 d-flex justify-content-around px-0" style="display:block;">
                                                        <span class="ps-0 pe-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"> <i class="fas fa-bed"></i>  {{$property->bedrooms}}  </span> <span style="color: #848484">&#x2022;</span>

                                                        <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-bath"></i>  {{$property->bathrooms}} </span> <span style="color: #848484">&#x2022;</span>

                                                        <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-chart-area"></i>  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-4 align-self-center">
                                                @foreach($agents  as $agent)
                                                    @if($property->agent_id == $agent->id)
                                                        <img src="{{ URL::asset('uploads/agents/'.$property->agent_id.'/'.$agent->image) }}" style="height: 100px; width: 100%; border-radius: 50%; border: 0.5px solid #848484 !important;" class="mt-0 pe-0 shadow"  alt="pr-agent" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                                    @endif
                                                @endforeach
                                            </div> --}}
                                        </div>
                                    </div>

                                    {{-- <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; direction: rtl">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-desk-ar-{{ $property->id }}" style="color: #ccc !important;  font-size: 0.95vw !important;"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important;  font-size: 0.95vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
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
                                                    <form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                        @csrf
                                                        @honeypot
                                                        <input type="hidden" name="property" value="{{$property->id}}" />
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
                                </div>
                            </div>

                        @endforeach

                        @else
                            <p class="text-muted my-5">
                                No Properties for Sale or Rent
                            </p>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </section>




@else

    {{-- header / breadcrumbs --}}
    <section class="desktop-show mt-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-10 mb-4">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }}</a></li>
                            @if ($property_detail->type_id == '1')

                                @if($langSeg =='ru')
                                    <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/sale/apartment-for-sale-in-Dubai')}}" class="text-white">  Квартиры на продажу</a></li>
                                @else
                                    <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/sale/apartment-for-sale-in-Dubai')}}" class="text-white"> Apartments for Sale</a></li>
                                @endif
                            @else
                                @if($langSeg =='ru')
                                    <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/rent/apartment-for-rent-in-Dubai')}}" class="text-white"> Квартиры в аренду</a></li>
                                @else
                                    <li class="breadcrumb-item text-white"><a href="{{url($langSeg .'/dubai-properties/rent/apartment-for-rent-in-Dubai')}}" class="text-white"> Apartments for Rent</a></li>
                                @endif
                            @endif

                            <li class="breadcrumb-item active text-white" aria-current="page">{{$property_detail->$title_var}}</li>
                        </ol>
                    </nav>

                    <h3 class="fw-bold">
                        {{$property_detail->$title_var}}
                    </h3>
                    <p style="color: #848484">
                        {{ $property_detail->locationss->$name_var}}
                    </p>

                    @if ($property_detail->type_id == '1')

                        <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">

                            <div class="AED skill" style="display: block !important">
                                <h2>

                                    <span style="color: #fff;">
                                         {{ trans('frontLang.AED') }} {{ number_format($property_detail->price) }}
                                    </span></b>
                                </h2>
                            </div>

                            <div class="USD skill">
                                <h2>
                                    {{-- {{ trans('frontLang.Price') }} <b> : --}}
                                    <span style="color: #fff;">
                                        USD {{ number_format($property_detail->price_usd) }}  </b>
                                    </span>
                                </h2>
                            </div>

                            {{-- <select class="" name="skill_dropdown" id="skill_dropdown" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid; border-radius: 4px;">
                                <option value="AED">AED</option>
                                <option value="USD">USD</option>
                            </select> --}}
                        </div>
                    @else


                        <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">
                            <div class="AED skill_rent" style="display: block !important">
                                <h4>
                                    {{-- {{ trans('frontLang.yearly') }} --}}
                                    <b>
                                        <span style="color: #fff;">
                                            {{ trans('frontLang.AED') }}
                                            {{ number_format($property_detail->price) }}
                                            <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span>
                                        </span>
                                    </b>
                                </h4>
                            </div>
                            <div class="USD skill_rent"><h4>{{ trans('frontLang.yearly') }} <b>  <span style="color: #fff;"> {{ number_format($property_detail->price_usd) }} USD </b></span></h4></div>
                            {{-- <select class="" name="skill_dropdown_rent" id="skill_dropdown_rent" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid; border-radius: 4px;">

                                <option value="AED">AED</option>
                                <option value="USD">USD</option>

                            </select> --}}
                        </div>
                    @endif

                    <h5 style="color: #848484">
                        {{$property_detail->property_type->$cat_name_var}}
                        |
                        {{$property_detail->bedrooms}} {{ trans('frontLang.bedrooms') }}
                        |
                        {{$property_detail->bathrooms}} {{ trans('frontLang.bathrooms') }}
                        |
                        {{ $property_detail->parking }} {{ trans('frontLang.Parking') }}
                        |
                        @if ($langSeg == 'en')
                            {{ $property_detail->area}} {{ trans('frontLang.sqFt') }}</span>
                        @else
                            {{ round($property_detail->area/10.764, 2) }} {{ trans('frontLang.sqFt') }}
                        @endif
                        |
                        {{ trans('frontLang.permitno') }} {{$property_detail->permit_no}}
                    </h5>



                </div>
                <div class="col-lg-2">
                    {{-- Book a viewing --}}
                    <div class="row h-100 my-auto">

                        <a href="#"  data-mdb-toggle="modal" data-mdb-target="#book_a_viewing_desktop" class="my-auto">
                            <button class="btn btn-outline-white px-2 w-100 rounded-0 py-2 text-capitalize my-auto bookViewingBtn" style="font-size: .8rem !important; border: 0.5px #848484 solid !important; background-color: #292828 !important;">
                                <i class="far fa-eye"></i>
                                {{ trans('frontLang.bookaviewing') }}
                            </button>
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- desktop images and carousel --}}
    <section class="desktop-show">
        <div class="container-fluid containerization" >
            <div class="row">
                <div class="col-md-6 position-relative">
                    <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                        @if($langSeg == 'ru')
                            <button
                                class="desktop-show position-absolute btn btn-lg rounded-0 bg-black text-white my-auto mapBtn"
                                style="bottom: 45px; left: 90px; z-index: 100 !important;">
                                Показать фотографии
                            </button>
                        @else
                            <button
                                class="desktop-show position-absolute btn btn-lg rounded-0 bg-black text-white my-auto mapBtn"
                                style="bottom: 45px; left: 130px; z-index: 100 !important;">
                                Show All Photos
                            </button>
                        @endif
                    </a>

                    @isset($mapLocation)
                        @if($mapLocation == 'true')
                            <a href="{{url($langSeg .'/'.'properties/map/1/'.$property_detail->id)}}">
                                <button class="desktop-show position-absolute btn btn-lg rounded-0 bg-black text-white my-auto mapBtn" style="bottom: 45px; left: 330px; z-index: 100 !important;">
                                    {{ trans('frontLang.map') }}
                                </button>
                            </a>
                        @else
                                <button
                                class="desktop-show position-absolute bg-black btn btn-lg rounded-0 text-white my-auto mapBtn"
                                style="bottom: 45px; left: 330px; z-index: 100 !important;"
                                data-mdb-toggle="tooltip"
                                title="Location Not Available"
                            >
                                {{ trans('frontLang.map') }}
                            </button>
                        @endif
                    @endisset

                    <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                        <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}"
                        style="height: 100% !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                        onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                    </a>
                    {{-- <div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($property_detail->images as $image)

                                <div class="carousel-item <?php if($secondimage){ echo "active"; $secondimage=false;}?>">
                                    <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$image->image) }}" class="d-block w-100 slider-property" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                </div>

                            @endforeach
                        </div>
                    </div> --}}

                </div>
                <div class="col-md-6 d-md-block d-lg-block d-none">
                    <div class="row">
                        @if( $property_detail->images->count() ==  1 OR $property_detail->images->count() <  2 )
                        @else
                        <div class="col-md-6 px-1">
                            @if( $property_detail->images->count() > 1)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[1]->image) }}">
                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[1]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                            {{-- <a hidden data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                            </a> --}}
                            {{-- <img src="{{ URL::asset('') }}" style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"> --}}

                            @if( $property_detail->images->count()  > 3)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[3]->image) }}">
                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[3]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mt-1 mx-0 px-0 pt-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6 px-2">
                            @if( $property_detail->images->count() > 2)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[2]->image) }}">

                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[2]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0 pb-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                            {{-- <img src="{{ URL::asset('') }}" style="height: 286px !important;" class="d-block w-100 slider-property mb-1 mx-0 px-0" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"> --}}

                            @if( $property_detail->images->count()  > 4)
                            <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[4]->image) }}">
                                <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[4]->image) }}"
                                style="height: 286px !important;" class="d-block w-100 slider-property mt-1 mx-0 px-0 pt-1" alt="..."
                                onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- AGENT CARD STICKY TOP --}}
    <style>
        .sticky-example {
            /* background: cornflowerblue; */
            padding: 0;
            float: right;
            width: 365px;
            margin-right: 200px;
            padding: 0;
            top: 0;
            margin-top: 30px;
            position: relative;
            padding-top: 50px;
        }

        .sticky {
            position: sticky;
            top: 0;
            overflow: hidden;
            z-index: 10 !important;
        }
    </style>

    {{-- <div class="sticky-example desktop-show d-md-block d-lg-block d-none" id="">
        <div class="col-lg-12 p-0 m-0" style="z-index: -1000 !important;" >


        </div>
    </div> --}}

    <section class="d-md-block d-lg-block d-none scroll_card_1"  style="position: fixed !important; top: -200; right: 100px; float: right !important; z-index: 5000000; background-color: #1c1c1c !important;">
        <div class="container-fluid" style="width: 380px; float: right; height: 135px; background-color: #1c1c1c !important;">
            <div class="row" style="border: 0.5px #848484 solid; background-color: #1c1c1c !important;">
                <div class="col-lg-4 d-flex my-auto">
                    @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"/>
                        </a>
                    @else
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" style="width: 100px; height: 100px;"  alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                        </a>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class=" py-4">
                            <h5 class="card-title" style="font-size: 1.1em;">
                                {{ $agent->name_en }}
                            </h5>
                            <p class="card-text" style="font-size: .9em;">
                                {{ $agent->language_en }}
                            </p>
                            <div class="row mx-auto my-2 w-100">
                                {{-- <div class="col-lg-6 p-0">
                                    <a href="mailto:lead@edgerealty.ae" class="btn btn-sm rounded-0 btn-white w-100 text-decoration-none shadow-none " style="font-size: .8em;">
                                        {{ trans('frontLang.email_footer') }}
                                    </a>
                                </div>
                                <div class="col-lg-6 p-0 ps-1">
                                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" class="btn btn-sm rounded-0 btn-white w-100 text-decoration-none shadow-none " style="font-size: .8em;">
                                        {{ trans('frontLang.whatsapp') }}
                                    </a>
                                </div> --}}
                                <div class="col-lg-6 p-0">
                                    <a href="mailto:lead@edgerealty.ae" class="btn btn-sm rounded-0 btn-outline-white w-100 text-decoration-none " style="font-size: .8em;">
                                        {{ trans('frontLang.email_footer') }}
                                    </a>
                                </div>
                                <div class="col-lg-6 p-0 ps-1">
                                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks"
                                        class="btn btn-sm rounded-0 btn-outline-white w-100 text-decoration-none " style="font-size: .8em;">
                                        {{ trans('frontLang.whatsapp') }}

                                    </a>
                                </div>
                            </div>
                            <div class="mx-auto ">
                                <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                                    <li class=" text-white  text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                            <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>

                                    <li class=" text-white text-center px-1 mx-auto">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                            <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 18px !important; width: 100% !important">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    {{-- AGENT CARD STICKY TOP --}}


    {{-- mobile images --}}
    <section class=" mobile-show">
        <div class="container mt-2 ">
            <div class="row" style="padding-right: 10px; padding-left: 10px; margin-top: 10px;">
                <div class="col-lg-12 shadow p-3 " >
                    <h5 class=" mb-2" style="font-size: 1.5rem !important;">{{$property_detail->$title_var}}</h5>

                    <p style="color: grey !important; font-size: 16px !important;" class="fw-light my-3"> {{$property_detail->locationss->$name_var}}</p>

                    @if ($property_detail->type_id == '1')

                        <div class="col-lg-12 text-center py-1" style="display:flex;align-items: center;">

                            <div class="AED skill_mobile" style="display: block !important">
                                <h4 class="fw-light"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">{{ number_format($property_detail->price) }}  </b> </span></h4>
                            </div>
                            <div class="USD skill_mobile">
                                <h4 class="fw-light"> <b>USD <span style="color: #fff;"> {{ number_format($property_detail->price_usd) }}  </b> </span></h4>
                            </div>

                            {{-- <select class="" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid;border-radius: 4px;">
                                <option value="AED">AED</option>
                                <option value="USD">USD</option>
                            </select> --}}

                        </div>

                    @else


                        <div class="col-lg-12 text-center py-1" style="display:flex;align-items: center;">

                            <div class="AED skill_rent_mobile" style="display: block !important">
                                <h4 class="fw-light"> <b>  {{ trans('frontLang.AED') }} <span style="color: #fff;">{{ number_format($property_detail->price) }} {{ trans('frontLang.yearly') }}</b> </span></h4>
                            </div>
                            <div class="USD skill_rent_mobile">
                                <h4 class="fw-light"> <b> USD<span style="color: ##fff;"> {{ number_format($property_detail->price_usd) }}  {{ trans('frontLang.yearly') }}</b> </span></h4>
                            </div>
                        </div>
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-lg-7" style="width: 60%">
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.propertyType') }} <br> <span class="fw-bold">{{$property_detail->property_type->$cat_name_var}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.permitno') }}<br> <span class="fw-bold">{{$property_detail->permit_no}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.bedrooms') }}<br> <span class="fw-bold">{{$property_detail->bedrooms}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.bathrooms') }}<br> <span class="fw-bold">{{$property_detail->bathrooms}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.unitsize') }}<br> <span class="fw-bold">{{$property_detail->area}} </span></p>
                            <p style="font-size: 14px; color: #fff !important; font-size: 16px !important;" class="fw-light my-3">{{ trans('frontLang.Parking') }}<br> <span class="fw-bold">{{ $property_detail->parking }} </span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- short description & agent form desktop --}}
    <section class="desktop-show " >
        <div class="container-fluid containerization mt-5">
            <div class="row" >

                {{-- description --}}
                <div class="col-lg-9 p-3" style="min-height: 500px !important;">
                    <span id="about_mobile" class="" style="text-align: justify !important; color: #fff !important; font-size: 1em !important; line-height: 1 !important; ">
                        {!! html_entity_decode($property_detail->$description_var) !!}
                    </span>
                </div>

                <div class="col-lg-3 scroll_card_2">
                    <div class="card bg-black rounded-0 p-0 m-0 agent-card shadow-none" style="border: 0.5px #848484 solid !important; transform: scale(1) !important; margin: 0 !important;">
                        <div class="bg-image hover-overlay ripple mt-4 mb-0" data-mdb-ripple-color="light">
                            @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" rounded-0 style="width: 130px; height: 130px;" alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';"/>
                        </a>
                    @else
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}" class="my-auto">
                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" class="img-fluid rounded-circle rounded-0 mx-auto my-auto" style="width: 130px; height: 130px;"  alt="agent-image" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                        </a>
                    @endif

                            <div class="text-center mx-auto">
                                <p class="text-white fw-bold mb-0 mt-2 text-center" style="font-size: 1.1rem !important">
                                    {{ $agent->name_en }}
                                </p>
                                <p class=" fw-bold mb-0 text-center" style="font-size: .8rem !important; color: #848484 !important;">
                                    {{ $agent->language_en }}
                                </p>
                            </div>
                        </div>

                        <div class="card-body px-2 py-0">

                            <div class="row my-3">
                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property" value="{{ $property_detail->id }}">
                                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                                    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                                    <input type="hidden" name="property_id" value="{{ $property_detail->id }}">
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control text-white" placeholder="Full Name" aria-label="Full Name" name="name" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="phone" name="phone" class="form-control w-100 iti-phone rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #1c1c1c !important; width: 100% !important;" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control text-white" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <button type="submit" class="btn btn-block bg-white text-dark rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #1c1c1c1">
                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                        <span class="btn-txt">
                                            {{ trans('frontLang.registerInterest') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="row my-3">
                                <p class="mx-auto text-center my-2" >
                                    <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
                                    {{ trans('frontLang.agentCardShare') }}
                                </p>
                                <div class="col-6 mx-auto mb-2">
                                    <div class="mx-auto ">
                                        <ul class="list-group list-group-horizontal-sm  text-center mx-auto">
                                            <li class="  text-white  text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class="  text-white  text-center px-1 mx-auto">
                                                <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class="  text-white  text-center px-1 mx-auto">
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class="  text-white  text-center px-1 mx-auto">
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 18px !important; width: 100% !important">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 " >

                    <form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">
                        @csrf
                        @honeypot

                        <input type="hidden" id="custId" name="property" value="{{$property_detail->id}}">
                        <h3 class="text-center">{{ trans('frontLang.requestdetail') }}</h3>
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
                </div> --}}
            </div>
        </div>
    </section>


    {{-- Amenities --}}
    <section class="desktop-show mt-2 mb-2">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="row">
                    <h3 class="mb-5">{{ trans('frontLang.amenities') }}</h3>
                    @foreach ($amenities_array as $amenity_id => $amenity_name)
                        @foreach ($amenities as $amenity)
                            @if($amenity == $amenity_id)
                                <div class="col-lg-3 mb-4" style="color: #ccc">
                                    <i class="far fa-check-circle"></i>  <span >{!!  $amenity_name[$amenity_name_var] !!}</span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    {{-- description & map mobile view --}}
    <section class="mobile-show mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    <h3 class="mb-2 mt-2 fw-light ">
                        {{ trans('frontLang.aboutthisproperty') }}
                    </h3>
                    <style>
                        #more  {display:  none;}
                    </style>

                    <span id="about_mobile">
                        <style>
                            p {
                                color: #fff !important; font-size: 1rem !important; line-height: 1.8 !important; text-align: justify !important;
                            }
                        </style>

                        {!! html_entity_decode($property_detail->$description_var) !!}

                        {{-- <span id="lessmobile" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1em !important; line-height: 1 !important;">
                            {{ strip_tags(substr($property_detail->$description_var, 0, 250)) }} ...
                        </span>
                        <br> --}}

                        {{-- @if ( strlen(($property_detail->$description_var)) > 250 )
                            <span id="moremobile" style="display: none !important; text-align: justify !important; color: grey !important; font-size: 1em !important; line-height: 1 !important;">
                                {{ strip_tags(html_entity_decode($property_detail->$description_var)) }}
                            </span>
                            <br>
                            <button onclick="myFunction2mobile()" class="btn btn-outline-white btn-sm" id="readMoreBtnmobile">
                                Read more
                            </button>
                        @endif --}}
                    </span>
                </div>

                @if($langSeg == 'ar')
                    <section class="mt-5 mb-5 mobile-show" dir="rtl">
                        <div class="container">
                            <div class="row">
                                <h3 class="mb-2 mt-2 fw-light ">{{ trans('frontLang.amenities') }}</h3>
                                @foreach ($amenities_array as $amenity_id => $amenity_name)
                                    @foreach ($amenities as $amenity)
                                        @if($amenity == $amenity_id)
                                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                                <i class="far fa-check-circle"></i> &nbsp; {!!  $amenity_name[$amenity_name_var] !!}
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
                                <h3 class="mb-3 mt-4 fw-light ">{{ trans('frontLang.amenities') }}</h3>
                                @foreach ($amenities_array as $amenity_id => $amenity_name)
                                    @foreach ($amenities as $amenity)
                                        @if($amenity == $amenity_id)
                                            <div class="col-lg-12 mb-2" style="width: 100%; color: #ccc !important;" >
                                                <i class="far fa-check-circle"></i> &nbsp; {!!  $amenity_name[$amenity_name_var] !!}
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach

                            </div>
                        </div>
                    </section>
                @endif

                <div class="col-lg-3 my-4 mx-auto">
                    <?php

                        $Property_map_embed_code=str_replace('style="border:0"','',$property_detail->map_embed_code);

                        $Property_map_embed_code=str_replace('frameborder="0"','',$Property_map_embed_code);

                        echo $Property_map_embed_code=str_replace('height="','style="height:200px !important; width: 100% !important;" height="',$Property_map_embed_code);
                    ?>
                </div>
            </div>
        </div>

        <div class="container">
            {{-- <div class="row mt-0 mb-3 border-top border-bottom border-white py-3"> --}}
            <div class="row mt-0 mb-3 py-3">

                <div class="row mt-0 mb-0 mx-auto">
                    <div class="col-lg-12 mx-auto">
                        <a style="width:32%" href="tel:{{$property_detail->agentss->phone}}" class="btn btn-outline-white rounded-0 "><i class="fas fa-phone-alt fa-2x"> </i>  </a>

                        <a style="width:32%" href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-mobile-property" class="btn btn-outline-white rounded-0 "><i class="far fa-calendar-check fa-2x"> </i></a>

                        <a style="width:32%" class=" btn btn-outline-white rounded-0 " href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">
                            <i class="fab fa-whatsapp fa-2x"> </i>
                        </a>

                    </div>

                    {{-- mobile book a viewing --}}
                    <div class="modal fade" id="exampleModal-mobile-property" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                            <div class="modal-content " style="background-color: #1c1c1c !important;">
                                <div class="modal-header py-2">
                                    <h5 class="modal-title text-center text-white" id="exampleModalLabel">{{ trans('frontLang.bookaviewing') }} </h5>
                                    {{-- <button type="button" class="btn-close text-white bg-white" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
                                </div>
                                <div class="modal-body ">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h6 class="text-center text-white mb-4">{{$property_detail->$title_var}}</h6>
                                            <form class="contact-form" method="post" id="bookAViewingmobile" action="{{URL('/book_view/submit')}}">
                                                @csrf
                                                @honeypot
                                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selectdate') }}</label>
                                                    <input name="book_date" type="date" class="form-control  form-control-lg border border-white text-white"  name="viewing Date" required>

                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selecttime') }}</label>
                                                    <select name="book_time"  class="form-control  form-control-lg border border-white text-white"  required>
                                                        <option value="9:00 AM">9:00 AM</option>
                                                        <option value="10:00 AM">10:00 AM</option>
                                                        <option value="11:00 AM">11:00 AM</option>
                                                        <option value="12:00 AM">12:00 AM</option>
                                                        <option value="1:00 PM">1:00 PM</option>
                                                        <option value="2:00 PM">2:00 PM</option>
                                                        <option value="3:00 PM">3:00 PM</option>
                                                        <option value="4:00 PM">4:00 PM</option>
                                                        <option value="5:00 PM">5:00 PM</option>
                                                        <option value="6:00 PM">6:00 PM</option>
                                                        <option value="7:00 PM">7:00 PM</option>
                                                        <option value="8:00 PM">8:00 PM</option>
                                                        <option value="9:00 PM">9:00 PM</option>

                                                    </select>
                                                </div>

                                                <div class=" mb-4">
                                                    <input type="text" name="name" class="form-control   form-control-lg border border-white" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="phone" name="phone" class="form-control   form-control-lg iti-phone border border-white" placeholder="{{ trans('frontLang.phone') }}" required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="email" name="email" class="form-control   form-control-lg border border-white" placeholder="{{ trans('frontLang.email') }}" required />

                                                </div>

                                                <button class="submit btn w-100 btn-block btn-lg btn-outline-white rounded-0" type="submit">
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
                </div>
            </div>


        </div>
    </section>






    {{-- similar properties --}}
    <section class="mt-3 mobile-show">
        <div class="container">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)

                    @foreach ($properties as $property)
                        <div class="col-lg- mb-2 mt-2">
                            <div class="card rounded-0 border border-white border-1" style="height: 460px;">
                                <div class="communities-newlaunch"></div>
                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                        <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                    </a>
                                    @endif
                                @endforeach

                                <div class="card-body px-3" style="padding: 0rem">
                                    @if ($property->type_id == '1')
                                        <div class="AED skill" style="display: block !important">
                                            <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3">
                                                <span style="color: #ccc; ">
                                                    AED {{ number_format($property->price) }}
                                                </span>
                                            </h5>
                                        </div>

                                        <div class="USD skill">
                                            <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3">
                                                <span style="color: #ccc;">
                                                    {{ number_format($property->price_usd) }} USD </b>
                                                </span>
                                            </h5>
                                        </div>
                                    @else
                                        <div class="AED skill" style="display: block !important">
                                            <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3">
                                                {{ trans('frontLang.yearly') }}

                                                <span style="color: #ccc; ">
                                                    AED {{ number_format($property->price) }}
                                                </span>
                                            </h5>
                                        </div>

                                        <div class="USD skill">
                                            <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3">
                                                {{ trans('frontLang.yearly') }}
                                                <span style="color: #ccc;">
                                                    {{ number_format($property->price_usd) }} USD </b>
                                                </span>
                                            </h5>
                                        </div>
                                    @endif

                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}"  class="my-0">
                                        <h6 class="card-title fw-light text-white mt-2 mb-0" style="font-size: 1rem !important">
                                            {{ Str::limit($property->$title_var, 80) }}
                                        </h6>
                                    </a>
                                    <p class="fw-light mt-0">
                                        {{ $property->locationss->$name_var }}
                                    </p>

                                    <p class="card-text">
                                    </p>

                                    <div class="row" style="display:block;font-size: 15px;" >
                                        <span style="color: #ccc">  {{$property->bedrooms}} {{ trans('frontLang.bed') }}  </span>

                                        <span style="color: #ccc">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #ccc">
                                            @if ($langSeg == 'en')
                                                {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                            @else
                                                {{ round($property->area/10.764, 2) }} {{ trans('frontLang.sqFt') }}
                                            @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
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
                                                <form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="property" value="{{$property->id}}" />
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
                            </div>
                        </div>

                    @endforeach

                    @else
                        <p class="text-muted my-5">
                            No Properties for Sale or Rent
                        </p>
                    @endif

            </div>
        </div>
    </section>

    <section class="mobile-show mb-2">
        <div class="row mt-auto w-100" >
            <p class="mx-auto text-center my-3 bullet_points" style="text-align: center !important" >
                <i class="fa fa-share text-white" aria-hidden="true" style="height: 13px !important;"></i>
                {{ trans('frontLang.agentCardShare') }}
            </p>
            <div class="col-lg-12 d-flex justify-content-around" style="display:block;" >
                <span class="ps-0 pe-2" style="color: #848484;  font-size: 16px !important;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                        <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 26px !important; width: 100% !important">
                    </a>
                </span>

                <span class="px-2" style="color: #848484;  font-size: 16px !important;">
                    <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                        <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 26px !important; width: 100% !important">
                    </a>
                </span>

                <span class="px-2" style="color: #848484;  font-size: 16px !important;">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                        <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 26px !important; width: 100% !important">
                    </a>
                </span>

                <span class="px-2" style="color: #848484;  font-size: 16px !important;">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                        <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 26px !important; width: 100% !important">
                    </a>
                </span>

            </div>
        </div>
    </section>


    <section class="mt-3 desktop-show" style="z-index: -100 !important;">
        <div class="container-fluid containerization" >
            <div class="row">

                <div class="col-lg-9">
                    <div class="row">
                        <br>
                        <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                        @if($properties->count() != 0)

                        @foreach ($properties as $property)
                            <div class="col-lg-4 mb-5 mt-2 p-0 mx-0 d-flex align-items-stretch">
                                <div class="card rounded-0 h-100" >
                                    <div class="communities-newlaunch"></div>
                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                            <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing">
                                        </a>
                                        @endif
                                    @endforeach

                                    <div class="card-body px-3 py-0" >
                                        <div class="row" style="height: 100% !important;">


                                            <div class="col-md-12 d-flex align-items-start flex-column">
                                                @if ($property->type_id == '1')
                                                    <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> <span style="color:;"> $ {{ number_format($property->price_usd) }} </span></b></h5>
                                                    <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b> <span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} </span></b></h5>
                                                @else

                                                    <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b><span style="color:;"> $ {{ number_format($property->price_usd) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                                    <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b><span style="color:;"> {{ trans('frontLang.AED') }} {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}  </b> </span></h5>
                                                @endif

                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <p class="card-title" style="color: #848484 !important; font-size: 0.95vw !important;">{{ $property->$title_var }}</p>
                                                </a>



                                                {{-- <hr> --}}
                                                <div class="row mt-auto w-100 pb-2" >
                                                    <div class="col-lg-12 d-flex justify-content-around px-0" style="display:block;">
                                                        <span class="ps-0 pe-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"> <i class="fas fa-bed"></i>  {{$property->bedrooms}}  </span> <span style="color: #848484">&#x2022;</span>

                                                        <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-bath"></i>  {{$property->bathrooms}} </span> <span style="color: #848484">&#x2022;</span>

                                                        <span class="px-0" style="color: #848484;margin-right: 0;  font-size: 0.95vw !important;"><i class="fas fa-chart-area"></i>  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-4 align-self-center">
                                                @foreach($agents  as $agent)
                                                    @if($property->agent_id == $agent->id)
                                                        <img src="{{ URL::asset('uploads/agents/'.$property->agent_id.'/'.$agent->image) }}" style="height: 100px; width: 100%; border-radius: 50%; border: 0.5px solid #848484 !important;" class="mt-0 pe-0 shadow"  alt="pr-agent" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                                    @endif
                                                @endforeach
                                            </div> --}}
                                        </div>
                                    </div>


                                    {{-- <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem; ">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-desk-ar-{{ $property->id }}" style="color: #ccc !important;  font-size: 0.95vw !important;"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important;  font-size: 0.95vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
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
                                                    <form class="contact-form" method="post" action="{{URL('/request_detail_property/submit')}}">
                                                        @csrf
                                                        @honeypot
                                                        <input type="hidden" name="property" value="{{$property->id}}" />
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
                                </div>
                            </div>

                        @endforeach

                        @else
                            <p class="text-muted my-5">
                                No Properties for Sale or Rent
                            </p>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </section>

@endif


{{-- Modal --- Get In Touch --}}
<div class="modal modal-lg fade rounded-0" id="get_in_touch_desktop" tabindex="-1" aria-labelledby="get_in_touch_desktop" aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
        <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

            <div class="modal-body p-0 ">
                <div class="desktop-show row p-0 m-0">
                    <div class="col-lg-4 text-white m-0 p-0  d-flex flex-column">
                        <div class="my-auto mx-auto p-3">
                            <p class="fw-bold" style="font-size: 1.8rem !important;">
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
                            <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                @csrf
                                @honeypot
                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                <div class=" mb-4">
                                    <p class="text-dark mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                    <input type="text" name="name" class="form-control form-control-input form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                </div>

                                <!-- Email input -->
                                <div class="mb-4">
                                    <p class="text-dark mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                    <input type="email" name="email" class="form-control form-control-input form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                </div>

                                <!-- Phone input -->
                                <div class="mb-4">
                                    <p class="text-dark mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                    <input type="phone" name="phone" class="form-control form-control-input form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                </div>

                                <div class="d-flex mx-auto flex-row">
                                    {{-- <button type="submit" class="btn btn-outline-dark btn-lg rounded-0 mx-auto " id="submit1_btn1" >
                                        {{ trans('frontLang.submit') }}
                                    </button> --}}

                                    <button class="submit btn btn-block btn-lg mx-auto btn-outline-dark rounded-0" type="submit">
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

{{-- Modal --- Book A Viewing --- Desktop --}}
<div class="modal modal-lg fade rounded-0" id="book_a_viewing_desktop" tabindex="-1" aria-labelledby="book_a_viewing_desktop" aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
        <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

            <div class="modal-body p-0 ">
                <div class="desktop-show row p-0 m-0">
                    {{-- <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
                        <div class="my-auto mx-auto p-3">
                            <p class="text-left">
                                <i class="fas fa-calendar-check text-white mx-auto" style="font-size: 2.5rem !important;"  aria-hidden="true"></i>

                            </p>

                            <p class="fw-bold" style="font-size: 1.8rem !important;">
                                {{ trans('frontLang.bookaviewing') }}
                            </p>

                            <p style="font-size: .9rem !important;">{{ trans('frontLang.mobile') }}</p>
                            <p style="font-size: .9rem !important;">{{ trans('frontLang.tele') }}</p>
                            <p style="font-size: .9rem !important;">{{ trans('frontLang.website') }}</p>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 m-0 p-0 bg-white">
                        <div class="m-0 w-100 p-0 mx-auto bg-black py-2">
                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                {{ trans('frontLang.bookaviewing') }}
                            </p>
                        </div>

                        <div class="p-5">
                            {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                            <form class="contact-form" method="post" id="bookAViewing" action="{{URL('/book_view/submit')}}">
                            @csrf
                            @honeypot
                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <label class="text-dark" for="">{{ trans('frontLang.date') }}</label>
                                        <input name="book_date" type="date" class="form-control form-control-input form-control-lg border border-dark text-dark mydate " id="datepicker-desk" data-provide="datepicker"  name="viewing Date">

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="text-dark">{{ trans('frontLang.Time') }}</label>
                                        <select name="book_time" id="cars" class="form-control text-dark form-control-input form-control-lg border border-dark" >
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="1:00 PM">1:00 PM</option>
                                            <option value="2:00 PM">2:00 PM</option>
                                            <option value="3:00 PM">3:00 PM</option>
                                            <option value="4:00 PM">4:00 PM</option>
                                            <option value="5:00 PM">5:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="7:00 PM">7:00 PM</option>
                                            <option value="8:00 PM">8:00 PM</option>
                                            <option value="9:00 PM">9:00 PM</option>

                                        </select>
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <input type="text" name="name" class="form-control form-control-input text-dark form-control-lg border border-dark" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <input type="phone" name="phone" class="form-control form-control-input text-dark form-control-lg iti-phone border border-dark" placeholder="{{ trans('frontLang.phone') }}" required />

                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control form-control-input text-dark form-control-lg border border-dark" placeholder="{{ trans('frontLang.email') }}" required />

                                </div>
                                <button class="submit btn btn-block btn-lg mx-auto btn-outline-dark rounded-0" type="submit">
                                    <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

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
</div>

{{-- Modal --- Book A Viewing --- Mobile --}}
<div class="modal modal-sm fade rounded-0" id="book_a_viewing_mobile" tabindex="-1" aria-labelledby="book_a_viewing_mobile" aria-hidden="true"  >
    <div class="modal-dialog modal-sm modal-dialog-centered " >
        <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

            <div class="modal-body p-0 ">
                <div class="desktop-show row p-0 m-0">
                    <div class="col-12 m-0 p-0 bg-white">
                        <div class="p-5">
                            {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                            <form class="contact-form" method="post" action="{{URL('/book_view/submit')}}">
                            @csrf
                            @honeypot
                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <label class="text-dark" for="">{{ trans('frontLang.date') }}</label>
                                        <input name="book_date" type="date" class="form-control form-control-input form-control-lg border border-dark text-dark"  name="viewing Date">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="" class="text-dark">{{ trans('frontLang.Time') }}</label>
                                        <select name="book_time" id="cars" class="form-control text-dark form-control-input form-control-lg border border-dark" >
                                            <option value="9:00 AM">9:00 AM</option>
                                            <option value="10:00 AM">10:00 AM</option>
                                            <option value="11:00 AM">11:00 AM</option>
                                            <option value="12:00 AM">12:00 AM</option>
                                            <option value="1:00 PM">1:00 PM</option>
                                            <option value="2:00 PM">2:00 PM</option>
                                            <option value="3:00 PM">3:00 PM</option>
                                            <option value="4:00 PM">4:00 PM</option>
                                            <option value="5:00 PM">5:00 PM</option>
                                            <option value="6:00 PM">6:00 PM</option>
                                            <option value="7:00 PM">7:00 PM</option>
                                            <option value="8:00 PM">8:00 PM</option>
                                            <option value="9:00 PM">9:00 PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class=" mb-3">
                                    <input type="text" name="name" class="form-control form-control-input form-control-lg border border-dark" placeholder="{{ trans('frontLang.fullname') }}"  required />
                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <input type="phone" name="phone" class="form-control form-control-input form-control-lg iti-phone border border-dark" placeholder="{{ trans('frontLang.phone') }}" required />
                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control form-control-input form-control-lg border border-dark" placeholder="{{ trans('frontLang.email') }}" required />
                                </div>

                                <button type="submit" class="btn btn-outline-dark btn-lg btn-block">
                                    {{ trans('frontLang.submit') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#datepicker-desk").datepicker({ minDate: 0 });
</script>

<script>
    // $(function() {
    //     if($(document).scrollTop() > 100){
    //         $('.sticky-example').css({'display: 'none'});
    //     };
    // });



    window.onscroll = function() {
        if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
            var scroll_card_1 = document.getElementsByClassName("scroll_card_1");

            var scroll_card_2 = document.getElementsByClassName("scroll_card_2");

            for(var i = 0, length = scroll_card_1.length; i < length; i++) {
                scroll_card_1[i].style.top = '100px';
            }

            for(var i = 0, length = scroll_card_2.length; i < length; i++) {
                scroll_card_2[i].style.display = 'none';
            }
        } else {
            var scroll_card_1 = document.getElementsByClassName("scroll_card_1");
            var scroll_card_2 = document.getElementsByClassName("scroll_card_2");

            for(var i = 0, length = scroll_card_1.length; i < length; i++) {
                scroll_card_1[i].style.top = '-200px';
            }

            for(var i = 0, length = scroll_card_2.length; i < length; i++) {
                scroll_card_2[i].style.display = 'block';
            }
        }
    };


    // window.onscroll = function() {
    //     if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
    //         document.getElementById("scroll-ar").style.top = "10px";
    //         document.getElementById("fixed_card_ar").style.display = "none";
    //     } else {
    //         document.getElementById("scroll-ar").style.top = "-200px";
    //         document.getElementById("fixed_card_ar").style.display = "block";
    //     }
    // };

    // function scrollFunction() {

    // }

    // $(window).scroll(function()
    // {
    // if($(window).scrollTop() > 200)
    //     {
    //     $(".sticky-example").fadeIn("slow");
    //     }
    // });
    // $(window).scroll(function()
    // {
    // if($(window).scrollTop() < 100)
    //     {
    //     $(".sticky-example").fadeOut("fast");
    //     }
    // });

</script>

<script>
    $(document).ready(function() {
        // if($(document).scrollTop() > 500){
        //     $('.agent-card').css({'display': 'none' '!important'});
        // };

        $("#getInTouch").submit(function() {
            $(".result").text("");
            $(".loading-icon").removeClass("d-none");
            $(".submit").attr("disabled", true);
            $(".btn-txt").text("Processing ...");
        });

        $("#bookAViewing").submit(function() {
            $(".result").text("");
            $(".loading-icon").removeClass("d-none");
            $(".submit").attr("disabled", true);
            $(".btn-txt").text("Processing ...");
        });
        $("#bookAViewingmobile").submit(function() {
            $(".result").text("");
            $(".loading-icon").removeClass("d-none");
            $(".submit").attr("disabled", true);
            $(".btn-txt").text("Processing ...");
        });

    });
</script>

{{-- <script>
        $(document).ready( function () {
            $('#submit1_btn1').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrd-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{URL('/contactus/submit')}}',
                    type: 'POST',
                    data: $('#getInTouch').serialize(),
                    success: function (response) {
                        console.log('response')
                    }
                })
            });
        });
</script> --}}

<script>
    function myFunction(id) {
        document.getElementById(id).reset();
        }
        function inputReset(id) {
        var input = document.getElementById(id);
        input.value = null;
        input.focus();
        return false;
        }
        // formula: c = (r * p) / (1 - (Math.pow((1 + r), (-n))))
        function calculateMortgage(p, r, n) {
        r = percentToDecimal(r);
        n = yearsToMonths(n);
        var pmt = (r * p) / (1 - (Math.pow((1 + r), (-n))));
        return parseFloat(pmt.toFixed(2));
        }

        function percentToDecimal(percent) {
        return (percent / 12) / 100;
        }

        function yearsToMonths(year) {
        return year * 12;
        }
        var htmlEl = document.getElementById("outMonthly");

        function postPayments(pmt) {
        htmlEl.innerText = "AED " + pmt;
        }
        var btn = document.getElementById("btnCalculate");
        btn.onclick = function() {
        var cost = document.getElementById("inCost").value.replace('$', '');
        var downPayment = document.getElementById("inDown").value.replace('$', '');
        var interest = document.getElementById("inInterest").value.replace('%', '');
        var term = document.getElementById("inTerm").value.replace(' years', '');

        if (cost == "" && downPayment == "" && interest == "" && term == "") {
            htmlEl.innerText = "Please fill out all fields.";
            return false;
        }
        if (cost < 0 || cost == "" || isNaN(cost)) {
            htmlEl.innerText = "Please enter a valid loan amount.";
            return false;
        }
        if (downPayment < 0 || downPayment == "" || isNaN(downPayment)) {
            htmlEl.innerText = "Please enter a valid down payment.";
            return false;
        }
        if (interest < 0 || interest == "" || isNaN(interest)) {
            htmlEl.innerText = "Please enter a valid interest rate.";
            return false;
        }
        if (term < 0 || term == "" || isNaN(term)) {
            htmlEl.innerText = "Please enter a valid length of loan.";
            return false;
        }
        var amountBorrowed = cost - downPayment;
        var pmt = calculateMortgage(amountBorrowed, interest, term);
        postPayments(pmt);
    };
</script>

<script>
    $(document).ready(function () {
        $("#skill_dropdown").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_rent").hide();
            $(".skill_rent_mobile").hide();
            $(".skill").hide();
            $(eleBox).show();
        });
    });


    $(document).ready(function () {
        $("#skill_dropdown_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(".skill_rent").hide();
            $(".skill_mobile").hide();
            $(eleBox).show();
        });
    });

    $(document).ready(function () {
        $("#skill_dropdown_rent").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_rent").hide();
            $(".skill_rent_mobile").hide();
            $(".skill").hide();
            $(eleBox).show();
        });
    });

    $(document).ready(function () {
        $("#skill_dropdown_rent_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(".skill_rent").hide();
            $(".skill_rent_mobile").hide();
            $(eleBox).show();
        });
    });

    function myFunction2() {
        var dots = document.getElementById("less");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("readMoreBtn");

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


    function myFunction2mobile() {
        var dots = document.getElementById("lessmobile");
        var moreText = document.getElementById("moremobile");
        var btnText = document.getElementById("readMoreBtnmobile");

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

    function myFunction2mobilear() {
        var dots = document.getElementById("lessmobilear");
        var moreText = document.getElementById("moremobilear");
        var btnText = document.getElementById("readMoreBtnmobilear");

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


    function submit1_btn1() {
        var dots = document.getElementById("submit1_btn2");
        var moreText = document.getElementById("submit1_btn1");
        // var btnText = document.getElementById("readMoreBtn");

        if (moreText.style.display === "none")
        {
            dots.style.display = "none";
            // btnText.innerHTML = "Read less";
            moreText.style.display = "block";
        } else {
            dots.style.display = "block";
            // btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        }
    }

    function showMore(){
        //removes the link
        document.getElementById('link').parentElement.removeChild('link');
        //shows the #more
        document.getElementById('more').style.display = "block";
    }
</script>

@endsection
