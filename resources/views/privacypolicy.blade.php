
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
$langSeg = 'en';
}
?>

@section('meta_detail')

    <title> Privacy and Policy | Edge Realty Real Estate</title>
    <meta name="description" content=" We are the Experienced &amp; Qualified Dubai Real Estate Agency in Dubai. we can assist you to Buy, Sell leasing , Renting and Mortgage properties in Dubai. "/>
    <meta name="keywords" content=" careers, hiring, jobs in Dubai , "/>

@endsection
@section('content')

<style>
  p{
    line-height: 1.6 !important;
  }
</style>

<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.privacyandpolicy') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>



@if ( $langSeg == 'ar' )


<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.privacyandpolicy') }}</h3>
        <p style="font-size: 16px;line-height: 30px;">
            Edge Realty Real Estate is committed to protecting your privacy. This policy is designed to ensure your personal details are protected when you deal with us.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            In order to contact you and provide services to you, we need to collect some "personal information" about you. For example, we will need your name, address and email address when you register with us and when you enter your name, address and/or email address in order to obtain more information about our products and services. Edge Realty Real Estate only collects the personal information that we need to provide you with a service. We will only use your personal information lawfully and will never collect sensitive information about you through this website without first asking you for permission.


        </p>

        <p style="font-size: 16px;line-height: 30px;">
            We may use your personal information to market third party products and services to you. However, we shall obtain your permission prior to providing your details to such third parties and every time we email you for third party marketing purposes we will give you the chance to refuse any such emails in the future.

        </p>
        <p style="font-size: 16px;line-height: 30px;">

            This website uses cookies, tracking pixels and related technologies. Cookies are small data files that are served by our platform and stored on your device. Our site uses cookies dropped by us or third parties for a variety of purposes including to operate and personalize the website. Also, cookies may also be used to track how you use the site to target ads to you on other websites.
        </p>

    </div>

</section>

@elseif ( $langSeg == 'ru' )


<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.privacyandpolicy') }}</h3>
        <p style="font-size: 16px;line-height: 30px;">
            Edge Realty Real Estate обязуется защищать Вашу конфиденциальность. Эта политика разработана для обеспечения защиты Ваших личных данных во время работы с нами.
            Для того, чтобы связаться с Вами и предоставить услуги, нам необходимо собрать некоторую "личную информацию" о Вас.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            Например, Ваше имя, адрес и адрес электронной почты. При регистрации на сайте Вы вводите свое имя, адрес и/или адрес электронной почты для того, чтобы получить дополнительную информацию о наших продуктах и услугах. Edge Realty
            Real Estate собирает только ту личную информацию, которая необходима для того, чтобы предоставить качественные услуги. Мы используем Вашу личную информацию только на законных основаниях и никогда не будем собирать конфиденциальную информацию о Вас без предварительно  разрешения.



        </p>

        <p style="font-size: 16px;line-height: 30px;">
            Мы можем использовать Вашу личную информацию для маркетинга продуктов и услуг третьих лиц. Однако мы должны получить Ваше разрешение до того, как предоставить Ваши данные третьим лицам, и каждый раз, когда мы отправляем электронное письмо в маркетинговых целях, мы будем предоставлять Вам возможность
            отказаться от таких электронных писем в будущем.
            На этом сайте используются файлы cookie, пиксели отслеживания и связанные с ними технологии.


        </p>
        <p style="font-size: 16px;line-height: 30px;">

            Cookies – это небольшие файлы данных, которые обслуживаются нашей платформой и сохраняются на Вашем устройстве. Наш сайт использует файлы cookie, сброшенные нами или третьими сторонами для различных целей, в том числе для работы и персонализации
            сайта. Кроме того, файлы cookie могут применяться для отслеживания того, как Вы используете сайт, чтобы направлять Вам рекламу на другие сайтах.

        </p>

    </div>

</section>

@else

<section class="mt-5">
    <div class="container">

        <h3 class="text-left mb-4">{{ trans('frontLang.privacyandpolicy') }}</h3>
        <p style="font-size: 16px;line-height: 30px;">
            Edge Realty Real Estate is committed to protecting your privacy. This policy is designed to ensure your personal details are protected when you deal with us.

        </p>
        <p style="font-size: 16px;line-height: 30px;">
            In order to contact you and provide services to you, we need to collect some "personal information" about you. For example, we will need your name, address and email address when you register with us and when you enter your name, address and/or email address in order to obtain more information about our products and services. Edge Realty Real Estate only collects the personal information that we need to provide you with a service. We will only use your personal information lawfully and will never collect sensitive information about you through this website without first asking you for permission.


        </p>

        <p style="font-size: 16px;line-height: 30px;">
            We may use your personal information to market third party products and services to you. However, we shall obtain your permission prior to providing your details to such third parties and every time we email you for third party marketing purposes we will give you the chance to refuse any such emails in the future.

        </p>
        <p style="font-size: 16px;line-height: 30px;">

            This website uses cookies, tracking pixels and related technologies. Cookies are small data files that are served by our platform and stored on your device. Our site uses cookies dropped by us or third parties for a variety of purposes including to operate and personalize the website. Also, cookies may also be used to track how you use the site to target ads to you on other websites.
        </p>

    </div>

</section>


@endif

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


            </div>



        </div>

    </div>
</section>



@endsection
