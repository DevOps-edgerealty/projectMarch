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
        color: #fff !important;
        background-color: #000 !important;
        border: 0.5px solid rgb(86, 86, 86) !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important;
    }

     .nav-pills .nav-link.active {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        border-radius: 0 !important;

    }

    .nav-link {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #fff !important;
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
                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks" class="btn btn-lg btn-block btn-success text-white text-uppercase float-left rounded-0"
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
                    Lorem Ipsum
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

    <div class="container row mx-0 px-0">
        <div class="col-md-12  mx-0 px-0">
            <!-- Pills navs -->
            <ul class="nav nav-pills mb-3 nav-justified  mx-0 px-0 "  id="ex1" role="tablist" >
                <li class="nav-item " role="presentation">
                    <a class="nav-link active switcher-btn" id="ex1-tab-1-mobile" data-mdb-toggle="pill" href="#ex1-pills-1-mobile" role="tab" aria-controls="ex1-pills-1-mobile" aria-selected="true" >{{ trans('frontLang.projects') }}</a>
                </li>
                <li class="nav-item " role="presentation">
                    <a class="nav-link switcher-btn " id="ex1-tab-2-mobile" data-mdb-toggle="pill" href="#ex1-pills-2-mobile" role="tab" aria-controls="ex1-pills-2-mobile" aria-selected="false" >{{ trans('frontLang.property') }}</a >
                </li>
            </ul>


            <!-- Pills content -->
                <div class="tab-content" id="properties-mobile-ex1-content">

                    {{-- Projects --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1-mobile" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row mx-0 px-0 mx-auto">
                             <h3 class="fw-bold text-uppercase text-white mx-2">
                                Projects
                            </h3>
                            @if($projects->count() != 0)
                                @foreach ($projects as $project)
                                    <div class="col-lg-3 mb-5  px-0">
                                        @if ($langSeg == 'ar')

                                        <div class="card bg-black rounded-0 " style="direction: rtl; border: 0px !important; ">

                                        @else

                                        <div class="card bg-black rounded-0" style="border: 0px !important;">

                                        @endif

                                            <div class="communities-newlaunch"></div>

                                            @foreach($project->images  as $single_img)
                                                @if($project->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$project->slug_link)}}" >
                                                        {{-- <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                                        {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px; width: 100%;" class="card-img-top rounded-0 mx-0 px-0" alt="Listing"> --}}
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$project->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach



                                            <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                                <div class="row d-flex h-100">
                                                    @if ($project->type_id == '1')
                                                        @if ($langSeg == 'ru')
                                                            <h5 style=" font-size: 1.4rem;" class="fw-bold my-2"> <span style="color: #fff;">  {{ ($project->project_price_usd) }} $</span></b></h5>
                                                        @else
                                                            <h5 style=" font-size: 1.4rem;" class="fw-bold my-2"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($project->project_price) }} </span></b></h5>
                                                        @endif
                                                    @else
                                                        <h5 style=" font-size: 1.4rem;" class="fw-bold mt-2 mb-0"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($project->project_price) }}</b> </span></h5>
                                                    @endif

                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$project->slug_link)}}" >
                                                        <h6 class="card-title  text-uppercase mt-3 flex-grow-1 mb-0 text-white" style="font-size: 1.2rem; line-height: 1.3 !important;">
                                                            {{ $project->$title_var }}
                                                        </h6>
                                                    </a>

                                                    <p class="fw-light mt-0 my-0"> {{ $project->locationss->$name_var }}</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted my-5">
                                    No Project Listings
                                </p>
                                <div class="col-lg-12 text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                                </div>
                            @endif



                        </div>




                    </div>

                    {{-- Properties --}}
                    <div class="tab-pane fade" id="ex1-pills-2-mobile" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                             <h3 class="fw-bold text-uppercase text-white mx-2">
                                Properties
                            </h3>
                            @if($properties->count() != 0)
                                <div class="row mx-0 px-0 mx-auto">
                                    @foreach ($properties as $property)

                                    <div class="col-lg-4 mb-5 px-1">
                                        @if ($langSeg == 'ar')

                                        <div class="card bg-black text-white" style="direction: rtl;  ">

                                        @else

                                        <div class="card bg-black text-white" style="">

                                        @endif

                                            <div class="communities-newlaunch"></div>

                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="border-bottom: 0.5px solid grey !important;" >
                                                        {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                    </a>
                                                @endif
                                            @endforeach



                                            <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                                <div class="row d-flex h-100">
                                                    <div class="col-8  d-flex flex-column h-100">
                                                        @if ($property->type_id == '1')
                                                            @if ($langSeg == 'ru')
                                                                <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <span style="color: #fff !important;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                            @else
                                                                <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> {{ trans('frontLang.AED') }} <span style="color: #fff !important;">  {{ number_format($property->price) }} </span></b></h5>
                                                            @endif
                                                        @else
                                                            <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff !important;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }} </b> </span></h5>
                                                        @endif

                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                            <h6 class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.3 !important; color: #fff !important;">{{ $property->$title_var }}</h6>
                                                        </a>
                                                        <p class="fw-light"> {{ $property->locationss->$name_var }}</p>
                                                        <p class="card-text">
                                                        </p>
                                                    </div>

                                                    <div class="col-4 ">

                                                        @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                            <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @else
                                                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @endif

                                                    </div>
                                                </div>



                                                <div class="row" style="display:block; bottom: 0% !important;" >

                                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> |

                                                        <span style="color: #848484">{{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> |

                                                        <span style="color: #848484">{{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                                </div>

                                            </div>
                                            @if ($langSeg =='ar')
                                            <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center;border-left: 1px solid; width: 50%">
                                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                                                <i class="far fa-envelope"></i>
                                                                {{ trans('frontLang.requestdetail') }}
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;width: 50%">
                                                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                                                <i class="fab fa-whatsapp"></i>
                                                                {{ trans('frontLang.whatsapp') }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @else
                                            <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center;border-right: 1px solid; width: 50%">
                                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                                                <i class="far fa-envelope"></i>
                                                                {{ trans('frontLang.requestdetail') }}
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;width: 50%">
                                                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                                                <i class="fab fa-whatsapp"></i>
                                                                {{ trans('frontLang.whatsapp') }}
                                                            </a>
                                                    </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @endif



                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            @else
                                <p class="text-muted my-5">
                                    No Property Listings
                                </p>
                                <div class="col-lg-12 text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                                </div>
                            @endif


                        </div>
                    </div>

                </div>
                <!-- Pills content -->
        </div>
    </div>
</section>






{{-- Switcher desktop --}}
<section class="desktop-show my-4">
    <div class="container-fluid containerization">

        <div class="row my-4">
            <div class="col-lg-12 mx-auto">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-3 d-flex justify-content-left mx-2"  id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active mx-0 px-5 py-3" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true" >
                            {{ trans('frontLang.projects') }}
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mx-0 px-5 py-3" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false" >
                            {{ trans('frontLang.property') }}
                        </a >
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content" id="properties-desktop-ex1-content">

                    {{-- Projects --}}
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1" >
                        <div class="row mx-0 px-0 mx-auto">
                             <h3 class="fw-bold text-uppercase text-white mx-2">
                                Projects
                            </h3>
                            @if($projects->count() != 0)
                                @foreach ($projects as $project)
                                    <div class="col-lg-3 mb-5  px-0">
                                        @if ($langSeg == 'ar')

                                        <div class="card bg-black rounded-0 " style="direction: rtl; border: 0px !important; ">

                                        @else

                                        <div class="card bg-black rounded-0" style="border: 0px !important;">

                                        @endif

                                            <div class="communities-newlaunch"></div>

                                            @foreach($project->images  as $single_img)
                                                @if($project->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$project->slug_link)}}" >
                                                        {{-- <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$project->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px; width: 100%;" class="card-img-top rounded-0 mx-0 px-0" alt="Listing"> --}}
                                                    </a>
                                                @endif
                                            @endforeach



                                            <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                                <div class="row d-flex h-100">
                                                    @if ($project->type_id == '1')
                                                        @if ($langSeg == 'ru')
                                                            <h5 style=" font-size: 1.4rem;" class="fw-bold my-2"> <span style="color: #fff;">  {{ ($project->project_price_usd) }} $</span></b></h5>
                                                        @else
                                                            <h5 style=" font-size: 1.4rem;" class="fw-bold my-2"> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($project->project_price) }} </span></b></h5>
                                                        @endif
                                                    @else
                                                        <h5 style=" font-size: 1.4rem;" class="fw-bold mt-2 mb-0"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff;">  {{ ($project->project_price) }}</b> </span></h5>
                                                    @endif

                                                    <a href="{{url($langSeg .'/'.'dubai-new-projects'.'/'.$project->slug_link)}}" >
                                                        <h6 class="card-title  text-uppercase mt-3 flex-grow-1 mb-0 text-white " style="font-size: 1.2rem; line-height: 1.3 !important;">
                                                            {{ $project->$title_var }}
                                                        </h6>
                                                    </a>

                                                    <p class="fw-light mt-0 my-0"> {{ $project->locationss->$name_var }}</p>



                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted my-5">
                                    No Project Listings
                                </p>
                                <div class="col-lg-12 text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                                </div>
                            @endif



                        </div>
                    </div>



                    {{-- Properties --}}
                    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div class="row">
                             <h3 class="fw-bold text-uppercase text-white mx-2">
                                Properties
                            </h3>
                            @if($properties->count() != 0)
                                <div class="row mx-0 px-0 mx-auto">
                                    @foreach ($properties as $property)

                                    <div class="col-lg-3 mb-5 px-1">
                                        @if ($langSeg == 'ar')

                                        <div class="card bg-black text-white" style="direction: rtl;">

                                        @else

                                        <div class="card bg-black text-white" style="">

                                        @endif

                                            <div class="communities-newlaunch"></div>

                                            @foreach($property->images  as $single_img)
                                                @if($property->images->first()==$single_img)
                                                    <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" style="border-bottom: 0.5px solid grey !important;" >
                                                        {{-- <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                                        <img src="{{ URL::asset('uploads/projects/images/'.$property->id.'/'.$single_img->image) }}" style="height: 250px" class="card-img-top rounded-0" alt="Listing" onerror="this.onerror=null;this.src='{{ URL::asset('public/assets/asset/img-error.webp') }}';">
                                                        {{-- <img src="{{ URL::asset('uploads/2.webp') }}" style="height: 300px" class="card-img-top rounded-0" alt="Listing"> --}}
                                                    </a>
                                                @endif
                                            @endforeach



                                            <div class="card-body d-flex flex-column h-100" style="padding: 0.5rem">
                                                <div class="row d-flex h-100">
                                                    <div class="col-8  d-flex flex-column h-100">
                                                        @if ($property->type_id == '1')
                                                            @if ($langSeg == 'ru')
                                                                <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <span style="color: #fff !important;">  {{ number_format($property->price_usd) }} $</span></b></h5>
                                                            @else
                                                                <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> {{ trans('frontLang.AED') }} <span style="color: #fff !important;">  {{ number_format($property->price) }} </span></b></h5>
                                                            @endif
                                                        @else
                                                            <h5 style=" font-size: 1.5rem;" class="fw-bolder mt-3"> <b> {{ trans('frontLang.AED') }} <span style="color: #fff !important;">  {{ number_format($property->price) }} {{ trans('frontLang.yearly') }} </b> </span></h5>
                                                        @endif

                                                        <a href="{{url($langSeg .'/'.'dubai-property'.'/'.$property->slug_link)}}" >
                                                            <h6 class="card-title fw-light mt-3 flex-grow-1" style="font-size: 1rem; line-height: 1.3 !important; color: #fff !important;">{{ $property->$title_var }}</h6>
                                                        </a>
                                                        <p class="fw-light"> {{ $property->locationss->$name_var }}</p>
                                                        <p class="card-text">
                                                        </p>
                                                    </div>

                                                    <div class="col-4 ">

                                                        @if (file_exists(public_path().'assets/images/agents'.$agent->id.'/'.$agent->image))
                                                            <img src="{{ URL::asset('public/assets/images/agents'.$agent->id.'/'.$agent->image) }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @else
                                                            <img src="{{ URL::asset('public/assets/images/edge.webp') }}" style="height: ; width: 100%; border-radius: 50%;" class="mt-2 "  alt="agent">
                                                        @endif

                                                    </div>
                                                </div>



                                                <div class="row" style="display:block; bottom: 0% !important;" >

                                                        <span style="color: #848484">  {{$property->bedrooms}} {{ trans('frontLang.bed') }} </span> |

                                                        <span style="color: #848484">{{$property->bathrooms}} {{ trans('frontLang.bath') }}</span> |

                                                        <span style="color: #848484">{{$property->area}} {{ trans('frontLang.sqFt') }}</span>

                                                </div>

                                            </div>
                                            @if ($langSeg =='ar')
                                            <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center;border-left: 1px solid; width: 50%">
                                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                                                <i class="far fa-envelope"></i>
                                                                {{ trans('frontLang.requestdetail') }}
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;width: 50%">
                                                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                                                <i class="fab fa-whatsapp"></i>
                                                                {{ trans('frontLang.whatsapp') }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @else
                                            <div class="card-footer text-muted" style="padding: 0.75rem 0rem;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="text-align: center;border-right: 1px solid; width: 50%">
                                                            <a href="#"  data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="color: #fff !important">
                                                                <i class="far fa-envelope"></i>
                                                                {{ trans('frontLang.requestdetail') }}
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;width: 50%">
                                                            <a href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank" style="color: #fff !important">
                                                                <i class="fab fa-whatsapp"></i>
                                                                {{ trans('frontLang.whatsapp') }}
                                                            </a>
                                                    </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @endif



                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            @else
                                <p class="text-muted my-5">
                                    No Property Listings
                                </p>
                                <div class="col-lg-12 text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>" class="btn btn-outline-white  rounded-0 btn-lg"> {{ trans('frontLang.viewMore') }}</a>
                                </div>
                            @endif

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
