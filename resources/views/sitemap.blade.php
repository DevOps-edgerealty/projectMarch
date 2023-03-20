<style>
  p{
    line-height: 1.6 !important;
  }
</style>
@extends('layout.master')
<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

    <title> Sitemap | Best Real Estate Agency in Dubai </title>
    <meta name="description" content=" We are the Experienced &amp; Qualified Dubai Real Estate Agents. we can assist you to Buy, Sell leasing , Renting and Mortgage properties in Dubai. "/>
    <meta name="keywords" content=" careers, hiring, jobs in Dubai , "/>

@endsection
@section('content')
<?php

    $title_var = "title_" . trans('backLang.boxCode');

    $name_var = "name_" . trans('backLang.boxCode');

    $title_var2 = "title_" . trans('backLang.boxCodeOther');

    $details_var = "details_" . trans('backLang.boxCode');

    $details_var2 = "details_" . trans('backLang.boxCodeOther');
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
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.sitemap') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>

{{-- <section class="mt-5">
    <div class="container">

        <h3 class="text-center">{{ trans('frontLang.sitemap') }}</h3>

    </div>
</section> --}}


<section class="mt-0 mb-5">
    <div class="container">
        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.dubaiCommunities') }}</h3>

            @foreach ($dubaicommunity as $area)

                <div class="col-md-3">
                    <a  href="{{URL('/'.$langSeg.'/dubai-communities/'.$area->slug_link)}}">{{$area->$title_var}} </a>
                </div>
            @endforeach

        </div>

        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.Offplan') }}</h3>

            @foreach ($dubaiprojects as $project)

                <div class="col-md-4">
                    <a  href="{{URL('/'.$langSeg.'/dubai-new-projects/'.$project->slug_link)}}">{{$project->$title_var}} </a>
                </div>
            @endforeach

        </div>

        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.readyProjects') }}</h3>

            @foreach ($dubaireadyprojects as $project)

                <div class="col-md-4">
                    <a  href="{{URL('/'.$langSeg.'/dubai-ready-projects/'.$project->slug_link)}}">{{$project->$title_var}} </a>
                </div>
            @endforeach

        </div>

        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.Luxuryprojects') }}</h3>

            @foreach ($dubailuxuryprojects as $project_luxury)

                <div class="col-md-4">
                    <a  href="{{URL('/'.$langSeg.'/dubai-luxury-projects/'.$project_luxury->slug_link)}}">{{$project_luxury->$title_var}} </a>
                </div>
            @endforeach

        </div>

        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.propertiesForSaleInDubai') }}</h3>

            @foreach ($properties_sale as $properties)

                <div class="col-md-4">
                    <a  href="{{URL('/'.$langSeg.'/dubai-property/'.$properties->slug_link)}}">{{$properties->$title_var}} </a>
                </div>
            @endforeach

        </div>

        <div class="row p-3 mb-3" style="    background-color: #000; border: 1px solid #f4f4f4 !important;">
            <h3 class="text-left mb-4">{{ trans('frontLang.propertiesForRentInDubai') }}</h3>

            @foreach ($properties_rent as $properties_for_rent)

                <div class="col-md-4">
                    <a  href="{{URL('/'.$langSeg.'/dubai-property/'.$properties_for_rent->slug_link)}}">{{$properties_for_rent->$title_var}} </a>
                </div>
            @endforeach

        </div>


    </div>
</section>



@endsection
