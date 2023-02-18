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

        <title> {{$blogs->meta_title_en}}</title>
        <meta name="description" content="{{$blogs->meta_description_en}}"/>
        <meta name="keywords" content="{{$blogs->meta_keywords_en}}"/>
@endsection




@section('content')
<style>
  p {
    line-height: 1.4 !important;
  }

  a {
    color: #fff !important;
  }
</style>


<section>

    <header class="my-5 py-4">

        <!-- Background image -->
        {{-- <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                    <div class="text-white">
                        <h3>{{ trans('frontLang.blogs') }}</h3>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Background image -->
    </header>

</section>


<section>
    <div class="row">
        <div class="container-fluid">
                <img src="{{ URL::asset('uploads/blogs/'.$blogs->id.'/'.$blogs->image_url) }}" style="width: 100%; height: 200px;" class="img-fluid d-md-block d-block d-lg-none" alt="Listing">
                <img src="{{ URL::asset('uploads/blogs/'.$blogs->id.'/'.$blogs->image_url) }}" style="width: 100%; height: 500px;" class="img-fluid d-md-block d-lg-block d-none" alt="Listing">
        </div>
    </div>

    <div class="row mt-5">
        <div class="container px-4">
                <div class="row">
                    <div class="col-lg-12">
                    <h3>{{$blogs->$name_var}}</h3>
                    <p>
                        <i class="far fa-calendar-alt"> </i> <?php echo date('M d, Y',strtotime($blogs->created_at));?>
                        &nbsp; &nbsp;
                        <span class="mb-3"><i class="fas fa-eye"> </i> {{ trans('frontLang.view') }} {{$blogs->views}}</span>
                    </p>
                    <p >{{ trans('frontLang.postedby') }} : Edge Realty</p>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-12 lineHeight" style="text-align: justify; color: #fff !important;">
                    <p class="text-justify text-white text-decoration-underline">{!!html_entity_decode($blogs->$description_var, ENT_COMPAT, 'UTF-8')!!}</p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg 12 text-center">
                    <h3>Share On</h3>
                </div>
            </div>

            <div class="row mt-2 mb-5">
                <div class="col-12 mx-auto">
                    <ul class="list-group list-group-horizontal-sm bg-black mx-auto d-flex justify-content-center">
                        <li class="list-group-item bg-black text-white bg-black text-center">
                            <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" class="" style="height: 35px !important">
                        </li>

                        <li class="list-group-item bg-black text-white bg-black text-center ">
                            <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" class="" style="height: 35px !important">
                        </li>

                        <li class="list-group-item bg-black text-white bg-black text-center ">
                            <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" class="" style="height: 35px !important">
                        </li>

                        <li class="list-group-item bg-black text-white bg-black text-center ">
                            <img src="{{ URL::asset('public/assets/asset/sm/yt.png') }}" class="" style="height: 35px !important">
                        </li>

                        <li class="list-group-item bg-black text-white bg-black text-center ">
                            <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" class="" style="height: 35px !important">
                        </li>
                    </ul>
                </div>
            </div>

            <hr>

            <div class="col-lg-12">
                <div class="row">

                <h3 class="mb-5 mt-4">{{ trans('frontLang.similarblogs') }} </h3>

                @foreach ($similarblog as $blog)
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="card bg-black rounded-0 mx-2 my-2 " style="height: 425px !important;">

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
                    </div>
                @endforeach

                </div>
            </div>

        </div>
    </div>








</section>











@endsection
