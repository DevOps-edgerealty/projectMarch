{{-- <style>
  p{
    line-height: 1.6 !important;
    color: #fff !important;
  }

      input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
    }
    .btn {
        border-radius: 0 !important;
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
        z-index: -1000 !important;
        /* transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.125s !important; */
        /* margin-top: 10px !important */


    }
    /* .card:hover {
        /* box-shadow: 0px 0px 5px #fff !important; */
        opacity: 1 !important;
        transform: scale(1.03) !important;
        z-index: 1000 !important;
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    } */

</style> --}}
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
    body{
        background-color: #000 !important;
    }

    @media only screen and (max-width: 600px) {

        .font-ul{
        font-size: 10px !important;
        line-height: 30px;
        }
    }

    .font-ul{
        font-size: 16px;
        line-height: 30px;
        }
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
        <div id="intro-page" class="bg-image shadow-2-strong" style="margin-top: 0px;height: 220px;">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container-fluid containerization d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3  style="text-transform: uppercase;">  {{ trans('frontLang.Luxuryprojectsindubai') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
        </header>



</section>

@if ($langSeg == 'ar')
    <section class="mt-5" style="direction: rtl">
        <div class="container-fluid containerization ">
            <div class="row mb-5">
                <p style="color:#848484">وجهتك السكنية في دبي، الإمارات العربية المتحدة، اكتشف منازل أحلامك واختر من بين الفلل والشقق والقصور والبنتهاوس الحديثة. هنا ستجد أفخم الشقق المجهزة بأحدث المرافق، مما يوفر لك الإطلالات الخلابة على وسط مدينة دبي أو ذا بيتش.</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($project as $projects)
                    <div class="card mb-5" style="background-color: #000">

                        <div class="row g-0">
                        <div class="col-md-4">
                            @if ($projects->project_status == '1')
                                {{-- <div class="communities-newlaunch">New <br> Launch</div> --}}
                            @endif
                            @foreach($projects->images  as $single_img)
                                @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" ><h2 class="card-title" style="color: #fff">{{$projects->$project_title_var}}</h2></a>

                            <p class="card-text">
                                <div class="row">

                                    <div class="col-lg-6" style="width: 50%">

                                        <div class="row mt-2">
                                            <ul style="color: white" class="font-ul">
                                                <li  class="text-white">{{ trans('frontLang.Price') }}   :  <span style="color: #777777">{{$projects->project_price}} {{ trans('frontLang.AED') }}</span> </li>
                                                <li  class="text-white">{{ trans('frontLang.bedrooms') }} : <span style="color: #777777">{{$projects->bedrooms}}</span></li>
                                                <li  class="text-white">{{ trans('frontLang.location') }} : <span style="color: #777777"> {{$projects->locationz->$name_var}}</span></li>
                                            </ul>

                                        </div>



                                    </div>
                                    <div class="col-lg-6" style="width: 50%">
                                        <div class="row mt-2">
                                            <ul style="color: white" class="font-ul">
                                                <li class="text-white" >{{ trans('frontLang.projectType') }} :<span style="color: #777777"> @foreach ($projects->project_types as $project_type)
                                                    {{$project_type->$type_title_var}}
                                                @endforeach </span></li>
                                                <li class="text-white" >{{ trans('frontLang.floorNo') }} : <span style="color: #777777"> {{$projects->no_floors}}</span></li>
                                                <li class="text-white" >{{ trans('frontLang.unitsize') }} : <span style="color: #777777"> {{$projects->size}}</span></li>
                                            </ul>

                                        </div>


                                    </div>
                                </div>
                            </p>
                            <p >
                                <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}"  class="btn btn-outline-white btn-lg rounded-0">{{ trans('frontLang.readMore') }} </a>
                                <a href="#" class="btn btn-outline-white btn-lg rounded-0" data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}">{{ trans('frontLang.requestdetail') }}</a>
                            </p>

                            </div>
                        </div>
                        </div>

                    </div>
                    {{-- <hr style="color:#fff;"> --}}
                    <div class="modal fade" style="background-color: rgb(0, 0, 0, .7);" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered rounded-0">
                            <div class="modal-content rounded-0">
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                    <button type="button" class="btn-close" style="margin: 0;" data-mdb-dismiss="modal" aria-label="Close"></button>
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
                                            <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                                <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                    {{ trans('frontLang.requestdetail') }}
                                                </p>
                                            </div>
                                            <h4 class="text-center mb-4">{{$projects->$project_title_var}}</h4>
                                            <form class="contact-form" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                @csrf
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
                <div class="col-lg-12 text-center">
                    {!! $project->links() !!}
                </div>

            </div>
            <!-- Button trigger modal -->



        </div>
    </section>
@else

    <section class="mt-5d desktop-show">
        <div class="container-fluid containerization ">
            <div class="row mb-5">
                @if ($langSeg == 'ru')
                    <div class="col-lg-12">
                        <a href="{{ url($langSeg."/luxury-projects/map/1") }}" class="btn shadow-none rounded-0 btn-lg w-25 mx-auto text-center float-right project_btn mapBtn2" style="background-color: #0c5e03 !important; float: right !important;  border: 0 !important;">Map View</a>
                    </div>
                        <p style="color: #848484">Лучшее место для покупки элитных квартир находится в Дубае, ОАЭ. Познакомьтесь с домами Вашей мечты и выберите среди наших современных вилл, квартир, особняков и пентхаусов. Самые роскошные апартаменты оснащены самыми современными удобствами и имеют захватывающий дух вид на центр Дубая и пляж.</p>
                @else
                    <div class="col-lg-12">
                        <a href="{{ url($langSeg."/luxury-projects/map/1") }}" class="btn shadow-none rounded-0 btn-lg w-25 mx-auto text-center float-right project_btn mapBtn2" style="background-color: #0c5e03 !important; float: right !important;  border: 0 !important;">Map View</a>
                    </div>
                        <p style="color:#848484">Your destination for buying luxury apartments can be found in Dubai, United Arab Emirates. Explore your dream homes among our modern villas, apartments, mansions, and penthouses. The most luxurious apartments come with the latest facilities and breathtaking views from Downtown Dubai, or the Beach.</p>
                @endif

            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($project as $projects)
                    <div class="card my-3" style="background-color: #000">
                        <div class="row g-0 ">
                        <div class="col-md-4">
                            @if ($projects->project_status == '1')
                                {{-- <div class="communities-newlaunch">New <br> Launch</div> --}}
                            @endif
                            @foreach($projects->images  as $single_img)
                                @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" >
                                        <img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 100%" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" ><h2 class="card-title" style="color: #fff">{{$projects->$project_title_var}}</h2></a>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-lg-6" style="width: 50%">
                                        <div class="row mt-2">
                                            <ul style="color: white" class="font-ul">
                                                @if ($langSeg == 'ru')
                                                    <li class="text-white">{{ trans('frontLang.Price') }}   : $ <span style="color: #848484">{{$projects->project_price_usd}}</span> </li>
                                                @else
                                                    <li class="text-white">{{ trans('frontLang.Price') }}   :  <span style="color: #848484">{{ trans('frontLang.AED') }} {{$projects->project_price}}</span> </li>
                                                @endif
                                                <li class="text-white">{{ trans('frontLang.bedrooms') }} : <span style="color: #848484">{{$projects->bedrooms}}</span></li>
                                                <li class="text-white">{{ trans('frontLang.location') }} : <span style="color: #848484"> {{$projects->locationz->$name_var}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="width: 50%">
                                        <div class="row mt-2">
                                            <ul style="color: #848484" class="font-ul">
                                                <li class="text-white" >{{ trans('frontLang.projectType') }} :<span style="color: #848484"> @foreach ($projects->project_types as $project_type)
                                                    {{$project_type->$type_title_var}}
                                                @endforeach </span></li>
                                                <li class="text-white" >{{ trans('frontLang.floorNo') }} : <span style="color: #848484"> {{$projects->no_floors}}</span></li>
                                                <li class="text-white" >{{ trans('frontLang.unitsize') }} : <span style="color: #848484"> {{$projects->size}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <div class="row">
                                <div class="col-lg-12" >
                                    <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" class="btn btn-outline-white btn-lg rounded-0">{{ trans('frontLang.readMore') }} </a>

                                    <a href="#" class="btn btn-outline-white btn-lg rounded-0" data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}">{{ trans('frontLang.requestdetail') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                    {{-- <hr style="color:#fff;"> --}}
                    <div class="modal fade" style="background-color: rgb(0, 0, 0, .3);" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                            <div class="modal-content rounded-0">
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                    <button type="button" class="btn-close" style="margin: 0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div> --}}
                                <div class="modal-body bg-black rounded-0 border border-secondary">
                                    <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
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
                                            <form class="contact-form" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                @csrf
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
                                                @honeypot
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
                    @endforeach






                </div>
                <div class="col-lg-12">
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
    </section>



    <section class="mt-5 mobile-show">
        <div class="container ">
            <div class="row mb-5">
                @if ($langSeg == 'ru')
                        <p style="color: #848484">Лучшее место для покупки элитных квартир находится в Дубае, ОАЭ. Познакомьтесь с домами Вашей мечты и выберите среди наших современных вилл, квартир, особняков и пентхаусов. Самые роскошные апартаменты оснащены самыми современными удобствами и имеют захватывающий дух вид на центр Дубая и пляж.</p>
                @else
                        <p style="color:#848484">Your destination for buying luxury apartments can be found in Dubai, United Arab Emirates. Explore your dream homes among our modern villas, apartments, mansions, and penthouses. The most luxurious apartments come with the latest facilities and breathtaking views from Downtown Dubai, or the Beach.</p>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($project as $projects)
                    <div class="card my-3" style="background-color: #000">

                        <div class="row g-0 ">
                        <div class="col-md-4">
                            @if ($projects->project_status == '1')
                                {{-- <div class="communities-newlaunch">New <br> Launch</div> --}}
                            @endif
                            @foreach($projects->images  as $single_img)
                                @if($projects->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 100%" class="card-img-top rounded-0" alt="{{$projects->$project_title_var}}"></a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-8">
                            <div class="card-body mb-3 p-2">
                                <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" ><h2 class="card-title" style="color: #fff">{{$projects->$project_title_var}}</h2></a>


                            <p class="card-text">
                                <div class="row">
                                    <div class="col-lg-6" style="width: 50%">
                                        <div class="row mt-2">
                                            <ul style="color: white" class="font-ul">
                                                @if ($langSeg == 'ru')
                                                    <li class="text-white">{{ trans('frontLang.Price') }}   : $ <span style="color: #777777">{{$projects->project_price_usd}}</span> </li>
                                                @else
                                                    <li class="text-white">{{ trans('frontLang.Price') }}   : {{ trans('frontLang.AED') }} <span style="color: #777777">{{$projects->project_price}}</span> </li>
                                                @endif
                                                <li class="text-white">{{ trans('frontLang.bedrooms') }} : <span style="color: #777777">{{$projects->bedrooms}}</span></li>
                                                <li class="text-white">{{ trans('frontLang.location') }} : <span style="color: #777777"> {{$projects->locationz->$name_var}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="width: 50%">
                                        <div class="row mt-2">
                                            <ul style="color: white" class="font-ul">
                                                <li class="text-white">{{ trans('frontLang.projectType') }} :<span style="color: #777777"> @foreach ($projects->project_types as $project_type)
                                                    {{$project_type->$type_title_var}}
                                                @endforeach </span></li>
                                                <li class="text-white">{{ trans('frontLang.floorNo') }} : <span style="color: #777777"> {{$projects->no_floors}}</span></li>
                                                <li class="text-white">{{ trans('frontLang.unitsize') }} : <span style="color: #777777"> {{$projects->size}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </p>
                            <div class="row">
                                <div class="col-lg-12 mx-auto" >
                                    <a href="{{url($langSeg .'/'.'dubai-luxury-projects'.'/'.$projects->slug_link)}}" class="btn btn-outline-white btn-md mx-auto rounded-0">{{ trans('frontLang.readMore') }} </a>

                                    <a href="#" class="btn btn-outline-white btn-md mx-auto rounded-0" data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}">{{ trans('frontLang.requestdetail') }}</a>
                                </div>



                            </div>


                            </div>
                        </div>
                        </div>

                    </div>
                    {{-- <hr style="color:#fff;"> --}}
                    <div class="modal fade" style="background-color: rgb(0, 0, 0, .3);" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                            <div class="modal-content rounded-0">
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                    <button type="button" class="btn-close" style="margin: 0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div> --}}
                                <div class="modal-body bg-black rounded-0 border border-secondary">
                                    <div class="m-0 w-100 p-0 mx-auto bg-black py-1">
                                            <p class="fw-bold text-white text-center m-0 p-0" style="font-size: 1.8rem !important;">
                                                {{ trans('frontLang.requestdetail') }}
                                            </p>
                                        </div>
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
                                            <form class="contact-form" method="post" action="{{URL('/request_detail_project/submit')}}">
                                                @csrf
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
                                                @honeypot
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
                    @endforeach






                </div>
                <div class="col-lg-12">
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
    </section>

@endif




@endsection
