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
        <style>

            html, body {
                overflow-x: hidden;
                scroll-behavior: smooth !important;
            }
            body {
                position: relative
            }
            p{
                line-height: 1.8 !important;
            }

            .nav-pills .nav-link.active {
                background-color: #fff !important;
                color: #ABB7B7 !important;
                border: 0.25px #848484 solid !important;
                border: 0.5 #848484 solid !important;
                border-radius: 0 !important;

            }

            .nav-link {
                /* background-color: #000 !important; */
                background-color: #848484 !important;
                color: #fff !important;
                border: 0.25px #848484 solid !important;
                border: 0.5 #848484 solid !important;
                border-radius: 0 !important;

            }
            a {
                color: #fff !important;
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
                background-color: #cccccc !important;
                color: #ABB7B7 !important;
                transform: scale(1) !important;
                border: 2px solid #000 !important;

                cursor: pointer !important;
            }

            /* .containerization {
                padding-right: 130px !important;
                padding-left: 130px !important;
            } */
            .card {
                margin: 12px !important;
                color: #cccccc !important;
                background-color: #1c1c1c !important;
                border: 0.5px solid rgb(86, 86, 86) !important;
                border-radius: 0 !important;
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.5s !important;



            /* }
            .card:hover {
                /* box-shadow: 0px 0px 5px #fff !important; */
                opacity: 1 !important;
                transform: scale(1.07) !important;
                z-index: 1000 !important;
                /* margin-left: 20px !important;
                margin-right: 20px !important; */
                /* border: 5px solid #000 !important; */
            } */


        </style>

@endsection
@section('content')

<style>
    .skill{
        display: none;
    }

    .skill_mobile{
        display: none;
    }

    .skill_project{
        display: none;
    }

    .skill_project_1{
        display: none;
    }

    .skill_property_buy{
        display: none;
    }

    .skill_rent_mobile{
        display: none;
    }

    .card-img-height{
        height: 100% !important;
    }
</style>

<?php
		$name_var = "name_" . trans('backLang.boxCode');

		$title_var = "title_" . trans('backLang.boxCode');

		$type_name_var= "type_name_" . trans('backLang.boxCode');

		$cat_name_var= "cat_name_" . trans('backLang.boxCode');

		$address_var = "address_" . trans('backLang.boxCode');

		$description_var = "description_" . trans('backLang.boxCode');

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

    <header class="mobile-show">

        <!-- Background image -->
        <div id="intro-home" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white">
                    {{-- <ul class="nav nav-pills " id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-home2" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="margin-right: 5px;">
                                    {{ trans('frontLang.buy') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="margin-right: 5px;">
                                    {{ trans('frontLang.Rent') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab2" data-mdb-toggle="pill" data-mdb-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                                    {{ trans('frontLang.off-plan') }}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder=" {{ trans('frontLang.searchbysale') }}" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">

                                </div>
                            </div>
                            <div class="tab-pane" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="{{ trans('frontLang.searchbysale') }}" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">

                                </div>
                            </div>
                            <div class="tab-pane" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="{{ trans('frontLang.searchbyprojects') }}">

                                </div>
                            </div>
                    </div> --}}
                    @if ($langSeg == 'ar')
                        {{-- <div class="text-right mt-0">

                            <h2 style="text-align: right;" class="fw-bolder">ابحث عن عقار وبيت أحلامك</h2>
                            <p style="text-align: right;" class="fw-bolder">شراء,ايجار,بيع,عقارات قيد الانشاء</p>
                            <div class="d-flex ml-auto mt-4">

                                <div class="header-item-right">
                                    <a style="margin-right: 1rem;"  class="menu-icon" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight">
                                        <img src="{{url::asset('public/assets/asset/loupe.png')}}" alt="search"/>
                                    </a>

                                    <button type="button" class="menu-mobile-trigger" >
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>

                                <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3"  target="_blank">
                                    Explore more
                                </a>
                            </div>
                        </div> --}}
                        <div class="text-left">
                            <h2 style="text-align: left;" class="fw-bolder">Find Your Dream Home</h2>
                            <p style="text-align: left;" class="fw-bolder">Buy, Rent, Sell & Off Plan Properties in Dubai</p>
                            <div class="d-flex mr-auto mt-4">
                                <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn btn-outline-white opacity-70 rounded-0 w-50 text-center py-3" target="_blank" style="background-color: #1c1c1c;">
                                {{-- <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn btn-outline-white bg-black opacity-70 rounded-0 w-50 text-center py-3"  data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight"> --}}

                                    Explore more
                                </a>
                            </div>

                        </div>
                    @else
                        <div class="text-left">
                            <h2 style="text-align: left;" class="fw-bolder">Find Your Dream Home</h2>
                            <p style="text-align: left;" class="fw-bolder">Buy, Rent, Sell & Off Plan Properties in Dubai</p>
                            <div class="d-flex mr-auto mt-4">
                                <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn btn-outline-white opacity-70 rounded-0 w-50 text-center py-3" target="_blank" style="background-color: #1c1c1c;">
                                    Explore more
                                </a>
                            </div>

                        </div>


                    @endif

                </div>
                </div>
            </div>
        </div>
        <!-- Background image -->



    </header>

    <header class="desktop-show">

        <!-- Background image -->
        <div id="intro-home" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                <div class="container align-items-center  text-center h-100" style="margin-top: 250px;width: 900px;">
                    <div class="text-white">
                        @if ($langSeg == 'ar')
                            <div class="mb-4" style="margin-top: 5rem !important;">
                                <h1 style="text-align: center;" class="fw-bolder">ابحث عن عقار وبيت أحلامك</h1>
                                <h4 style="text-align: center;" class="fw-lighter mb-5">شراء,ايجار,بيع,عقارات قيد الانشاء</h4>
                                <style>
                                    .testbutton:hover {
                                        background-color: #ccc !important;
                                        color: #1c1c1c !important;
                                        border: #ccc solid !important;

                                    }
                                </style>
                                <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn btn-outline-white  opacity-70 rounded-0 w-25 text-center py-3 testbutton" target="_blank" style="background-color: #1c1c1c;">
                                    Explore more
                                </a>
                            </div>
                        @else
                            <div class="mb-4" style="margin-top: 5rem !important;">
                                <h1 style="text-align: center;" class="fw-bolder">{{ trans('frontLang.findyourdreamhome') }}</h1>
                                <h4 style="text-align: center;" class="fw-lighter mb-5">{{ trans('frontLang.home2line') }}</h4>
                                <style>
                                    .testbutton:hover {
                                        background-color: #ccc !important;
                                        color: #1c1c1c !important;
                                        border: #ccc solid !important;
                                    }
                                </style>
                                <a href="{{url($langSeg .'/'.'dubai-new-projects')}}" class="text-uppercase btn    rounded-0 w-25 text-center py-3 testbutton" target="_blank" style="background-color: #1c1c1c;">
                                    Explore more
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->

    </header>

</section>




{{-- slider menu--}}
<section class="desktop-show" id="main_content-mobile">
    @if ($langSeg == "ar")
         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }

            </style>

            <div class="container-fluid containerization p-0">




                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 mx-auto text-center">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="fill btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 my-2 rounded-0 mx-3 fw-bold text-capitalize" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercialindex') }}
                        </a>
                    </div>

                </div>

            </div>

        </section>
    @elseif ($langSeg == "ru")


         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid containerization p-0">

                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 mx-auto text-center">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9em;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size:.9rem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercial') }}
                        </a>
                    </div>

                </div>

            </div>

        </section>
    @else
        <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid containerization  p-0">



                {{-- desktop view --}}
                <div class="d-md-block d-lg-block d-none w-100 d-flex ">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.apartmentindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.villaindex') }}
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.plotindex') }}
                        </a>

                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.townhouseindex') }}
                        </a>
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-uppercase text-white py-3 my-2 rounded-0 mx-3 fw-bold 246px" style="font-size: .9srem;;letter-spacing: .1rem !important; width: 300px !important;">
                            {{ trans('frontLang.commercialindex') }}
                        </a>

                    </div>


                </div>

            </div>

        </section>
    @endif
</section>

<section class="mobile-show" id="main_content">
    @if ($langSeg == "ar")
         <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }

            </style>

            <div class="container-fluid p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.apartmentindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.villaindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.plotindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.townhouseindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.commercialindex') }}
                    </a>
                </div>


            </div>

        </section>
    @elseif ($langSeg == "ru")
        <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid  p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.apartmentindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.villaindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.plotindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.townhouseindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.commercialindex') }}
                    </a>
                </div>
            </div>
        </section>
    @else
        <section class="mb-5" style="margin-top:20px " >

            <style>
                .slider {
                    width: 600px;
                    height: 75px;
                    margin: 20px auto;
                    text-align: center;
                }

                .slider div {
                    margin-right: 5px;
                }

                .slick-slide {
                    opacity: .6;
                    width: 10px;
                }

                .slick-center {
                    display: block;
                    max-width: 10% !important;
                    max-height: 20% !important;
                    opacity: 1;
                }
            </style>

            <div class="container-fluid  p-0">

                {{-- mobile view --}}
                <div class="slider d-md-block d-block d-md-none">
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.apartmentindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.villaindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>" target="_blank"  class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.plotindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.townhouseindex') }}
                    </a>
                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>" target="_blank" class="btn btn-outline-white text-white py-3 mx-2 my-2 rounded-0">
                        {{ trans('frontLang.commercialindex') }}
                    </a>
                </div>
            </div>
        </section>
    @endif
</section>




{{-- Latest Projects Topic | mobile & Desktop--}}
@if ($langSeg == "ar")

    <section class="desktop-show mt-5 mb-5" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.latestProjectsDetails') }}</P>
            </div>
        </div>
    </section>

    <section class="mobile-show mt-5 mb-3" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: justify !important;" class="text-justify px-0">
                    {{ trans('frontLang.latestProjectsDetails') }}
                </P>
            </div>
        </div>

    </section>
@else
    <section class="desktop-show mt-5 mb-5">
        <div class="container-fluid containerization">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: center !important;" class="text-center">
                    {{ trans('frontLang.latestProjectHome') }}
                </P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.latestProjects') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: justify !important;" class="text-justify px-0">
                    {{ trans('frontLang.latestProjectHome') }}
                </P>
            </div>
        </div>

    </section>
@endif





{{-- Latest PROJECTS Cards | Desktop --}}
<section class="desktop-show">

    <div class="container-fluid mt-4 containerization" style="">

        <div class="row  mb-5">
            <div class="col-lg-12">

                <!-- Pills content -->
                    <div class="row">
                        {{-- {{$off_plan_projects}} --}}
                        @foreach ($off_plan_projects as $property)

                        <div class="col-lg-3 mb-0 d-flex align-items-stretch px-0">
                            @if ($langSeg == 'ar')

                            <div class="card px-0 mx-3 shadow-md" style="direction: rtl; border: 0px !important;  height: 370px !important;">

                            @else

                            <div class="card px-0 mx-3 shadow-md" style="border: 0px !important; height: 370px !important;">

                            @endif

                                <div class="communities-newlaunch"></div>

                                @foreach($property->images  as $single_img)
                                    @if($property->images->first()==$single_img)
                                        <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                            <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 230px; width: 100%" class="card-img-top rounded-0 w-100" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">

                                            {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                        </a>
                                    @endif
                                @endforeach



                                <div class="card-body d-flex flex-column" style="padding: 0.5rem">
                                    <div class="row d-flex">
                                            <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" >
                                                <h6 class="card-title fw-bold text-uppercase mt-3 flex-grow-1 mb-0" style="font-size: 1.2rem; line-height: 1.3 !important; color: #cccccc !important">
                                                {{ Str::limit($property->$title_var, 20) }}
                                                </h6>
                                            </a>


                                            <p class="fw-light mt-1 my-0" style="color: #cccccc !important;"> {{ $property->locationss->$name_var }}</p>

                                            @if ($property->type_id == '1')
                                                @if ($langSeg == 'ru')
                                                    <p  class="fw-bold mt-0"> <span style="color: #cccccc !important;">  {{ ($property->project_price_usd) }} $</span></p>
                                                @else
                                                    <div class="AED skill_project_1" style="display: block !important">
                                                        <p>
                                                            <b>
                                                                <span style="color: #cccccc !important;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ $property->project_price }}

                                                                </span>
                                                            </b>
                                                        </p>
                                                    </div>

                                                    <div class="USD skill_project_1">
                                                        <p>
                                                            <b>
                                                                <span style="color: #cccccc !important;">
                                                                    USD {{ $property->project_price_usd }}
                                                                </span>
                                                            </b>
                                                        </p>
                                                    </div>

                                                    {{-- <p class="fw-light mt-0"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></p> --}}
                                                @endif
                                            @else
                                                <div class="AED skill_project" style="display: block !important">
                                                    <p class="fw-bold mt-0">
                                                        <b>
                                                            <span style="color: #cccccc !important;">
                                                                {{ trans('frontLang.AED') }}
                                                                {{ $property->project_price }}

                                                            </span>
                                                        </b>
                                                    </p>
                                                </div>

                                                <div class="USD skill_project">
                                                    <p class="fw-bold mt-0">
                                                        <b>
                                                            <span style="color: #cccccc !important;">
                                                                USD {{ $property->project_price_usd }}
                                                            </span>
                                                        </b>
                                                    </p>
                                                </div>
                                                {{-- <p class="fw-light mt-0">  {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($property->project_price) }} </span></p> --}}
                                            @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





{{-- Latest PROJECTS Cards | Mobile --}}
<section class="mobile-show">
    <div class="container mb-3">

        <div class="row mb-5">
            @foreach ($off_plan_projects as $property)
                @if ($langSeg == 'ar')
                    <div class="row m-0 mb-3 px-2" style=" height: 156px;" dir="rtl">
                        <div class="col-5 p-0 d-flex h-100 flex-column" >
                            @foreach($property->images  as $single_img)
                                @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                        <img  src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" class="h-100" style=" height: 100% !important; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-7 px-0 py-2">
                            <div class="mx-3" >
                                    <div class="AED skill_property_buy" style="display: block !important">
                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                            <b>
                                                {{ trans('frontLang.Price') }}
                                                <span style="color: #fff;">
                                                    {{ $property->project_price }}
                                                    {{ trans('frontLang.AED') }}
                                                </span>
                                            </b>
                                        </h6>
                                    </div>

                                    <div class="USD skill_property_buy">
                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                            <b>
                                                {{ trans('frontLang.Price') }}
                                                <span style="color: #fff;">
                                                    {{ $property->project_price_usd }}
                                                    USD
                                                </span>
                                            </b>
                                        </h6>
                                    </div>

                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light" style="font-size: .8em !important;">
                                        <p style=" font-size: 1em; margin-top: .3em">
                                            {{ Str::limit($property->$title_var, 60) }}
                                        </p>
                                    </a>
                                    <p class="mb-2 fw-light" style=" font-size: .9em !important;">
                                        <i class="fa fa-map-marker-alt" style="font-size: .9em !important;"></i> {{ $property->$address_var }}
                                    </p>
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 50%; text-align: right; font-size: .9em"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bedrooms') }}</td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>



                @else
                    <div class="row m-0 mb-3 px-2" style=" height: 156px; ">
                        <div class="col-5 p-0 d-flex h-100 flex-column" >
                            @foreach($property->images  as $single_img)
                                @if($property->images->first()==$single_img)
                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                        <img  src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" class="h-100" style=" height: 100% !important; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-7 px-3 py-2 mx-0">
                                {{-- <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6> --}}

                                <div class="AED skill_property_buy" style="display: block !important">
                                    <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                        <b>
                                            {{ trans('frontLang.Price') }}
                                            <span style="color: #fff;">
                                                {{ $property->project_price }}
                                                {{ trans('frontLang.AED') }}
                                            </span>
                                        </b>
                                    </h6>
                                </div>

                                <div class="USD skill_property_buy">
                                    <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                        <b>
                                            {{ trans('frontLang.Price') }}
                                            <span style="color: #fff;">
                                                {{ $property->project_price_usd }}
                                                USD
                                            </span>
                                        </b>
                                    </h6>
                                </div>

                                <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light" style="font-size: .8em !important;">
                                    <p style=" font-size: 1em; margin-top: .3em">
                                        {{ Str::limit($property->$title_var, 60) }}
                                    </p>
                                </a>
                                <p class="mb-2 fw-light" style=" font-size: .9em !important;">
                                    <i class="fa fa-map-marker-alt" style="font-size: .9em !important;"></i> {{ $property->$address_var }}
                                </p>
                                <table style="">
                                    <tr>
                                        <td style="width: 50%; text-align: left; font-size: .9em"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bedrooms') }}</td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                    {{-- <hr class="my-2"> --}}

                @endif
            @endforeach

        </div>
    </div>
</section>





{{-- PROPERTIES DESCRIPTION Mobile & Desktop --}}
@if ($langSeg == "ar")
    {{-- <section class="mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
            <P style="font-size: 14px;line-height:1.3 !important;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
        </div>

    </section> --}}


    <section class="desktop-show mt-5 mb-5" style="direction: rtl">
        <div class="container-fluid containerization">
            <div class="row col-lg-8 mx-auto">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3" style="direction: rtl">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>


@else
    {{-- <section class="mt-5 mb-5">
        <div class="container">
            <h3 class="text-center">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
            <P  style="font-size: 16px;line-height:25px;">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
        </div>
    </section> --}}

    <section class="desktop-show ">
        <div class="container-fluid containerization pt-3">
            <div class="row col-lg-8 mx-auto ">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: center !important;" class="text-center">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>

    <section class="mobile-show mt-5 mb-3">
        <div class="container px-2">
            <div class="row col-lg-12 mx-auto px-0">
                <h3 class="text-center mb-3">{{ trans('frontLang.dubaiPropertiesForSale') }}</h3>
                <P  style="font-size: 16px; line-height: 1.6 !important; text-align: justify !important;" class="text-justify px-0">{{ trans('frontLang.propertiesForSaleInDubai_detail') }}</P>
            </div>
        </div>

    </section>
@endif





{{-- Buy & Rent properties With Switch | Desktop View--}}
<section class="desktop-show">
    <div class="container-fluid containerization" style="">

        <div class="row w-100">
            <div class="col-lg-12 mx-auto">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-3 d-flex justify-content-center"  id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mx-0 px-5 py-3" id="ex1-tab-1" style="font-size: .9em; font-weight: 700 !important;" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true" >
                            {{ trans('frontLang.buy') }}
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mx-0 px-5 py-3" id="ex1-tab-2" style="font-size: .9em; font-weight: 700 !important;" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false" >
                            {{ trans('frontLang.Rent') }}
                        </a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="properties-desktop-ex1-content">

                    {{-- Buy Properties --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row">

                            @foreach ($properties_for_sale as $property)
                                <div class="col-lg-4 d-flex mb-5 mx-auto " style="padding-right: 20px; !important; padding-left: 20px; !important;">
                                    @if ($langSeg == 'ar')

                                    <div class="card mx-auto" style="direction: rtl;  width: 600px; ">

                                    @else

                                    <div class="card mx-auto" style=" width: 600px; ">

                                    @endif

                                        <div class="communities-newlaunch"></div>

                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)
                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="" >
                                                    <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px; width: 100%;" class="card-img-top rounded-0 border-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>
                                            @endif
                                        @endforeach


                                        <div class="card-body px-3 py-0">

                                            <div class="row" style="height: 100% !important;">

                                                {{-- PROPERTY INFO --}}
                                                <div class="col-md-9 d-flex align-items-start flex-column">
                                                    @if ($property->type_id == '1')
                                                        @if ($langSeg == 'ru')
                                                            <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }}</span></b></h5>
                                                            <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b> {{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }}</span></b></h5>
                                                        @else
                                                            <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }} </span></b></h5>
                                                            <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b>{{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }} </span></b></h5>
                                                        @endif

                                                    @else

                                                        <h5 class="my-3 USD skill" style="font-size: 1.4rem !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }} {{ trans('frontLang.yearly') }} </b> </span></h5>
                                                        <h5 class="my-3 AED skill" style="font-size: 1.4rem !important; display: block !important"> <b> {{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                                    @endif

                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <p class=""  style="  font-size: 14px !important; color: #848484 !important; line-height: 1.5 !important;">
                                                            {{ $property->$title_var }}
                                                        </p>
                                                    </a>
                                                    <p style=" font-size: 14px !important; color: #848484 !important; line-height: 1.5 !important;"> {{ $property->locationss->$name_var }} </p>



                                                    {{-- <hr> --}}
                                                    <div class="row mt-auto w-100" >
                                                        <div class="col-lg-12 d-flex justify-content-around" style="display:block;" >
                                                            <span class="ps-0 pe-2" style="color: #848484;  font-size: 14px !important;">  <i class="fas fa-bed"> </i> {{$property->bedrooms}}  </span> <span style="color: #848484">&#x2022;</span>

                                                            <span class="px-2" style="color: #848484;  font-size: 14px !important;">  <i class="fas fa-bath"> </i> {{$property->bathrooms}} </span> <span style="color: #848484">&#x2022;</span>

                                                            <span class="px-2" style="color: #848484;  font-size: 14px !important;"> <i class="fas fa-chart-area"> </i> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- AGENT IMAGE --}}
                                                <div class="col-md-3 align-self-center ">
                                                    <div class="my-2">
                                                        @foreach($agents  as $agent)
                                                            @if($property->agent_id == $agent->id)
                                                                <img src="{{ URL::asset('uploads/agents/'.$property->agent_id.'/'.$agent->image) }}" style="height: auto; width: 100%; border-radius: 50%; border: 0.5px solid #848484 !important;" class="mt-0 pe-0 shadow"  alt="pr-agent" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                        @if ($langSeg =='ar')
                                            <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center; font-weight: bold; border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-sale-{{$property->id}}" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                        <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        @else
                                            <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center; font-weight: bold; border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-sale-{{$property->id}}" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                        <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white btn-lg  rounded-0" > {{ trans('frontLang.viewMore') }}</a>
                            </div>
                        </div>

                    </div>



                    {{-- Rent Properties --}}
                    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">

                            @foreach ($properties_for_rent as $property)
                                <div class="col-lg-4 mb-5 d-flex" style="padding-right: 20px; !important; padding-left: 20px; !important;">
                                    @if ($langSeg == 'ar')
                                        <div class="card mx-auto" style="direction: rtl; width: 600px ">
                                    @else
                                        <div class="card mx-auto" style=" width: 600px ">
                                    @endif
                                        <div class="communities-newlaunch"></div>

                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)
                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" sty >
                                                    <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 300px; " class="card-img-top rounded-0" alt="Listing"onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>
                                            @endif
                                        @endforeach



                                        <div class="card-body px-3 py-0">

                                            <div class="row" style="height: 100% !important;">

                                                {{-- PROPERTY INFO --}}
                                                <div class="col-md-9 d-flex align-items-start flex-column">
                                                    @if ($property->type_id == '1')
                                                        @if ($langSeg == 'ru')
                                                            <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }}</span></b></h5>
                                                            <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b> {{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }}</span></b></h5>
                                                        @else
                                                            <h5 class="my-3 USD skill" style=" font-size: 1.2vw !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }} </span></b></h5>
                                                            <h5 class="my-3 AED skill" style=" font-size: 1.2vw !important; display: block !important"> <b>{{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }} </span></b></h5>
                                                        @endif

                                                    @else

                                                        <h5 class="my-3 USD skill" style="font-size: 1.4rem !important; display: none"> <b> $ <span style="color: #ccc;">  {{ number_format($property->price_usd) }} {{ trans('frontLang.yearly') }} </b> </span></h5>
                                                        <h5 class="my-3 AED skill" style="font-size: 1.4rem !important; display: block !important"> <b> {{ trans('frontLang.AED') }} <span style="color: #ccc;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }}</b> </span></h5>
                                                    @endif

                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <p class=""  style="  font-size: 14px !important; color: #848484 !important; line-height: 1.5 !important;">
                                                            {{ $property->$title_var }}
                                                        </p>
                                                    </a>
                                                    <p style=" font-size: 14px !important; color: #848484 !important; line-height: 1.5 !important;"> {{ $property->locationss->$name_var }} </p>



                                                    {{-- <hr> --}}
                                                    <div class="row mt-auto w-100" >
                                                        <div class="col-lg-12 d-flex justify-content-around" style="display:block;" >
                                                            <span class="ps-0 pe-2" style="color: #848484;  font-size: 14px !important;">  <i class="fas fa-bed"> </i> {{$property->bedrooms}}  </span> <span style="color: #848484">&#x2022;</span>

                                                            <span class="px-2" style="color: #848484;  font-size: 14px !important;">  <i class="fas fa-bath"> </i> {{$property->bathrooms}} </span> <span style="color: #848484">&#x2022;</span>

                                                            <span class="px-2" style="color: #848484;  font-size: 14px !important;"> <i class="fas fa-chart-area"> </i> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- AGENT IMAGE --}}
                                                <div class="col-md-3 align-self-center ">
                                                    <div class="my-2">
                                                        @foreach($agents  as $agent)
                                                            @if($property->agent_id == $agent->id)
                                                                <img src="{{ URL::asset('uploads/agents/'.$property->agent_id.'/'.$agent->image) }}" style="height: auto; width: 100%; border-radius: 50%; border: 0.5px solid #848484 !important;" class="mt-0 pe-0 shadow"  alt="pr-agent" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/images/edge.webp') }}';">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        @if ($langSeg =='ar')
                                        <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center; font-weight: bold; border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-rent-{{$property->id}}" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                        @else
                                        <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center; font-weight: bold; border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-rent-{{$property->id}}" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i  class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white btn-lg rounded-0" style="font-size: 0.75vw !important;"> {{ trans('frontLang.viewMore') }}</a>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>
    </div>

    @foreach ($properties_for_rent as $property_rent_modal)
        <div class="modal modal-md fade rounded-0"  id="exampleModal-rent-{{$property_rent_modal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " style="width: 1200px !important;">
                <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                    <div class="modal-body p-0 bg-black">
                        <div class="desktop-show row p-0 m-0">
                            <div class="col-lg-12 m-0 p-0 bg-white">
                                <div class="m-0 w-100 p-0 mx-auto py-2 shadow-md" style="background-color: #1c1c1c !important; border-bottom: 0.5px #ccc solid !important;">
                                    <p class="fw-bold text-center m-0 p-0" style="font-size: 1.5rem !important; color: #ccc !important;">
                                        {{ $property_rent_modal->locationss->$name_var }}
                                    </p>
                                    <p class="fw-bold text-center m-0 p-0" style="font-size: .9rem !important; color: #ccc !important;">
                                        {{ $property_rent_modal->$title_var }}
                                    </p>
                                </div>
                                <div class="p-4" style="background-color: #1c1c1c !important;">

                                    {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                                    <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit/index')}}">

                                        @csrf

                                        @honeypot

                                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                        <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                        <input type="text" name="inquiry" value="Rent - {{ $property_rent_modal->title_var}}" hidden>
                                        <input type="text" name="page_url" value="edgerealty.ae/{{ $langSeg }}/dubai-property/{{ $property_rent_modal->slug_link }}" hidden>

                                        <div class=" mb-4">
                                            <p style="color: #ccc !important;"  class=" mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                            <input type="text" name="name" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                        </div>

                                        <!-- Email input -->
                                        <div class="mb-4">
                                            <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                            <input type="email" name="email" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                        </div>

                                        <!-- Email input -->
                                        <div class="mb-4">
                                            <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                            <input type="phone" name="phone" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                        </div>

                                        <div class="d-flex mx-auto flex-row">
                                            {{-- <button type="submit" class="btn btn-outline-dark btn-lg rounded-0 mx-auto " id="submit1_btn1" >
                                                {{ trans('frontLang.submit') }}
                                            </button> --}}

                                            <button class="submit btn btn-block btn-lg mx-auto btn-outline-white rounded-0" type="submit">
                                                <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                                {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                <span class="btn-txt ">
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


    @foreach ($properties_for_sale as $property_sale_modal)
        <div class="modal modal-md fade rounded-0"  id="exampleModal-sale-{{$property_sale_modal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " style="width: 1200px !important;">
                <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                    <div class="modal-body p-0 bg-black">
                        <div class="desktop-show row p-0 m-0">
                            <div class="col-lg-12 m-0 p-0 bg-white">
                                <div class="m-0 w-100 p-0 mx-auto py-2 shadow-md" style="background-color: #1c1c1c !important; border-bottom: 0.5px #ccc solid !important;">
                                    <p class="fw-bold text-center m-0 p-0" style="font-size: 1.5rem !important; color: #ccc !important;">
                                        {{ $property_sale_modal->locationss->$name_var }}
                                    </p>
                                    <p class="fw-bold text-center m-0 p-0" style="font-size: .9rem !important; color: #ccc !important;">
                                        {{ $property_sale_modal->$title_var }}
                                    </p>
                                </div>
                                <div class="p-4" style="background-color: #1c1c1c !important;">

                                    {{-- <form class="contact-form" id="getInTouch" action="javascript:void(0)"> --}}
                                    <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit/index')}}">

                                        @csrf

                                        @honeypot

                                        <input type="text" name="utm_source" class="utm_parameters" hidden>
                                        <input type="text" name="utm_id" class="utm_parameters" hidden>
                                        <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                        <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                        <input type="text" name="inquiry" value="Buy - {{ $property_sale_modal->title_var}}" hidden>
                                        <input type="text" name="page_url" value="edgerealty.ae/{{ $langSeg }}/dubai-property/{{ $property_sale_modal->slug_link }}" hidden>

                                        <div class=" mb-4">
                                            <p style="color: #ccc !important;"  class=" mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                            <input type="text" name="name" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                        </div>

                                        <!-- Email input -->
                                        <div class="mb-4">
                                            <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                            <input type="email" name="email" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                        </div>

                                        <!-- Email input -->
                                        <div class="mb-4">
                                            <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                            <input type="phone" name="phone" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                        </div>

                                        <div class="d-flex mx-auto flex-row">
                                            {{-- <button type="submit" class="btn btn-outline-dark btn-lg rounded-0 mx-auto " id="submit1_btn1" >
                                                {{ trans('frontLang.submit') }}
                                            </button> --}}

                                            <button class="submit btn btn-block btn-lg mx-auto btn-outline-white rounded-0" type="submit">
                                                <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;

                                                {{-- <i class="czi-user mr-2 ml-n1"></i> --}}

                                                <span class="btn-txt ">
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

    {{-- <div class="modal modal-md fade rounded-0"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="width: 1200px !important;">
            <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                <div class="modal-body p-0 bg-black">
                    <div class="desktop-show row p-0 m-0">
                        <div class="col-lg-12 m-0 p-0 bg-white">
                            <div class="m-0 w-100 p-0 mx-auto py-2" style="background-color: #fff !important;">
                                <p class="fw-bold text-center m-0 p-0" style="font-size: 1.8rem !important; color: #1c1c1c !important;">
                                    {{ trans('frontLang.getintouch') }}
                                </p>
                            </div>
                            <div class="p-4" style="background-color: #1c1c1c !important;">

                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit')}}">

                                    @csrf

                                    @honeypot

                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>

                                    <div class=" mb-4">
                                        <p style="color: #ccc !important;"  class=" mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                        <input type="text" name="name" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                        <input type="email" name="email" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p  style="color: #ccc !important;" class=" mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                        <input type="phone" name="phone" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>

                                    <div class="d-flex mx-auto flex-row">


                                        <button class="submit btn btn-block btn-lg mx-auto btn-outline-white rounded-0" type="submit">
                                            <i class="loading-icon fa-lg fas fa-spinner fa-spin d-none"></i> &nbsp;


                                            <span class="btn-txt ">
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
    </div> --}}

</section>





{{-- Buy & Rent properties With Switch | Mobile View--}}
<section class="mobile-show">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                 <!-- Pills navs -->
                 <ul class="nav nav-pills mb-3 nav-justified "  id="ex1" role="tablist" >
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1-mobile" data-mdb-toggle="pill" href="#ex1-pills-1-mobile" role="tab" aria-controls="ex1-pills-1-mobile" aria-selected="true" >{{ trans('frontLang.buy') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2-mobile" data-mdb-toggle="pill" href="#ex1-pills-2-mobile" role="tab" aria-controls="ex1-pills-2-mobile" aria-selected="false" >{{ trans('frontLang.Rent') }}</a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="properties-mobile-ex1-content">

                    {{-- Sale --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1-mobile" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row mb-5 mx-1">

                            @foreach ($properties_for_sale as $property)

                                @if ($langSeg == 'ar')

                                    <div class="card mb-3 p-0 shadow-none" style="width: 100% !important; border: 0 !important;" dir="rtl">
                                        <div class="row g-0" style="height: 156px !important">
                                            <div class="col-5" style="height: 156px !important">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                                            <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" class="img-fluid card-img-height" style=" height: 100% !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-7 aborted" style="height: 156px !important">
                                                <div class="card-body px-2 py-0">
                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    USD
                                                                    {{ number_format($property->price_usd) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p style=" font-size: .8em; margin-top: .3em" >
                                                            {{ Str::limit($property->$title_var, 60) }}
                                                        </p>
                                                    </a>
                                                    <p class="mb-2 fw-light" style=" font-size: .8em !important;">
                                                        <i class="fa fa-map-marker-alt" style="font-size: .8em !important;"></i> {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td class="fw-light" style="text-align: right; font-size: .8em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  </td>
                                                            <td class="fw-light" style="text-align: right; font-size: .8em">{{$property->bedrooms}} <i class="fas fa-bed"> </i>  </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="card mb-3 p-0 shadow-none" style="width: 100% !important; border: 0 !important;">
                                        <div class="row g-0" style="height: 156px !important">
                                            <div class="col-5" style="height: 156px !important">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                                            <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" class="img-fluid card-img-height" style=" height: 100% !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-7 aborted" style="height: 156px !important">
                                                <div class="card-body px-2 py-0">
                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    USD
                                                                    {{ number_format($property->price_usd) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p style=" font-size: .8em; margin-top: .3em" >
                                                            {{ Str::limit($property->$title_var, 60) }}
                                                        </p>
                                                    </a>
                                                    <p class="mb-2 fw-light" style=" font-size: .8em !important;">
                                                        <i class="fa fa-map-marker-alt" style="font-size: .8em !important;"></i> {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  </td>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bedrooms}} <i class="fas fa-bed"> </i>  </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row m-0 mb-3 px-2 pb-2" style="height: 156px !important;" >
                                        <div class="col-5 p-0 d-flex h-100 flex-column " style="height: 156px !important;">
                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                                        <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style=" height: 100%; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-7 px-3 py-2  d-flex h-100 flex-column " style="height: 156px !important;">
                                            <div class="" >
                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    USD
                                                                    {{ number_format($property->price_usd) }}

                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p style=" font-size: .8em; margin-top: .3em" >
                                                            {{ Str::limit($property->$title_var, 60) }}
                                                        </p>
                                                    </a>
                                                    <p class="mb-2 fw-light" style=" font-size: .8em !important;">
                                                        <i class="fa fa-map-marker-alt" style="font-size: .8em !important;"></i> {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  </td>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bedrooms}} <i class="fas fa-bed"> </i>  </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </div> --}}

                                    {{-- <hr class="my-2"> --}}

                                @endif

                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>


                        </div>




                    </div>

                    {{-- Rent --}}
                    <div class="tab-pane fade" id="ex1-pills-2-mobile" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row mb-5">
                            @foreach ($properties_for_rent as $property)
                                @if ($langSeg == 'ar')


                                    <div class="card mb-3 p-0 shadow-none" style="width: 100% !important; border: 0 !important;" dir="rtl">
                                        <div class="row g-0" style="height: 156px !important">
                                            <div class="col-5" style="height: 156px !important">
                                                @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                                        <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" class="img-fluid card-img-height" style=" height: 100% !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach
                                            </div>
                                            <div class="col-7 aborted" style="height: 156px !important">
                                                <div class="card-body px-2 py-0">
                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                {{-- {{ trans('frontLang.Price') }} --}}
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}
                                                                    {{ trans('frontLang.yearly') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                {{-- {{ trans('frontLang.Price') }} --}}
                                                                <span style="color: #fff;">
                                                                    USD
                                                                    {{ number_format($property->price_usd) }}
                                                                    {{ trans('frontLang.yearly') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p style=" font-size: .8em; margin-top: .3em" >
                                                            {{ Str::limit($property->$title_var, 40) }}
                                                        </p>
                                                    </a>
                                                    <p class="mb-2 fw-light" style=" font-size: .8em !important;">
                                                        <i class="fa fa-map-marker-alt" style="font-size: .8em !important;"></i> {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td class="fw-light" style="text-align: right; font-size: .8em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  </td>
                                                            <td class="fw-light" style="text-align: right; font-size: .8em">{{$property->bedrooms}} <i class="fas fa-bed"> </i>  </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="card mb-3 border-none px-0" style="border: 0px !important; direction: rtl">
                                        <div class="row">
                                            <div class="col-4">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)

                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                            <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100%;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        </a>

                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body" style="padding: 0.6rem;">

                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title">
                                                            <b>
                                                                {{ trans('frontLang.Price') }}

                                                                <span style="color: #fff;">
                                                                    {{ number_format($property->price) }}
                                                                    {{ trans('frontLang.AED') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title">
                                                            <b>
                                                                {{ trans('frontLang.Price') }}

                                                                <span style="color: #fff;">
                                                                    {{ number_format($property->price_usd) }} USD
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p class="card-text" style="margin-bottom: 0.3rem;"> {{ $property->$title_var }} </p>
                                                    </a>
                                                    <p class="mb-2">
                                                        {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td style="width: 50%; text-align: right"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                            <td style="width: 50%; text-align: right"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div> --}}
                                @else

                                    <div class="card mb-3 p-0  shadow-none" style="width: 100% !important; border: 0 !important;">
                                        <div class="row g-0" style="height: 156px !important">
                                            <div class="col-5" style="height: 156px !important">
                                                @foreach($property->images  as $single_img)
                                                    @if($property->images->first()==$single_img)
                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="h-100" style="height: 100% !important;">
                                                            <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" class="img-fluid card-img-height" style=" height: 100% !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-7 aborted" style="height: 156px !important">
                                                <div class="card-body px-2 py-0">
                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                {{-- {{ trans('frontLang.Price') }} --}}
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}
                                                                    {{ trans('frontLang.yearly') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill_property_buy">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                {{-- {{ trans('frontLang.Price') }} --}}
                                                                <span style="color: #fff;">
                                                                    USD
                                                                    {{ number_format($property->price_usd) }}
                                                                    {{ trans('frontLang.yearly') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <a  href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                        <p style=" font-size: .8em; margin-top: .3em" >
                                                            {{ Str::limit($property->$title_var, 40) }}
                                                        </p>
                                                    </a>
                                                    <p class="mb-2 fw-light" style=" font-size: .8em !important;">
                                                        <i class="fa fa-map-marker-alt" style="font-size: .8em !important;"></i> {{ $property->$address_var }}
                                                    </p>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  </td>
                                                            <td class="fw-light" style="text-align: left; font-size: .8em">{{$property->bedrooms}} <i class="fas fa-bed"> </i>  </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>


                        </div>
                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
</section>






<section class="mobile-show">

    <div class="container mb-4">
        <div class="row mt-5">

                @if ($langSeg == 'ar')
                <div class="col-12" style="direction: rtl">
                    <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                    <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Findproperties_detail') }}</P>
                </div>
                @else
                    <div class="col-12 text-left">
                        <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                        <P style="font-size: 16px; line-height: 25px;">{{ trans('frontLang.Findproperties_detail') }}</P>
                    </div>
                @endif



        </div>
    </div>
    <div class="container mb-5">
        <div class="row text-center h-100">

            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/bluewaters')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/desktop/bluewaters-edgerealty.ae.webp')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">

                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Bluewaters') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/downtown-dubai')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/desktop/downtowndubai-edgerealty.ae.jpg')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">
                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Downtown') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto mb-3" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/dubai-hills-estate')}}">
                <div class="card card-block d-flex" style="height: 200px;background-image: url('{{URL::asset('public/assets/asset/desktop/dubaihillsestate-edgerealty.ae.jpg')}}');    background-size: cover; background-position: center; background-repeat: no-repeat;border-radius: 0px;">
                <div class="card-body align-items-center d-flex justify-content-center">
                    <h5 class="card-title" style="color:white">{{ trans('frontLang.Dubaihillestate') }}</h5>
                </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 text-center my-auto" >
                <a href="{{url( $langSeg .'/'.'dubai-communities/city-walk')}}">
                <div class="card card-block d-flex" style="height: 200px; background-image: url('{{URL::asset('public/assets/asset/desktop/Palm-Jumeirah3-edgerealty.ae.webp')}}'); background-size: cover; background-position: center;background-repeat: no-repeat;border-radius: 0px;">
                    <div class="card-body align-items-center d-flex justify-content-center">
                        <h5 class="card-title" style="color:white">{{ trans('frontLang.palmJumeirah') }}</h5>
                    </div>
                </div>
                </a>
            </div>
        </div>

      </div>

</section>







<section id="gallery" class="desktop-show">
    <div class="container-fluid containerization h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left">

                <br>
                <br>

                @if ($langSeg == 'ar')
                <div class="col-12 text-justify" style="direction: rtl">
                    <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                    <P style="font-size: 14px; line-height: 1.3 !important;">{{ trans('frontLang.Findproperties_detail') }}</P>
                </div>
                @else
                    <div class="col-8 text-center mx-auto">
                        <h3 class="text-center mb-3">{{ trans('frontLang.dubaiCommunities') }}</h3>
                        <P style="font-size: 14px; line-height: 1.3 !important;">{{ trans('frontLang.Findproperties_detail') }}</P>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <div class="container-fluid containerization mb-5">
      <div id="image-gallery">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/city-walk')}}">
                <div class="img-wrapper" >

                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.palmJumeirah') }}</h3></div>

                        <img src="{{URL::asset('public/assets/asset/desktop/Palm-Jumeirah3-edgerealty.ae.webp')}}" class="img-responsive">

                    <div class="img-overlay">

                        <h3 class="text-white">{{ trans('frontLang.palmJumeirah') }}</h3>

                    </div>
                </div>
            </a>

          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/dubai-hills-estate')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Dubaihillestate') }}</h3></div>
                        <img src="{{URL::asset('public/assets/asset/desktop/dubaihillsestate-edgerealty.ae.jpg')}}" class="img-responsive">
                    <div class="img-overlay">
                        <h3 class="text-white">{{ trans('frontLang.Dubaihillestate') }}</h3>
                    </div>
                </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/difc')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.difc') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/DIFC-edgerealty.ae.webp')}}" class="img-responsive">
                <div class="img-overlay">
                    <h3 class="text-white">{{ trans('frontLang.difc') }}</h3>
                </div>
                </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/downtown-dubai')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Downtown') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/downtowndubai-edgerealty.ae.jpg')}}" style="width: 100%" class="img-responsive">
                    <div class="img-overlay">
                        <h3 class="text-white">{{ trans('frontLang.Downtown') }}</h3>
                    </div>
                </div>
            </a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 image">
            <a href="{{url( $langSeg .'/'.'dubai-communities/bluewaters')}}">
                <div class="img-wrapper">
                    <div class="centered-communities"> <h3 class="text-white">{{ trans('frontLang.Bluewaters') }}</h3></div>
                    <img src="{{URL::asset('public/assets/asset/desktop/bluewaters-edgerealty.ae.webp')}}" style="width: 100%" class="img-responsive">
                <div class="img-overlay">
                    <h3 class="text-white">{{ trans('frontLang.Bluewaters') }}</h3>
                </div>
                </div>
            </a>
          </div>

        </div><!-- End row -->
      </div><!-- End image gallery -->
    </div><!-- End container -->
</section>



<style>
    #ac-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 1001;
    }
    #ac-wrapper1 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 1001;
    }
    #popup {
        width: 100%;
        height: 400px;
        background: #FFFFFF;
        /* border: 5px solid #000; */
        /* border-radius: 25px; */
        /* -moz-border-radius: 25px; */
        /* -webkit-border-radius: 25px; */
        /* box-shadow: #64686e 0px 0px 3px 3px; */
        /* -moz-box-shadow: #64686e 0px 0px 3px 3px; */
        /* -webkit-box-shadow: #64686e 0px 0px 3px 3px; */
        position: relative;
    }

    #popup2 {
        width: 400px;
        height: 200px;
        background: #FFFFFF;
        margin-top: 200px;
        /* border: 5px solid #000; */
        /* border-radius: 25px; */
        /* -moz-border-radius: 25px; */
        /* -webkit-border-radius: 25px; */
        /* box-shadow: #64686e 0px 0px 3px 3px; */
        /* -moz-box-shadow: #64686e 0px 0px 3px 3px; */
        /* -webkit-box-shadow: #64686e 0px 0px 3px 3px; */
        position: relative;
    }
</style>



<div id="ac-wrapper" style="display: none !important;" class="d-flex flex-column mx-auto h-100 d-md-block d-lg-block d-none my-auto align-items-center justify-content-center ">
    <div id="popup" class="my-auto mx-auto text-dark justify-content-center">
        <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 40px; width:40px;" class="position-absolute ms-2 mt-2">
        <div class="row h-100 p-5 my-auto align-middle">
            <div class="col-6 p-2 d-flex flex-column mx-auto my-auto h-100 " style="border-right: 1px solid #000 !important;">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <p class="mx-auto fw-bold" style="font-size: 2.2rem; line-height: 1.2 !important;">
                             Stay Informed
                        </p>
                        <p class="mx-auto mt-3 px-2 text-justify" style="font-size: 1.2rem !important">
                            Join over 20,000 members to get weekly updates on new off-plan launches and latest news & tips
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-6 h-100">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <form>
                            <!-- Email input -->
                            <div class="form-outline rounded-0 mb-4">
                                <input type="text" id="form1Example1" class="form-control rounded-0" style="background-color: #fff !important;"/>
                                <label class="form-label text-center rounded-0" for="form1Example1">Name</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline rounded-0 mb-4">
                                <input type="email" id="form1Example2" class="form-control rounded-0"  style="background-color: #fff !important;"/>
                                <label class="form-label text-center rounded-0" for="form1Example2">Email</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-black btn-block rounded-0 text-uppercase">SUBSCRIBE</button>

                        </form>
                        {{-- <p class="text-decoration-underline text-dark " onClick="PopUp('hide">I'm not interested</p> --}}

                        <button class="text-decoration-underline mt-3" onClick="PopUpModal('hide')">I'm Not Interested</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="ac-wrapper1" style="display: none !important;" class="d-flex flex-column mx-auto h-100  d-md-block d-block d-lg-none">
    <div id="popup2" class="my-auto mx-auto text-dark">
        <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 20px; width:20px;" class="position-absolute ms-2 mt-2">
        <div class="row h-100 p-1 ">
            <div class="col-6 p-1 d-flex flex-column mx-auto my-auto h-100 " style="border-right: 1px solid #000 !important;">
                <div class="row my-auto mx-auto h-100">
                    <div class="row my-auto mx-auto">
                        <p class="mx-auto fw-bold mb-0 px-0" style="font-size: 1.2rem; line-height: 1 !important;">
                            Sign Up and Stay Informed
                        </p>
                        <p class="mx-auto mt-3 px-0 text-justify" style="font-size: .9rem !important">
                            Join over 20,000 members to get weekly updates on new off-plan launches and latest news & tips
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-6 h-100">
                <div class="row my-auto mx-0 px-0 h-100">
                    <div class="row my-auto mx-0 px-0">
                        <form>
                            <!-- Email input -->
                            <div class="form-outline rounded-0 mb-2">
                                <input type="text" id="form1Example12" class="form-control rounded-0"/>
                                <label class="form-label text-center rounded-0" style="font-size: .9rem !important" for="form1Example12">
                                    Name
                                </label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline rounded-0 mb-2">
                                <input type="email" id="form1Example22" class="form-control rounded-0" />
                                <label class="form-label text-center rounded-0" style="font-size: .9rem !important" for="form1Example22">
                                    Email
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-black btn-block rounded-0 text-uppercase" style="font-size: .9rem !important">
                                SUBSCRIBE
                            </button>

                        </form>
                        {{-- <p class="text-decoration-underline text-dark " onClick="PopUp('hide">I'm not interested</p> --}}

                        <button class="text-decoration-underline mt-1" onClick="PopUp('hide')" style="font-size: .9rem !important" >
                            I'm Not Interested
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#skill_dropdown").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(".skill_project").hide();
            $(".skill_property_buy").hide();
            $(".skill_project_1").hide();
            $(eleBox).show();
        });
    });


    $(document).ready(function () {
        $("#skill_dropdown_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_property_buy").hide();
            $(".skill").hide();
            $(".skill_project_1").hide();
            $(".skill_project").hide();
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
</script>

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

<script scope>
    // function PopUpModal(hideOrshow) {
    //     if (hideOrshow == 'hide') document.getElementById('popupBoxDesktop').style.display = "none";
    //     else document.getElementById('popupBoxDesktop').removeAttribute('style');
    // }




    // function PopUpModal() {
    //     $('#popupBoxDesktop').modal().hide();
    //     $('#popupBoxDesktop').removeClass("show");
    // }

    // setTimeout(function() {
    //     $('#popupBoxDesktop').modal().show();
    //     $('#popupBoxDesktop').addClass("show");
    // }, 2000);

    // window.onload = () => {
    //     setTimeout(() => {
    //         $('#popupBoxDesktop').modal().show();
    //         $('#popupBoxDesktop').addClass("show");
    //     }, 2000);
    // }

    // window.onload = function () {
    //     setTimeout(function () {
    //         PopUp('show');
    //     }, 3000);

    // }

    // window.onload = function () {
    //     setTimeout(function () {
    //         PopUp2('show');
    //     }, 3000);
    // }


    //  $(document).ready(function() {
    //     $('.slider').slick({
    //         centerMode: true,
    //         centerPadding: '60px',
    //         slidesToShow: 10,
    //         speed: 1500,
    //         index: 2,
    //         focusOnSelect:true,
    //         responsive: [{
    //         breakpoint: 768,
    //         settings: {
    //             arrows: true,
    //             centerMode: true,
    //             centerPadding: '40px',
    //             slidesToShow: 1
    //         }
    //         }, {
    //         breakpoint: 480,
    //         settings: {
    //             arrows: false,
    //             centerMode: true,
    //             centerPadding: '40px',
    //             slidesToShow: 1
    //         }
    //         }]
    //     });
    // });




</script>

@endsection

