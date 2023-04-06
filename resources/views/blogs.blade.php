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



@section('meta_detail')

        <title> {{ trans('frontLang.blogs') }}</title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with Edge Realty Real Estate. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection
@section('content')
<style>

            html, body {
                overflow-x: hidden;
                scroll-behavior: smooth !important;
            }
            body {
                position: relative
            }
            p{
                line-height: 1.6 !important;
            }

            .nav-pills .nav-link.active {
                background-color: #fff !important;
                color: #000 !important;
                border: 0.25px #848484 solid !important;
                border: 0.5 #848484 solid !important;
                border-radius: 0 !important;

            }

            .nav-link {
                /* background-color: #000 !important; */
                background-color: #000 !important;
                color: #fff !important;
                border: 0.25px #848484 solid !important;
                border: 0.5 #848484 solid !important;
                border-radius: 0 !important;

            }
            a {
                color: #fff !important;
            }

            .form-select-sm {
                border: 0.5px #848484 solid !important;
                color: #fff !important;
                border-radius: 0px !important;
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.125s !important;
            }

            .btn {
                padding: 4px 8px 4px 8px !important;
                border: 0.5px #848484 solid !important;
                color: #fff !important;
                border-radius: 0px !important;
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.125s !important;

            }
            .btn:hover {
                /* box-shadow: -5px 5px 1px #a2a2a2 !important; */
                /* translate: 2px -2px !important; */
                opacity: 1 !important;
                background-color: #fff !important;
                color: #000 !important;
                transform: scale(1) !important;
                border: 0.5px solid #000 !important;
                cursor: pointer !important;
            }
            .card {
                margin: 12px !important;
                color: #cccccc !important;
                background-color: #1c1c1c !important;
                /* border: 0.5px solid rgb(86, 86, 86) !important; */
                border-radius: 0 !important;
                transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
                transition-duration: 0.5s !important;
            }


        </style>
<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: #1c1c1c;">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.blogs') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>





<section class=" mb-5">
    <div class="container-fluid containerization">

        <div class="row">
            <div class="d-flex flex-row-reverse bd-highlight">

                <div class="p-2 bd-highlight">
                    <form action="{{URL('/'.$langSeg.'/blogs-sortby')}}" method="POST" >
                    @csrf
                    <input type="hidden" value="{{$langSeg}}" name="lang"/>
                        <select class="form-select-sm" name="sort_by" aria-label="Default select example">
                            <option value="1">Newest to Oldest</option>
                            <option value="2">Oldest to Newest</option>
                        </select>
                        <button class="btn btn-sm w-auto">
                            search
                        </button>
                    </form>
                </div>
                <div class="p-2 bd-highlight">
                    Sort By
                </div>
            </div>
        </div>

        <div class="row" >

            @foreach($blogs->chunk(4) as $chunk)
            <div class="card-group">


                @foreach($chunk as $blog)
                <div class="card  rounded-0 mx-2 my-2" >

                    @if (file_exists('uploads/blogs/'.$blog->id.'/'.$blog->image_url))
                        <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}">
                            <img src="{{ URL::asset('uploads/blogs/'.$blog->id.'/'.$blog->image_url) }}" class="card-img-top rounded-0" rounded-0 style="width: 100%; height: 250px;" alt="blog-image-here"/>
                        </a>

                    @else
                        <img src="{{ URL::asset('public/assets/images/edge-blogs.webp') }}" class="card-img-top rounded-0" style="width: 100%; height: 250px;"  alt="blog-image-here">
                    @endif

                    {{-- <img src="{{ URL::asset('uploads/blogs/'.$blog->id.'/'.$blog->image_url) }}" class="card-img-top" style="width: 100%;;" alt="blog-image-here"/> --}}
                    <h4 class="card-title px-0 text-justify">
                        <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="text-white text-justify" style="font-size: 1.1rem !important; line-height: 0.5 !important;">
                            {{$blog->$name_var}}
                        </a>
                    </h4>
                    <div class="card-body d-flex align-items-end flex-column px-0">

                        <p class="card-text mb-3 d-flex align-items-baseline mt-auto" style="line-height: 1.3 !important; color: gray !important; font-size: .9rem !important; text-align: justify !important;">

                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->$description_var), $limit = 150, $end = '...') }}
                        </p>

                        <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="text-white text-decoration-underline">Read More</a>

                        {{-- <small class="fw-light" style="color:  !important; font-size: 0.8rem !important;">{{ $blog->updated_at->diffForHumans() }}</small> --}}

                    </div>
                    {{-- <div class="card-footer px-0"> --}}

                        {{-- <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn-outline-white btn-sm">
                            {{ trans('frontLang.readMore') }}
                        </a> --}}

                        {{-- <a style="float: right;" href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn btn-outline-white btn-sm">
                            <i class="fas fa-eye"> </i> {{ trans('frontLang.view') }} {{$blog->views}}
                        </a> --}}
                    {{-- </div> --}}
                </div>

                @endforeach


            </div>
            @endforeach

            <style>
                .pagination > li > a,
                .pagination > li > span {
                    color: #ccc !important; // use your own color here
                }


                .pagination > .disabled > a,
                .pagination > .disabled > a:focus,
                .pagination > .disabled > a:hover,
                .pagination > .disabled > span,
                .pagination > .disabled > span:focus,
                .pagination > .disabled > span:hover {
                    background-color: #1c1c1c !important;
                    border-color: green;
                    color: #ccc !important;
                }

                .pagination > .active > a,
                .pagination > .active > a:focus,
                .pagination > .active > a:hover,
                .pagination > .active > span,
                .pagination > .active > span:focus,
                .pagination > .active > span:hover {
                    background-color: #ccc;
                    border-color: green;
                    color: #1c1c1c !important;
                }
            </style>

            <div class="col-lg-12 mt-5 text-center">
                {!! $blogs->links() !!}
            </div>






            {{-- @foreach($blogs->chunk(4) as $chunk)
            <div class="card-group">
                @foreach($chunk as $blog)
                <div class="card bg-black rounded-0 mx-1 my-2 ">
                    <div class="row no-gutters">
                            <img src="{{ URL::asset('uploads/blogs/'.$blog->id.'/'.$blog->image_url) }}" style="width: 100%;height:300px;" class="card-image" alt="Listing">

                            <div class="card-body text-dark ">
                                <h4 class="card-title"><a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="text-white">{{$blog->$name_var}}</a></h4>

                                <p class="card-text mb-5 mt-4" style="line-height: 1.5 !important; color: gray !important;">{{ \Illuminate\Support\Str::limit(strip_tags($blog->$description_var), $limit = 300, $end = '...') }} </p>
                                <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn-outline-white btn-lg">{{ trans('frontLang.readMore') }}</a>
                                <a style="float: right;" href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn btn-outline-white btn-lg"><i class="fas fa-eye"> </i> {{ trans('frontLang.view') }} {{$blog->views}}</a>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach --}}

        </div>





        {{-- <div class="row">
            @foreach ($blogs as $blog)

            <div class="col-lg-12  mb-5">
                <div class="card bg-black border border-1 border-white rounded-0" >
                    <div class="row no-gutters">
                        <div class="col-sm-5">
                            <img src="{{ URL::asset('uploads/blogs/'.$blog->id.'/'.$blog->image_url) }}" style="width: 100%;height:100%" class="card-image" alt="Listing">

                        </div>

                        <div class="col-sm-7">
                            <div class="card-body text-dark" >
                                <h4 class="card-title"><a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="text-white">{{$blog->$name_var}}</a></h4>
                                <p class="card-text mb-5 mt-4" style="line-height: 1.5 !important; color: gray !important;">{{ \Illuminate\Support\Str::limit(strip_tags($blog->$description_var), $limit = 300, $end = '...') }} </p>
                                <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn-outline-white btn-lg">{{ trans('frontLang.readMore') }}</a>
                                <a style="float: right;" href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn btn-outline-white btn-lg"><i class="fas fa-eye"> </i> {{ trans('frontLang.view') }} {{$blog->views}}</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach




        </div> --}}




    </div>
</section>




@endsection
