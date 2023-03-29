<style scope>
    li {
        color: #ABB7B7 !important;
    }
    nav a {
        color: #ABB7B7 !important;
    }

    .nav-pills .nav-link.active {
        background-color: #fff !important;
        color: #ABB7B7 !important;
        border: 0.25px #848484 solid !important;
        border: 0.5 #848484 solid !important;
        border-radius: 0 !important;

    }

    .nav-link {
        /* background-color: #000 !important; */
        background-color: #1c1c1c !important;
        color: #ABB7B7 !important;
        border: 0.25px #848484 solid !important;
        border: 0.5 #848484 solid !important;
        border-radius: 0 !important;

    }
    a {
        color: #cccccc !important;
    }


    .menu-mobile-header, .menu-mobile-header > .menu-section, .menu-mobile-header > button  {
        background-color: #1c1c1c !important;
        color: #cccccc !important;
    }

    .menu-mobile-arrow {
        background-color: #cccccc !important;
    }

    @media only screen and (max-width: 800px) {
        .menu-section {
            background: #1c1c1c;
        }
    }


    li > div {
        background-color: #1c1c1c !important;
        color: #cccccc !important;
    }



    li > div > div > a > h4,
    li > a {
        color: #fff !important;
    }
    .menu-color{
        color: #cccccc !important;
    }
    input, select {
        background-color: #1c1c1c !important;
        color: #cccccc !important;
        border-radius: 0px !important;
        border: 1px solid #cccccc !important;
    }
    .btn {
        /* transition: transform 5s  !important; */

        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.125s !important;

    }
    .btn:hover {
        /* box-shadow: -5px 5px 1px #a2a2a2 !important; */
        /* translate: 2px -2px !important; */
        opacity: 1 !important;
        background-color: #cccccc !important;
        color: #000 !important;
        transform: scale(1) !important;
        border: 2px solid #000 !important;

        cursor: pointer !important;
    }
    .containerization {
        padding-right: 150px !important;
        padding-left: 150px !important;
    }

    @media only screen and (max-device-width: 480px) {
        .containerization {
            padding-right: 100px !important;
            padding-left: 100px !important;
        }
    }

    @media only screen and (max-device-width: 768px) {
        .containerization {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }
    }

    @media only screen and (max-device-width: 1024px) {
        .containerization {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }
    }

    @media only screen and (max-device-width: 1200px) {
        .containerization {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }
    }

    @media only screen and (max-device-width: 1200px) {
        .containerization {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }
    }

    /* .container {
        margin-right: 130px !important;
        margin-left: 130px !important;
        text-align: center;
    } */

    header {
        z-index: 100 !important;
    }

    .navbar1 {
        transition:all 0.5s !important;
    }

    .navbar-scrolled {
        background-color: #1c1c1c !important;
    }

    /* .fa-whatsapp  {
        height: 30px !important;
    } */


    .menu-color {
        padding-left: 15px !important;
        padding-left: 15px !important;
    }

</style>
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
        $finalUrl = '/ar/home';
        $finalUrlru = '/ru/home';
        $finalUrlen = '/en/home';
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);




    if($uri_path == '/' || $uri_path == '/home' )
    {
        $finalUrl = '/ar/home';
        $finalUrlru = '/ru/home';
        $finalUrlen = '/en/home';


    }


    else
    {


        $uri_segments = explode('/', $uri_path);
        $seg1 = $uri_segments[1];




        if($seg1)
        {

            if($seg1 == 'en')
            {


                $replacements1 = array(1 => "en");
                $replacements2 = array(1 => "ar");
                $replacements3 = array(1 => "ru");
                $basket1 = array_replace($uri_segments, $replacements1);
                $basket2 = array_replace($uri_segments, $replacements2);
                $basket3 = array_replace($uri_segments, $replacements3);
                $finalUrlen = implode("/",$basket1);
                $finalUrl = implode("/",$basket2);
                $finalUrlru = implode("/",$basket3);




            }
            elseif($seg1 == 'ar')
            {


                $replacements1 = array(1 => "en");
                $replacements2 = array(1 => "ar");
                $replacements3 = array(1 => "ru");
                $basket1 = array_replace($uri_segments, $replacements1);
                $basket2 = array_replace($uri_segments, $replacements2);
                $basket3 = array_replace($uri_segments, $replacements3);
                $finalUrlen = implode("/",$basket1);
                $finalUrl = implode("/",$basket2);
                $finalUrlru = implode("/",$basket3);



            }
            elseif($seg1 == 'ru')
            {
                $replacements1 = array(1 => "en");
                $replacements2 = array(1 => "ar");
                $replacements3 = array(1 => "ru");
                $basket1 = array_replace($uri_segments, $replacements1);
                $basket2 = array_replace($uri_segments, $replacements2);
                $basket3 = array_replace($uri_segments, $replacements3);
                $finalUrlen = implode("/",$basket1);
                $finalUrl = implode("/",$basket2);
                $finalUrlru = implode("/",$basket3);

            }
        }
        else
        {
                $replacements2 = array(1 => "ar");
                $basket = array_replace($uri_segments, $replacements2);
                $finalUrl = implode("/",$basket);
        }
    }
?>



@if ($langSeg == 'ar')
<header class="header" style="background: linear-gradient(180deg, rgba(21,21,21,0.5) 0, rgba(21,21,21,0) 100%); direction: rtl;">

    <div class="container py-0" style="margin-right: 130px !important;">
        <div class="wrapper">
            <div class="header-item-left">

                    <a href="{{URL('ar/home')}}" class="brand"><img src="{{URL::asset('public/assets/asset/logo-ar.png')}}" class="logo-height" alt=""></a>


            </div>
            <!-- Section: Navbar Menu -->
            <div class="header-item-center">
                <div class="overlay"></div>
                <nav class="menu text-dark">
                    <div class="menu-mobile-header">
                        <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                        <div class="menu-mobile-title"></div>
                        <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close text-white"></i></button>
                    </div>
                    <ul class="menu-section " style="padding-left: 0px;">

                        <li class="menu-item-has-children" style="margin-left:3rem !important">
                            <a href="#" class="menu-color">{{ trans('frontLang.buy') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>">{{ trans('frontLang.Apartmentforsale') }}</a></li>
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>">{{ trans('frontLang.Villasforsale') }}</a></li>
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>">{{ trans('frontLang.Commercialforsale') }}</a></li>
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>">{{ trans('frontLang.Townhouseforsale') }}</a></li>
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                    <li class="text-dark"><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>">{{ trans('frontLang.Plotforsale') }} </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item-has-children" style="margin-left:3rem !important">
                            <a href="#" class="menu-color">{{ trans('frontLang.Rent') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>">{{ trans('frontLang.Apartmentforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/villas-for-rent-in-Dubai');?>">{{ trans('frontLang.Villasforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/commercial-for-rent-in-Dubai');?>">{{ trans('frontLang.Commercialforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/townhouses-for-rent-in-Dubai');?>">{{ trans('frontLang.Townhouseforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/furnished-properties-for-rent-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/luxury-properties-for-rent-in-Dubai');?>">{{ trans('frontLang.Luxuryproperties') }}</a></li>


                                </ul>
                            </div>
                        </li>

                        <li><a href="<?php echo  url('/'.$langSeg.'/sell');?>" class="menu-color"> {{ trans('frontLang.Sell') }}</a></li>

                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color" style=" ">
                                {{ trans('frontLang.Dubaiprojects') }} <i class="ion ion-ios-arrow-down"></i>
                            </a>

                            <div class="menu-subs menu-mega menu-column-4">
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/SEXSEN-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">  {{ trans('frontLang.Offplan') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-ready-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/desktop/Asayel-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.readyProjects') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-luxury-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/desktop/Bvlg-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.Luxuryprojects') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-communities');?>">
                                        <img src="{{URL::asset('public/assets/asset/Commiunities.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.dubaiCommunities') }}</h4>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li><a href="<?php echo  url('/'.$langSeg.'/services');?>" class="menu-color">{{ trans('frontLang.services') }}</a></li>
                        {{-- <li class="menu-item-has-children" style="margin-left:3rem !important">
                            <a href="#" class="menu-color">{{ trans('frontLang.marketstatistics') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/sale_transaction');?>">{{ trans('frontLang.sale_transaction') }}</a></li>





                                </ul>
                            </div>
                        </li> --}}



                        <li class="menu-item-has-children" style="margin-left:3rem !important">
                            <a href="#" class="menu-color">{{ trans('frontLang.Aboutus') }} <i class="ioFwhatsan ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/aboutus');?>">{{ trans('frontLang.aboutcompany') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/team');?>">{{ trans('frontLang.team') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/contactus');?>"> {{ trans('frontLang.contactUs') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/career');?>">{{ trans('frontLang.Careers') }}</a></li>

                                </ul>
                            </div>
                        </li>
                        {{-- <li class="menu-item-has-children">
                            <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1 lang" >
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo $finalUrlen ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN </a></li>
                                    <li><a href="<?php echo $finalUrlru ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU </a></li>
                                </ul>
                            </div>
                        </li> --}}


                    </ul>
                </nav>
            </div>

            <div class="header-item-right">

                {{-- <a href="<?php echo $finalUrl ; ?>"> <img src="{{URL('public/assets/images/uk-flag.png')}}" alt=""></a> --}}

                <nav class="menu text-dark">
                    <div class="menu-mobile-header">
                        <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                        <div class="menu-mobile-title"></div>
                        <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close text-white"></i></button>
                    </div>
                    <ul class="menu-section " style="padding-left: 0px;">

                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1 lang" >
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo $finalUrlen ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN </a></li>
                                    {{-- <li><a href="<?php echo $finalUrl ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR </a></li> --}}
                                    <li><a href="<?php echo $finalUrlru ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU </a></li>

                                </ul>
                            </div>
                        </li>


                    </ul>
                </nav>

                <a style="margin-right: 1rem;"  class="menu-icon" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight"><img  src="{{url::asset('public/assets/asset/loupe.png')}}" alt=""></a>

                <button type="button" class="menu-mobile-trigger"  >
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>


            </div>



                <div class="offcanvas bg-black offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" >
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">{{ trans('frontLang.searchh') }}</h5>
                        @if ($langSeg == 'ar')
                            <button type="button" class="btn-close text-reset" style="margin:0;" data-mdb-dismiss="offcanvas" aria-label="Close" ></button>
                        @else
                            <button type="button" class="btn-close text-reset" data-mdb-dismiss="offcanvas" aria-label="Close" ></button>
                        @endif

                    </div>
                    <div class="offcanvas-body">
                        <div class="row">
                            <div class="col-lg-12">


                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true">{{ trans('frontLang.buy') }}</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">{{ trans('frontLang.Rent') }}</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab" aria-controls="ex2-pills-3" aria-selected="false">{{ trans('frontLang.off-plan') }}</a>
                                    </li>
                                </ul>
                                    <!-- Pills navs -->
                                <!-- Pills content -->
                                <div class="tab-content" id="ex2-content">
                                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                                        <form action="{{URL('/'.$langSeg.'/properties_search_ar')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <input type="hidden" name="property_type_id" value="1" />
                                            <div class="row">


                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group">


                                                        <input type="search" name="search" id="search-mobile-arabic" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbysale') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile-arabic"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>



                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option  value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                        <option value="0">Studio</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.maxBedrooms') }}</option>

                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option  selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-dark btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                                        <form action="{{URL('/'.$langSeg.'/properties_search_ar')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <div class="row">

                                                <input type="hidden" name="property_type_id" value="2" />
                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group">


                                                        <input type="search" name="search" id="search-mobile-1-arabic" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbyrent') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile-1-arabic"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>



                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option  value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                        <option value="0">Studio</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                    <option  value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                            <option value=""> Max Bedrooms</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option  selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-dark btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                                        <form action="{{URL('/'.$langSeg.'/offplan_search_ar')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <div class="row">



                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group">


                                                        <input type="search" name="search" id="search-mobile-2-arabic" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbyprojects') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile-2-arabic"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>



                                                        </select>
                                                    </div>


                                                </div>


                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <!-- Pills content -->
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>

</header>


@else
<header class="header" style="background: linear-gradient(180deg, rgba(21,21,21,0.5) 0, rgba(21,21,21,0) 100%);">

    <div class="container py-0">
        <div class="wrapper " >
            <div class="header-item-left">

                    <a href="{{URL('/'.$langSeg.'/home')}}" class="brand"><img src="{{URL::asset('public/assets/asset/logo.png')}}" class="logo-height" alt=""></a>


            </div>
            <!-- Section: Navbar Menu -->
            <div class="header-item-center ">
                <div class="overlay" ></div>
                <nav class="menu navbar-dark">
                    <div class="menu-mobile-header">
                        <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                        <div class="menu-mobile-title"></div>
                        <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                    </div>
                    <ul class="menu-section " style="padding-left: 0px;">

                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color">{{ trans('frontLang.buy') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>">{{ trans('frontLang.Apartmentforsale') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>">{{ trans('frontLang.Villasforsale') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>">{{ trans('frontLang.Commercialforsale') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>">{{ trans('frontLang.Townhouseforsale') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>">{{ trans('frontLang.Plotforsale') }} </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color">{{ trans('frontLang.Rent') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>">{{ trans('frontLang.Apartmentforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/villas-for-rent-in-Dubai');?>">{{ trans('frontLang.Villasforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/commercial-for-rent-in-Dubai');?>">{{ trans('frontLang.Commercialforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/townhouses-for-rent-in-Dubai');?>">{{ trans('frontLang.Townhouseforrent') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/furnished-properties-for-rent-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/luxury-properties-for-rent-in-Dubai');?>">{{ trans('frontLang.Luxuryproperties') }}</a></li>


                                </ul>
                            </div>
                        </li>

                        <li><a href="<?php echo  url('/'.$langSeg.'/sell');?>" class="menu-color"> {{ trans('frontLang.Sell') }}</a></li>

                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color" style=" ">
                                {{ trans('frontLang.Dubaiprojects') }} <i class="ion ion-ios-arrow-down"></i>
                            </a>

                            <div class="menu-subs menu-mega menu-column-4">
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/SEXSEN-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">  {{ trans('frontLang.Offplan') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-ready-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/desktop/Asayel-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.readyProjects') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-luxury-projects');?>">
                                        <img src="{{URL::asset('public/assets/asset/desktop/Bvlg-edgerealty.ae.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.Luxuryprojects') }}</h4>
                                    </a>
                                </div>
                                <div class="list-item text-center">
                                    <a href="<?php echo  url('/'.$langSeg.'/dubai-communities');?>">
                                        <img src="{{URL::asset('public/assets/asset/Commiunities.webp')}}" class="responsive" alt="New Product">
                                        <h4 class="title">{{ trans('frontLang.dubaiCommunities') }}</h4>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li><a href="<?php echo  url('/'.$langSeg.'/services');?>" class="menu-color">{{ trans('frontLang.services') }}</a></li>
                        {{-- <li class="menu-item-has-children">
                            <a href="#" class="menu-color">{{ trans('frontLang.marketstatistics') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/sale_transaction');?>">{{ trans('frontLang.sale_transaction') }}</a></li>





                                </ul>
                            </div>
                        </li> --}}



                        <li class="menu-item-has-children">
                            <a href="#" class="menu-color">{{ trans('frontLang.Aboutus') }} <i class="ion ion-ios-arrow-down"> </i></a>
                            <div class="menu-subs menu-column-1">
                                <ul style="padding-left: 0rem;">
                                    <li><a href="<?php echo  url('/'.$langSeg.'/aboutus');?>">{{ trans('frontLang.aboutcompany') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/team');?>">{{ trans('frontLang.team') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/contactus');?>"> {{ trans('frontLang.contactUs') }}</a></li>
                                    <li><a href="<?php echo  url('/'.$langSeg.'/career');?>">{{ trans('frontLang.Careers') }}</a></li>
                                </ul>
                            </div>
                        </li>

                        @if ($langSeg == 'ru')
                            <li class="menu-item-has-children" >
                                <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU <i class="ion ion-ios-arrow-down"> </i></a>
                                <div class="menu-subs menu-column-1 lang" >
                                    <ul style="padding-left: 0rem;">
                                        <li><a href="<?php echo $finalUrlen ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN </a></li>
                                        <li><a href="<?php echo $finalUrl ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR </a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="menu-item-has-children" >
                                <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN <i class="ion ion-ios-arrow-down"> </i></a>
                                <div class="menu-subs menu-column-1 lang" >
                                    <ul style="padding-left: 0rem;">
                                        <li><a href="<?php echo $finalUrl ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR </a></li>
                                        <li><a href="<?php echo $finalUrlru ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU </a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif



                    </ul>
                </nav>
            </div>







            <div class="header-item-right">

                {{-- <a href="<?php echo $finalUrl ; ?>"><img src="{{URL('public/assets/images/uae-flag.png')}}" alt=""></a> --}}

                {{-- <nav class="menu navbar-dark">
                    <div class="menu-mobile-header">
                        <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                        <div class="menu-mobile-title"></div>
                        <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                    </div>
                    <ul class="menu-section " style="padding-left: 0px; margin-bottom: 0px;">

                        @if ($langSeg == 'ru')
                            <li class="menu-item-has-children" >
                                <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU <i class="ion ion-ios-arrow-down"> </i></a>
                                <div class="menu-subs menu-column-1 lang" >
                                    <ul style="padding-left: 0rem;">
                                        <li><a href="<?php echo $finalUrlen ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN </a></li>
                                        <li><a href="<?php echo $finalUrl ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR </a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="menu-item-has-children" >
                                <a href="#" class="menu-color"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/en.png')}}" alt=""> EN <i class="ion ion-ios-arrow-down"> </i></a>
                                <div class="menu-subs menu-column-1 lang" >
                                    <ul style="padding-left: 0rem;">
                                        <li><a href="<?php echo $finalUrl ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ar.png')}}" alt=""> AR </a></li>
                                        <li><a href="<?php echo $finalUrlru ; ?>"><img style="display: inline;margin-top: -3px;" src="{{URL('public/assets/images/ru.png')}}" alt=""> RU </a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </nav> --}}

                <div class="my-auto">
                    <select name="formal" class="rounded-0 px-2" onchange="javascript:handleSelect(this)">
                        <option value="0">Currency</option>
                        <option value="1">AED</option>
                        <option value="2">USD</option>
                    </select>
                </div>

                <a  class="menu-icon" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight" aria-controls="offcanvasRight"><img  src="{{url::asset('public/assets/asset/loupe.png')}}" alt=""></a>

                <button type="button" class="menu-mobile-trigger"  >
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>


            </div>

                <div class="offcanvas bg-black offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" >
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">{{ trans('frontLang.searchh') }}</h5>
                        <button type="button" class="btn-close text-reset text-white" data-mdb-dismiss="offcanvas" aria-label="Close" ></button>
                    </div>
                    <div class="offcanvas-body ">
                        <div class="row">
                            <div class="col-lg-12">


                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-fill mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="pill" href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true">{{ trans('frontLang.buy') }}</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="pill" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">{{ trans('frontLang.Rent') }}</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="pill" href="#ex2-pills-3" role="tab" aria-controls="ex2-pills-3" aria-selected="false">{{ trans('frontLang.off-plan') }}</a>
                                    </li>
                                </ul>
                                    <!-- Pills navs -->
                                <!-- Pills content -->
                                <div class="tab-content" id="ex2-content">
                                    <div class="tab-pane fade show active" id="ex2-pills-1" role="tabpanel" aria-labelledby="ex2-tab-1">
                                        <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <input type="hidden" name="property_type_id" value="1" />
                                            <div class="row">


                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group has-search">

                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="search" name="search" id="search-mobile" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbyarea') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>


                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option  value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                        <option value="0">Studio</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option  selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>
                                                </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                                        <form action="{{URL('/'.$langSeg.'/properties_search')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <div class="row">

                                                <input type="hidden" name="property_type_id" value="2" />
                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group has-search">

                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="search" name="search" id="search-mobile-1" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbyarea') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile-1"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>


                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                        <option  value=""> {{ trans('frontLang.minBedrooms') }}</option>
                                                        <option value="0">Studio</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>

                                                    </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_bedroom" class="form-select form-select-lg" aria-label="Default select example" >
                                                            <option  value=""> {{ trans('frontLang.maxBedrooms') }}</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="min_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option  selected="" value="">{{ trans('frontLang.minPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                                                    <select name="max_price" class="form-select form-select-lg" aria-label="Default select example" >

                                                        <option selected="" value="">{{ trans('frontLang.maxPrice') }}</option>
                                                        <option  value="250000">250,000</option>
                                                        <option  value="500000">500,000</option>
                                                        <option  value="750000">750,000</option>
                                                        <option  value="1000000">1,000,000</option>
                                                        <option  value="2000000">2,000,000</option>
                                                        <option  value="3000000">3,000,000</option>
                                                        <option  value="4000000">4,000,000</option>
                                                        <option  value="5000000">5,000,000</option>
                                                        <option  value="6000000">6,000,000</option>
                                                        <option  value="7000000">7,000,000</option>
                                                        <option  value="8000000">8,000,000</option>
                                                        <option  value="9000000">9,000,000</option>
                                                        <option  value="10000000">10,000,000</option>
                                                        <option  value="20000000">20,000,000</option>
                                                        <option  value="30000000">30,000,000</option>
                                                        <option  value="40000000">40,000,000</option>
                                                        <option  value="50000000">50,000,000</option>
                                                        <option  value="60000000">60,000,000</option>
                                                        <option  value="70000000">70,000,000</option>
                                                        <option  value="80000000">80,000,000</option>


                                                </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                                        <form action="{{URL('/'.$langSeg.'/offplan_search')}}" method="post" >
                                            @csrf
                                            @honeypot
                                            <div class="row">



                                                <div class="col-lg-12 mt-3 mb-4">
                                                    <div class="input-group has-search">

                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="search" name="search" id="search-mobile-2" class="form-control form-control-lg" placeholder="{{ trans('frontLang.searchbyarea') }}" aria-label="Search"/>

                                                    </div>
                                                    <div id="List-mobile-2"></div>
                                                    {{ csrf_field() }}
                                                </div>


                                                <div class="col-lg-12">
                                                    <div class=" mb-4">

                                                        <select name="property_type" class="form-select form-select-lg" aria-label="Default select example" >


                                                            <option  value=""> {{ trans('frontLang.propertyType') }}</option>
                                                            <option  value="1">{{ trans('frontLang.Apartment') }}</option>
                                                            <option  value="3">{{ trans('frontLang.Commercial') }}</option>
                                                            <option  value="7">{{ trans('frontLang.Duplex') }}</option>
                                                            <option  value="2">{{ trans('frontLang.Villa') }}</option>


                                                        </select>
                                                    </div>


                                                </div>


                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                                                        {{ trans('frontLang.searchh') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <!-- Pills content -->
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>

</header>

@endif



