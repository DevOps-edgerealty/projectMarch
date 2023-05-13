@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title>{{$communities->$meta_var }}</title>
        <meta name="description" content="{{$communities->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$communities->$meta_keywords_var}} "/>


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
    .card  {
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
    .btn {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #fff !important;
    }
    .card > p {
        color: #fff !important;
    }

    /* .btn:hover {
        box-shadow: 0px 0px 30px #9a9a9a !important;
        opacity: 1 !important;
    } */
    @media only screen and (max-width: 800px) {
        .slick-track {
            height: 200px !important;
        }
    }

</style>


@section('content')


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


    $community_title_var = "title_" . trans('backLang.boxCode');
    $description_var = "description_" . trans('backLang.boxCode');
    $project_title_var = "title_" . trans('backLang.boxCode');
    $type_title_var = "name_" . trans('backLang.boxCode');
    $name_var = "name_" . trans('backLang.boxCode');

    $address_title_var = "address_" . trans('backLang.boxCode');



?>


<style>
    .centered-community {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    iframe {
        width: 100% !important;
    }
</style>

<section style="background-color: #000">
    @foreach ($communities->images as $image)

        <img src="{{ URL::asset('uploads/communities/images/'. $communities->id .'/'.$image->image) }}" class="d-block w-100 community-header-height" alt="" />

    @endforeach


</section>


@if ($langSeg == 'ar')
    <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="text-align: center !important;"> {{$communities->$community_title_var}}</h3>
                    <p style="line-height: 1.5 !important; text-align: justify !important;">{!! $communities->$description_var !!}</p>
                </div>

            </div>

        </div>

    </section>

    <section class="second mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class=" row">
                <h3 class="text-center mb-4">{{ trans('frontLang.requestdetail') }} </h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_community/submit')}}">
                        @csrf
                        @honeypot
                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                        <input type="text" name="utm_medium" class="utm_parameters" hidden>
                        <input type="hidden" name="project" value="{{$communities->id}}" />
                        <div class=" mb-4">
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

                        <button type="submit" class="btn btn-block btn-lg" style="background-color: #1c1c1c !important;">
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

                <h3 class="mb-4">{{ trans('frontLang.locationMap') }}</h3>
                <div class="col-lg-12">
                    {!! $communities->map_embed_code !!}
                </div>
            </div>
        </div>
    </section>

    @if(count($project) > 0)
        <section class="mt-5" style="background-color: #1c1c1c; direction: rtl">
            <div class="container-fluid containerization mt-5">

                <div class="row">
                    <h3 class="mb-5 mt-5">{{ trans('frontLang.communityprojects') }}</h3>
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($project as $projects)
                            <div class="col-lg-4 mb-5">
                                <div class="card">

                                    @foreach($projects->images  as $single_img)
                                        @if($projects->images->first()==$single_img)
                                            <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                        @endif
                                    @endforeach


                                    <div class="card-body" style="padding: 0.5rem">
                                        <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                    <p> {{$projects->locationz->$name_var}}</p>
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
                                                <td style="text-align: center;color: rgb(31, 190, 31);width: 50%"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }}</td>
                                            </tr>
                                        </table>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height  rounded-0" alt="{{$projects->$project_title_var}}">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                                    <div class=" mb-4">
                                                        <input type="text"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="phone"  class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="email"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    <button type="submit" class="btn btn-dark btn-block" data-mdb-dismiss="modal">
                                                        {{ trans('frontLang.submit') }}
                                                    </button>
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


@else
    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="text-align: center !important;"> {{$communities->$community_title_var}}</h3>
                    <p style="line-height: 1.5 !important; text-align: justify !important;">{!! $communities->$description_var !!}</p>
                </div>

            </div>

        </div>

    </section>

    <section class="second mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class=" row">
                <h3 class="text-center mb-4">{{ trans('frontLang.requestdetail') }} </h3>
                <div class="col-lg-4 offset-md-4">
                    <form class="contact-form" method="post" action="{{URL('/request_detail_community/submit')}}">
                        @csrf
                        @honeypot
                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                        <input type="text" name="utm_medium" class="utm_parameters" hidden>
                        <input type="hidden" name="project" value="{{$communities->id}}" />
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

                        <button type="submit" class="btn btn-block btn-lg" style="background-color: #1c1c1c !important;">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row">

                <h3 class="mb-4">{{ trans('frontLang.locationMap') }}</h3>
                <div class="col-lg-12">

                    {!! $communities->map_embed_code !!}
                </div>
            </div>
        </div>
    </section>

    @if(count($project) > 0)
        <section class="mt-5" style="background-color: #1c1c1c;">
            <div class="container-fluid containerization mt-5">

                <div class="row">
                    <h3 class="mb-5 mt-5">{{ trans('frontLang.communityprojects') }}</h3>
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($project as $projects)
                            <div class="col-lg-4 mb-5">
                                <div class="card border border-1 border-white rounded-0 p-0">

                                    @foreach($projects->images  as $single_img)
                                        @if($projects->images->first()==$single_img)

                                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}"></a>

                                        @endif
                                    @endforeach


                                    <div class="card-body text-dark" style="padding: 0.5rem">

                                        <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" >
                                            <h5 class="card-titlem text-white">{{$projects->$project_title_var}}</h5>
                                        </a>
                                        <p class="text-white"> {{$projects->locationz->$name_var}}</p>
                                        <p class="card-text text-white">
                                            {{ trans('frontLang.projectType') }} : @foreach ($projects->project_types as $project_type)
                                            {{$project_type->$type_title_var}}
                                            @endforeach

                                        </p>



                                    </div>
                                    {{-- <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center;color: #fff;width: 50%"> <i class="fab fa-whatsapp"></i> Whatsapp</td>
                                            </tr>
                                        </table>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}"  class="modal-img-height rounded-0" alt="{{$projects->$project_title_var}}">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-6">
                                                    <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                                    <div class=" mb-4">
                                                        <input type="text"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="phone"  class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="email"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    <button type="submit" class="btn btn-dark btn-block" data-mdb-dismiss="modal">
                                                        {{ trans('frontLang.submit') }}
                                                    </button>
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

                @if(count($luxury_project) > 0)
                <div class="row">
                    <h3 class="mb-5 mt-5">{{ trans('frontLang.communityluxuryprojects') }}</h3>
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($luxury_project as $projects)
                            <div class="col-lg-4 mb-5">
                                <div class="card border border-1 border-white rounded-2 p-0">

                                    @foreach($projects->images  as $single_img)
                                        @if($projects->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" >
                                                <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                            </a>
                                        @endif
                                    @endforeach

                                    <div class="card-body text-dark" style="padding: 0.5rem">
                                        <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" >
                                            <h5 class="card-title">{{$projects->$project_title_var}}</h5>
                                        </a>
                                        <p class="text-white">{{$projects->locationz->$name_var}}</p>
                                        <p class="card-text text-white">
                                            {{ trans('frontLang.projectType') }} : @foreach ($projects->project_types as $project_type)
                                            {{ $project_type->$type_title_var }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <div class=" mb-4">
                                                        <input type="text"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="phone"  class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="mb-4">
                                                        <input type="email"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                                    </div>
                                                    <button type="submit" class="btn btn-dark btn-block" data-mdb-dismiss="modal">
                                                        {{ trans('frontLang.submit') }}
                                                    </button>
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
                @endif
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
@endif








@endsection
