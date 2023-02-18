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

<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0);">
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





<section class="mt-5 mb-5">
    <div class="container">

        <div class="row">

            @foreach($blogs->chunk(4) as $chunk)
            <div class="card-group">


                @foreach($chunk as $blog)
                <div class="card bg-black rounded-0 mx-2 my-2" style="height: 450px !important;">

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
                        <small class="fw-light" style="color:  !important; font-size: 0.8rem !important;">{{ $blog->created_at->diffForHumans() }}</small>

                    </div>
                    <div class="card-footer px-0">

                        {{-- <a href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn-outline-white btn-sm">
                            {{ trans('frontLang.readMore') }}
                        </a> --}}

                        {{-- <a style="float: right;" href="{{url( $langSeg .'/'.'blogs_detail'.'/'.$blog->slug_link)}}" class="btn btn btn-outline-white btn-sm">
                            <i class="fas fa-eye"> </i> {{ trans('frontLang.view') }} {{$blog->views}}
                        </a> --}}
                    </div>
                </div>

                @endforeach


            </div>
            @endforeach

            <style>
                .pagination > li > a,
                .pagination > li > span {
                    color: #fff !important; // use your own color here
                }

                .pagination > .active > a,
                .pagination > .active > a:focus,
                .pagination > .active > a:hover,
                .pagination > .active > span,
                .pagination > .active > span:focus,
                .pagination > .active > span:hover {
                    background-color: #fff;
                    border-color: green;
                    color: #000 !important;
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
