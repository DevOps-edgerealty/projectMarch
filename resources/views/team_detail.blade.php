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

   <?php

   $name_var = "name_" . trans('backLang.boxCode');
   $description_var = "description_" . trans('backLang.boxCode');

?>

<?php


		$name_var = "name_" . trans('backLang.boxCode');

		$title_var = "title_" . trans('backLang.boxCode');

		$type_name_var= "type_name_" . trans('backLang.boxCode');

		$cat_name_var= "cat_name_" . trans('backLang.boxCode');

		$designation_var= "designation_" . trans('backLang.boxCode');

		$address_var = "address_" . trans('backLang.boxCode');

		$description_var = "description_" . trans('backLang.boxCode');



?>



@section('meta_detail')

        <title> {{ trans('frontLang.team') }}</title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with Edge Realty Real Estate. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection
@section('content')

<style>

    .card {
        margin: 12px !important;
        color: #ccc !important;
        background-color: #1c1c1c !important;
        border: 0.5px solid rgb(86, 86, 86) !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important;
    }

    .nav-pills .nav-link.active {
        background-color: #ccc !important;
        color: #1c1c1c !important;
        border: 1px solid #1c1c1c !important;
        border-radius: 0 !important;

        }

    .nav-link {
        background-color: #1c1c1c !important;
        color: #ccc !important;
        border: 1px solid #ccc !important;
        border-radius: 0 !important;

    }

</style>





{{-- Agent Details --}}
<section class="" >
    <div class=" ">



        {{-- Desktop View --}}
        <div class="container-fluid containerization d-md-block d-lg-block d-none">

            <div class="row mt-5 " style="margin-top: 175px !important;">

                <div class="col-lg-8">
                    <h3 class="text-uppercase fw-bold" style="font-size: 2rem !important;">
                        {{ $agent->$name_var }}

                    </h3>

                    <p class="fw-light text-capitalize" style="font-size: 1.2rem !important">
                        {{ $agent->$designation_var }}
                    </p>

                    <p lang="fw-light text-justify" style="font-size: 1rem !important; text-align: justify !important; color: grey !important;">

                        {{ $agent->$description_var}}
                        {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat mi a tellus fermentum porttitor.
                        Vivamus in malesuada turpis. Sed risus urna, consequat commodo lobortis at, feugiat at diam. Aliquam massa lectus,
                        porttitor at hendrerit in, mattis id mauris. Vivamus consequat convallis viverra. Aenean non ullamcorper lacus.
                        Praesent aliquam neque vitae nisl vulputate aliquet. Nam molestie mollis turpis. --}}
                    </p>


                    <div class="row foat-left mt-5 ">
                        <div class="col-3">
                            <a href="mailto: lead@edgerealty.ae" class="btn btn-lg btn-block btn-outline-white text-white text-uppercase float-left rounded-0" >
                                <i class="far fa-envelope"></i> &nbsp;
                                Email
                            </a >
                        </div>

                        <div class="col-3">
                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" class="btn btn-lg btn-block btn-success text-white shadow-none text-uppercase float-left rounded-0"
                            target="_blank">
                                <i class="fab fa-whatsapp"></i> &nbsp;
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">

                    @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                        <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                            <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="card-img-top rounded-0 mx-auto" style="width: 324px; height: 350px;" alt="blog-image-here"/>
                        </a>
                    @else
                        <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="card-img-top rounded-0 mx-auto" style="width: 324px; height: 350px;"  alt="blog-image-here">
                    @endif
                </div>

            </div>

        </div>






        {{-- mobile View --}}
        <div class="container-fluid row d-md-block d-block d-lg-none" style="margin-top: 120px !important;">

            <div class="col-lg-8">
                <h3 class="text-uppercase fw-bold" style="font-size: 1.6rem !important;">
                    {{ $agent->$name_var }}
                </h3>

                <p class="fw-light text-capitalize" style="font-size: 1rem !important">
                    Senior Property Consultant
                </p>

                @if (file_exists('uploads/agents/'.$agent->id.'/'.$agent->image))
                    <a href="{{url( $langSeg .'/'.'agent_detail'.'/'.$agent->id)}}">
                        <img src="{{ URL::asset('uploads/agents/'.$agent->id.'/'.$agent->image) }}" class="card-img-top rounded-0 mx-auto my-3" style="width: 100%; height: 350px;" alt="blog-image-here"/>
                    </a>
                @else
                    <img src="{{ URL::asset('public/assets/images/agents/1/1.jpg') }}" class="card-img-top rounded-0 mx-auto my-3" style="width: 100%; height: 350px;"  alt="blog-image-here">
                @endif

                <p lang="fw-light text-justify" style="font-size: 1rem !important; text-align: justify !important; color: grey !important; line-height: 1.4 !important">
                    {{ $agent->$description_var}}
                    {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat mi a tellus fermentum porttitor.
                    Vivamus in malesuada turpis. Sed risus urna, consequat commodo lobortis at, feugiat at diam. Aliquam massa lectus,
                    porttitor at hendrerit in, mattis id mauris. Vivamus consequat convallis viverra. Aenean non ullamcorper lacus.
                    Praesent aliquam neque vitae nisl vulputate aliquet. Nam molestie mollis turpis. --}}
                </p>




                <div class="row foat-left mt-2 d-md-block d-block d-lg-none">
                    <div class="col-12 my-3">
                        <a href="mailto: lead@edgerealty.ae" class="btn btn-lg btn-block btn-outline-white text-white text-uppercase float-left rounded-0" >
                            <i class="far fa-envelope"></i> &nbsp;
                            Email
                        </a>
                    </div>

                    <div class="col-12 my-3">
                        <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" class="btn btn-lg btn-block btn-success text-white text-uppercase float-left rounded-0"
                        target="_blank">
                            <i class="fab fa-whatsapp"></i> &nbsp;
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>




    </div>
</section>





{{-- Swticher --}}
<section class="mobile-show">
    <style>
        .switcher-btn {
            color: #fff !important;
            border-radius: 0px !important;
        }

    </style>

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
                        <div class="row">
                            @foreach ($properties_for_sale as $property)
                                @if ($langSeg == 'ar')
                                    <div class="row m-0 mb-3 p-0 ps-2" style=" height: 156px; direction: rtl">
                                        <div class="col-5 p-0" style="height: 156px; width: 160px !important;" >
                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style=" height: 156px; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-7 px-3 py-2">
                                            <div class="" >
                                                    {{-- <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6> --}}

                                                    <div class="AED skill" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                            <b>
                                                                {{ trans('frontLang.Price') }}
                                                                <span style="color: #fff;">
                                                                    {{ number_format($property->price) }}
                                                                    {{ trans('frontLang.AED') }}
                                                                </span>
                                                            </b>
                                                        </h6>
                                                    </div>

                                                    <div class="USD skill" style="display: none">
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                {{ trans('frontLang.Price') }}
                                                                <span style="color: #fff;">
                                                                    {{ number_format($property->price_usd) }}
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
                                                            <td style="text-align: right; font-size: .9em"> {{$property->bedrooms}} <i class="fas fa-bed"></i> {{ trans('frontLang.bed') }} </td>
                                                            <td style="text-align: right; font-size: .9em"> {{$property->bathrooms}} <i class="fas fa-bath"></i> {{ trans('frontLang.bath') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>

                                @else
                                    <div class="row m-0 mb-3 p-0 ps-2" style=" height: 156px; ">
                                        <div class="col-5 p-0" style="height: 156px" >
                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style=" height: 156px; width: 100% !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-7 px-3 py-2">
                                            <div class="" >
                                                    {{-- <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6> --}}

                                                    <div class="AED skill_property_buy" style="display: block !important">
                                                        <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
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
                                                        <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                            <b>
                                                                {{ trans('frontLang.Price') }}
                                                                <span style="color: #fff;">
                                                                    {{ number_format($property->price_usd) }}
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
                                                            <td style="text-align: left; font-size: .9em">{{$property->bathrooms}} <i class="fas fa-bath"> </i>  {{ trans('frontLang.bed') }}</td>
                                                            <td style="text-align: left; font-size: .9em">{{$property->bedrooms}} <i class="fas fa-bed"> </i> {{ trans('frontLang.bath') }} </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
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
                        <div class="row">
                            @foreach ($properties_for_rent as $property)

                            @if ($langSeg == 'ar')
                                <div class="row m-0 mb-3 px-2" style=" height: 156px; " dir="rtl">
                                    <div class="col-5 p-0" style="height: 156px;" >
                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)
                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style=" height: 156px; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-7 px-3 py-2">
                                        <div class="" >
                                                {{-- <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6> --}}
                                                <div class="AED skill" style="display: block !important">
                                                    <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
                                                        <b>
                                                            {{ trans('frontLang.Price') }}
                                                            <span style="color: #fff;">
                                                                {{ number_format($property->price) }}
                                                                {{ trans('frontLang.AED') }}
                                                            </span>
                                                        </b>
                                                    </h6>
                                                </div>

                                                <div class="USD skill" style="display: none">
                                                    <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                        <b>
                                                            {{ trans('frontLang.Price') }}
                                                            <span style="color: #fff;">
                                                                {{ number_format($property->price_usd) }}
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
                                                        <td style="width: 50%; text-align: right; font-size: .9em"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}
                                                        <td style="width: 50%; text-align: right; font-size: .9em"><i class="fas fa-bath"> </i> {{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 mb-3 px-2" style=" height: 156px; ">
                                    <div class="col-5 p-0" style="height: 156px;" >
                                        @foreach($property->images  as $single_img)
                                            @if($property->images->first()==$single_img)
                                                <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                    <img  src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style=" height: 156px; width: 160px !important; margin:0; padding:0;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-7 px-3 py-2">
                                        <div class="" >
                                                {{-- <h6 class="card-title"  style="font-size: 1.2rem;"><b>{{ trans('frontLang.Price') }} <span style="color: #fff">  {{ number_format($property->price) }} {{ trans('frontLang.AED') }}</span></b></h6> --}}
                                                <div class="AED skill_property_buy" style="display: block !important">
                                                    <h6 style=" font-size: 1em;" class="card-title p-auto m-auto">
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
                                                    <h6 style=" font-size: 1.2rem;" class="card-title p-auto m-auto" >
                                                        <b>
                                                            {{ trans('frontLang.Price') }}
                                                            <span style="color: #fff;">
                                                                {{ number_format($property->price_usd) }}
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
                                                        <td style="width: 50%; text-align: left; font-size: .9em"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }} <span style="color: #848484">.</span></td>
                                                        <td style="width: 50%; text-align: center; font-size: .9em"><i class="fas fa-bath"> </i> {{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>

                                {{-- <div class="card mb-5 border-none px-0" style="border: 0px !important;">

                                    @foreach($property->images  as $single_img)
                                        @if($property->images->first()==$single_img)
                                            <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light">
                                                <img src="{{ URL::asset('uploads/properties/'.$property->id.'/'.$single_img->image) }}" style="height: 250px !important; width: 100%;" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                            </a>
                                        @endif
                                    @endforeach

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

                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" class="fw-light"><p class="card-text" style="margin-bottom: 0.3rem;line-height: 20px"> {{ $property->$title_var }} </p></a>
                                        <p class="mb-2" style="line-height: 20px"> {{ $property->$address_var }}</p>
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width: 50%; text-align: left"><i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }}</td>
                                                <td style="width: 50%; text-align: center"><i class="fas fa-bath"> </i>{{$property->bathrooms}} {{ trans('frontLang.bath') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> --}}
                            @endif

                            @endforeach
                            <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>
</section>






{{-- Switcher desktop --}}
<section class="desktop-show my-4">
    <div class="container-fluid containerization">

        <div class="row w-100">
            <div class="col-lg-12 mx-auto">


                <!-- Pills navs -->
                <ul class="nav nav-pills mb-3 d-flex justify-content-center "  id="ex1" role="tablist">
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

                            <div class="col-lg-4 d-flex mb-5 " style="padding-right: 20px; !important; padding-left: 20px; !important;">
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



                                    <div class="card-body d-flex flex-column h-100 p-3 pb-0" >
                                        <div class="row d-flex h-100">
                                            <div class="col-12 d-flex flex-column h-100 pe-0">

                                                {{-- Price section --}}
                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1vw;" class="fw-bolder mt-0"> <span style="color: #fff;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                    @else
                                                        <div class="AED skill" style="display: block !important">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        {{ trans('frontLang.AED') }}
                                                                        {{ number_format($property->price) }}
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>

                                                        <div class="USD skill" style="display: none">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        USD {{ number_format($property->price_usd) }}
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>
                                                        {{-- <h5 style=" font-size: 1.3rem;" class="fw-bolder mt-0"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} </span></b></h5> --}}
                                                    @endif
                                                @else
                                                    <div class="AED skill" style="display: block !important">
                                                        <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    {{ trans('frontLang.AED') }}
                                                                    {{ number_format($property->price) }}
                                                                    {{ trans('frontLang.yealry') }}
                                                                </span>
                                                            </b>
                                                        </h5>
                                                    </div>

                                                    <div class="USD skill" style="display: none">
                                                        <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                            <b>
                                                                <span style="color: #fff;">
                                                                    USD {{ number_format($property->price_usd) }}
                                                                     {{ trans('frontLang.yealry') }}
                                                                </span>
                                                            </b>
                                                        </h5>
                                                    </div>
                                                    {{-- <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-0"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} {{ trans('frontLang.yealry') }} </b> </span></h5> --}}
                                                @endif

                                                <div style="height: 50px;">
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <p class="card-title mt-3 flex-grow-1" style="font-size: 0.75vw; line-height: 1.3 !important; color: #848484">
                                                            {{ Str::limit($property->$title_var, 65) }}
                                                        </p>
                                                    </a>
                                                </div>
                                                {{-- <p class="fw-light" style="color: #848484">
                                                    {{ $property->locationss->$name_var }}
                                                </p> --}}
                                            </div>
                                        </div>



                                        <div class="row my-2 px-2" style="display:block; bottom: 0% !important; " >

                                                <span class="fw-light px-1" style="color: #848484;font-size: 0.75vw !important;" > <i class="fas fa-bed"> </i>  {{$property->bedrooms}}  </span> <span style="color: #848484 !important;"> &#x2022; </span>

                                                <span class="fw-light px-1" style="color: #848484; font-size: 0.75vw !important;" > <i class="fas fa-bath"> </i> {{$property->bathrooms}}  </span> <span style="color: #848484 !important;"> &#x2022; </span>

                                                <span class="fw-light px-1" style="color: #848484; font-size: 0.75vw !important;" > <i class="fas fa-chart-area"> </i>  {{$property->area}}  {{ trans('frontLang.sqFt') }} </span>

                                        </div>

                                    </div>


                                    @if ($langSeg =='ar')
                                        <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center; font-weight: bold; border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    @else
                                        <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="text-align: center; font-weight: bold; border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                    <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif



                                </div>
                            </div>

                            @endforeach
                            {{-- <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white btn-lg  rounded-0" > {{ trans('frontLang.viewMore') }}</a>
                            </div> --}}

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



                                    <div class="card-body d-flex flex-column h-100 p-3 pb-0" >
                                        <div class="row d-flex h-100">
                                            <div class="col-12 d-flex flex-column h-100 pe-0">

                                                {{-- Price --}}
                                                @if ($property->type_id == '1')
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1vw;" class="mt-0 fw-light">
                                                            <b>$ <span style="color: #fff;">
                                                            {{ number_format($property->price_usd) }}
                                                            <span class="fw-light" style="font-size: 1rem;">
                                                                {{ trans('frontLang.Price') }}
                                                            </span></span>
                                                            </b>
                                                        </h5>
                                                    @else
                                                        <div class="AED skill" style="display: block !important">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        {{ trans('frontLang.AED') }}
                                                                        {{ number_format($property->price) }}
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>

                                                        <div class="USD skill" style="display: none">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        USD {{ number_format($property->price_usd) }}
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>
                                                        {{-- <h5 style=" font-size: 1.5rem;" class="mt-0"> <b>{{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.Price') }}</span></span></b></h5> --}}
                                                    @endif
                                                @else
                                                    @if ($langSeg == 'ru')
                                                        <h5 style=" font-size: 1vw;" class="mt-0 fw-light">
                                                            <b> $ <span style="color: #fff;">  {{ number_format($property->price_usd) }}
                                                            <span class="fw-light" style="font-size: 1rem;">
                                                                {{ trans('frontLang.yearly') }}
                                                            </span>
                                                            </b>
                                                            </span>
                                                        </h5>
                                                    @else
                                                        <div class="AED skill" style="display: block !important">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        {{ trans('frontLang.AED') }}
                                                                        {{ number_format($property->price) }}
                                                                        <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span>
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>

                                                        <div class="USD skill" style="display: none">
                                                            <h5 style=" font-size: 1vw;" class="fw-light mt-0">
                                                                <b>
                                                                    <span style="color: #fff;">
                                                                        USD {{ number_format($property->price_usd) }}
                                                                        <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span>
                                                                    </span>
                                                                </b>
                                                            </h5>
                                                        </div>
                                                        {{-- <h5 style=" font-size: 1.5rem;" class="mt-0"> <b> {{ trans('frontLang.AED') }}<span style="color: #fff;">  {{ number_format($property->price) }} <span class="fw-light" style="font-size: 1rem;">{{ trans('frontLang.yearly') }}</span></b> </span></h5> --}}
                                                    @endif


                                                @endif
                                                <div style="height: 50px;">
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                        <p class="card-title  mt-3 flex-grow-1" style="font-size: 0.75vw; line-height: 1.3 !important; color: #848484">
                                                            {{ Str::limit($property->$title_var, 58) }}
                                                        </p>
                                                    </a>
                                                </div>
                                                {{-- <p class="fw-light mt-0" style="font-size: 1.2 !important"> {{ $property->locationss->$name_var }}</p> --}}
                                            </div>
                                        </div>


                                        <div class="row my-2 px-2" style="display:block; bottom: 0% !important;"  >

                                            <span class="fw-light px-1" style="color: #848484; font-size: 0.75vw !important;"> <i class="fas fa-bed"> </i> {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> <span style="color: #848484">&#x2022;</span>

                                            <span class="fw-light px-1" style="color: #848484; font-size: 0.75vw !important;"> <i class="fas fa-bath"> </i> {{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> <span style="color: #848484">&#x2022;</span>

                                            <span class="fw-light px-1" style="color: #848484; font-size: 0.75vw !important;"> <i class="fas fa-chart-area"> </i> {{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                        </div>

                                    </div>

                                    @if ($langSeg =='ar')
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center; font-weight: bold; border-left: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="card-footer text-muted border-top-0" style="padding: 0.75rem 0rem;">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="text-align: center; font-weight: bold; border-right: 1px solid; width: 50%"><a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #000; font-size: 0.75vw !important;"><i class="far fa-envelope"></i> {{ trans('frontLang.requestdetail') }} </a> </td>
                                                <td style="text-align: center; font-weight: bold; width: 50%"><a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color:  #1e961e !important; font-size: 0.75vw !important;"> <i  class="fab fa-whatsapp"></i> {{ trans('frontLang.whatsapp') }} </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="col-lg-12 text-center">
                                <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white btn-lg rounded-0" style="font-size: 0.75vw !important;"> {{ trans('frontLang.viewMore') }}</a>
                            </div> --}}
                        </div>


                    </div>

                </div>
                <!-- Pills content -->

            </div>

        </div>

    </div>

    <div class="modal modal-lg fade rounded-0"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="width: 1800px !important;">
            <div class="modal-content rounded-0 rounded-0 border border-1 border-white m-3 p-0">

                <div class="modal-body p-0 bg-black">
                    <div class="desktop-show row p-0 m-0">
                        <div class="col-lg-4 text-white m-0 p-0 bg-black d-flex flex-column">
                            <div class="my-auto mx-auto p-3">
                                <p class="fw-bold" style="font-size: 2rem !important;">
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
                                <form class="contact-form" id="getInTouch" method="post" action="{{URL('/contactus/submit')}}">
                                    @csrf
                                    @honeypot

                                    <input type="text" name="utm_source" class="utm_parameters" hidden>
                                    <input type="text" name="utm_id" class="utm_parameters" hidden>
                                    <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                                    <input type="text" name="utm_medium" class="utm_parameters" hidden>

                                    <div class=" mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.fullnamerequest') }}</p>
                                        <input type="text" name="name" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.fullname') }}"  required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.emailrequest') }}</p>
                                        <input type="email" name="email" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0" placeholder="{{ trans('frontLang.email') }}" required />

                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-4">
                                        <p class="text-dark mb-1">{{ trans('frontLang.phonerequest') }}</p>
                                        <input type="phone" name="phone" class="form-control bg-white text-dark form-control-lg border border-1 border-dark rounded-0 iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />
                                    </div>

                                    <div class="d-flex mx-auto flex-row">
                                        {{-- <button type="submit" class="btn btn-outline-dark btn-lg rounded-0 mx-auto " id="submit1_btn1" >
                                            {{ trans('frontLang.submit') }}
                                        </button> --}}

                                        <button class="submit btn btn-block btn-lg mx-auto btn-outline-dark" type="submit">
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

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ trans('frontLang.requestdetail') }}</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" ></button>
                </div>
                <div class="modal-body">
                    <form class="contact-form" method="post" action="{{URL('/request_detail/submit')}}">
                        @csrf
                        @honeypot
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

                        <button type="submit" class="btn btn-outline-white btn-lg btn-block">
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}
</section>










@endsection


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
