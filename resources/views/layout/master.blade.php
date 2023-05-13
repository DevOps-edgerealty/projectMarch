    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Edge Realty Dubai">
            <meta name="country" content="UAE">
            <meta name="robots" content="follow,index">
            <meta name="Language" content="en-us">

            @yield( 'meta_detail' )


            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/reset.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/style.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/custom.css')}}">

            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/lightbox.css')}}">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/ionicon.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/intlTelInput.css')}}">
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/css/intlTelInput.css')}}">

            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

            <!-- Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
            <!-- MDB -->
            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/mdb-css5/mdb.min.css')}}">

            <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/js/lightbox.css')}}">

            <link rel="icon" type="image/png" href="{{URL::asset('public/assets/asset/15708667243400.png')}}"/>

            {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet"> --}}
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

            <script src="https://www.google.com/recaptcha/api.js?render=6Lfg3zocAAAAAPZX4jNGTNMpl5CmoG4fGCbTCte2"></script>


            <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
            <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

            <script>
                function onClick(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Lfg3zocAAAAAPZX4jNGTNMpl5CmoG4fGCbTCte2', {action: 'submit'}).then(function(token) {
                        // Add your logic to submit to your backend server here.
                    });
                });
                }
            </script>

            <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63b80ce73d4c89001a1d4df3&product=inline-share-buttons&source=platform" async="async"></script>

            <meta name = "yandex-verification" content = "cd1d2766caba2522" />
                <?php
                $canonical_url = Request::url();
            ?>

            <link rel="canonical" href="<?php echo $canonical_url;?>">
            <meta property="og:url" content="<?php echo $canonical_url;?>">
            <link rel="alternate" href="<?php echo $canonical_url;?>" hreflang="en">
            <link rel="alternate" href="<?php echo $canonical_url;?>" hreflang="ar">
            <link rel="alternate" href="<?php echo $canonical_url;?>" hreflang="x-default" />

            <script type="application/ld+json" >
                [{"@context":"https://schema.org","@type":"Organization","@id":"https://edgerealty.ae","name":"Edge realty","url":"https://edgerealty.ae","sameAs":[],"logo":{"@type":"ImageObject","url":"https://www.edgerealty.ae/frontEnd/images/logo.png","width":"184","height":"35"}}]</script>




            <script type="application/ld+json">{
                "@context": "http://schema.org",
                "@type": "SiteNavigationElement",
                "name": [
                    "Home",
                    "Apartment For Sale In Dubai",
                    "Villas For Sale In Dubai",
                    "Dubai Off Plane Project",
                    "Ready Projects",
                    "Dubai Communities",
                    "Dubai Developers",
                    "About Company",
                    "Contact Us"
                ],
                "url": [
                    "https://edgerealty.ae",
                    "https://www.edgerealty.ae/en/dubai-properties/sale/apartment-for-sale-in-Dubai",
                    "https://www.edgerealty.ae/en/dubai-properties/sale/villas-for-sale-in-Dubai",
                    "https://www.edgerealty.ae/en/dubai-new-projects",
                    "https://www.edgerealty.ae/en/dubai-ready-projects",
                    "https://www.edgerealty.ae/en/dubai-communities",
                    "https://www.edgerealty.ae/en/dubai-developers",
                    "https://www.edgerealty.ae/en/about-company",
                    "https://www.edgerealty.ae/en/contact"
                ]
            }</script>


            <?php
                $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri_segments = explode('/', $uri_path);
                $seg1 = $uri_segments[1];
                if($seg1 == 'en' || $seg1 == 'ar' || $seg1 == 'ru' )
                {
                    $langSeg = $uri_segments[1];
                }
                else
                {
                    $langSeg = 'en';
                }
            ?>


            <style>

                html {
                    overflow-x: hidden;
                }

                .mobile_bottom {
                    display: none;

                }

                @media (min-width: 600px) {
                        .lang {
                            min-width: 4rem !important;
                            max-width: 8rem !important;
                    }

                }

                @media (max-width: 600px) {
                        .mobile_bottom {
                    display: block;
                    position: fixed;
                    bottom: 0;
                    background: #fff;
                    width: 100%;
                    text-align: center;

                    line-height: 60px;
                    }

                }

                .call_mobile {
                    position: relative;
                    width: 33.3%;
                    float: left;
                    font-size: xx-large;
                    bottom: 10px;

                }
                .whats_icon_btn {
                position: relative;
                bottom: 10px;
                right: auto;
                width: 33.3%;
                float: left;
                font-size: xx-large;


                }
                .enquiry_btn_right {
                position: relative;
                right: 0;

                bottom: 10px;

                width: 33.3%;


                z-index: 9999;

                float: left;
                font-size: xx-large;

                display: block
                }

                .grecaptcha-badge {
                    visibility: hidden;
                }
                .text-reset {
                    text-transform: capitalize !important;
                    font-size: 0.85vw !important;
                    text-decoration: none !important;
                }

                .text-reset-1 {
                    text-transform: capitalize !important;
                    font-size: 16px !important;
                    text-decoration: none !important;
                    color: #ccc !important;
                }

                .accordion-button, .collapsed {
                    background-color: #1c1c1c !important;
                    color: #ccc !important;
                }

                .btn {
                    border-radius: 0 !important;
                    border: 0.5px #cccccc solid !important;
                }



                </style>




            <!-- Hotjar Tracking Code for https://www.edgerealty.ae/ -->
            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:2373112,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>




            {{-- <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script> --}}
            <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>




        </head>

        <body class=" text-white" style="background-color: #1c1c1c !important; color: #cccccc !important;">

            <div id="fb-root"></div>

            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0" nonce="dWIUAMD1"></script>

            @include('layout.header')

            @yield('content')

            @include('layout.footer')

            <div class="mobile_bottom py-1" style="background-color: #1c1c1c !important; z-index: 20000 !important;">

                {{-- <div class="mb-2" style="">
                    <a href="#" style=" width: 60% !important; font-size: 1em !important;" data-mdb-toggle="modal" data-mdb-target="#exampleModal-request"
                        class="btn btn-outline-white bg-black rounded-pill text-white mx-auto text-center py-2">
                        <i class="fa fa-phone-alt  "></i> &nbsp;
                        {{ trans('frontLang.requestCallBack') }}
                    </a>
                </div> --}}



                <div class="call_mobile">
                    <a href="javascript:void(Tawk_API.toggle())" class="btn  shadow-none border-none" style="background-color: #1c1c1c; padding: 12px 30px; border: 0.5px #cccccc solid !important;;"><i class="far fa-comment-alt"> </i> {{ trans('frontLang.chat') }}</a>
                </div>

                <div class="enquiry_btn_right">
                    <a href="#" style="background-color: #1c1c1c;padding: 12px 28px; border: 0.5px #cccccc solid !important;;"  data-mdb-toggle="modal" data-mdb-target="#exampleModal-request"  class="btn btn-danger shadow-none border-none"><i class="fas fa-envelope"> </i> {{ trans('frontLang.email_footer') }}</a>
                </div>

                <div class="whats_icon_btn">
                    <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" target="_blank" class="btn btn-success shadow-none border-none" style="padding: 12px 15px; border: 0.5px #cccccc solid !important; ;" ><i class="fab fa-whatsapp"> </i> {{ trans('frontLang.whatsapp') }}</a>
                </div>


            </div>

            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" class="float" target="_blank">
                <i class="fab fa-whatsapp my-float"></i>
            </a>

            <div class="modal fade" id="exampleModal-request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0 bg-black">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel"> {{ trans('frontLang.requestCallBack') }} </h5>
                            <button type="button " class="btn-close bg-white" data-mdb-dismiss="modal" aria-label="Close" ></button>
                        </div>
                        <div class="modal-body bg-black">
                            <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                                @csrf

                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                <input type="text" name="utm_medium" class="utm_parameters" hidden>

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

                                {{-- <div class="mb-4">
                                    <textarea name="message" class="form-control bg-black text-white rounded-0" id="textAreaExample" rows="3" placeholder="Message"></textarea>
                                </div> --}}

                                @honeypot
                                <button type="submit" class="btn btn-outline-white bg-black rounded-0 btn-lg btn-block">
                                    Submit
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- POPUP -->
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
                        height: 450px;
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
                    /* .subscription-desktop{
                        background-image: url('{{ asset('assets/images/sub1.png') }}');
                    } */
                </style>

                {{-- desktop popup --}}
                <div class="modal fade " id="popupBoxDesktop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content rounded-0">
                            <div class="modal-body " style="background-image: url('{{URL::asset('public/assets/images/sub3.png')}}')">
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <button type="button" class="btn-close" aria-label="Close" id="popup-closed"></button>
                                </div>
                                {{-- <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 40px; width:40px;" class="position-absolute ms-2 mt-2"> --}}
                                <div class="row h-100 p-2 pt-0 pb-0 my-auto align-middle">


                                    <div class="col-12 p-2 d-flex flex-column mx-auto my-auto h-100" >
                                        {{-- <img src="{{ URL('public/assets/images/logo-black.png') }}" style="height: 70px; width:auto;" class="mx-auto"> --}}

                                        <div class="row mx-auto h-100 my-0">
                                            <p class="mx-auto fw-bold text-center m-0 p-0" style="font-size: 1.5rem; line-height: 1.2 !important; color: #525252 !important">
                                                {{ trans('frontLang.registerInterest') }}
                                            </p>
                                            <p class=" container mx-auto mt-3 px-5 text-center " style="font-size: 1rem !important; color: #525252 !important; text-align: center !important; line-height: 1.5 !important;">
                                                {{ trans('frontLang.popupDesc') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 h-100 mx-auto text-center">
                                        <div class="row my-auto mx-auto h-100 p-2 rounded-3 shadow"  style="background-color: #fff !important;">
                                            <form class="contact-form py-2" method="post" action="{{URL('/request_detail/submit')}}">
                                                @csrf
                                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                <!-- Name input -->
                                                <div class="form-outline rounded-0 mb-3">
                                                    <input type="text" id="form1Example1" name="name" class="form-control  " style="background-color: #fff !important; color: #1c1c1c !important" required/>
                                                    <label class="form-label text-center rounded-0" style="font-size: 1em !important" for="form1Example1">{{ trans('frontLang.name') }}</label>
                                                </div>

                                                <!-- Phone input -->
                                                <div class="mb-3">
                                                    <input type="phone" name="phone" id="phone-iti"
                                                    class="form-control bg-white text-dark form-control-lg  iti-phone"
                                                    placeholder="{{ trans('frontLang.phone') }}"
                                                    required
                                                    style="background-color: #fff !important; color: #1c1c1c !important; font-size: 1em !important  "/>
                                                </div>

                                                {{-- URL --}}
                                                <input type="hidden" name="page_url" value="{{ url()->current() }}">

                                                <!-- Email input -->
                                                <div class="form-outline rounded-0 mb-3">
                                                    <input type="email" id="form1Example2" name="email" class="form-control  "  style="background-color: #fff !important; color: #1c1c1c !important" required/>
                                                    <label class="form-label text-center rounded-0" style="font-size: 1em !important" for="form1Example2">{{ trans('frontLang.email') }}</label>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-block rounded-0 text-uppercase" id="popup-submit" style="background-color: #1c1c1c !important; color: #ccc !important;">{{ trans('frontLang.submit') }}</button>
                                            </form>
                                        </div>
                                        <button class="text-decoration-underline mt-3 mx-auto text-center" style="text-decoration: none !important; color: #848484 !important;" data-mdb-dismiss="modal" id="popup-yes">{{ trans('frontLang.popupNotInterested') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                {{-- mobile popup --}}
                <div class="modal top fade " id="popupBoxMobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg  modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-body " style="background-image: url('{{URL::asset('public/assets/images/sub3.png')}}')">
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <button type="button" class="btn-close" aria-label="Close" id="popup-mobile-closed"></button>
                                </div>
                                {{-- <img src="{{ URL('public/assets/asset/email_icon.png') }}" style="height: 40px; width:40px;" class="position-absolute ms-2 mt-2"> --}}
                                <div class="row h-100 p-0 my-auto align-middle">


                                    <div class="col-12 p-3 pt-0 d-flex flex-column mx-auto my-auto h-100" >
                                        {{-- <img src="{{ URL('public/assets/images/logo-black.png') }}" style="height: 30px; width:auto;" class="mx-auto"> --}}

                                        <div class="row mx-auto h-100 my-0">
                                            <p class="mx-auto fw-bold text-center m-0 pt-0" style="font-size: 1.3rem; line-height: 1.2 !important; color: #525252 !important">
                                                {{ trans('frontLang.registerInterest') }}
                                            </p>
                                            <p class=" container mx-auto mt-2 px-1 text-center " style="font-size: .9rem !important; color: #525252 !important; text-align: center !important; line-height: 1.5 !important;">
                                                {{ trans('frontLang.popupDesc') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 h-100 mx-auto text-center">
                                        <div class="row my-auto mx-auto h-100 p-2 rounded-1 shadow"  style="background-color: #fff !important;">
                                            <form class="contact-form py-2" method="post" action="{{URL('/request_detail/submit')}}">
                                                @csrf

                                                <input type="text" name="utm_source" class="utm_parameters" hidden>
                                                <input type="text" name="utm_id" class="utm_parameters" hidden>
                                                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                                <input type="text" name="utm_medium" class="utm_parameters" hidden>
                                                <!-- Name input -->
                                                <div class="form-outline rounded-0 mb-2">
                                                    <input type="text" id="form1Example1" name="name" class="form-control  " style="background-color: #fff !important; color: #1c1c1c !important" required/>
                                                    <label class="form-label text-center rounded-0" style="font-size: .9em" for="form1Example1">{{ trans('frontLang.name') }}</label>
                                                </div>

                                                <!-- Phone input -->
                                                <div class="mb-2">
                                                    <input type="phone" name="phone" id="phone-iti"
                                                    class="form-control bg-white text-dark form-control-lg iti-phone"
                                                    placeholder="{{ trans('frontLang.phone') }}"
                                                    required
                                                    style="background-color: #fff !important; color: #1c1c1c !important; font-size: .9em "/>
                                                </div>

                                                {{-- URL --}}
                                                <input type="hidden" name="page_url" value="{{ url()->current() }}">

                                                <!-- Email input -->
                                                <div class="form-outline rounded-0 mb-2">
                                                    <input type="email" id="form1Example2" name="email" class="form-control  "  style="background-color: #fff !important; color: #1c1c1c !important" required/>
                                                    <label class="form-label text-center rounded-0" style="font-size: .9em" for="form1Example2">{{ trans('frontLang.email') }}</label>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-block rounded-0 text-uppercase" id="popup-submit-mobile" style="background-color: #1c1c1c !important; color: #ccc !important;">{{ trans('frontLang.submit') }}</button>

                                            </form>
                                            {{-- <p class="text-decoration-underline text-dark " onClick="PopUp('hide">I'm not interested</p> --}}
                                        </div>
                                        {{-- <button class="text-decoration-underline mt-3 mx-auto text-center" style="text-decoration: none !important; color: #848484 !important;" data-mdb-dismiss="modal" id="popup-yes-mobile">I'm not interested</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- POPUP -->


            <script src="{{URL::asset('public/assets/js/autocomplete.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('public/assets/js/script.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('public/assets/js/map.js')}}" type="text/javascript"></script>
            <script src="{{URL::asset('public/assets/js/lightbox.js')}}" type="text/javascript" ></script>
            <script src="{{URL::asset('public/assets/js/fslightbox.js')}}" type="text/javascript" ></script>
            <script src="{{URL::asset('public/assets/js/intlTelInput.js')}}" type="text/javascript" ></script>


            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVBe2TsNsN5oi3blO8iR18VsMFd4YHRI8&callback=initAutocomplete&libraries=places&v=weekly&channel=2" async>
            </script>

            <!-- MDB -->
            {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> --}}
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>

            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5d75e56f77aa790be33311f3/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
            <!--End of Tawk.to Script-->

            <script>
                var itiPhone = $(".iti-phone");

                itiPhone.intlTelInput({
                    separateDialCode: false,
                    initialCountry: "auto",
                    nationalMode: false,
                    utilsScript: "/build/js/utils.js",
                    geoIpLookup: function(success) {
                    // Get your api-key at https://ipdata.co/
                    fetch("https://api.ipdata.co/?api-key=3982c26f748d036ada01b977abc0bca057321c1b2c5ad3659030214c")
                    .then(function(response) {
                        if (!response.ok) return success("");
                        return response.json();
                    })
                    .then(function(ipdata) {
                        success(ipdata.country_code);
                    });
                },
                });


                function AllowOnlyNumbers(e) {

                e = (e) ? e : window.event;
                var clipboardData = e.clipboardData ? e.clipboardData : window.clipboardData;
                var key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
                var str = (e.type && e.type == "paste") ? clipboardData.getData('Text') : String.fromCharCode(key);

                return (/^\d+$/.test(str));
                }
            </script>


            {{-- POPUP FUNCTION --}}
            <script>

                $(document).ready(function(){
                    if ($(window).width() > 991) {
                        // showPopup()
                        // setTimeout(showPopup(), 5000);
                        // $('#popupBoxDesktop').modal('show');
                        // setInterval(showPopup, 2000);
                    } else {
                        // $('#popupBoxMobile').modal('show');
                        // showPopupMobile()
                        // setInterval(showPopupMobile, 5000);
                        // setTimeout(showPopupMobile(), 5000);
                    }
                });

                function showPopup(){
                    var YesBtn = localStorage.getItem("YesBtn");

                    var popup_submit = localStorage.getItem("popup_submit");

                    var popup_closed = localStorage.getItem("popup_closed");

                    if(popup_closed != '1' ){

                        //CHECK IF POPUP WAS NOT CLOSED BY USER
                        if(YesBtn != 1 && popup_submit != 1){

                            setTimeout(() => {

                                $('#popupBoxDesktop').modal('show');

                                //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                $('#popup-yes').on('click', function(){

                                    //SET LOCALSTORAGE
                                    var popup_closed_at = new Date();

                                    localStorage.setItem("popup_closed_at", popup_closed_at);

                                    localStorage.setItem("YesBtn", 1);

                                    //HIDE MODAL
                                    $('#popupBoxDesktop').modal('hide');
                                });

                                $('#popup-closed').on('click', function(){

                                    //SET LOCALSTORAGE
                                    var popup_closed_at = new Date();

                                    localStorage.setItem("popup_closed_at", popup_closed_at);

                                    localStorage.setItem("popup_closed", 1);

                                    //HIDE MODAL
                                    $('#popupBoxDesktop').modal('hide');
                                });

                                $('#popup-submit').on('click', function(){

                                    //SET LOCALSTORAGE
                                    localStorage.setItem("popup_submit", 1);

                                    //SET CURRENT TIMESTAMP FOR SUBMISSION
                                    var popup_submited_at = new Date();
                                    localStorage.setItem("popup_submited_at", popup_submited_at);

                                })
                            }, 10000);

                        } else if(YesBtn == 1 && popup_submit != 1) {

                            //GET CURRENT TIME
                            var popup_time_page_load_at = new Date();

                            // GET TIME FROM
                            var popup_time_closed_at = new Date(localStorage.getItem("popup_closed_at"));

                            var popup_time_difference = popup_time_page_load_at - popup_time_closed_at ;

                            if(popup_time_difference > 60000)
                            {
                                localStorage.removeItem("YesBtn");

                                localStorage.removeItem("popup_closed_at");

                                setTimeout(() => {
                                    $('#popupBoxDesktop').modal('show');

                                    //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                    $('#popup-yes').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("YesBtn", 1);

                                        //HIDE MODAL
                                        $('#popupBoxDesktop').modal('hide');
                                    });

                                    $('#popup-closed').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();

                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("popup_closed", 1);

                                        //HIDE MODAL
                                        $('#popupBoxDesktop').modal('hide');
                                    });

                                    $('#popup-submit').on('click', function(){

                                        //SET LOCALSTORAGE
                                        localStorage.setItem("popup_submit", 1);

                                        //SET CURRENT TIMESTAMP FOR SUBMISSION
                                        var popup_submited_at = new Date();
                                        localStorage.setItem("popup_submited_at", popup_submited_at);

                                    })
                                }, 2000);
                            }


                        } else if (popup_submit == 1){

                            //GET CURRENT TIME
                            var popup_time_page_load_at = new Date();

                            // GET TIME FROM
                            var popup_submited_at = new Date(localStorage.getItem("popup_submited_at"));

                            var popup_time_difference = popup_time_page_load_at - popup_submited_at ;

                            if(popup_time_difference > 3600000)
                            {
                                localStorage.removeItem("popup_submit");

                                localStorage.removeItem("popup_submited_at");

                                setTimeout(() => {
                                    $('#popupBoxDesktop').modal('show');

                                    //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                    $('#popup-yes').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("YesBtn", 1);

                                        //HIDE MODAL
                                        $('#popupBoxDesktop').modal('hide');
                                    });

                                    $('#popup-closed').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();

                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("popup_closed", 1);

                                        //HIDE MODAL
                                        $('#popupBoxDesktop').modal('hide');
                                    });

                                    $('#popup-submit').on('click', function(){

                                        //SET LOCALSTORAGE
                                        localStorage.setItem("popup_submit", 1);

                                        //SET CURRENT TIMESTAMP FOR SUBMISSION
                                        var popup_submited_at = new Date();
                                        localStorage.setItem("popup_submited_at", popup_submited_at);

                                    })
                                }, 2000);
                            }
                        }
                    } else {

                        setTimeout(() => {

                            localStorage.removeItem("popup_closed");

                            localStorage.removeItem("popup_closed_at");

                            $('#popupBoxDesktop').modal('show');

                            //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                            $('#popup-yes').on('click', function(){

                                //SET LOCALSTORAGE
                                var popup_closed_at = new Date();

                                localStorage.setItem("popup_closed_at", popup_closed_at);

                                localStorage.setItem("YesBtn", 1);

                                //HIDE MODAL
                                $('#popupBoxDesktop').modal('hide');
                            });

                            $('#popup-closed').on('click', function(){

                                //SET LOCALSTORAGE
                                var popup_closed_at = new Date();

                                localStorage.setItem("popup_closed_at", popup_closed_at);

                                localStorage.setItem("popup_closed", 1);

                                //HIDE MODAL
                                $('#popupBoxDesktop').modal('hide');
                            });

                            $('#popup-submit').on('click', function(){

                                //SET LOCALSTORAGE
                                localStorage.setItem("popup_submit", 1);

                                //SET CURRENT TIMESTAMP FOR SUBMISSION
                                var popup_submited_at = new Date();
                                localStorage.setItem("popup_submited_at", popup_submited_at);
                            })
                        }, 5000);
                    }
                };



                function showPopupMobile(){
                    var YesBtn = localStorage.getItem("YesBtn");

                    var popup_submit = localStorage.getItem("popup_submit");

                    var popup_closed = localStorage.getItem("popup_closed");

                    //CHECK IF POPUP WAS NOT CLOSED BY USER
                    if(popup_closed != 1) {
                        if(YesBtn != 1 && popup_submit != 1){

                            setTimeout(() => {

                                $('#popupBoxMobile').modal('show');

                                //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                $('#popup-yes-mobile').on('click', function(){

                                    //SET LOCALSTORAGE
                                    var popup_closed_at = new Date();

                                    localStorage.setItem("popup_closed_at", popup_closed_at);

                                    localStorage.setItem("YesBtn", 1);

                                    //HIDE MODAL
                                    $('#popupBoxMobile').modal('hide');
                                });

                                $('#popup-mobile-closed').on('click', function(){

                                        //SET LOCALSTORAGE
                                    var popup_closed_at = new Date();
                                    localStorage.setItem("popup_closed_at", popup_closed_at);

                                    localStorage.setItem("popup-mobile-closed", 1);

                                    //HIDE MODAL
                                    $('#popupBoxMobile').modal('hide');
                                });

                                $('#popup-submit-mobile').on('click', function(){

                                    //SET LOCALSTORAGE
                                    localStorage.setItem("popup_submit", 1);

                                    //SET CURRENT TIMESTAMP FOR SUBMISSION
                                    var popup_submited_at = new Date();
                                    localStorage.setItem("popup_submited_at", popup_submited_at);

                                })
                            }, 2000);

                        } else if(YesBtn == 1 && popup_submit != 1) {

                            //GET CURRENT TIME
                            var popup_time_page_load_at = new Date();

                            // GET TIME FROM
                            var popup_time_closed_at = new Date(localStorage.getItem("popup_closed_at"));

                            var popup_time_difference = popup_time_page_load_at - popup_time_closed_at ;

                            if(popup_time_difference > 60000)
                            {
                                localStorage.removeItem("YesBtn");

                                localStorage.removeItem("popup_closed_at");

                                setTimeout(() => {
                                    $('#popupBoxMobile').modal('show');

                                    //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                    $('#popup-yes-mobile').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("YesBtn", 1);

                                        //HIDE MODAL
                                        $('#popupBoxMobile').modal('hide');
                                    });

                                    $('#popup-mobile-closed').on('click', function(){

                                            //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("popup-mobile-closed", 1);

                                        //HIDE MODAL
                                        $('#popupBoxMobile').modal('hide');
                                    });

                                    $('#popup-submit-mobile').on('click', function(){

                                        //SET LOCALSTORAGE
                                        localStorage.setItem("popup_submit", 1);

                                        //SET CURRENT TIMESTAMP FOR SUBMISSION
                                        var popup_submited_at = new Date();
                                        localStorage.setItem("popup_submited_at", popup_submited_at);
                                    })
                                }, 2000);
                            }


                        } else if (popup_submit == 1){

                            //GET CURRENT TIME
                            var popup_time_page_load_at = new Date();

                            // GET TIME FROM
                            var popup_submited_at = new Date(localStorage.getItem("popup_submited_at"));

                            var popup_time_difference = popup_time_page_load_at - popup_submited_at ;

                            if(popup_time_difference > 3600000)
                            {
                                localStorage.removeItem("popup_submit");

                                localStorage.removeItem("popup_submited_at");

                                setTimeout(() => {
                                    $('#popupBoxMobile').modal('show');

                                    //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                                    $('#popup-yes-mobile').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("YesBtn", 1);

                                        //HIDE MODAL
                                        $('#popupBoxMobile').modal('hide');
                                    });

                                    $('#popup-mobile-closed').on('click', function(){

                                        //SET LOCALSTORAGE
                                        var popup_closed_at = new Date();
                                        localStorage.setItem("popup_closed_at", popup_closed_at);

                                        localStorage.setItem("popup-mobile-closed", 1);

                                        //HIDE MODAL
                                        $('#popupBoxMobile').modal('hide');
                                    });

                                    $('#popup-submit-mobile').on('click', function(){

                                        //SET LOCALSTORAGE
                                        localStorage.setItem("popup_submit", 1);

                                        //SET CURRENT TIMESTAMP FOR SUBMISSION
                                        var popup_submited_at = new Date();
                                        localStorage.setItem("popup_submited_at", popup_submited_at);

                                    })
                                }, 2000);
                            }
                        }
                    } else {

                        setTimeout(() => {

                            localStorage.removeItem("popup-mobile-closed");

                            localStorage.removeItem("popup_closed_at");

                            $('#popupBoxMobile').modal('show');

                            //IF USER CLOSED POPUP, SET A STATUS IN USER'S BROWSER
                            $('#popup-yes-mobile').on('click', function(){

                                //SET LOCALSTORAGE
                                var popup_closed_at = new Date();

                                localStorage.setItem("popup_closed_at", popup_closed_at);

                                localStorage.setItem("YesBtn", 1);

                                //HIDE MODAL
                                $('#popupBoxMobile').modal('hide');
                            });

                            $('#popup-mobile-closed').on('click', function(){

                                    //SET LOCALSTORAGE
                                var popup_closed_at = new Date();
                                localStorage.setItem("popup_closed_at", popup_closed_at);

                                localStorage.setItem("popup-mobile-closed", 1);

                                //HIDE MODAL
                                $('#popupBoxMobile').modal('hide');
                            });

                            $('#popup-submit-mobile').on('click', function(){

                                //SET LOCALSTORAGE
                                localStorage.setItem("popup_submit", 1);

                                //SET CURRENT TIMESTAMP FOR SUBMISSION
                                var popup_submited_at = new Date();
                                localStorage.setItem("popup_submited_at", popup_submited_at);

                            })
                        }, 5000);

                    }

                };

            </script>


            {{-- <script>
                $(document).ready(function() {
                    $("body").on("contextmenu", function(e) {
                        return false;
                        });
                    });
                    $(document).ready(function() {
                    $('body').bind('cut copy', function(e) {
                        e.preventDefault();
                        });
                    });
            </script> --}}


        <script src="{{URL::asset('public/assets/js/fslightbox.js')}}"></script>


        {{-- script for sending UTM via form --}}
        <script>
            var queryForm = function(settings){

                // STORE THE UTM IN SESSION STORAGE

                    var reset = settings && settings.reset ? settings.reset : false;

                    var self = window.location.toString();

                    var querystring = self.split("?");

                    if (querystring.length > 1) {

                        var pairs = querystring[1].split("&");

                        for (i in pairs) {

                            var keyval = pairs[i].split("=");

                            if (reset || sessionStorage.getItem(keyval[0]) === null) {
                                sessionStorage.setItem(keyval[0], decodeURIComponent(keyval[1]));
                            }
                        }
                    }

                // STORE THE UTM IN SESSION STORAGE


                // READ THE UTM IN SESSION STORAGE INTO INPUT VALUES

                    var hiddenFields = document.querySelector(".utm_parameters");

                    var utm_parameters = document.getElementsByClassName("utm_parameters");  //Get all hidden inputs with utm_parameters in form submission

                    // GET UTM PARAMETERS STORED IN SESSION
                    var utm_campaign = sessionStorage.getItem('utm_campaign');

                    var utm_source = sessionStorage.getItem('utm_source');

                    var utm_id = sessionStorage.getItem('utm_id');

                    var utm_medium = sessionStorage.getItem('utm_medium');


                    /**
                     * LOOP THROUGH THE UTM PARAMETERS
                     * COLLECTED FROM THE PAGE
                     * AND APPEND THE UTM PARAMETERS
                     * COLLECTED FROM THE SESSION STORAGE
                    */
                    for(var i = 0, length = utm_parameters.length; i < length; i++) {

                        if(document.getElementsByName(utm_parameters[i].name)[0].name == 'utm_source') {

                            document.getElementsByName(utm_parameters[i].name)[0].value = utm_source;

                        }else if(document.getElementsByName(utm_parameters[i].name)[0].name == 'utm_medium') {

                            document.getElementsByName(utm_parameters[i].name)[0].value = utm_medium;

                        }else if(document.getElementsByName(utm_parameters[i].name)[0].name == 'utm_id') {

                            document.getElementsByName(utm_parameters[i].name)[0].value = utm_id;

                        }else if(document.getElementsByName(utm_parameters[i].name)[0].name == 'utm_campaign') {

                            document.getElementsByName(utm_parameters[i].name)[0].value = utm_campaign;
                        }
                        // console.log(document.getElementsByName(utm_parameters[i].name)[0].name+': '+document.getElementsByName(utm_parameters[i].name)[0].value)
                    }

                // READ THE UTM IN SESSION STORAGE INTO INPUT VALUES

            }

            setTimeout(function(){queryForm();}, 5000);

        </script>

        </body>

    </html>
