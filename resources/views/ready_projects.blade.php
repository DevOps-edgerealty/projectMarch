
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
@section('content')

<style>
  p{
    line-height: 1.6 !important;
  }
  .card {
    color: #000 !important;

  }

    a {
        color: #fff !important;
    }


    html, body {
        max-width: 100%;
        /* overflow-x: hidden; */
        height: 100%;
        scroll-behavior: smooth;
    }
    input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
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

    .card-footer {
        font-weight: 700 !important;
    }
    /* .card:hover {
        /* box-shadow: 0px 0px 5px #fff !important; */
        /* opacity: 1 !important;
        transform: scale(1.07) !important;
        z-index: 1000 !important; */
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    } */
</style>

<?php



    $project_title_var = "title_" . trans('backLang.boxCode');
    $type_title_var = "name_" . trans('backLang.boxCode');
    $address_title_var = "address_" . trans('backLang.boxCode');
    $name_var = "name_" . trans('backLang.boxCode');



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
            <div class="mask" style="background-color: rgba(0, 0, 0);">
            <div class="container-fluid containerization d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white">
                    <h3 class="mt-5"  style="text-transform: uppercase;"> {{ trans('frontLang.readyProjects') }} </h3><br>
                    {{-- <div class="row search-width" >

                    </div> --}}
                    <!-- Pills content -->

                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
        </header>



</section>



@if ($langSeg == 'ar')
    <style>
        .breadcrumb-item + .breadcrumb-item:before {
        float: right;
        padding-right: 0.5rem;
        color: #757575;
        content: var( --mdb-breadcrumb-divider, "/" );
        }
    </style>

    <section class="" style="direction: rtl">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-9 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home text-white"> </i> {{ trans('frontLang.Home') }}</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            {{ trans('frontLang.readyProjects') }}
                        </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-3">
                    <a href="{{ url($langSeg."/ready-projects/map/1") }}" class="btn shadow-none rounded-0 btn-lg w-100 mx-auto text-center project_btn mapBtn2" style="background-color: #0c5e03 !important; border: 0 !important;">Map View</a>
                </div>
            </div>
            {{-- <h3 class="text-left">{{ trans('frontLang.readyProjects') }}</h3> --}}
            <P>ينتهي البحث عن منزل أحلامك في دبي مع شركة إيدج ريالتي.  ابحث عن العقارات الجاهزة للسكن، حيث يمكنك شراء الفلل والشقق والبنتهاوس ومنازل التاون هاوس في دبي، التي ستتوافق مع معاييرك المثالية فيما يتعلق بمعيشتك، ذلك من خلال المنازل الفخمة التي حصلت على لمستها النهائية بواسطة عدة أكبر الشركات في مجال التطوير والإنشاء.</P>


        </div>

    </section>

    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">



                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" ><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p class="my-0">{{$projects->locationz->$name_var}}</p>
                                <p class="my-0">{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>



                                <p class="card-text">
                                    @foreach ($projects->project_types as $project_type)
                                        {{ trans('frontLang.projectType') }} : {{$project_type->$type_title_var}}
                                    @endforeach
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal modal-lg fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" style="margin:0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
                                        <div class="row p-0">
                                            <div class="col-lg-6 mb-3">
                                                @foreach($projects->images  as $single_img)
                                                    @if($projects->images->first()==$single_img)
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height" alt="{{$projects->$project_title_var}}">
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                                    <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                        {{ trans('frontLang.requestdetail') }}
                                                    </p>
                                                </div>
                                                <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                    @csrf
                                                    @honeypot
                                                    <input type="hidden" name="project" value="{{$projects->id}}" />
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
                <div class="col-lg-12 mt-5 text-center">
                    {!! $project->links() !!}
                </div>

            </div>
            <!-- Button trigger modal -->



        </div>
    </section>
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
@else
    <section class="">
        <div class="container-fluid containerization">
            <div class="row mb-3">
                <div class="col-lg-9 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home text-white"> </i> {{ trans('frontLang.Home') }}</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            {{ trans('frontLang.readyProjects') }}
                        </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-3">
                    <a href="{{ url($langSeg."/offplan-projects/map/1") }}" class="btn shadow-none rounded-0 btn-lg w-100 mx-auto text-center mapBtn2" style="background-color: #0c5e03 !important; border: 0 !important;">Map View</a>
                </div>
            </div>
            {{-- <h3 class="text-left">{{ trans('frontLang.readyProjects') }}</h3> --}}

            <div class="row ">
                <div class="col-lg-12">
                    <p>The search for your dream home in Dubai ends with Edge Realty. Find the ready to move in properties, where you can buy villas, apartments, penthouses, and townhouses in Dubai that meet your ideal parameters in relation to homes for sale within Dubai by the largest property developers.</p>
                </div>

            </div>

        </div>

    </section>



    <section class="mt-5 mb-5">
        <div class="container-fluid containerization ">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card bg-black text-white border rounded-0">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" >
                                        <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                    </a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="{{url($langSeg .'/'.'dubai-ready-projects'.'/'.$projects->slug_link)}}" ><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p> {{$projects->locationz->$name_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>



                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{ trans('frontLang.projectType') }} : {{$project_type->$type_title_var}}
                                    @endforeach
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31) !important"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" style="background-color: rgb(0, 0, 0, .7);"  id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body bg-black rounded-0 border border-1 border-white">
                                        <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
                                        <div class="row p-0">
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
                <div class="col-lg-12 mt-5  py-1 my-auto rounded-5">
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
                    {!! $project->links() !!}
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




@endsection
