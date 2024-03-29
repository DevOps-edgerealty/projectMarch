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

        <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

		<!-- Font Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
		<!-- MDB -->
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/mdb-css5/mdb.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/js/lightbox.css')}}">

        <link rel="icon" type="image/png" href="{{URL::asset('public/assets/asset/15708667243400.png')}}"/>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

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

        <meta property="og:title" content="Edge Realty Sale & Rent Properties | Real Estate Agency in Dubai">
        <meta property="og:description" content="Edge realty is leading real estate agency to buy or sell properties in Dubai. We have hundreds of apartments, villas, and townhouses for rent and sale in Dubai." />
        <meta property="og:site_name" content="Edge Realty Real Estate">
        <meta property="og:type" content="website" />
        <meta property="og:image" itemprop="image" content="http://www.edgerealty.ae/edge-realty-real-estate.png">

        <meta property="og:image:type" content="image/jpg">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="en_US">

        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="627">

        <script type="application/ld+json" >
			[{"@context":"https://schema.org","@type":"Organization","@id":"https://edgerealty.ae","name":"Edge realty","url":"https://edgerealty.ae","sameAs":[],"logo":{"@type":"ImageObject","url":"https://www.edgerealty.ae/frontEnd/images/logo.png","width":"184","height":"35"}}]
        </script>

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

        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "4z18c8ed9x");
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150425659-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-150425659-1');
        </script>

        <script>
            function gtag_report_conversion(url) {
            var callback = function () {
                if (typeof(url) != 'undefined') {
                window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-697745610/cftWCLiXm-kCEMqB28wC',
                'event_callback': callback
            });
            return false;
            }
        </script>
        <meta name="yandex-verification" content="64dfa255856fcfc6" />
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

           ym(88839809, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/88839809" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <!-- Hotjar Tracking Code for edgerealty.ae -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2587060,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>


        <!-- Global site tag (gtag.js) - Google Ads: 697745610 -->
        <script async src=https://www.googletagmanager.com/gtag/js?id=AW-697745610></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'AW-697745610');
        </script>


        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '935332510555908');
            fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=935332510555908&ev=PageView&noscript=1"
            />
            </noscript>
            <!-- End Facebook Pixel Code -->


            <!-- Pinterest Tag -->
            <script>
                !function(e){if(!window.pintrk){window.pintrk = function () {
                window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
                n=window.pintrk;n.queue=[],n.version="3.0";var
                t=document.createElement("script");t.async=!0,t.src=e;var
                r=document.getElementsByTagName("script")[0];
                r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
                pintrk('load', '2613929980669', {em: '<user_email_address>'});
                pintrk('page');
                </script>
                <noscript>
                <img height="1" width="1" style="display:none;" alt=""
                src="https://ct.pinterest.com/v3/?event=init&tid=2613929980669&pd[em]=<hashed_email_address>&noscript=1" />
            </noscript>
            <!-- end Pinterest Tag -->


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


	</head>

	<body class=" text-white" style="background-color: #1c1c1c !important; color: #cccccc !important;">

        @include('layout.header_maps')

        @yield('content')

        {{-- @include('layout.footer') --}}


        <script src="{{URL::asset('public/assets/js/autocomplete.js')}}" type="text/javascript"></script>
		<script src="{{URL::asset('public/assets/js/script.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('public/assets/js/map.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('public/assets/js/lightbox.js')}}" type="text/javascript" ></script>
        <script src="{{URL::asset('public/assets/js/intlTelInput.js')}}" type="text/javascript" ></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVBe2TsNsN5oi3blO8iR18VsMFd4YHRI8&callback=initAutocomplete&libraries=places&v=weekly&channel=2" async> --}}
        </script>


		<!-- MDB -->
		{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>


        <script type="text/javascript">
            function handleSelect(elm)
            {
                window.location = elm.value;
            }
        </script>


        <script>
            var itiPhone = $(".iti-phone");

            itiPhone.intlTelInput({
                separateDialCode: false,
                initialCountry: "auto",
                nationalMode: false,
                utilsScript: "/build/js/utils.js",
                geoIpLookup: function(success) {
                // Get your api-key at https://ipdata.co/
                fetch("https://api.ipdata.co/?api-key=1f9ecc1670c915b3ddd397d233297968ccf720c0861abf9ecac1a8ef")
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

	</body>

</html>
