
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

@section('content')

<style>
  p{
    line-height: 1.6 !important;
  }
  input, select {
        background-color: #1c1c1c !important;
        color: #ccc !important;
        border-radius: 0px !important;
        border: 1px solid #ccc !important;
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
        background-color: #ccc !important;
        color: #1c1c1c !important;
        transform: scale(1) !important;
        border: 2px solid #1c1c1c !important;

        cursor: pointer !important;
    }
    .card {
        color: #ccc !important;
        background-color: #1c1c1c !important;
        border: 0.5px solid gray !important;
        border-radius: 0 !important;
        /* transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important; */


    }
    /* .card:hover {
        /* box-shadow: 0px 0px 5px #fff !important; */
        opacity: 1 !important;
        transform: scale(1.07) !important;
        z-index: 1000 !important;
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    } */
</style>

<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: #1c1c1c;">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3  style="text-transform: uppercase;">{{ trans('frontLang.sellyourproperty') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>

<section class="desktop-show" >
    <div class="container" style="margin-top: -70px; ">
        <div class="row">
            <div class="col-lg-10 offset-md-1">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ trans('frontLang.lookingtosell') }}</h4>

                        <p class="card-tex text-center" style="line-height: 25px;font-size:16px">{{ trans('frontLang.lookingtosellpara') }}</p>
                    </div>
                </div>
            </div>

        </div>

    </div>




</section>

@if ($langSeg == 'ar')
<section class="desktop-show">
    <div class="container">
        <div class="row mt-5 mb-5">
                <h3 class="text-center mb-4 mt-3">{{ trans('frontLang.howitworks') }}</h3>
                <div class="col-lg-2 offset-md-1">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-handshake fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.deal') }}</h4></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-street-view fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.viewing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-bullhorn fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.marketing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-check-square fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.valuation') }}</h4></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-home fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.homevisit') }}</h4></p>


                        </div>
                    </div>
                </div>






        </div>


    </div>
</section>
<section class="mobile-show" style="direction: rtl">
    <div class="container">
        <div class="row mt-5 mb-5">
                <h3 class="text-center mb-4 mt-3">{{ trans('frontLang.howitworks') }}</h3>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-home fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.homevisit') }}</h4></p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-check-square fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.valuation') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-bullhorn fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.marketing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-street-view fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.viewing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 100%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-handshake fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.deal') }}</h4></p>

                        </div>
                    </div>
                </div>



        </div>


    </div>
</section>
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{URL('/book_valuation/submit')}}" enctype="multipart/form-data">
                    @csrf
                    @honeypot
                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                    <input type="text" name="utm_medium" class="utm_parameters" hidden>
                    <div class="row">
                            <div class="col-lg-6 offset-md-3">
                                <h3 class="text-center mb-5 mt-3">{{ trans('frontLang.bookafreevaluation') }}</h3>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label style="direction: rtl;float: right;" for="">{{ trans('frontLang.pleaseprovideaaddress') }}</label>
                                        <input style="direction: rtl;" type="text"  name="address" class="form-control form-control-lg" placeholder="{{ trans('frontLang.address') }}"  required />

                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label style="direction: rtl;float: right;" for="">{{ trans('frontLang.whattype') }}</label>
                                        <select style="direction: rtl" name="type" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.choosetype') }}</option>
                                            <option value="Sale">{{ trans('frontLang.sale') }}</option>
                                            <option value="Rent">{{ trans('frontLang.Rent') }}</option>


                                        </select>
                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label style="direction: rtl;float: right;" for="">{{ trans('frontLang.propertyType') }}</label>
                                        <select style="direction: rtl" name="property_type" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.propertyType') }}</option>
                                            <option value="Apartment">{{ trans('frontLang.Apartment') }}</option>
                                            <option value="Off Plan">{{ trans('frontLang.Villa') }}</option>
                                            <option value="Townhouses">{{ trans('frontLang.Townhouse') }}</option>

                                        </select>
                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label style="direction: rtl;float: right;">{{ trans('frontLang.howmanybedrooms') }}</label>
                                        <select style="direction: rtl" name="bedrooms" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.bedrooms') }}</option>
                                            <option value="Studio">{{ trans('frontLang.Studio') }}</option>
                                            <option value="1 Bedrooms">1 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="2 Bedrooms">2 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="3 Bedrooms">3 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="4 Bedrooms">4 {{ trans('frontLang.bedrooms') }} +</option>




                                        </select>
                                    </div>


                                </div>

                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <input style="direction: rtl;" type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl;" type="phone" name="phone"  class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input style="direction: rtl;" type="email" name="email"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />
                                    </div>

                                </div>


                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </div>
                            </div>




                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
@else
<section class="desktop-show">
    <div class="container">
        <div class="row mt-5 mb-5">
                <h3 class="text-center mb-4 mt-3">{{ trans('frontLang.howitworks') }}</h3>
                <div class="col-lg-2 offset-md-1">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-home fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.homevisit') }}</h4></p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-check-square fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.valuation') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-bullhorn fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.marketing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-street-view fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.viewing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-handshake fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.deal') }}</h4></p>

                        </div>
                    </div>
                </div>



        </div>


    </div>
</section>
<section class="mobile-show">
    <div class="container">
        <div class="row mt-5 mb-5">
                <h3 class="text-center mb-4 mt-3">{{ trans('frontLang.howitworks') }}</h3>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-home fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.homevisit') }}</h4></p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-check-square fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.valuation') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-bullhorn fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.marketing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 50%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-street-view fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.viewing') }}</h4></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2" style="width: 100%">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><i class="far fa-handshake fa-2x"></i></h4>
                            <p class="card-text"><h4> {{ trans('frontLang.deal') }}</h4></p>

                        </div>
                    </div>
                </div>



        </div>


    </div>
</section>
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{URL('/book_valuation/submit')}}" enctype="multipart/form-data">
                    @csrf
                    @honeypot

                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                    <input type="text" name="utm_medium" class="utm_parameters" hidden>

                    <div class="row">
                            <div class="col-lg-6 offset-md-3">
                                <h3 class="text-center mb-5 mt-3">{{ trans('frontLang.bookafreevaluation') }}</h3>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label for="">{{ trans('frontLang.pleaseprovideaaddress') }}</label>
                                        <input type="text"  name="address" class="form-control form-control-lg" placeholder="{{ trans('frontLang.address') }}"  required />

                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label for="">{{ trans('frontLang.whattype') }}</label>
                                        <select name="type" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.choosetype') }}</option>
                                            <option value="Sale">{{ trans('frontLang.sale') }}</option>
                                            <option value="Rent">{{ trans('frontLang.Rent') }}</option>


                                        </select>
                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label for="">{{ trans('frontLang.propertyType') }}</label>
                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.propertyType') }}</option>
                                            <option value="Apartment">{{ trans('frontLang.Apartment') }}</option>
                                            <option value="Off Plan">{{ trans('frontLang.Villa') }}</option>
                                            <option value="Townhouses">{{ trans('frontLang.Townhouse') }}</option>

                                        </select>
                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <label for="">{{ trans('frontLang.howmanybedrooms') }}</label>
                                        <select name="bedrooms" class="form-select form-select-lg" aria-label="Default select example" required>
                                            <option value="">{{ trans('frontLang.bedrooms') }}</option>
                                            <option value="Studio">{{ trans('frontLang.Studio') }}</option>
                                            <option value="1 Bedrooms">1 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="2 Bedrooms">2 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="3 Bedrooms">3 {{ trans('frontLang.bedrooms') }}</option>
                                            <option value="4 Bedrooms">4 {{ trans('frontLang.bedrooms') }} +</option>




                                        </select>
                                    </div>


                                </div>

                                <div class="col-lg-12">
                                    <div class=" mb-4">
                                        <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input type="phone" name="phone"  class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <input type="email" name="email"  class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />
                                    </div>

                                </div>


                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                        {{ trans('frontLang.submit') }}
                                    </button>
                                </div>
                            </div>




                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
@endif










@endsection
