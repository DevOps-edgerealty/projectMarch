@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title>{{$developer->$meta_var }}</title>
        <meta name="description" content="{{$developer->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$developer->$meta_keywords_var}} "/>


@endsection
<style>
    p {
        line-height: 1.5 !important;
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

$name_var = "name_" . trans('backLang.boxCode');

$title_var = "title_" . trans('backLang.boxCode');

$address_var = "address_" . trans('backLang.boxCode');

$city_name_var= "city_name_" . trans('backLang.boxCode');

$type_name_var= "type_name_" . trans('backLang.boxCode');

$description_var = "description_" . trans('backLang.boxCode');

$ownership_var = "ownership_" . trans('backLang.boxCode');

$project_title_var = "title_" . trans('backLang.boxCode');

$type_title_var = "name_" . trans('backLang.boxCode');

$address_title_var = "address_" . trans('backLang.boxCode');


?>
@section('content')

<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ $developer->$name_var }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>

<section class="mt-5">
    <div class="container">

        <h3 class="text-center"></h3>

    </div>
</section>

@if ($langSeg == 'ar')
    <section class="mt-5 mb-5" >
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-4 ">
                    <div class="row  p-3">
                        <div class="col-lg-12">
                            <h3 class="text-center mb-3">{{ trans('frontLang.requestdetail') }}</h3>
                            <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                                @csrf

                                <div class="mb-4">
                                    <input style="direction: rtl;" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                </div>

                                <!-- Email input -->
                                <div class="mb-4">
                                    <input style="direction: rtl;" type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                </div>

                                <!-- Email input -->
                                <div class="mb-4">
                                    <input style="direction: rtl;" type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                                </div>
                                @honeypot
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    {{ trans('frontLang.submit') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">

                    <div class="row ">



                        <div class="col-lg-9 p-5">

                                <p class="">{!!html_entity_decode($developer->$description_var)!!} </p>

                        </div>
                        <div class="col-lg-3">

                            <img src="{{ URL::asset('uploads/developers/'.$developer->id.'/'.$developer->image) }}" style="width: 100%"  alt="Listing">


                        </div>

                    </div>
                </div>



            </div>


        </div>
    </section>

    @if(count($project_luxury) > 0)
    <section style="background-color: #eaeaea; direction: rtl">
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">مشاريع فاخرة {{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project_luxury as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-luxury-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-luxury-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif


    @if(count($project) > 0)
    <section style="direction: rtl">
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">المشروعات قيد الانشاء{{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-new-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-new-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif


    @if(count($project_ready) > 0)
    <section style="background-color: #eaeaea;direction: rtl">
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">مشاريع جاهزة  {{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project_ready as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-ready-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-ready-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif








@else
    <section class="mt-5 mb-5" >
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-8">

                    <div class="row ">

                        <div class="col-lg-3 my-auto">

                            <img src="{{ URL::asset('uploads/developers/'.$developer->id.'/'.$developer->image) }}" style="width: 100%"  alt="Listing">

                        </div>
                        <div class="col-lg-9 p-5 my-auto ">

                                <p class="">{!!html_entity_decode($developer->$description_var)!!} </p>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 my-auto ">
                    <div class="row  p-3">
                        <div class="col-lg-12">
                            <h3 class="text-center mb-3">{{ trans('frontLang.requestdetail') }}</h3>
                            <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                                @csrf

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

                                <button type="submit" class="btn btn-dark btn-lg btn-block ">
                                    {{ trans('frontLang.submit') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>


            </div>


        </div>
    </section>
    @if(count($project_luxury) > 0)
    <section style="background-color: #eaeaea;">
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">{{ trans('frontLang.luxuryprojectsby') }} {{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project_luxury as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-luxury-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-luxury-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif


    @if(count($project) > 0)
    <section>
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">{{ trans('frontLang.offplanprojectby') }}{{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-new-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-new-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif


    @if(count($project_ready) > 0)
    <section style="background-color: #eaeaea;">
        <div class="container">
            <div class="row">
                <h3 class="mt-5 mb-4">{{ trans('frontLang.readyprojectby') }} {{ $developer->$name_var }}</h3>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($project_ready as $projects)
                        <div class="col-lg-4 mb-5">
                            <div class="card">


                                @foreach($projects->images  as $single_img)
                                    @if($projects->images->first()==$single_img)
                                    <a href="/<?php echo $langSeg;?>/dubai-ready-projects/{{$projects->slug_link}}"><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                    @endif
                                @endforeach


                                <div class="card-body" style="padding: 0.5rem">
                                    <a href="/<?php echo $langSeg;?>/dubai-ready-projects/{{$projects->slug_link}}"><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                                <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->$address_title_var}}</p>
                                <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                                @if ($projects->project_price == '')
                                    <b> Prices On Request</b>
                                    @else
                                    <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange"> {{ trans('frontLang.AED') }} {{$projects->project_price}} </span></h5>
                                    @endif


                                <hr>
                                <p class="card-text">

                                    @foreach ($projects->project_types as $project_type)
                                    {{$project_type->$type_title_var}}
                                    @endforeach
                                    : {{$projects->bedrooms}}
                                </p>

                                </div>
                                <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="text-align: center;border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $projects->id }}" style="color: #000"><i class="far fa-envelope"> </i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                            <td style="text-align: center;width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: rgb(31, 190, 31)"> <i class="fab fa-whatsapp"></i>  {{ trans('frontLang.whatsapp') }} </a></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $projects->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
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
                                                    <button type="submit" class="btn btn-dark btn-lg btn-block ">
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
        </div>
    </section>
    @endif
@endif







@endsection
