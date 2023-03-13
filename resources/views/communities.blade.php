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
<style>
    p{
        line-height: 1.5 !important;
        text-align: justify !important;
        letter-spacing: .05rem !important;
    }
    a {
        color: white !important;
        /* text-decoration: underline !important; */
    }
    html, body {
        max-width: 100%;
        overflow-x: hidden;
        height: 100%;
        scroll-behavior: smooth;
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
    .card {
        color: #fff !important;
        background-color: #000 !important;
        border: 0.5px solid gray !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.125s !important;


    }
    .card:hover {
        /* box-shadow: 0px 0px 5px #fff !important; */
        opacity: 1 !important;
        transform: scale(1.07) !important;
        z-index: 1000 !important;
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    }

</style>
@section('content')


<?php


    $title_var = "title_" . trans('backLang.boxCode');





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
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
                <div class="container-fluid containerization d-flex align-items-center justify-content-center text-center h-100" >
                    <div>
                        <h3 class="text-white"  style="text-transform: uppercase;">{{ trans('frontLang.dubaiCommunities') }}</h3>

                    </div>

                </div>

            </div>
        </div>
        <!-- Background image -->
    </header>



</section>

@if ($langSeg == 'ar')
<section class="" style="direction: rtl">
    <div class="container-fluid containerization">
        <div class="row">
            {{-- <h3 class="text-left">{{ trans('frontLang.dubaiCommunities') }}</h3> --}}
            <p class="text-right">هل تبحث عن أفضل منطقة للعيش في دبي؟ مع بيانات إيدج ريالتي الشاملة عن منطقة دبي، يمكنك اكتشاف المناطق الأفضل للعيش في دبي. اعثر على المزيد من المعلومات عن المناطق، وكذلك ما تتطلع إليه في أحد الأحياء الأكثر شهرة في دبي.</p>

        </div>

    </div>

</section>
@else
<section class="">
    <div class="container-fluid containerization">
        <div class="row">
            {{-- <h3 class="text-left">{{ trans('frontLang.dubaiCommunities') }}</h3> --}}
            <P style="font-size: 16px;line-height: 25px;">Are you looking for the best area to live in Dubai? With Edge Realty comprehensive Dubai area guides, you can discover which areas are best for living in Dubai. Learn more about the best in the area, as well as what you can expect to get in one of the most popular neighbourhoods within Dubai.</p>

        </div>

    </div>

</section>
@endif




<section class="">
    <div class="container-fluid containerization ">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    @foreach ($communities as $community)
                        <div class="col-lg-3 mt-5">
                            <div class="card border border-1 p-0 rounded-0 border-white bg-black text-white">
                                @foreach ($community->images as $image)
                                    <a href="{{url( $langSeg .'/'.'dubai-communities'.'/'.$community->slug_link)}}" class="border-bottom border-white">
                                        <img src="{{ URL::asset('uploads/communities/images/'. $community->id .'/'.$image->image) }}" style="height: 270px" class="card-img-top rounded-0" alt="..." />
                                    </a>
                                    @if ($langSeg == 'ar')
                                    <div class="card-body text-white" style="padding: 0.8rem;direction: rtl">
                                        <a href="{{url( $langSeg .'/'.'dubai-communities'.'/'.$community->slug_link)}}" class="text-dark">
                                            <h5 class="card-title text-white text-decoration-none fw-bold" style="font-size: 1.2rem">{{$community->$title_var}} </h5>
                                            <b>{{ trans('frontLang.projects') }} : {{$community->projects_count}}</b>
                                        </a>

                                    </div>
                                    @else
                                    <div class="card-body text-white" style="padding: 0.8rem">
                                        <a href="{{url( $langSeg .'/'.'dubai-communities'.'/'.$community->slug_link)}}" class="text-white text-decoration-none">
                                            <h5 class="card-title text-white"  style="font-size: 1.2rem">{{$community->$title_var}} </h5>
                                            <b>{{ trans('frontLang.projects') }} : {{$community->projects_count}}</b>
                                        </a>

                                    </div>
                                    @endif

                                @endforeach

                                <div class="card-footer text-muted border-top border-white" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%; color: #000 !important;">
                                                <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $community->id }}" style="color: #fff !important;">
                                                    <i class="far fa-envelope text-white"> </i> {{ trans('frontLang.requestdetail') }}
                                                </a>
                                            </td>
                                            <td style="text-align: center;width: 50%; color: #fff !important;">
                                                <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                                    <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }}
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="modal fade" id="exampleModal-{{ $community->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">

                                                <h6 class="text-center mb-4">{{$community->$title_var}}</h6>
                                                <form class="contact-form" method="post" action="{{URL('/request_detail_community/submit')}}">
                                                    @csrf
                                                    <input type="hidden" name="project" value="{{$community->id}}" />
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
                                                    <button type="submit" class="btn btn-dark btn-block btn-lg">
                                                        Submit
                                                    </button>
                                                </form>



                                    </div>

                                </div>
                            </div>
                        </div> --}}




                        <div class="modal modal-md fade rounded-0" id="exampleModal-{{ $community->id }}" tabindex="-1" aria-labelledby="get_in_touch_desktop" aria-hidden="true"  >
                            <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
                                <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                                    <div class="modal-body p-0 bg-black">
                                        <div class="desktop-show row p-0 m-0">
                                            {{-- <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
                                                <div class="my-auto mx-auto p-3">

                                                    <p class="fw-bold" style="font-size: 2rem !important;">
                                                        {{ trans('frontLang.getintouch') }}
                                                    </p>

                                                    <p style="font-size: .9rem !important;">{{ trans('frontLang.mobile') }}</p>
                                                    <p style="font-size: .9rem !important;">{{ trans('frontLang.tele') }}</p>
                                                    <p style="font-size: .9rem !important;">{{ trans('frontLang.website') }}</p>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-12 m-0 p-0 bg-white">
                                                <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                                    <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                        {{ trans('frontLang.getintouch') }}
                                                    </p>
                                                </div>
                                                <div class="p-3">
                                                    {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                                                    <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit')}}">
                                                        @csrf
                                                        @honeypot

                                                        <h3 class="text-center text-dark mb-4">{{$community->$title_var}}</h3>
                                                        <input type="hidden" name="project" value="{{$community->id}}" />
                                                        <input type="hidden" name="project_name" value="{{$community->title_var}}" />

                                                        <div class=" mb-4">
                                                            <p class="text-dark mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                                            <input type="text" name="name" class="form-control form-control-lg bg-white border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                        </div>

                                                        <!-- Email input -->
                                                        <div class="mb-4">
                                                            <p class="text-dark mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                                            <input type="email" name="email" class="form-control form-control-lg bg-white border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                                        </div>

                                                        <!-- Email input -->
                                                        <div class="mb-4">
                                                            <p class="text-dark mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                                            <input type="phone" name="phone" class="form-control form-control-lg bg-white border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
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
                    @endforeach



                </div>





            </div>
            <div class="col-lg-12 mt-5">
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
                {!! $communities->links() !!}
            </div>

        </div>

    </div>
</section>


@endsection
