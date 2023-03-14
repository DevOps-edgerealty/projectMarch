
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
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if($uri_path == '/' || $uri_path == '/home' )
        {
            $finalUrl = '/ar/home';

        }


        else
        {
            $uri_segments = explode('/', $uri_path);
            $seg1 = $uri_segments[1];
            if($seg1)
            {
                if($seg1 == 'en')
                {
                    $replacements2 = array(1 => "ar");
                    $basket = array_replace($uri_segments, $replacements2);
                    $finalUrl = implode("/",$basket);


                }
                elseif($seg1 == 'ar')
                {
                    $replacements2 = array(1 => "en");
                    $basket = array_replace($uri_segments, $replacements2);
                    $finalUrl = implode("/",$basket);


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


{{-- MOBILE --}}
@if ($langSeg == 'ar')
    <footer class="text-center text-white mt-5 mobile-show" style="background-color: #000; direction: rtl;">
        <!-- Grid container -->

        <div class="container pt-4" style="background: #000;">
            <section class="mb-1 w-100">
                <div class="row w-100">
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{ trans('frontLang.Aboutus') }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul style="padding-left: 0rem;">
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/aboutus');?>">{{ trans('frontLang.aboutcompany') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/contactus');?>">{{ trans('frontLang.contactUs') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/career');?>">{{ trans('frontLang.Careers') }}</a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed text-uppercase" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    {{ trans('frontLang.Luxuryprojects') }}
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"  data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach($footerLuxuryProjects as $data)
                                        <p class="my-1 me-auto" style="text-align: left !important; padding-left: 0rem;">
                                            <a href="<?php echo  url($langSeg .'/'.'dubai-luxury-projects'.'/'.$data->slug_link);?>" class="text-reset me-auto text-uppercase" >
                                                {{ $data->title_ar }}
                                            </a>
                                        </p>
                                    @endforeach
                                    {{-- <ul style="padding-left: 0rem;">
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>">{{ trans('frontLang.Apartmentforsale') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>">{{ trans('frontLang.Villasforsale') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>">{{ trans('frontLang.Commercialforsale') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>">{{ trans('frontLang.Townhouseforsale') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>">{{ trans('frontLang.Plotforsale') }} </a></li>
                                    </ul> --}}
                                </div>
                            </div>



                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed text-uppercase"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    {{ trans('frontLang.Dubaicommunities') }}
                                </button>
                            </h2>
                            <div id="flush-collapseThree"  class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach($footerCommunities as $data)
                                        <p class="my-1" style="text-align: left !important; padding-left: 0rem;">
                                            <a href="<?php echo  url( $langSeg .'/'.'dubai-communities'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                                {{ $data->title_ar }}
                                            </a>
                                        </p>
                                    @endforeach
                                    {{-- <ul style="padding-left: 0rem;">
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>">{{ trans('frontLang.Apartmentforrent') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/villas-for-rent-in-Dubai');?>">{{ trans('frontLang.Villasforrent') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/commercial-for-rent-in-Dubai');?>">{{ trans('frontLang.Commercialforrent') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/townhouses-for-rent-in-Dubai');?>">{{ trans('frontLang.Townhouseforrent') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/furnished-properties-for-rent-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                        <li style="text-align: right;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/luxury-properties-for-rent-in-Dubai');?>">{{ trans('frontLang.Luxuryproperties') }}</a></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed text-uppercase"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                    {{ trans('frontLang.eservices') }}
                                </button>
                            </h2>
                            <div id="flush-collapsefour"  class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-mdb-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul style="padding-left: 0rem;">
                                    <li style="text-align: right;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>">{{ trans('frontLang.onlinepayment') }}</a></li>
                                    <li style="text-align: right;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/blogs');?>">{{ trans('frontLang.blogs') }}</a></li>
                                    <li style="text-align: right;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/sitemap');?>">{{ trans('frontLang.sitemap') }}</a></li>
                                    <li style="text-align: right;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>">{{ trans('frontLang.Dubaideveloper') }}</a></li>
                                    <div class="text-white float-left me-3" style="text-align: right;">
                                        {{ trans('frontLang.footerCurrency2') }} &nbsp;
                                        <select class="my-auto float-left rounded-0" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px; border: 0.5px solid grey !Important; border-radius: 0px !important;">
                                            <option value="AED" class="rounded-0">AED</option>
                                            <option value="USD" class="rounded-0">USD</option>
                                        </select>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Section: Social media -->
            <section class="">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.facebook.com/Edge-Realty-109809967096901" target="_blank"  role="button" data-mdb-ripple-color="dark" ><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://twitter.com/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>


                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.instagram.com/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark" ><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.linkedin.com/company/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.youtube.com/channel/UCSz0j-0Ct8SWrPFvgk30lWQ" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-youtube"></i></a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-white p-3" style="background-color: #000;">
        © {{ now()->year }} All Right Reserved. ORN : 12040

        </div>
        <!-- Copyright -->

    </footer>
@else
    <footer class="text-center text-white mt-5 mobile-show w-100" style="background-color: #000;">
        <!-- Grid container -->

        <div class="container pt-4" style="background: #000;">
            <section class="mb-1 w-100">
                <div class="row w-100">
                    <div class="accordion accordion-flush w-100" id="accordionFlushExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{ trans('frontLang.Aboutus') }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <ul style="padding-left: 0rem;">
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/aboutus');?>">{{ trans('frontLang.aboutcompany') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/contactus');?>">{{ trans('frontLang.contactUs') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/career');?>">{{ trans('frontLang.Careers') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed text-uppercase" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    {{ trans('frontLang.Luxuryprojects') }}
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"  data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach($footerLuxuryProjects as $data)
                                        <p class="my-1 me-auto" style="text-align: left !important; padding-left: 0rem;">
                                            <a href="<?php echo  url($langSeg .'/'.'dubai-luxury-projects'.'/'.$data->slug_link);?>" class="text-reset me-auto text-uppercase" >
                                                {{ $data->title_en }}
                                            </a>
                                        </p>
                                    @endforeach
                                    {{-- <ul style="padding-left: 0rem;">
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>">{{ trans('frontLang.Apartmentforsale') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>">{{ trans('frontLang.Villasforsale') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/commercial-for-sale-in-Dubai');?>">{{ trans('frontLang.Commercialforsale') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/townhouses-for-sale-in-Dubai');?>">{{ trans('frontLang.Townhouseforsale') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/furnished-properties-for-sale-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/plots-for-sale-in-Dubai');?>">{{ trans('frontLang.Plotforsale') }} </a></li>


                                    </ul> --}}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed text-uppercase"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    {{ trans('frontLang.Dubaicommunities') }}
                                </button>
                            </h2>
                            <div id="flush-collapseThree"  class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach($footerCommunities as $data)
                                        <p class="my-1" style="text-align: left !important; padding-left: 0rem;">
                                            <a href="<?php echo  url( $langSeg .'/'.'dubai-communities'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                                {{ $data->title_en }}
                                            </a>
                                        </p>
                                    @endforeach
                                    {{-- <ul style="padding-left: 0rem;">
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/apartment-for-rent-in-Dubai');?>">{{ trans('frontLang.Apartmentforrent') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/villas-for-rent-in-Dubai');?>">{{ trans('frontLang.Villasforrent') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/commercial-for-rent-in-Dubai');?>">{{ trans('frontLang.Commercialforrent') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/townhouses-for-rent-in-Dubai');?>">{{ trans('frontLang.Townhouseforrent') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/furnished-properties-for-rent-Dubai');?>">{{ trans('frontLang.Furnished') }}</a></li>
                                        <li style="text-align: left;"><a style="color: #fff"  href="<?php echo  url('/'.$langSeg.'/dubai-properties/rent/luxury-properties-for-rent-in-Dubai');?>">{{ trans('frontLang.Luxuryproperties') }}</a></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed text-uppercase"  type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                {{ trans('frontLang.quickLinks') }}
                            </button>
                            </h2>
                            <div id="flush-collapsefour"  class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-mdb-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul style="padding-left: 0rem;">
                                    <li style="text-align: left;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>">{{ trans('frontLang.onlinepayment') }}</a></li>
                                    <li style="text-align: left;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/blogs');?>">{{ trans('frontLang.blogs') }}</a></li>
                                    <li style="text-align: left;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/sitemap');?>">{{ trans('frontLang.sitemap') }}</a></li>
                                    <li style="text-align: left;" class="text-uppercase"><a style="color: #fff" href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>">{{ trans('frontLang.Dubaideveloper') }}</a></li>
                                    <div class="text-white float-left me-3" style="text-align: left;">
                                        {{ trans('frontLang.footerCurrency2') }} &nbsp;
                                        <select class="my-auto float-left rounded-0" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px; border: 0.5px solid grey !Important; border-radius: 0px !important;">
                                            <option value="AED" class="rounded-0">AED</option>
                                            <option value="USD" class="rounded-0">USD</option>
                                        </select>
                                    </div>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Social media -->
            <section class="">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.facebook.com/Edge-Realty-109809967096901" target="_blank"  role="button" data-mdb-ripple-color="dark" ><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://twitter.com/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>


                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.instagram.com/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark" ><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.linkedin.com/company/edgerealtydubai" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.youtube.com/channel/UCSz0j-0Ct8SWrPFvgk30lWQ" target="_blank" role="button" data-mdb-ripple-color="dark"><i class="fab fa-youtube"></i></a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-white p-3" style="background-color: #000;">
            © {{ now()->year }} All Right Reserved. ORN : 12040

        </div>
        <!-- Copyright -->

    </footer>
@endif





{{-- DESKTOP --}}
@if ($langSeg == 'ar')
    <!-- Footer -->
    <footer class=" text-center text-lg-start bg-light text-muted desktop-show" style="direction: rtl">


        <!-- Section: Links  -->
        <section class="d-flex justify-content-center justify-content-lg-between py-3 text-white" style="background-color: #000;border-top: 0.5px solid #848484;">
            <div class="container-fluid containerization text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-0" style="text-align: right !important">
                    <!-- Content -->
                    <a href="{{URL('')}}" class="brand mb-4"><img src="{{URL::asset('public/assets/asset/logo.png')}}" style="height: 85px;" alt=""></a>

                    <p class="mt-4 mb-2">
                        <a href="tel:00971045807142" style="color: #fff"><i class="fas fa-phone-alt me-3"></i> +97143881856</a>
                    </p>
                    <p class="my-4">
                        <a style="color: #fff" href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">
                        <i class="fab fa-whatsapp me-3"></i> +971585602665</a>
                    </p>
                    <p class="my-4">
                        <a style="color: #fff ;text-transform: lowercase;" href="mailto:info@edgerealty.ae" class="__cf_email__" data-cfemail="a5cccbc3cae5c3cccbc1cdcad0d6c08bc6cac8">
                        <i class="fas fa-envelope me-3"></i>
                        info@edgerealty.ae
                        </a>
                    </p>
                    <!-- Facebook -->
                    <div class="m-0 p-0" style="margin-left: -20px !important;">
                        <a class="btn btn-link btn-floating btn-lg text-white m-1"  target="_blank"href="https://www.facebook.com/Edge-Realty-109809967096901" role="button" data-mdb-ripple-color="white" ><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://twitter.com/edgerealtydubai" role="button" data-mdb-ripple-color="white" ><i class="fab fa-twitter"></i></a>


                        <!-- Instagram -->
                        <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank" href="https://www.instagram.com/edgerealtydubai"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a  class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.linkedin.com/company/edgerealtydubai"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-linkedin"></i></a>

                        <!-- Linkedin -->
                        <a  class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.youtube.com/channel/UCSz0j-0Ct8SWrPFvgk30lWQ"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-0" style="text-align: right !important">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                        {{ trans('frontLang.Aboutus') }}
                    </h6>
                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/aboutus');?>" class="text-reset">{{ trans('frontLang.companyOverView') }}</a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/contactus');?>" class="text-reset">{{ trans('frontLang.contactUs') }} </a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/career');?>" class="text-reset">{{ trans('frontLang.Careers') }}</a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/faqs');?>" class="text-reset">{{ trans('frontLang.faqs') }}</a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/blogs');?>" class="text-reset">{{ trans('frontLang.blogs') }}</a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>" class="text-reset">{{ trans('frontLang.Dubaideveloper') }}</a>
                    </p>

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/sitemap');?>" class="text-reset">{{ trans('frontLang.sitemap') }}</a>
                    </p>

                    {{-- <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/rate-our-service');?>" class="text-reset text-uppercase">{{ trans('frontLang.rateourservice') }}</a>
                    </p> --}}

                    <p class="my-1">
                        <a href="<?php echo  url('/'.$langSeg.'/invoice');?>" class="text-reset text-uppercase">{{ trans('frontLang.checkyourinvoice') }}</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-0" style="text-align: right !important">

                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                        {{ trans('frontLang.Luxuryprojects') }}
                    </h6>
                    {{-- {{$footerLuxuryProjects}} --}}
                    @foreach($footerLuxuryProjects as $data)
                        <p class="my-2">
                            <a href="<?php echo  url($langSeg .'/'.'dubai-luxury-projects'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                {{ $data->title_ar }}
                            </a>
                        </p>
                    @endforeach

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-0" style="text-align: right !important">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                        {{ trans('frontLang.Dubaicommunities') }}
                    </h6>

                    @foreach($footerCommunities as $data)
                        <p class="my-2">
                            <a href="<?php echo  url( $langSeg .'/'.'dubai-communities'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                {{ $data->title_ar }}
                            </a>
                        </p>
                    @endforeach

                </div>
                <!-- Grid column -->
                </div>
                <!-- Grid row -->

                <div class="row text-center" style="display: none; text-align: right !important">

                    <a id="button" onclick="showhide()" id="show" style="color: #fff;" class="mb-5" >
                        <b>{{ trans('frontLang.popularsearches') }} </b>
                        <i class="fas fa-chevron-down"> </i>
                    </a>
                </div>

                <div class="row" id="newpost" style="display: none; text-align: right !important">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/properties_search');?>" class="text-reset">{{ trans('frontLang.propertiesForSaleInDubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/properties_search');?>" class="text-reset">{{ trans('frontLang.propertiesForRentInDubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="text-reset">{{ trans('frontLang.apartmentforsaleindubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" class="text-reset">{{ trans('frontLang.viilasforsaleindubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>" class="text-reset">{{ trans('frontLang.offplanprojectsindubai') }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <!-- Links -->

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaidowntown') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaicitywalk') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaipalmjumeriah') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaibluewaters') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaidubaimarina') }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <!-- Links -->

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanapartmentindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanvillaindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanprojectsindubai') }} </a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanpropertyindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplantownhousesindubai') }} </a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->

                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontapartmentforsale') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontapartmentforrent') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontvillasforsale') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontvillasforrent') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.waterfrontpropertiesforsale') }}</a>
                        </p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->

            </div>
        </section>


        <section class="text-center mx-auto text-white d-flex mb-4 px-5" style="background-color: #000">


            <div class=" float-left mx-auto" style="text-align: right !important">
                <div class="text-white mt- mb-3">
                    <span>
                        <a style="color:white;" href="<?php echo  url('/'.$langSeg.'/privacyandpolicy');?>">
                            {{ trans('frontLang.privacyandpolicy') }}
                        </a> |

                        <a style="color:white;" href="<?php echo  url('/'.$langSeg.'/termsandconditions');?>">
                            {{ trans('frontLang.Termsandcondition') }}
                        </a>
                    </span>
                </div>
            </div>

            <div class=" float-left text-center my-auto mx-auto" style="text-align: right !important">
                <div class="text-white" >
                    {{ trans('frontLang.rightsandreserved') }}
                </div>

            </div>

            <div class=" float-left text-center my-auto mx-auto d-flex m" style="text-align: right !important">

                <div class="text-white float-left me-3" >
                    {{ trans('frontLang.footerCurrency') }}
                </div>

                <select class="my-auto float-left rounded-0" name="skill_dropdown" id="skill_dropdown_mobile" style="width: 80px; border: 0.5px solid grey !Important; border-radius: 0px !important;">

                    <option value="AED" class="rounded-0">AED</option>
                    <option value="USD" class="rounded-0">USD</option>

                </select>

            </div>


        </section>


    </footer>
    <!-- Footer -->
@else
   <!-- Footer -->
    <footer class="px-3 text-center text-lg-start bg-light text-muted desktop-show " style="text-transform: uppercase;">


        <!-- Section: Links  -->
        <section class="d-flex justify-content-center justify-content-lg-between py-3 text-white" style="background-color: #000;border-top: 0.5px solid #848484;">
            <div class="container-fluid containerization text-center text-md-start mt-0">

                <!-- Grid row -->
                <div class="row mt-3">

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-0">
                        <!-- Content -->
                        <a href="{{URL('')}}" class="brand mb-4"><img src="{{URL::asset('public/assets/asset/logo.png')}}" style="height: 85px;" alt=""></a>

                        <p class="mt-4 mb-2">
                            <a href="tel:00971045807142" style="color: #fff"><i class="fas fa-phone-alt me-3"></i> +97143881856</a>
                        </p>
                        <p class="my-4">
                            <a style="color: #fff" href="https://wa.me/971585602665?text=Hello Edge Realty  team, I would like to have a consultation session. Please assist me! Thanks"  target="_blank">
                            <i class="fab fa-whatsapp me-3"></i> +971585602665</a>
                        </p>
                        <p class="my-4">
                            <a style="color: #fff ;text-transform: lowercase;" href="mailto:info@edgerealty.ae" class="__cf_email__" data-cfemail="a5cccbc3cae5c3cccbc1cdcad0d6c08bc6cac8">
                            <i class="fas fa-envelope me-3"></i>
                            info@edgerealty.ae
                            </a>
                        </p>
                        <!-- Facebook -->
                        <div class="m-0 p-0" style="margin-left: -40px !important;">
                            <a class="btn btn-link btn-floating btn-lg text-white m-1"  target="_blank"href="https://www.facebook.com/Edge-Realty-109809967096901" role="button" data-mdb-ripple-color="white" ><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://twitter.com/edgerealtydubai" role="button" data-mdb-ripple-color="white" ><i class="fab fa-twitter"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank" href="https://www.instagram.com/edgerealtydubai"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a  class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.linkedin.com/company/edgerealtydubai"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-linkedin"></i></a>

                            <!-- Linkedin -->
                            <a  class="btn btn-link btn-floating btn-lg text-white m-1" target="_blank"href="https://www.youtube.com/channel/UCSz0j-0Ct8SWrPFvgk30lWQ"  role="button" data-mdb-ripple-color="white" ><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-0">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                            {{ trans('frontLang.Aboutus') }}
                        </h6>
                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/aboutus');?>" class="text-reset">{{ trans('frontLang.companyOverView') }}</a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/contactus');?>" class="text-reset">{{ trans('frontLang.contactUs') }} </a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/career');?>" class="text-reset">{{ trans('frontLang.Careers') }}</a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/faqs');?>" class="text-reset">{{ trans('frontLang.faqs') }}</a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/blogs');?>" class="text-reset">{{ trans('frontLang.blogs') }}</a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-developers');?>" class="text-reset">{{ trans('frontLang.Dubaideveloper') }}</a>
                        </p>

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/sitemap');?>" class="text-reset">{{ trans('frontLang.sitemap') }}</a>
                        </p>

                        {{-- <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/rate-our-service');?>" class="text-reset text-uppercase">{{ trans('frontLang.rateourservice') }}</a>
                        </p> --}}

                        <p class="my-1">
                            <a href="<?php echo  url('/'.$langSeg.'/invoice');?>" class="text-reset text-uppercase">{{ trans('frontLang.checkyourinvoice') }}</a>
                        </p>

                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-0">

                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                            {{ trans('frontLang.Luxuryprojects') }}
                        </h6>
                        {{-- {{$footerLuxuryProjects}} --}}
                        @foreach($footerLuxuryProjects as $data)
                            <p class="my-1">
                                <a href="<?php echo  url($langSeg .'/'.'dubai-luxury-projects'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                    {{ $data->title_en }}
                                </a>
                            </p>
                        @endforeach

                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-md-0 mb-0">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                            {{ trans('frontLang.Dubaicommunities') }}
                        </h6>

                        @foreach($footerCommunities as $data)
                            <p class="my-1">
                                <a href="<?php echo  url( $langSeg .'/'.'dubai-communities'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                    {{ $data->title_en }}
                                </a>
                            </p>
                        @endforeach

                    </div>

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-md-0 mb-0">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4 text-decoration-underline">
                            {{ trans('frontLang.Dubaidevelopers') }}
                        </h6>

                        @foreach($footerDevelopers as $data)
                            <p class="my-1">
                                <a href="<?php echo  url( $langSeg .'/'.'dubai-developers'.'/'.$data->slug_link);?>" class="text-reset text-uppercase">
                                    {{ $data->$name_var }}
                                </a>
                            </p>
                        @endforeach

                    </div>

                </div>
                <!-- Grid row -->

                <div class="row text-center" style="display: none;">

                    <a id="button" onclick="showhide()" id="show" style="color: #fff;" class="mb-5" >
                        <b>{{ trans('frontLang.popularsearches') }} </b>
                        <i class="fas fa-chevron-down"> </i>
                    </a>
                </div>

                <div class="row" id="newpost" style="display: none">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/properties_search');?>" class="text-reset">{{ trans('frontLang.propertiesForSaleInDubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/properties_search');?>" class="text-reset">{{ trans('frontLang.propertiesForRentInDubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/apartment-for-sale-in-Dubai');?>" class="text-reset">{{ trans('frontLang.apartmentforsaleindubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-properties/sale/villas-for-sale-in-Dubai');?>" class="text-reset">{{ trans('frontLang.viilasforsaleindubai') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="<?php echo  url('/'.$langSeg.'/dubai-new-projects');?>" class="text-reset">{{ trans('frontLang.offplanprojectsindubai') }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-0">
                        <!-- Links -->

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaidowntown') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaicitywalk') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaipalmjumeriah') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaibluewaters') }}</a>
                        </p>
                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.apartmentforrentindubaidubaimarina') }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-0">
                        <!-- Links -->

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanapartmentindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanvillaindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanprojectsindubai') }} </a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplanpropertyindubai') }}</a>
                        </p>

                        <p class="my-2">
                            <a href="#!" class="text-reset">{{ trans('frontLang.buyoffplantownhousesindubai') }} </a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-0">
                        <!-- Links -->

                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontapartmentforsale') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontapartmentforrent') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontvillasforsale') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.beachfrontvillasforrent') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ trans('frontLang.waterfrontpropertiesforsale') }}</a>
                        </p>

                    </div>
                    <!-- Grid column -->
                </div>

            </div>
        </section>

        {{-- <hr class="my-0"><br> --}}

        <section class="text-center mx-auto text-white d-flex mb-4 px-5" style="background-color: #000">


            <div class=" float-left mx-auto">
                <div class="text-white mt-0 mb-0">
                    <span>
                        <a style="color:white;" href="<?php echo  url('/'.$langSeg.'/privacyandpolicy');?>">
                            {{ trans('frontLang.privacyandpolicy') }}
                        </a> |

                        <a style="color:white;" href="<?php echo  url('/'.$langSeg.'/termsandconditions');?>">
                            {{ trans('frontLang.Termsandcondition') }}
                        </a>
                    </span>
                </div>
            </div>

            <div class=" float-left text-center my-auto mx-auto">
                <div class="text-white" >
                    {{ trans('frontLang.rightsandreserved') }}
                </div>

            </div>

            <div class=" float-left text-center my-auto mx-auto d-flex m">

                <div class="text-white float-left me-3" >
                    {{ trans('frontLang.footerCurrency') }}
                </div>


                <select class="my-auto float-left rounded-0" name="skill_dropdown" id="skill_dropdown" style="width: 80px; border: 0.5px solid grey !Important; border-radius: 0px !important;">

                    <option value="AED" class="rounded-0">AED</option>
                    <option value="USD" class="rounded-0">USD</option>

                </select>

            </div>



        </section>
        <!-- Section: Social media -->

    </footer>
    <!-- Footer -->
@endif




<script>
    const navEl = document.querySelector('.navbar1');

    window.addEventListener('scroll', () => {
        if(window.scrollY >= 56) {
            navEl.classList.add('navbar-scrolled');
        } else if (window.scrollY < 56) {
            navEl.classList.remove('navbar-scrolled');
        }
    })
</script>

<script>
    $(document).ready(function () {
        $("#skill_dropdown").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill").hide();
            $(eleBox).show();
        });
    });


    $(document).ready(function () {
        $("#skill_dropdown_mobile").change(function () {
            var inputVal = $(this).val();
            var eleBox = $("." + inputVal);
            $(".skill_mobile").hide();
            $(eleBox).show();
        });
    });


</script>

<script>
    $(document).ready(function(){
      $("#flip").click(function(){
        $("#panel").slideToggle("slow");
      });
    });
</script>


<script>
    $(document).ready(function(){
      $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");
      });
    });
</script>
