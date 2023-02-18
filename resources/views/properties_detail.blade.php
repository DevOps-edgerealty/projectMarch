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
    .iti-phone, .intl-tel-input {
        width: 100% !important;
    }

    html, body {width: auto!important; overflow-x: hidden!important; line-height: 1.6 !important;}

</style>

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
    <div class="mb-5 " style="background-color: #000; height: 90px; border-bottom: #848484 1px solid;" >
    </div>
</section>


{{-- ARABIC --}}
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
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }}</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{$property_detail->$title_var}}</li>
                        </ol>
                    </nav> --}}

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
                                    {{ trans('frontLang.Price') }} <b> :
                                    <span style="color: #fff;">
                                        {{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }}
                                    </span></b>
                                </h2>
                            </div>

                            <div class="USD skill">
                                <h2>
                                    {{ trans('frontLang.Price') }} <b> :
                                    <span style="color: #fff;">
                                        {{ number_format($property_detail->price_usd) }} USD </b>
                                    </span>
                                </h2>
                            </div>

                            <select class="" name="skill_dropdown" id="skill_dropdown" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid; border-radius: 4px;">
                                <option value="AED">AED</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    @else


                        <div class="col-lg-12" style="display: flex; flex-direction: row; align-items: center;">
                            <div class="AED skill_rent" style="display: block !important"><h4>{{ trans('frontLang.yearly') }} <b>  <span style="color: #fff;">{{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }} </span></b></h4></div>
                            <div class="USD skill_rent"><h4>{{ trans('frontLang.yearly') }} <b>  <span style="color: #fff;"> {{ number_format($property_detail->price_usd) }} USD </b></span></h4></div>
                            <select class="" name="skill_dropdown_rent" id="skill_dropdown_rent" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid; border-radius: 4px;">

                                <option value="AED">AED</option>
                                <option value="USD">USD</option>

                            </select>
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
                        {{$property_detail->area}} Sq. Ft
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
                            Show all photos
                        </button>
                    </a>
                    <a href="{{ URL::asset('properties/map') }}">
                        <button class="desktop-show position-absolute btn btn-lg btn-outline-white rounded-0 bg-dark text-white my-auto" style="bottom: 45px; left: 330px; z-index: 100 !important;">
                            View Map
                        </button>
                    </a>
                    <div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel">

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
                    </div>

                </div>

                <div class="col-lg-7 d-md-block d-lg-block d-none">
                    <div class="row">
                        <div class="col-md-6 px-1">
                            @if( $property_detail->images->count() > 1)
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
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- mobile images --}}
    <section class=" mobile-show" style="direction: rtl">
        <div class="container mt-2 ">
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12 shadow p-3" >
                    <h5>{{$property_detail->$title_var}}</h5>
                    <p> {{$property_detail->locationss->$name_var}}</p>



                    @if ($property_detail->type_id == '1')
                        <h5> <b>{{ trans('frontLang.Price') }} <span style="color: #fff;">  {{ number_format($property_detail->price) }}  {{ trans('frontLang.AED') }} </span></b></h5>
                    @else

                        <h5> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff;">   {{ number_format($property_detail->price) }}  {{ trans('frontLang.AED') }}</b> </span></h5>
                    @endif

                    <hr>
                    <div class="row">
                        <div class="col-lg-6" style="width: 50%">
                            <p class="my-1" style="color: grey !important;"><b> {{ trans('frontLang.propertyType') }} </b> {{$property_detail->property_type->$cat_name_var}}</p>
                            <p class="my-1" style="color: grey !important;"><b>{{ trans('frontLang.permitno') }}</b> : {{$property_detail->permit_no}}</p>
                            <p class="my-1" style="color: grey !important;"><b>{{ trans('frontLang.bedrooms') }}</b> : {{$property_detail->bedrooms}}</p>

                        </div>
                        <div class="col-lg-6" style="width: 50%">
                            <p class="my-1" style="color: grey !important;"><b>{{ trans('frontLang.unitsize') }}</b> : {{$property_detail->area}}</p>
                            <p class="my-1" style="color: grey !important;"><b>{{ trans('frontLang.bathrooms') }}</b> : {{$property_detail->bathrooms}}</p>
                            <p class="my-1" style="color: grey !important;"><b>{{ trans('frontLang.Parking') }}</b> : {{ $property_detail->parking }}</p>
                        </div>
                    </div>


                </div>

            </div>



        </div>
        <div class="container">
            <div class="row mt-5 mb-3">

                <div class="col-lg-6" style="width: 40%" >
                    @if (file_exists('public/assets/images/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                            <img src="{{ URL::asset('public/assets/images/agents/'.$agent->id.'/'.$agent->image) }}" class="rounded-circle rounded-0 mx-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image"/>
                        </a>
                    @else
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                            <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="rounded-circle rounded-0 mx-auto" style="width: 100px; height: 100px;"  alt="agent-image">
                        </a>
                    @endif
                </div>


                <div class="col-lg-6" style="width: 60%" >
                    <p class="text-white fw-bold my-2" style="font-size: 1.2rem !important">
                        {{ $property_detail->agentss->$name_var }}
                    </p>
                    <p class="text-white fw-light my-2" style="font-size: .9rem !important">
                        {{ $property_detail->agentss->$designation_var }}
                    </p>
                    <p class="text-white fw-light my-2" style="font-size: .9rem !important">
                        {{ $property_detail->agentss->$language_var }}
                    </p>
                </div>





            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a style="width:32%" href="tel:{{$property_detail->agentss->phone}}" class="btn btn-outline-white"><i class="fas fa-phone-alt fa-2x"> </i>  </a>

                    <a style="width:32%" href="#"  data-mdb-toggle="modal" data-mdb-target="#book_a_viewing_mobile" class="btn btn-outline-white"><i class="far fa-calendar-check fa-2x"> </i></a>

                    <a style="width:32%" class=" btn btn-outline-white" href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">

                        <i class="fab fa-whatsapp fa-2x"> </i>
                    </a>
                </div>

                {{-- <div class="modal fade" id="exampleModal-mobile-property" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.bookaviewing') }}</h5>
                                <button type="button" class="btn-close" style="margin:0;" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <h6 class="text-center mb-4">{{$property_detail->$title_var}}</h6>
                                        <form class="contact-form" method="post" action="{{URL('/book_view/submit')}}">
                                            @csrf
                                            @honeypot
                                            <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                            <div class="mb-4">
                                                <label for="">{{ trans('frontLang.date') }}</label>
                                                <input name="book_date" type="date" class="form-control form-control-lg"  name="viewing Date">

                                            </div>
                                            <div class="mb-4">
                                                <label for="">{{ trans('frontLang.Time') }}</label>
                                                <select name="book_time" id="cars" class="form-control form-control-lg" >
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
                </div> --}}

                {{-- mobile book a viewing --}}
                    <div class="modal fade" id="exampleModal-mobile-property" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered rounded-0">
                            <div class="modal-content bg-black">
                                <div class="modal-header py-2">
                                    <h5 class="modal-title text-center text-white" id="exampleModalLabel">{{ trans('frontLang.bookaviewing') }} </h5>
                                    {{-- <button type="button" class="btn-close text-white bg-white" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
                                </div>
                                <div class="modal-body bg-black">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h6 class="text-center text-white mb-4">{{$property_detail->$title_var}}</h6>
                                            <form class="contact-form" method="post" action="{{URL('/book_view/submit')}}">
                                                @csrf
                                                @honeypot
                                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selectdate') }}</label>
                                                    <input name="book_date" type="date" class="form-control bg-black form-control-lg border border-white text-white"  name="viewing Date" required>

                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selecttime') }}</label>
                                                    <select name="book_time"  class="form-control bg-black form-control-lg border border-white text-white"  required>
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
                                                    <input type="text" name="name" class="form-control bg-black  form-control-lg border border-white" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="phone" name="phone" class="form-control bg-black  form-control-lg iti-phone border border-white" placeholder="{{ trans('frontLang.phone') }}" required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="email" name="email" class="form-control bg-black  form-control-lg border border-white" placeholder="{{ trans('frontLang.email') }}" required />

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
    </section>

    {{-- short description & agent form desktop --}}
    <section class="desktop-show" style="direction: rtl">
        <div class="container-fluid containerization mt-3">
            <div class="row">
                <div class="col-lg-9 shadow p-3">
                    <span id="about_mobile" class="" style="text-align: justify !important; color: grey !important; font-size: 1.5em !important; line-height: 1 !important; ">

                            {!! html_entity_decode($property_detail->$description_var) !!}

                    </span>
                </div>


                {{-- agent card --}}
                <div class="col-lg-3 sticky-div py-0 px-0" id="sticky_agent" >


                        <div class="card bg-black border border-1 border-white rounded-0 pt-3 pb-0" style="border: 0.5px #848484 solid !important; transform: scale(1) !important;">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                @if (file_exists('public/assets/images/agents/'.$agent->id.'/'.$agent->image))
                                    <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                        <img src="{{ URL::asset('public/assets/images/agents/'.$agent->id.'/'.$agent->image) }}" class="rounded-circle rounded-0 mx-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image"/>
                                    </a>
                                @else
                                    <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                        <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="rounded-circle rounded-0 mx-auto" style="width: 100px; height: 100px;"  alt="agent-image">
                                    </a>
                                @endif

                                {{-- <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a> --}}

                                <div class="text-center mx-auto">
                                    <p class="text-white mb-0" style="font-size: 1rem !important">
                                        {{ $agent->name_en }}
                                    </p>
                                    <p class="text-white fw-light" style="font-size: .8rem !important">
                                        {{ $agent->language_en }}
                                    </p>
                                </div>
                            </div>

                            <div class="card-body py-2">

                                <div class="row my-3">
                                    <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                        @csrf
                                        @honeypot
                                        <input type="hidden" name="property" value="{{$property_detail->id}}">
                                        <div class="input-group mb-3">
                                            <input type="text" dir="rtl" class="form-control text-white" placeholder="Full Name" aria-label="Full Name" name="name" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            {{-- <input type="text" class="form-control text-white" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required> --}}
                                            <input type="phone" dir="rtl" name="phone" class="form-control w-100 iti-phone rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #000 !important; width: 100% !important;" placeholder="{{ trans('frontLang.phone') }}" required />
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" dir="rtl" class="form-control text-white" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                        </div>
                                        <button type="submit" class="btn btn-block  rounded-0 text-white" style="border: 0.5px #848484 solid !important; background-color: #292828">
                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                            {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                            <span class="btn-txt">
                                                {{ trans('frontLang.registerInterest') }}
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                {{-- <div class="row my-3">

                                    <div class="col-6">
                                        <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                            <button class="btn btn-outline-success bg-success text-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                                    <i class="fab fa-whatsapp"></i>
                                                    {{ trans('frontLang.whatsapp') }}
                                            </button>
                                        </a>
                                    </div>

                                    <div class="col-6">
                                        <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                            <button class="btn btn-outline-white text-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                                    <i class="fa fa-phone-alt"></i>
                                                    {{ trans('frontLang.callUs') }}
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12">
                                        <button class="btn btn-outline-white text-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#get_in_touch_desktop" style="color: #fff !important">
                                                <i class="far fa-envelope"></i>
                                                {{ trans('frontLang.requestdetail') }}
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12">
                                        <button class="btn btn-outline-white text-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                                <i class="far fa-eye"></i>
                                                {{ trans('frontLang.bookaviewing') }}
                                            </a>
                                        </button>
                                    </div>
                                </div> --}}

                            <div class="row my-3">
                                <p class="mt-3 mx-auto text-center" style="color:grey !important;">
                                    <i class="fa fa-share text-" aria-hidden="true" style="height: 15px !important;"></i>
                                    {{ trans('frontLang.agentCardShare') }}
                                </p>
                                <div class="col-6 mx-auto">
                                    <div class="mx-auto ">
                                        <ul class="list-group list-group-horizontal-sm bg-black text-center mx-auto">
                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 25px !important; width: 100% !important">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-2">حول هذا العقار</h3>
                    <span style="text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important; ">
                        {{-- {!!html_entity_decode($property_detail->$description_var)!!} --}}

                        <span id="lessmobilear" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
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
                        @endif
                    </span>
                </div>
            </div>
            <div class="row mx-auto">

                <div class="col-lg-12">
                    <?php

                    $Property_map_embed_code=str_replace('style="border:0"','',$property_detail->map_embed_code);

                    $Property_map_embed_code=str_replace('frameborder="0"','',$Property_map_embed_code);

                    echo $Property_map_embed_code=str_replace('width="','style="height: 200px !important;width:100%!important" width="',$Property_map_embed_code);

                    ?>
                </div>
            </div>

        </div>
    </section>

    <hr class="container mt-5 mb-3">

    {{-- similar properties --}}
    <section class="mt-2 mobile-show" style="background-color: #000">
        <div class="container">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)


                    @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 mt-2">
                            <div class="card bg-black rounded-0 border border-white border-1" style="height: 460px;">
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
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</span></b></h5>
                                    @else
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</b> </span></h5>
                                    @endif
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}"  class="my-0">
                                        <h6 class="card-title fw-light text-white mt-2 mb-0" style="font-size: 1rem !important">{{ $property->$title_var }}</h6>
                                    </a>
                                    <p class="fw-light mt-0">
                                        {{ $property->locationss->$name_var }}
                                    </p>

                                    <p class="card-text">
                                    </p>

                                    <div class="row" style="display:block;font-size: 15px;" >
                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }}  </span>

                                        <span style="color: #848484">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #848484">  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
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
                            No Properties for Sale or Rent within the same area
                        </p>
                    @endif

            </div>
        </div>
    </section>

    <section class="mt-2 desktop-show" style="background-color: #000">
        <div class="container-fluid containerization">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)


                    @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 mt-2">
                            <div class="card bg-black rounded-0 border border-white border-1" style="height: 460px;">
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
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</span></b></h5>
                                    @else
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</b> </span></h5>
                                    @endif
                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}"  class="my-0">
                                        <h6 class="card-title fw-light text-white mt-2 mb-0" style="font-size: 1rem !important">{{ $property->$title_var }}</h6>
                                    </a>
                                    <p class="fw-light mt-0">
                                        {{ $property->locationss->$name_var }}
                                    </p>

                                    <p class="card-text">
                                    </p>

                                    <div class="row" style="display:block;font-size: 15px;" >
                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }}  </span>

                                        <span style="color: #848484">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #848484">  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }} </h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
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
                            No Properties for Sale or Rent within the same area
                        </p>
                    @endif

            </div>
        </div>
    </section>


{{-- ENGLISH --}}
@else

    {{-- header / breadcrumbs --}}
    <section class="desktop-show mt-5">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-10 mb-4">
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="{{URL('')}}" class="text-white"><i class="fas fa-home"> </i> {{ trans('frontLang.Home') }}</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{$property_detail->$title_var}}</li>
                        </ol>
                    </nav> --}}

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
                                    {{ trans('frontLang.Price') }} <b> :
                                    <span style="color: #fff;">
                                        {{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }}
                                    </span></b>
                                </h2>
                            </div>

                            <div class="USD skill">
                                <h2>
                                    {{ trans('frontLang.Price') }} <b> :
                                    <span style="color: #fff;">
                                        {{ number_format($property_detail->price_usd) }} USD </b>
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
                            <div class="AED skill_rent" style="display: block !important"><h4>{{ trans('frontLang.yearly') }} <b>  <span style="color: #fff;">{{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }} </span></b></h4></div>
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
                        {{$property_detail->area}} Sq. Ft
                        |
                        {{ trans('frontLang.permitno') }} {{$property_detail->permit_no}}
                    </h5>



                </div>
                <div class="col-lg-2">
                    {{-- Book a viewing --}}
                    <div class="row h-100 my-auto">

                        <a href="#"  data-mdb-toggle="modal" data-mdb-target="#book_a_viewing_desktop" class="my-auto">
                            <button class="btn btn-outline-white px-2 w-100 rounded-0 py-2 text-capitalize my-auto" style="font-size: .8rem !important; border: 0.5px #848484 solid !important; background-color: #292828 !important;">
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
        <div class="container-fluid container-carousel" >
            <div class="row">
                <div class="col-md-6 position-relative">
                    <a data-fslightbox="property-carousel" href="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$property_detail->images[0]->image) }}">
                        <button class="desktop-show position-absolute btn btn-lg btn-outline-white rounded-0 bg-dark text-white my-auto" style="bottom: 45px; left: 130px; z-index: 100 !important;">
                            Show all photos
                        </button>
                    </a>
                    <a href="{{ URL::asset('properties/map') }}">
                        <button class="desktop-show position-absolute btn btn-lg btn-outline-white rounded-0 bg-dark text-white my-auto" style="bottom: 45px; left: 330px; z-index: 100 !important;">
                            View Map
                        </button>
                    </a>
                    <div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel">

                        <div class="carousel-inner">
                            @foreach ($property_detail->images as $image)

                                <div class="carousel-item <?php if($secondimage){ echo "active"; $secondimage=false;}?>">
                                    <img src="{{ URL::asset('uploads/properties/'.$property_detail->id.'/'.$image->image) }}" class="d-block w-100 slider-property" alt="..." onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
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
                    </div>

                </div>
                <div class="col-md-6 d-md-block d-lg-block d-none">
                    <div class="row">
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
                    </div>

                </div>

                {{-- <div class="col-lg-3">

                        <img src="{{URL::asset('uploads/agents/2/cpagent-1629363032.jpeg')}}"  alt="">
                        <div class="col-lg-12" >
                            <h4 class="text-left mt-2">{{$property_detail->agentss->$name_var}}</h4>
                            <h6 class="text-left mt-2">{{$property_detail->agentss->$designation_var}}</h6>
                            <h6 class="text-left mt-2">{{$property_detail->agentss->$language_var}}</h6>
                        </div>

                        <a href="tel:{{$property_detail->agentss->phone}}" class="btn btn-primary btn-lg btn-block mt-4"><i style="margin-right: 10px" class="fas fa-phone-alt"> </i> {{ trans('frontLang.Callnow') }}</a>

                        <a  class="first btn btn-dark btn-lg btn-block"><i style="margin-right: 10px" class="far fa-calendar-check"> </i> {{ trans('frontLang.bookaviewing') }}</a>

                        <a class="first btn btn-success btn-lg btn-block" href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">

                            <i style="margin-right: 10px" class="fab fa-whatsapp"> </i> {{ trans('frontLang.whatsapp') }}
                        </a>

                </div> --}}

            </div>
        </div>
    </section>

    {{-- mobile images --}}
    <section class=" mobile-show">
        <div class="container mt-2 ">
            <div class="row" style="padding-right: 10px; padding-left: 10px; margin-top: 10px;">
                <div class="col-lg-12 shadow p-3 " >
                    <h5 class="fw-light mb-0" style="font-size: 1.5rem !important;">{{$property_detail->$title_var}}</h5>
                    <p style="color: grey !important;" class="fw-bold my-1"> {{$property_detail->locationss->$name_var}}</p>

                    @if ($property_detail->type_id == '1')

                        <div class="col-lg-12 text-center" style="display:flex;align-items: center;">

                            <div class="AED skill_mobile" style="display: block !important">
                                <h4 class="fw-light"> <b>Price <span style="color: #fff;">{{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }} </b> </span></h4>
                            </div>
                            <div class="USD skill_mobile">
                                <h4 class="fw-light"> <b>Price <span style="color: #fff;"> {{ number_format($property_detail->price_usd) }} USD </b> </span></h4>
                            </div>

                            <select class="" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px;margin-left:10px;margin-top: -9px;border: 2px solid;border-radius: 4px;">
                                <option value="AED">AED</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>

                    @else


                        <div class="col-lg-12 text-center" style="display:flex;align-items: center;">

                            <div class="AED skill_rent_mobile" style="display: block !important">
                                <h4 class="fw-light"> <b>Yealry <span style="color: #fff;">{{ number_format($property_detail->price) }} {{ trans('frontLang.AED') }} </b> </span></h4>
                            </div>
                            <div class="USD skill_rent_mobile">
                                <h4 class="fw-light"> <b>Yealry <span style="color: ##fff;"> {{ number_format($property_detail->price_usd) }} USD </b> </span></h4>
                            </div>
                        </div>
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-lg-6" style="width: 50%">
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.propertyType') }} </b> {{$property_detail->property_type->$cat_name_var}}</p>
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.permitno') }}</b> : {{$property_detail->permit_no}}</p>
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.bedrooms') }}</b> : {{$property_detail->bedrooms}}</p>
                        </div>

                        <div class="col-lg-6" style="width: 50%">
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.unitsize') }}</b> : {{$property_detail->area}}</p>
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.bathrooms') }}</b> : {{$property_detail->bathrooms}}</p>
                            <p style="font-size: 14px; color: grey !important;" class="fw-light my-1"><b>{{ trans('frontLang.Parking') }}</b> : {{ $property_detail->parking }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            {{-- <div class="row mt-0 mb-3 border-top border-bottom border-white py-3"> --}}
            <div class="row mt-0 mb-3 py-3">

                <div class="col-lg-6" style="width: 40%" >
                    {{-- <img src="{{URL::asset('uploads/agents/2/cpagent-1629363032.jpeg')}}" style="width: 130px" alt=""> --}}
                    @if (file_exists('public/assets/images/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                            <img src="{{ URL::asset('public/assets/images/agents/'.$agent->id.'/'.$agent->image) }}" class="rounded-circle rounded-0 mx-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image"/>
                        </a>
                    @else
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                            <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="rounded-circle rounded-0 mx-auto" style="width: 100px; height: 100px;"  alt="agent-image">
                        </a>
                    @endif
                </div>

                {{-- mobile agent card --}}
                <div class="col-lg-6 my-auto" style="width: 60%" >
                    <p class="text-white fw-bold my-2" style="font-size: 1.2rem !important">
                            {{ $agent->name_en }}
                    </p>
                    <p class="text-white fw-light my-2" style="font-size: .9rem !important">
                        {{ $agent->designation_en }}
                    </p>
                    <p class="text-white fw-light my-2" style="font-size: .9rem !important">
                        {{ $agent->language_en }}
                    </p>
                </div>

                <div class="row mt-4 mb-0 mx-auto">
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
                            <div class="modal-content bg-black">
                                <div class="modal-header py-2">
                                    <h5 class="modal-title text-center text-white" id="exampleModalLabel">{{ trans('frontLang.bookaviewing') }} </h5>
                                    {{-- <button type="button" class="btn-close text-white bg-white" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
                                </div>
                                <div class="modal-body bg-black">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h6 class="text-center text-white mb-4">{{$property_detail->$title_var}}</h6>
                                            <form class="contact-form" method="post" id="bookAViewingmobile" action="{{URL('/book_view/submit')}}">
                                                @csrf
                                                @honeypot
                                                <input type="hidden" id="custId" name="property_id" value="{{$property_detail->id}}">

                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selectdate') }}</label>
                                                    <input name="book_date" type="date" class="form-control bg-black form-control-lg border border-white text-white"  name="viewing Date" required>

                                                </div>
                                                <div class="mb-4">
                                                    <label for="" class="text-white">{{ trans('frontLang.selecttime') }}</label>
                                                    <select name="book_time"  class="form-control bg-black form-control-lg border border-white text-white"  required>
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
                                                    <input type="text" name="name" class="form-control bg-black  form-control-lg border border-white" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="phone" name="phone" class="form-control bg-black  form-control-lg iti-phone border border-white" placeholder="{{ trans('frontLang.phone') }}" required />

                                                </div>

                                                <!-- Email input -->
                                                <div class="mb-4">
                                                    <input type="email" name="email" class="form-control bg-black  form-control-lg border border-white" placeholder="{{ trans('frontLang.email') }}" required />

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

    {{-- short description & agent form desktop --}}
    <section class="desktop-show ">
        <div class="container-fluid containerization mt-5">
            <div class="row">

                {{-- description --}}
                <div class="col-lg-9 shadow p-3">
                    <span id="about_mobile" class="" style="text-align: justify !important; color: grey !important; font-size: 1.5em !important; line-height: 1 !important; ">

                            {!! html_entity_decode($property_detail->$description_var) !!}

                    </span>
                </div>

                {{-- agent card --}}
                <div class="col-lg-3 sticky-div py-0" id="sticky_agent" >

                    <div class="card bg-black rounded-0 py-3" style="border: 0.5px #848484 solid !important; transform: scale(1) !important;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            @if (file_exists('public/assets/images/agents/'.$agent->id.'/'.$agent->image))
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                    <img src="{{ URL::asset('public/assets/images/agents/'.$agent->id.'/'.$agent->image) }}" class="rounded-circle rounded-0 mx-auto" rounded-0 style="width: 100px; height: 100px;" alt="agent-image"/>
                                </a>

                            @else
                                <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                    <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="rounded-circle rounded-0 mx-auto" style="width: 100px; height: 100px;"  alt="agent-image">
                                </a>
                            @endif

                            {{-- <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a> --}}

                            <div class="text-center mx-auto">
                                <p class="text-white fw-bold mb-0" style="font-size: 1.1rem !important">
                                    {{ $agent->name_en }}
                                </p>
                                <p class="text-white fw-light" style="font-size: .8rem !important">
                                    {{ $agent->language_en }}
                                </p>
                            </div>
                        </div>

                        <div class="card-body p-2">

                            <div class="row my-2">
                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/request_detail_property/submit')}}">
                                    @csrf
                                    @honeypot
                                    <input type="hidden" name="property" value="{{$property_detail->id}}">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-white" placeholder="Full Name" aria-label="Full Name" name="name" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        {{-- <input type="text" class="form-control text-white" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required> --}}
                                        <input type="phone" name="phone" class="form-control w-100 iti-phone rounded-0 " style="border: 0.5px #848484 solid !important; background-color: #000 !important; width: 100% !important;" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control text-white" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" style="border: 0.5px #848484 solid !important;" required>
                                    </div>
                                    <button type="submit" class="btn btn-block  rounded-0 text-white" style="border: 0.5px #848484 solid !important; background-color: #292828">
                                        <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                        {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                        <span class="btn-txt">
                                            {{ trans('frontLang.registerInterest') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                            {{-- <div class="row my-2">


                                <div class="col-6">
                                    <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                        <button class="btn btn-outline-success bg-success text-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                                <i class="fab fa-whatsapp"></i>
                                                {{ trans('frontLang.whatsapp') }}
                                        </button>
                                    </a>
                                </div>


                                <div class="col-6">
                                    <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                        <button class="btn btn-outline-white  px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                                <i class="fa fa-phone-alt"></i>
                                                {{ trans('frontLang.callUs') }}
                                        </button>
                                    </a>
                                </div>
                            </div>


                            <div class="row my-3">
                                <div class="col-12">
                                        <a href="#"  data-mdb-toggle="modal" data-mdb-target="#get_in_touch_desktop" >
                                            <button class="btn btn-outline-white px-2 w-100 rounded-0 py-2 text-capitalize" style="font-size: .8rem !important; border: 0.5px #848484 solid !important">
                                                    <i class="far fa-envelope"></i>
                                                    {{ trans('frontLang.requestdetail') }}
                                            </button>
                                        </a>
                                </div>
                            </div> --}}




                            <div class="row my-3">
                                <p class="mt-3 mx-auto text-center" style="color:grey !important;">
                                    <i class="fa fa-share text-" aria-hidden="true" style="height: 15px !important;"></i>
                                    {{ trans('frontLang.agentCardShare') }}
                                </p>
                                <div class="col-6 mx-auto">
                                    <div class="mx-auto ">
                                        <ul class="list-group list-group-horizontal-sm bg-black text-center mx-auto">
                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 25px !important; width: 100% !important">
                                                </a>
                                            </li>

                                            <li class=" bg-black text-white bg-black text-center px-1 mx-auto">
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                                    <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 25px !important; width: 100% !important">
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

    {{-- map  & long description Desktop --}}
    {{-- <section class="desktop-show mt-2 mb-2">
        <div class="container-fluid containerization">
            <div class="row">
                <div class="col-lg-9">

                    <h3 class="mb-2 mt-2 fw-bold ">
                        {{ trans('frontLang.aboutthisproperty') }}
                    </h3>

                    <span id="about_mobile" class="" style="text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important; ">

                        <span id="less" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                            {{ strip_tags(substr($property_detail->$description_var, 0, 200)) }} ...
                        </span>

                        <br>

                        @if ( strlen(($property_detail->$description_var)) > 100 )

                            <span id="more" style="display: none !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                                {{ strip_tags(html_entity_decode($property_detail->$description_var)) }}
                            </span>

                            <br>
                            <br>

                            <button onclick="myFunction2()" class="btn btn-outline-white btn-sm" id="readMoreBtn">
                                Read more
                            </button>
                        @else
                            {!! html_entity_decode($property_detail->$description_var) !!}
                        @endif
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

                    <span id="about_mobile" class="" style="text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important; ">

                        <span id="lessmobile" style="display: inline !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                            {{ strip_tags(substr($property_detail->$description_var, 0, 250)) }} ...
                        </span>

                        <br>

                        @if ( strlen(($property_detail->$description_var)) > 250 )

                            <span id="moremobile" style="display: none !important; text-align: justify !important; color: grey !important; font-size: 1.2rem !important; line-height: 1 !important;">
                                {{ strip_tags(html_entity_decode($property_detail->$description_var)) }}
                            </span>

                            <br>

                            <button onclick="myFunction2mobile()" class="btn btn-outline-white btn-sm" id="readMoreBtnmobile">
                                Read more
                            </button>
                        @endif
                    </span>
                </div>

                <div class="col-lg-3 my-4 mx-auto">
                    <?php

                        $Property_map_embed_code=str_replace('style="border:0"','',$property_detail->map_embed_code);

                        $Property_map_embed_code=str_replace('frameborder="0"','',$Property_map_embed_code);

                        echo $Property_map_embed_code=str_replace('height="','style="height:200px !important; width: 100% !important;" height="',$Property_map_embed_code);

                    ?>
                </div>
            </div>
        </div>
    </section>

    <hr class="container mt-5 mb-3">

    {{-- similar properties --}}
    <section class="mt-2 mobile-show" style="background-color: #000">
        <div class="container">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)

                    @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 mt-2">
                            <div class="card bg-black rounded-0 border border-white border-1" style="height: 460px;">
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
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</span></b></h5>
                                    @else
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</b> </span></h5>
                                    @endif

                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}"  class="my-0">
                                        <h6 class="card-title fw-light text-white mt-2 mb-0" style="font-size: 1rem !important">{{ $property->$title_var }}</h6>
                                    </a>
                                    <p class="fw-light mt-0">
                                        {{ $property->locationss->$name_var }}
                                    </p>

                                    <p class="card-text">
                                    </p>

                                    <div class="row" style="display:block;font-size: 15px;" >
                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }}  </span>

                                        <span style="color: #848484">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #848484">  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
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
                                    <div class="modal-body bg-dark">
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
    <section class="mt-2 desktop-show" style="background-color: #000">
        <div class="container-fluid containerization">
            <div class="row">
                <br>
                <h3 class="text-left my-3">{{ trans('frontLang.similarProperties') }}</h3>

                    @if($properties->count() != 0)

                    @foreach ($properties as $property)
                        <div class="col-lg-4 mb-5 mt-2">
                            <div class="card bg-black rounded-0 border border-white border-1" style="height: 460px;">
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
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.Price') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</span></b></h5>
                                    @else
                                        <h5 style="font-size: 1.5rem !important" class="fw-bold mt-3"> <b>{{ trans('frontLang.yearly') }} <span style="color: #fff; "> AED {{ number_format($property->price) }}</b> </span></h5>
                                    @endif

                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}"  class="my-0">
                                        <h6 class="card-title fw-light text-white mt-2 mb-0" style="font-size: 1rem !important">{{ $property->$title_var }}</h6>
                                    </a>
                                    <p class="fw-light mt-0">
                                        {{ $property->locationss->$name_var }}
                                    </p>

                                    <p class="card-text">
                                    </p>

                                    <div class="row" style="display:block;font-size: 15px;" >
                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }}  </span>

                                        <span style="color: #848484">  {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span>

                                        <span style="color: #848484">  {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
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
                                    <div class="modal-body bg-dark">
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

@endif



{{-- Modal --- Get In Touch --}}
<div class="modal modal-lg fade rounded-0" id="get_in_touch_desktop" tabindex="-1" aria-labelledby="get_in_touch_desktop" aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
        <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

            <div class="modal-body p-0 bg-black">
                <div class="desktop-show row p-0 m-0">
                    <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
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

            <div class="modal-body p-0 bg-black">
                <div class="desktop-show row p-0 m-0">
                    <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
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
                    </div>
                    <div class="col-lg-8 m-0 p-0 bg-white">
                        <div class="p-5">
                            {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                            <form class="contact-form" method="post" id="bookAViewing" action="{{URL('/book_view/submit')}}">
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

            <div class="modal-body p-0 bg-black">
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


<script>
    $(document).ready(function() {
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
            $(".skill").hide();
            $(eleBox).show();
        });
    });


    $(document).ready(function () {
        $("#skill_dropdown_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_mobile").hide();
            $(eleBox).show();
        });
    });

    $(document).ready(function () {
        $("#skill_dropdown_rent").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_rent").hide();
            $(eleBox).show();
        });
    });

    $(document).ready(function () {
        $("#skill_dropdown_rent_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
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
