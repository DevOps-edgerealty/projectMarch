<style>
  p{
    line-height: 1.6 !important;
  }
</style>
@extends( 'layout.master' )

@section('title')
<title>Dubai Projects | Aqarat Real Estate</title>

@endsection

@section( 'content' )
<?php


    $banner_title_var = "title_" . trans('backLang.boxCode');
    $project_title_var = "title_" . trans('backLang.boxCode');
    $type_title_var = "name_" . trans('backLang.boxCode');
    $address_title_var = "address_" . trans('backLang.boxCode');




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

<div class="rentex-breadcrumb">
    <div class="container">
        @if ($langSeg == 'ar')
            <div class="breadcrumb text-right" >

                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Listing." href="{{URL('')}}" class="home">
                            <span property="name">{{ trans('frontLang.Home') }}</span>
                        </a>

                    </span>
                    <i class="rentex-icon-angle-right"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-page current-item">{{ trans('frontLang.Dubaiprojects') }}</span>

                    </span>
            </div>
        @else
            <div class="breadcrumb">

                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Listing." href="{{URL('')}}" class="home">
                            <span property="name">{{ trans('frontLang.Home') }}</span>
                        </a>

                    </span>
                    <i class="rentex-icon-angle-right"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-page current-item">{{ trans('frontLang.Dubaiprojects') }}</span>

                    </span>
            </div>
        @endif

    </div>
</div>

<div class="container "><br>
    @if ($langSeg == 'ar')
    <h4 class="text-right">{{ trans('frontLang.Dubaiprojects') }}</h4>
    @else
        <h4 >{{ trans('frontLang.Dubaiprojects') }}</h4>
    @endif

</div>



<div class="rentex-listing-divider ulisting_element_180_1592206242617"> </div>



<div class=" ulisting_element_820_1592989980879 ulisting_element_820_1592989980879">
    <div class="container ">

        <div class=" stm-row  ulisting_element_560_1592989980879">
            <div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_70_1592989980879">

                        <div class='stm-row'>
                            @foreach ($project as $projects)
                            <div class="ulisting-item-grid template_1 stm-col-xl-4 stm-col-lg-4 stm-col-md-6 stm-col-sm-12 stm-col-12">
                                <div class="inventory_content_wrap">
                                    <div class=" ulisting_element_890_1591344543182 ulisting_element_890_1591344543182">
                                        <div class="container ">
                                            <div class=" stm-row  ulisting_element_130_1591344543182">
                                                <div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_950_1591344543182">
                                                    <div class="rentex-listing-grid-item grid-style-1">
                                                        <div class="rentex-listing-thumbnail-panel">


                                                            <div class="ulisting-thumbnail-panel">
                                                                <div class="thumbnail-box-listing">
                                                                    <a href="{{url($langSeg .'/'.'dubai-projects'.'/'.$projects->slug_link)}}" class="ulisting-thumbnail-box-link"></a>
                                                                    @foreach ($projects->images as $image)
                                                                    <img src="{{ URL::asset('uploads/projects/'.$projects->id.'/'.$image->image) }}" alt="Listing">
                                                                    @endforeach

                                                                        <div class="ulisting-thumbnail-panel-top"></div>
                                                                        <div class="ulisting-thumbnail-panel-bottom"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="rentex-thumbnail-panel-bottom">
                                                                    <div class="ulisting-listing-price">
                                                                        <span class="ulisting-listing-price-new"></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @if ($langSeg == 'ar')
                                                            <div class="rentex-listing-content-panel" style="direction: rtl">
                                                                <div class="rentex-main-content">
                                                                    <div class="listing-single-title style_1">
                                                                        <div class="wrapper">
                                                                            <h3 class="title">
                                                                                <a href="{{url($langSeg .'/'.'dubai-projects'.'/'.$projects->slug_link)}}" >{{$projects->$project_title_var}}</a>

                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rentex-meta-extra">
                                                                        <div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms">
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-bed"></i>
                                                                                </span>
                                                                                <span class="attribute-value">{{ trans('frontLang.bedrooms') }} :</span>
                                                                                <span class="attribute-affix">{{$projects->bedrooms}}</span>
                                                                            </div><br>
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-sqft"></i>
                                                                                </span>
                                                                                <span class="attribute-value">{{ trans('frontLang.type') }} :</span>
                                                                                @foreach ($projects->project_types as $project_type)
                                                                                <span class="attribute-affix">{{$project_type->$type_title_var}}</span>
                                                                                @endforeach

                                                                            </div><br>
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-garage"></i>
                                                                                </span>
                                                                                <span class="attribute-value">{{ trans('frontLang.community') }} :</span>
                                                                                <span class="attribute-affix">{{$projects->$address_title_var}}</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="rentex-footer-content">
                                                                    <div class="ulisting-listing-price">
                                                                        <span class="ulisting-listing-price-new"><h6>  {{ trans('frontLang.Price') }} {{ trans('frontLang.AED') }} : {{$projects->price}}</h6></span>
                                                                    </div>
                                                                    <div class="rentext-listing-category">
                                                                        <span>{{ trans('frontLang.Forsale') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="rentex-listing-content-panel">
                                                                <div class="rentex-main-content">
                                                                    <div class="listing-single-title style_1">
                                                                        <div class="wrapper">
                                                                            <h3 class="title">
                                                                                <a href="{{url($langSeg .'/'.'dubai-projects'.'/'.$projects->slug_link)}}" >{{$projects->title_en}}</a>

                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rentex-meta-extra">
                                                                        <div class="ulisting-attribute-template attribute_style_2 attribute_bedrooms">
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-bed"></i>
                                                                                </span>
                                                                                <span class="attribute-value">Bedrooms :</span>
                                                                                <span class="attribute-affix">{{$projects->bedrooms}}</span>
                                                                            </div><br>
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-sqft"></i>
                                                                                </span>
                                                                                <span class="attribute-value">Type :</span>
                                                                                @foreach ($projects->project_types as $project_type)
                                                                                <span class="attribute-affix">{{$project_type->$type_title_var}}</span>
                                                                                @endforeach

                                                                            </div><br>
                                                                            <div class="attribute-parts-wrap">
                                                                                <span class="attribute-icon">
                                                                                    <i class="rentex-icon-garage"></i>
                                                                                </span>
                                                                                <span class="attribute-value">Community :</span>
                                                                                <span class="attribute-affix">{{$projects->$address_title_var}}</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="rentex-footer-content">
                                                                    <div class="ulisting-listing-price">
                                                                        <span class="ulisting-listing-price-new"><h6>Price AED : {{$projects->price}}</h6></span>
                                                                    </div>
                                                                    <div class="rentext-listing-category">
                                                                        <span>For Sale</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                        </div>



            </div>
        </div>
    </div>
</div>





@endsection
