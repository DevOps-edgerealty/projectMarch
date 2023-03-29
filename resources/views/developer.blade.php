<style>
        p{
        line-height: 1.5 !important;
        text-align: justify !important;
        letter-spacing: .05rem !important;
    }
    a {
        color: white !important;
        text-decoration: underline !important;
    }

</style>


@extends('layout.master')
<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

    <title> Dubai Real Estate Developers | Dubai Off Plan Projects </title>
    <meta name="description" content=" See the List of Top Property Developers in Dubai Who is contributing to the Growth of Dubai in Real Estate Market as well as its economy "/>
    <meta name="keywords" content=" Dubai Developers, developers in Dubai, find developers, best developers, projects by developers, developed by "/>
@endsection

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


?>


@section('content')

<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: #1c1c1c;">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3 style="text-transform: uppercase;">{{ trans('frontLang.dubaiDevelopers') }}</h3>
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

<section class="mt-5 mb-5" >
    <div class="container">
        <div class="row mb-4">

            @foreach ($developer as $developers)

                <div class="col-lg-3 mb-4">
                    <div class="card border border-1 border-white rounded-0">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                            <img src="{{ URL::asset('uploads/developers/'.$developers->id.'/'.$developers->image) }}" style="width: 100%; border-radius: 0 !important;" class=" rounded-0" alt="Listing">

                            <a href="{{url($langSeg .'/'.'dubai-developers'.'/'.$developers->slug_link)}}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>

                        </div>

                    </div>
                </div>

            @endforeach

        </div>


    </div>
</section>






@endsection
