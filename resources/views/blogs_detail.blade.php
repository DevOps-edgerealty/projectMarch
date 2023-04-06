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
    color: #ccc !important;
  }

  a {
    color: #ccc !important;
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white "><a href="{{URL('$langSeg/')}}" class="text-white"><i class="fas fa-home text-white"> </i> {{ trans('frontLang.blogs') }}</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ trans('frontLang.blogsdetails') }}</li>
                    </ol>
                </nav>
            </div>
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

            <div class="desktop-show row mt-2 mb-5">
                <div class="col-12 mx-auto">
                    <ul class="list-group list-group-horizontal-sm mx-auto d-flex justify-content-center" style="background-color: #1c1c1c !important; color: #ccc !important;">
                        <li class="list-group-item text-center" style="background-color: #1c1c1c !important; color: #ccc !important">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" class="" style="height: 35px !important">
                            </a>
                        </li>

                        <li class="list-group-item text-center " style="background-color: #1c1c1c !important; color: #ccc !important">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" class="" style="height: 35px !important">
                            </a>
                        </li>

                        <li class="list-group-item text-center " style="background-color: #1c1c1c !important; color: #ccc !important">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" class="" style="height: 35px !important">
                            </a>
                        </li>

                        <li class="list-group-item text-center " style="background-color: #1c1c1c !important; color: #ccc !important">
                            <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" class="" style="height: 35px !important">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mobile-show row mt-2 mb-5">
                <div class="mx-auto mobile-show ">
                    <ul class="mobile-show list-group list-group-horizontal position-relative overflow-auto w-75 mx-auto">
                        <li class=" text-center px-1 mx-auto" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/fb.png') }}" style="height: 28px !important; width: auto !important">
                            </a>
                        </li>

                        <li class=" text-center px-1 mx-auto">
                            <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }} Hello Edge Realty, I would like to have a consultation session. Please assist me! Thanks" data-action="share/whatsapp/share" target="_blank">
                                <img src="{{ URL::asset('public/assets/asset/sm/wa.png') }}" style="height: 28px !important; width: auto !important">
                            </a>
                        </li>

                        <li class=" text-center px-1 mx-auto">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/tw.png') }}" style="height: 28px !important; width: auto !important">
                            </a>
                        </li>

                        <li class=" text-center px-1 mx-auto">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source={{ urlencode(Request::fullUrl()) }}">
                                <img src="{{ URL::asset('public/assets/asset/sm/in.png') }}" style="height: 28px !important; width: auto !important">
                            </a>
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
                        <div class="card rounded-0 mx-2 my-2 ">

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
                                    {{ Str::limit($blog->$name_var, 43) }}
                                </a>
                            </h4>
                            <div class="card-body d-flex align-items-end flex-column px-0 h-100">
                                <p class="card-text mb-3 d-flex align-items-baseline mt-auto" style="line-height: 1.3 !important; color: gray !important; font-size: .9rem !important; text-align: justify !important;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->$description_var), $limit = 150, $end = '...') }}
                                </p>
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
                    </div>
                @endforeach

                </div>
            </div>

        </div>
    </div>








</section>











@endsection
