

@extends('layout.master')




<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


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
    $langSeg = 'ar';
}

?>

@if ($langSeg == 'ru')

    @section('meta_detail')

            <title>  Свяжитесь с нами | Покупка, продажа и аренда недвижимости в Дубае</title>
            <meta name="description" content=" Edge Realty Real Estate - надежная компания в Дубае для покупки, продажи или аренды недвижимости по доступным ценам с различными вариантами апартаментов, вилл, студий."/>
            <meta name="keywords" content=" Свяжитесь с нами или напишите нам"/>



    @endsection

@else

    @section('meta_detail')

            <title> Contact Us | Buy , Sale &amp; Rent Property in Dubai </title>
            <meta name="description" content=" Edge Realty Real Estate is a trusted  Company in Dubai for buy, sale or rent properties at an affordable prices with different ranges of apartments, villas, studios. "/>
            <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>



    @endsection

@endif



@section('content')
<style>
    p{
        line-height: 1.5 !important;
        text-align: justify !important;
        letter-spacing: .05rem !important;
    }
    td > a {
        color: #cccccc !important;
    }
    input, select, textarea {
        background-color: #1c1c1c !important;
        color: #ccc !important;
        border-radius: 0px !important;
        border: 1px solid #ccc !important;
    }
    button {
        background-color: #1c1c1c !important;
        color: #cccccc !important;
        border: 1px solid #ccc !important;
    }

    .btn:hover {
        box-shadow: 0px 0px 30px #9a9a9a !important;
        opacity: 1 !important;
    }

    .card {
        margin: 12px !important;
        color: #cccccc !important;
        background-color: #1c1c1c !important;
        border: 0.5px solid rgb(86, 86, 86) !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important;
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

<section>

    <header>

        <!-- Background image -->
            <div id="intro-page" class="bg-image shadow-2-strong">
                <div class="mask" style="background-color: #1c1c1c;">
                    <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                        <div class="text-white">
                            <h3 style="text-transform: uppercase;">{{ trans('frontLang.Contactus') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Background image -->

    </header>



</section>

<section class="desktop-show" >
    <div class="container-fluid containerization" style="margin-top: 0px; ">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-center mb-3   border border-1 border-white rounded-2">
                    <div class="card-body">
                        <h4 class="card-title "><i class="fab fa-whatsapp fa-2x" style="color: #ccc;"></i></h4>

                        <p class="card-text "><h4><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" class="  text-white" target="_blank"><b>+971 58 560 2665</b></a></h4></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center mb-3   border border-1 border-white rounded-2">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-phone-alt fa-2x "></i></h4>

                        <p class="card-text   "><h4>  <a href="tel:0097143881856" class="  "> <b>+9714 388 1856</b></a></h4></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center mb-3   border border-1 border-white rounded-2">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-at fa-2x "></i></h4>
                        <p class="card-text  text-white"><h4><a href="mailto:info@edgerealty.ae" class="__cf_email__  " data-cfemail="a5cccbc3cae5c3cccbc1cdcad0d6c08bc6cac8"><b>info@edgerealty.ae</b></a></h4></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@if ($langSeg == 'ar')
<section class="mt-3 mb-5" >
    <div class="container-fluid containerization">
        <div class="row" style="direction: rtl; background-color: #1c1c1c !important;">


            <div class="col-lg-6 mt-3 mb-3" >
                <h3>المكتب الرئيسي</h3>
                <h6 class="my-3 py-1"><i class="fas fa-map-marker-alt"> </i>  معرض رقم 4 مبنى أسوار - الوصل - شارع الشيخ زايد ، دبي</h6>
                <h6 class="my-3 py-1"><i class="far fa-clock"> </i> من الاثنين الى السبت 9 صباحا الى 6 مساءا </h6>
                <h6 class="my-3 py-1"> <a href="tel:0097143881856" class=""> 97143881856+ </a> <i class="fas fa-phone-alt"> </i></h6>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14440.226682186727!2d55.2671464!3d25.2013113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x424936f85dc4d24a!2sEdge%20Realty!5e0!3m2!1sen!2sae!4v1627281665507!5m2!1sen!2sae" width="100%" height="400"  allowfullscreen="" loading="lazy"></iframe>
            </div>


            <div class="col-lg-6 mt-3 mb-3">
                <h3>فرع</h3>
                <h6 class="my-3 py-1"><i class="fas fa-map-marker-alt"> </i> معرض - 07 مبنى رقم 1 - سيتي ووك</h6>
                <h6 class="my-3 py-1"> <a href="tel:0097145807142" class=""> 97145807142+ </a> <i class="fas fa-phone-alt"> </i> </h6>
                <h6 class="my-3 py-1"><i class="far fa-clock"> </i> من السبت إلى الخميس من الساعة 10 صباحًا حتى الساعة 10 مساءً </h6>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14439.565875912738!2d55.2654178!3d25.2068823!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82642d0792bb3c7!2sEdge%20Realty%20-%20Citywalk!5e0!3m2!1sen!2sae!4v1630221126274!5m2!1sen!2sae" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>

        <div class="col-lg-12 mt-5 mb-4">
            <h3 class="text-center">{{ trans('frontLang.getInTouchh') }}</h3>
            <p class="text-center">{{ trans('frontLang.KindlyFillGetIntouch') }}</p>
        </div>

        <div class="col-lg-6 offset-md-3  ">

            <form class="contact-form" method="post"  action="{{URL('/contactus/submit')}}">
                @csrf
                <input type="text" name="utm_source" class="utm_parameters" hidden>
                <input type="text" name="utm_id" class="utm_parameters" hidden>
                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                <input type="text" name="utm_medium" class="utm_parameters" hidden>
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
                <div class="mb-4">
                    <textarea style="direction: rtl;" name="message" class="form-control" id="textAreaExample" rows="3" placeholder="{{ trans('frontLang.message') }}"></textarea>

                </div>
                <button type="submit" class="btn btn-outline-white btn-lg btn-block ">
                    {{ trans('frontLang.submit') }}
                </button>

                <button class="btn btn-outline-white btn-lg btn-block g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key')}}" data-callback="onSubmit">Submit</button>
            </form>
        </div>

    </div>
</section>

@elseif ( $langSeg == 'ru' )
<section class="mt-3 mb-5">
    <div class="container-fluid containerization">
        <div class="row">


            <div class="col-lg-6 mt-3 mb-3" >
                <h3 class="my-3">ГОЛОВНОЙ ОФИС</h3>
                <h6 class="my-3"><i class="fas fa-map-marker-alt"></i> ДЕМОНСТРАЦИОННЫЙ ЗАЛ №4 ASWAR BUILDING - AL WASL - SHEIKH ZAYED ROAD, DUBAI</h6>
                <h6 class="my-3"><i class="far fa-clock"></i>  С ПОНЕДЕЛЬНИКА ПО СУББОТУ С 09:00 УТРА ДО 06:00 ВЕЧЕРА</h6>
                <h6 class="my-3"><i class="fas fa-phone-alt"></i> <a href="tel:0097143881856" class=""> +97143881856 </a> </h6>


                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14440.226682186727!2d55.2671464!3d25.2013113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x424936f85dc4d24a!2sEdge%20Realty!5e0!3m2!1sen!2sae!4v1627281665507!5m2!1sen!2sae" width="100%" height="400"  allowfullscreen="" loading="lazy"></iframe>

            </div>


            <div class="col-lg-6 mt-3 mb-3">
                <h3 class="my-3">ФИЛИАЛ</h3>
                <h6 class="my-3"><i class="fas fa-map-marker-alt"></i> ДЕМОНСТРАЦИОННЫЙ ЗАЛ - 07 ЗДАНИЕ #1 - CITY WALK, ДУБАЙ</h6>
                <h6 class="my-3"><i class="far fa-clock"></i> С ПОНЕДЕЛЬНИКА ПО СУББОТУ С 10:00 УТРА ДО 10:00 ВЕЧЕРА</h6>
                <h6 class="my-3"><i class="fas fa-phone-alt"></i> <a href="tel:0097145807142" class=""> +97145807142 </a> </h6>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14439.565875912738!2d55.2654178!3d25.2068823!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82642d0792bb3c7!2sEdge%20Realty%20-%20Citywalk!5e0!3m2!1sen!2sae!4v1630221126274!5m2!1sen!2sae" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>



        </div>
        <div class="col-lg-12 mt-5 mb-4">
            <h3 class="text-center">СВЯЖИТЕСЬ С НАМИ</h3>
            <p class="text-center">Пожалуйста, введите Ваши данные ниже, и один из наших консультантов по недвижимости Edge Realty свяжется с Вами в ближайшее время.</p>
        </div>
        <div class="col-lg-6 offset-md-3 ">

            <form class="contact-form" method="post" action="{{URL('/contactus/submit')}}">
                @csrf

                <input type="text" name="utm_source" class="utm_parameters" hidden>
                <input type="text" name="utm_id" class="utm_parameters" hidden>
                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                <input type="text" name="utm_medium" class="utm_parameters" hidden>

                <div class=" mb-4">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="ПОЛНОЕ ИМЯ"  required />

                </div>

                <!-- Email input -->
                <div class="mb-4">
                    <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="НОМЕР ТЕЛЕФОНА" required />

                </div>

                <!-- Email input -->
                <div class="mb-4">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="EMAIL" required />

                </div>
                <div class="mb-4">
                    <textarea name="message" class="form-control" id="textAreaExample" rows="3" placeholder="ВАШЕ СООБЩЕНИЕ"></textarea>

                </div>
                @honeypot
                <button type="submit" class="btn btn-outline-white btn-lg btn-block ">
                    ВЫПОЛНИТЬ
                </button>
            </form>
        </div>



    </div>
</section>

@else
<section class="mt-3 mb-5">
    <div class="container-fluid containerization">
        <div class="row">


            <div class="col-lg-6 mt-3 mb-3" >
                <h3 class="my-3">Head Office</h3>
                <h6 class="my-3"><i class="fas fa-map-marker-alt"></i> Showroom #4 Aswar Building - Al Wasl - Sheikh Zayed Road, Dubai</h6>
                <h6 class="my-3"><i class="far fa-clock"></i> Monday to Saturday 09:00 AM to 06:00 PM</h6>
                <h6 class="my-3"><i class="fas fa-phone-alt"></i> <a href="tel:0097143881856" class=""> +97143881856 </a> </h6>


                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14440.226682186727!2d55.2671464!3d25.2013113!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x424936f85dc4d24a!2sEdge%20Realty!5e0!3m2!1sen!2sae!4v1627281665507!5m2!1sen!2sae" width="100%" height="400"  allowfullscreen="" loading="lazy"></iframe>

            </div>


            <div class="col-lg-6 mt-3 mb-3">
                <h3 class="my-3">Branch Office</h3>
                <h6 class="my-3"><i class="fas fa-map-marker-alt"></i> Showroom - 07 Building #1 - City Walk, Dubai</h6>
                <h6 class="my-3"><i class="far fa-clock"></i> Monday to Saturday 10:00 AM to 10:00 PM</h6>
                <h6 class="my-3"><i class="fas fa-phone-alt"></i> <a href="tel:0097145807142" class=""> +97145807142 </a> </h6>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14439.565875912738!2d55.2654178!3d25.2068823!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82642d0792bb3c7!2sEdge%20Realty%20-%20Citywalk!5e0!3m2!1sen!2sae!4v1630221126274!5m2!1sen!2sae" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>



        </div>
        <div class="col-lg-12 mt-5 mb-4">
            <h3 class="text-center">Get in Touch</h3>
            <p class="text-center">Kindly fill in your details below and one of our Edge Realty Property Consultants will be in touch with you soon.</p>
        </div>

        <div class="col-lg-6 offset-md-3 ">

            @isset($error)
                <div class="alert alert-light" role="alert">
                    Something went wrong! Please try again later or reach our hotline if error still persists.
                </div>
            @endisset

            <form class="contact-form" method="post" id="demo-form" action="{{URL('/contactus/submit')}}">
                @csrf

                @honeypot


                <input type="text" name="utm_source" class="utm_parameters" hidden>
                <input type="text" name="utm_id" class="utm_parameters" hidden>
                <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                <input type="text" name="utm_medium" class="utm_parameters" hidden>
                <input type="text" name="page_url" value="edgerealty.ae/{{ $langSeg }}/contactus" hidden>

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

                <div class="mb-4">
                    <textarea name="message" class="form-control" id="textAreaExample" rows="3" placeholder="Message"></textarea>
                </div>


                <div class="mb-4 cf-turnstile" data-sitekey="0x4AAAAAAAEb5OovW6ZXj2wR"></div>

                <button class="btn btn-outline-white btn-lg btn-block g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback="onSubmit">Submit</button>
            </form>
        </div>



    </div>
</section>
@endif


<script>
// This function is called when the Turnstile script is loaded and ready to be used.
// The function name matches the "onload=..." parameter.
function _turnstileCb() {
    console.debug('_turnstileCb called');

    turnstile.render('#myWidget', {
      sitekey: '0x4AAAAAAAEb5OovW6ZXj2wR',
      theme: 'light',
    });
}
</script>



@endsection
