<style>
  p{
    line-height: 1.6 !important;
  }
  .card {
    color: #000 !important;
  }
</style>
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

if($seg1 == 'en' || $seg1 == 'ar')
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
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3 class="mt-5 mb-5"  style="text-transform: uppercase;">{{ trans('frontLang.Offplan') }}  </h3><br>
                    <div class="row search-width" >






                    </div>
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
<section class="mt-5" style="direction: rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{URL('')}}"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }} </a></li>
                      <li class="breadcrumb-item active" aria-current="page"> {{ trans('frontLang.Offplan') }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <h3 class="text-left mb-5">{{ trans('frontLang.Offplan') }}</h3>
        <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Offplan_detail') }}</P>

    </div>

</section>
<section class="mt-5 mb-5" style="direction: rtl">
    <div class="container ">

        <div class="row">
            @if($project->total() == 0)
            <div class="col-lg-8 offset-md-2">

                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                    @csrf

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
                    <button type="submit" class="btn btn-dark btn-lg btn-block">
                        {{ trans('frontLang.submit') }}
                    </button>
                </form>
            </div>
            @else
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($project as $projects)
                    <div class="col-lg-4 mb-5">
                        <div class="card">
                            @if ($projects->project_status == '1')
                                <div class="communities-newlaunch">إطلاق <br> جديد </div>
                            @elseif ($projects->project_status == '0')
                            <div class="communities-newlaunch">تحت <br> الإنشاء</div>
                            @else
                            @endif

                            @foreach($projects->images  as $single_img)
                                @if($projects->images->first()==$single_img)
                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                @endif
                            @endforeach


                            <div class="card-body" style="padding: 0.5rem">
                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                              <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->locationz->$name_var}}</p>
                              <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                              @if ($projects->project_price == '')
                                <b> Prices On Request</b>
                                @else
                                <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange">  {{$projects->project_price}} {{ trans('frontLang.AED') }}</span></h5>
                                @endif


                              <hr>
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
                                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
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


                </div>

            </div>
            <div class="col-lg-12 mt-5 text-center">
                {!! $project->links() !!}
            </div>
            @endif

        </div>
        <!-- Button trigger modal -->



    </div>
</section>
@else
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{URL('')}}"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ trans('frontLang.Offplan') }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <h3 class="text-left mb-3">{{ trans('frontLang.Offplan') }}</h3>
        <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Offplan_detail') }}</P>

    </div>

</section>
<section class="mt-5 mb-5">
    <div class="container ">

        <div class="row">
            @if($project->total() == 0)
            <div class="col-lg-8 offset-md-2">

                <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
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
                    <button type="submit" class="btn btn-dark btn-lg btn-block">
                        {{ trans('frontLang.submit') }}
                    </button>
                </form>
            </div>
            @else


            <div class="col-lg-12">
                <div class="row">
                    @foreach ($project as $projects)
                    <div class="col-lg-4 mb-5">
                        <div class="card">
                            @if ($projects->project_status == '1')
                                <div class="communities-newlaunch">New <br> Launch</div>
                            @elseif ($projects->project_status == '0')
                            <div class="communities-newlaunch">Off <br> Plan</div>
                            @else
                            @endif

                            @foreach($projects->images  as $single_img)
                                @if($projects->images->first()==$single_img)
                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><img src="{{ URL::asset('uploads/projects/images/'.$projects->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top" alt="{{$projects->$project_title_var}}"></a>
                                @endif
                            @endforeach


                            <div class="card-body" style="padding: 0.5rem">
                                <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$projects->slug_link)}}" ><h5 class="card-title">{{$projects->$project_title_var}}</h5></a>
                              <p><i class="fas fa-map-marker-alt" style="color: green"></i> {{$projects->locationz->$name_var}}</p>
                              <p>{{ trans('frontLang.Developer') }} : {{$projects->developer->$name_var}}</p>
                              @if ($projects->project_price == '')
                                <b> Prices On Request</b>
                                @else
                                <h5>{{ trans('frontLang.startingfrom') }} <span style="color: orange">  {{$projects->project_price}} {{ trans('frontLang.AED') }}</span></h5>
                                @endif


                              <hr>
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
                                                <input type="hidden" name="project" value="{{$projects->id}}" />
                                                <div class=" mb-4">
                                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name"  required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="Phone Number" required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required />

                                                </div>
                                                <button type="submit" class="btn btn-dark btn-lg btn-block ">
                                                    Submit
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
            @endif
        </div>
        <!-- Button trigger modal -->



    </div>
</section>
@endif





@endsection
