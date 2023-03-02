@extends('layout.master')



<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


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

   <?php

   $name_var = "name_" . trans('backLang.boxCode');
   $description_var = "description_" . trans('backLang.boxCode');
   $designation_var = "designation_" . trans('backLang.boxCode');




   ?>




@section('meta_detail')

        <title> {{ trans('frontLang.team') }}</title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with Edge Realty Real Estate. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection
@section('content')

<style>
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
    .card {
        color: #fff !important;
        background-color: #000 !important;
        /* border: 0.5px solid gray !important; */
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.125s !important;
        /* z-index: -1000 !important; */
    }
    /* .card:hover { */
        /* box-shadow: 0px 0px 5px #fff !important; */
        /* opacity: 1 !important;
        transform: scale(1.07) !important;
        z-index: -1000 !important; */
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    }
</style>

<section class="desktop-show">

    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0);">
            <div class="container-fluid containerization d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white mt-5">
                    <h3>{{ trans('frontLang.teamHead') }}</h3>
                    <p class="col-10 mx-auto mt-3" style="color: grey !important; line-height: 1.3 !important">
                        {{ trans('frontLang.teampara') }}
                    </p>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>

<section class="mobile-show">
    <div style="padding-top: 100px !important;">
    </div>
</section>

<section class="mobile-show position-relative" >
    <header>
        <div class="container" >
                <div class="text-white mt-0">
                    <h3 class="">{{ trans('frontLang.teamHead') }}</h3>
                    <p class="col-md-10 mx-auto mt-3" style=" font-size: 1em !important; color: grey !important; line-height: 1.2 !important; text-align: justify !important;">
                        {{ trans('frontLang.teampara') }}
                    </p>
                </div>
            </div>
    </header>
</section>





<section class="mt-5 mb-5 desktop-show">
    <div class="container-fluid containerization">

        <div class="row">

            @foreach($blogs->chunk(4) as $chunk)
            <div class="card-group">

                @foreach($chunk as $blog)
                <div class="col-lg-3 px-3 py-3">
                    <div class="card bg-black rounded-0 mx-3 my-2" style="height: 450px !important;">

                        @if (file_exists('uploads/agents/'.$blog->id.'/'.$blog->image))
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}">
                                <img src="{{ URL::asset('uploads/agents/'.$blog->id.'/'.$blog->image) }}" class="card-img-top rounded-0" rounded-0 style="width: 100%; height: 350px; border: none; " alt="blog-image-here"/>
                            </a>
                        @else
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}" class="border: none !important;">
                                <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="card-img-top rounded-0" style="width: 100%; height: 350px; border: none !important; "  alt="blog-image-here">
                            </a>
                        @endif

                        <div class="card-body text-center mx-auto px-0 py-1">
                            <h4 class="card-title px-0 text-center mt-3 mb-3">
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}" class="text-white text-center text-uppercase" style="font-size: 1.3rem !important; line-height: 0.5 !important;">
                                    {{$blog->$name_var}}
                                </a>
                            </h4>
                            <p class="card-text mb-0 text-center mt-auto fw-light" style="line-height: 1.3 !important; color: #848484 !important; font-size: .9rem !important; text-align: center !important;">
                                {{$blog->$designation_var}}
                            </p>
                            <p class="card-text mb-3 text-center" style="line-height: 1.3 !important; color: white !important; font-size: .9rem !important; text-align: center !important;">
                                <span style="color: grey !important;"></span> &nbsp;
                                <span style="color: grey !important;" >{{$blog->language_en}}</span>
                            </p>
                        </div>
                        {{-- <div class="card-footer px-0 mx-auto">
                            <a href="https://wa.me/971585602665?text=Hello, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" class="btn btn-sm text-white m-2 " style="float: right; color: rgb(31, 190, 31); border: 0.5px solid grey;">
                                <i style=" font-size: 1rem !important;" class="fab fa-whatsapp"></i>
                            </a>
                            <a  href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}" class="btn btn-sm text-white m-2 " style="float: right; border: 0.5px solid grey !important;">
                                <i class="fas fa-share" style=" font-size: 1rem !important;"> </i>&nbsp; <span class="my-auto">{{ trans('frontLang.viewprofile') }} </span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

            <style>
                .pagination > li > a,
                .pagination > li > span {
                    color: #fff !important; // use your own color here
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

            {{-- <div class="col-lg-12 mt-5 text-center">
                {!! $blogs->links() !!}
            </div> --}}

        </div>






    </div>
</section>




<section class="mt-5 mb-5 mobile-show position-relative" style="margin-top: 440px">
    <div class="container-fluid ">

        <div class="row" >

            @foreach($blogs->chunk(4) as $chunk)
            <div class="card-group">

                @foreach($chunk as $blog)
                <div class="col-xs-2 px-3 py-3">
                    <div class="card bg-black rounded-0 mx-3 my-2" style="height: 450px !important;">

                        @if (file_exists('uploads/agents/'.$blog->id.'/'.$blog->image))
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}">
                                <img src="{{ URL::asset('uploads/agents/'.$blog->id.'/'.$blog->image) }}" class="card-img-top rounded-0" rounded-0 style="width: 100%; height: 350px; border: none; " alt="blog-image-here"/>
                            </a>
                        @else
                            <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}" class="border: none !important;">
                                <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="card-img-top rounded-0" style="width: 100%; height: 350px; border: none !important; "  alt="blog-image-here">
                            </a>
                        @endif

                        <div class="card-body text-center mx-auto px-0 py-1">
                            <h4 class="card-title px-0 text-center mt-3 mb-3">
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$blog->id)}}" class="text-white text-center text-uppercase" style="font-size: 1.3rem !important; line-height: 0.5 !important;">
                                    {{$blog->$name_var}}
                                </a>
                            </h4>
                            <p class="card-text mb-0 text-center mt-auto fw-light" style="line-height: 1.3 !important; color: #848484 !important; font-size: .9rem !important; text-align: center !important;">
                                {{$blog->$designation_var}}
                            </p>
                            <p class="card-text mb-3 text-center" style="line-height: 1.3 !important; color: white !important; font-size: .9rem !important; text-align: center !important;">
                                <span style="color: grey !important;"></span> &nbsp;
                                <span style="color: grey !important;" >{{$blog->language_en}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

            <style>
                .pagination > li > a,
                .pagination > li > span {
                    color: #fff !important; // use your own color here
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

            {{-- <div class="col-lg-12 mt-5 text-center">
                {!! $blogs->links() !!}
            </div> --}}

        </div>






    </div>
</section>




@endsection
