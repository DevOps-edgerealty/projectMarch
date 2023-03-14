@extends('layout.master_maps')

<?php

    $meta_var = "meta_title_" . trans('backLang.boxCode');
    $meta_description_var = "meta_description_" . trans('backLang.boxCode');
    $meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');

?>

@section('meta_detail')

        {{-- <title>{{$landingpageseo ?? ''->$meta_var }}</title>
        <meta name="description" content="{{$landingpageseo ?? ''->$meta_description_var}}"/>
        <meta name="keywords" content=" {{$landingpageseo ?? ''->$meta_keywords_var}} "/> --}}

        <style>
            html, body {
                overflow-x: hidden;
                scroll-behavior: smooth !important;
            }
            * {
                box-sizing: border-box;
            }

            body {
                color: #fff !important;
                font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
            }

            h1 {
                font-size: 22px !important;
                margin: 0;
                font-weight: 600 !important;
                line-height: 20px;
                padding: 20px 2px;
                text-align: center;
            }

            a {
                color: #fff;
                text-decoration: none;
            }

            a:hover {
                color: #fff;
            }

            /* The page is split between map and sidebar - the sidebar gets 1/3, map
            gets 2/3 of the page. You can adjust this to your personal liking. */
            .sidebar {
                position: absolute;
                width: 25%;
                height: 100vh;
                top: 98px;
                right: 0;
                overflow: scroll;
                border-right: 1px solid rgba(0, 0, 0, 0.25);
            }

            .bottombar {
                height: 180px;
                background-color: #000 !important;
                top:auto;
                right:auto;
                left:auto;
                bottom:0;
                position: fixed;
            }

            .map {
                position: absolute;
                /* left: -25%; */
                width: 70%;
                height: 100vh;
                top: 0;
                bottom: 0;
            }

            .heading {
                background: #000;
                /* border-bottom: 1px solid #eee; */
                height: 60px;
                line-height: 60px;
                padding: 0 10px;
            }

            listings {
                height: ;
                overflow: auto;
                padding-bottom: 0;
            }

            .listings .item {
                border-bottom: 1px solid #eee;
                padding: 10px;
                text-decoration: none;
                color: #848484;
            }

            .listings .item:last-child { border-bottom: none; }

            .listings .item .title {
                display: block;
                color: #848484;
                font-weight: 700;
                font-size: 1rem !important;
            }

            .listings .item .title small { font-weight: 400; }

            .listings .item.active .title,
            .listings .item .title:hover { color: #fff; }

            .listings .item.active {
            }

            ::-webkit-scrollbar {
                width: 3px;
                height: 3px;
                border-left: 0;
                background: rgba(0, 0, 0, 0.1);
            }

            ::-webkit-scrollbar-track {
                background: none;
            }

            ::-webkit-scrollbar-thumb {
                background: grey;
                border-radius: 0;
            }

            /* Marker tweaks */
            .mapboxgl-popup-close-button {
                display: none;
            }

            .mapboxgl-popup-content {
                font: 400 12px/12px 'Source Sans Pro', 'Helvetica Neue', sans-serif;
                padding: 0;
                max-width: 800px !important;
                width: 340px !important;
                background-color: #000 !important;
                color: #fff !important;
                border: 0.25px #fff solid !important;
            }

            .mapboxgl-popup-content h6 {
                background: #000 !important;
                color: #fff !important;
                margin: 0;
                padding: 3px;
                border-radius: 3px 3px 0 0;
                font-weight: 700;
                margin-top: -15px;
            }

            .mapboxgl-popup-content p {
                margin: 0;
                padding: 3px;
                color: #fff !important;
                font-weight: 400;
            }

            .mapboxgl-popup-content div {
                padding: 10px;
                color: #fff !important;
            }

            .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
                margin-top: 15px;
                color: #fff !important;
            }

            .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
                border-bottom-color: #91c949;
                color: #fff !important;
            }

            .marker {
                border: none;
                cursor: pointer;
                height: 64px;
                width: 64px;
                color: #000 !important;
                background-color: #000;
                /* background-image: url({{asset('public/assets/asset/map/2.png')}}); */
            }

            .my-icon {
                border-radius: 100%;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 20px;
                color: white;
            }

            .icon-dc {
                background: #3bb2d0;
            }

            .icon-sf {
                background: #3bb2d0;
            }

            #cluster-count {
                font-family: 'Gotham', sans-serif !important;
                border: 1px #fff Solid !important;
            }

            #clusters {
                font-family: 'Gotham', sans-serif !important;
                border: 1px #fff Solid !important;
            }

            #unclustered-point {
                font-family: 'Gotham', sans-serif !important;
                border: 1px #fff Solid !important;
                background-color: #000 !important;
            }

            #popupId{
                font-size: 0.9rem !important;
                text-decoration: underline !important;
                color: #fff !important;
            }

        </style>
@endsection



@section('content')

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
        <div class="container">
            <div class="row py-5"></div>
            <div class="row mx-auto mb-3">
                <div class="col-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-white btn-lg rounded-0 text-white bg-black d-none d-md-block d-lg-block">
                        {{ trans('frontLang.exitMap') }}
                    </a>
                </div>
                <div class="col-10">
                    <span class=" mx-auto text-center d-none d-md-block d-lg-block" style="font-size: 1.8rem; text-align: center !important; margin: auto !imp">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>
                </div>
            </div>



            <div class="row mx-auto mb-3">

                <div class="col-4 px-0">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-white btn-md rounded-0 text-white bg-black d-block d-sm-block d-md-none">
                        {{ trans('frontLang.exitMap') }}
                    </a>
                </div>
                <div class="col-8 px-0">
                    <span class=" mx-auto text-right d-block d-sm-block d-md-none" style="font-size: 1.3rem; text-align: right !important; ">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>
                </div>
            </div>




                {{-- @if($langSeg == 'ar')
                    <span class=" mx-auto text-center d-block d-sm-block d-md-none" style="font-size: 1.3rem; text-align: center !important; margin: auto !imp">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>

                    <span class=" mx-auto text-center d-none d-md-block d-lg-block" style="font-size: 1.8rem; text-align: center !important; margin: auto !imp">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>
                @elseif($langSeg == 'ru')
                    <span class=" mx-auto text-center d-block d-sm-block d-md-none" style="font-size: 1.3rem; text-align: center !important; margin: auto !imp">
                        {{ trans('frontLang.exitMap') }}
                    </span>

                    <span class=" mx-auto text-center d-none d-md-block d-lg-block" style="font-size: 1.8rem; text-align: center !important; margin: auto !imp">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>
                @else
                    <div class="d-flex bd-highlight px-0    ">
                        <div class="p-2 ps-0 flex-fill bd-highlight d-none d-md-block d-lg-block" style="font-size: 1.8rem; " >
                            <a href="{{ url()->previous() }}" class="btn btn-outline-white btn-lg rounded-0 text-white bg-black">
                                {{ trans('frontLang.exitMap') }}
                            </a>
                        </div>
                        <div class="p-2 flex-fill bd-highlight d-none d-md-block d-lg-block text-center" style="font-size: 1.8rem; text-align: center !important; ">
                            {{ trans('frontLang.dubaiProperties') }}
                        </div>
                    </div>

                    <span class=" mx-auto text-center d-block d-sm-block d-md-none" style="font-size: 1.3rem; text-align: center !important; ">
                        {{ trans('frontLang.dubaiProperties') }}
                    </span>
                @endif --}}

        </div>
    </section>
</section>

    @if ($langSeg == 'ar')
        <div class='sidebar ' id="listing-card" style="display: none;">
            <div id='listings' class='listings ' style="margin-top: 60px;">
                <div class="card rounded-0 bg-black " style="width: 100%;">
                    <div id="listing-image">

                    </div>
                    <div class="card-body" dir="rtl">
                        <h3 class="card-title " >

                        </h3>
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <h3 class="p-2 ps-0 bd-highlight" id="listing-price"></h3>
                            <div class="p-2 bd-highlight float-right ms-auto" id="listing-btn"></div>
                        </div>

                        <p style="font-size: 1.3em" class="mt-3" id="listing-location"></p>

                        <p class="card-text m-0" id="listing-title"></p>

                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="p-2 ps-0 bd-highlight" id="listing-baths"></div>
                            <div class="p-2 bd-highlight" id="listing-beds"></div>
                            <div class="p-2 bd-highlight" id="listing-area"></div>
                        </div>
                        <p id="listing-description" class="" style="color: #848484 !important;"></p>
                    </div>
                </div>
            </div>
            <p id="listing_id" class="text-white" style="font-size: 1.2em !important;"></p>
        </div>

        <div class="bottombar fixed-bottom" dir="rtl" id="listing-card-mobile" style="border-radius: 20px 20px 0px 0px; display: none;">
            {{-- <hr class="border-white w-25" style=""> --}}

            <div class="card  bg-black rounded-0 py-0">
                <div class="row g-0">
                    <div class="col-4">
                        <div id="listing-image-mobile">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-0 px-2 py-2">
                            <h5 class="card-title" id="listing-price-mobile"></h5>
                            <p class="card-text" id="listing-location-mobile"></p>
                            <div class="d-flex flex-row bd-highlight mb-0">
                                <div class="p-2 ps-0 bd-highlight" id="listing-baths-mobile"></div>
                                <div class="p-2 bd-highlight" id="listing-beds-mobile"></div>
                                <div class="p-2 bd-highlight" id="listing-area-mobile"></div>
                            </div>
                            <div  id="listing-btn-mobile"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="card bg-black" style="border-radius: 20px 20px 0px 0px;">
                <div class="card-body">


                    <div class="d-flex flex-row bd-highlight mb-0">
                        <h3 class="p-2 ps-0 bd-highlight mb-0" style="font-size: 1.8em" id="listing-price-mobile"></h3>
                    </div>

                    <p style="font-size: 1em; text-decoration: underline;" class="text-white mb-0" id="listing-location-mobile"></p>


                    <div class="d-flex flex-row bd-highlight mb-0">
                        <div class="p-2 ps-0 bd-highlight" id="listing-baths-mobile"></div>
                        <div class="p-2 bd-highlight" id="listing-beds-mobile"></div>
                        <div class="p-2 bd-highlight" id="listing-area-mobile"></div>
                    </div>
                    <div class="row" id="listing-btn-mobile">

                    </div>
                </div>
            </div> --}}
        </div>
    @else
        <div class='sidebar ' id="listing-card" style="display: none;">
            <div id='listings' class='listings ' style="margin-top: 60px;">
                <div class="card rounded-0 bg-black " style="width: 100%;">
                    <div id="listing-image">

                    </div>
                    <div class="card-body">
                        <h3 class="card-title " >

                        </h3>
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <h3 class="p-2 ps-0 bd-highlight" id="listing-price"></h3>
                            <div class="p-2 bd-highlight float-right ms-auto" id="listing-btn"></div>
                        </div>

                        <p style="font-size: 1.3em" class="mt-3" id="listing-location"></p>

                        <p class="card-text m-0" id="listing-title"></p>

                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="p-2 ps-0 bd-highlight" id="listing-baths"></div>
                            <div class="p-2 bd-highlight" id="listing-beds"></div>
                            <div class="p-2 bd-highlight" id="listing-area"></div>
                        </div>
                        <p id="listing-description" class="" style="color: #848484 !important;"></p>
                    </div>
                </div>
            </div>
            <p id="listing_id" class="text-white" style="font-size: 1.2em !important;"></p>
        </div>

        <div class="bottombar fixed-bottom" id="listing-card-mobile" style="display: none;">
            <div class="card  bg-black rounded-0 py-0">
                <div class="row g-0">
                    <div class="col-4">
                        <div id="listing-image-mobile">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-0 px-2 py-2">
                            <h5 class="card-title" id="listing-price-mobile"></h5>
                            <p class="card-text" id="listing-location-mobile"></p>
                            <div class="d-flex flex-row bd-highlight mb-0">
                                <div class="p-2 ps-0 bd-highlight" id="listing-baths-mobile"></div>
                                <div class="p-2 bd-highlight" id="listing-beds-mobile"></div>
                                <div class="p-2 bd-highlight" id="listing-area-mobile"></div>
                            </div>
                            <div  id="listing-btn-mobile"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="card bg-black" style="border-radius: 20px 20px 0px 0px;">
                <div class="card-body">

                    <div class="d-flex flex-row bd-highlight mb-0">
                        <h3 class="p-2 ps-0 bd-highlight mb-0" style="font-size: 1.8em" id="listing-price-mobile"></h3>
                    </div>

                    <p style="font-size: 1em; text-decoration: underline;" class="text-white mb-0" id="listing-location-mobile"></p>



                    <div class="d-flex flex-row bd-highlight mb-0">
                        <div class="p-2 ps-0 bd-highlight" id="listing-baths-mobile"></div>
                        <div class="p-2 bd-highlight" id="listing-beds-mobile"></div>
                        <div class="p-2 bd-highlight" id="listing-area-mobile"></div>
                    </div>

                </div>
            </div> --}}
        </div>
    @endif






    <div id='map' class="map" style='width: 100%; height: 100vh'></div>


    <script>


        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';

        var allpropertyfeatures = {!! json_encode($allfeatures) !!};

        var long = {!! json_encode($long) !!};

        var lat = {!! json_encode($lat) !!};

        var map = new mapboxgl.Map({
            container: 'map',
            // style: 'mapbox://styles/edgerealty/clde93eip003001nm4dkn4izw',
            style: 'mapbox://styles/edgerealty/cldfzjqvo003r01lkn5msoiyu',
            // center: [55.220108, 25.111407], // starting position [lng, lat],
            // zoom: 11,
            center: [55.30253792885708,24.823567393047057],
            // center: [-103.5917, 40.6699],
            zoom: 9,
            // bearing:,
            pitch: 0.00,
            projection: 'mercator'
        });


        const coordinates = allpropertyfeatures.features[0].geometry.coordinates.slice();
        const name = allpropertyfeatures.features[0].properties.name;
        const priceLong = allpropertyfeatures.features[0].properties.priceLong;
        const route = allpropertyfeatures.features[0].properties.address;
        const image = allpropertyfeatures.features[0].properties.image;
        const image_url = allpropertyfeatures.features[0].properties.image_url;
        const slug_link = allpropertyfeatures.features[0].properties.slug_link;
        const id = allpropertyfeatures.features[0].properties.id;
        const bed = allpropertyfeatures.features[0].properties.bed;
        const bath = allpropertyfeatures.features[0].properties.bath;
        const area = allpropertyfeatures.features[0].properties.area;
        const description = allpropertyfeatures.features[0].properties.description;

        const popup = new mapboxgl.Popup({ closeOnClick: false })
            .setLngLat([long, lat])
            .setHTML(`
                <div class="card bg-black rounded-0 py-0" style="max-width: 540px; ">
                    <div class="row p-0">
                        <div class="col-md-5 p-0">
                            <a href="{{url('en/dubai-property/${slug_link}')}}" >
                                <img src="{{ URL::asset('${image_url}') }}" style="height: 100%; width: 100%" class="card-img-top rounded-0 pe-1" alt="${image}"/>
                            </a>
                        </div>
                        <div class="col-md-7 p-0">
                            <span class="card-title fw-bold" style="
                                font-size: 1.4em !important;
                                line-height: 1.1 !important;
                                margin-top: 10px !important;
                                text-align: justify !important;
                                ">
                                ${priceLong}
                            </span>

                            <br>
                            <br>

                            <span class="card-text"
                                    style="
                                    font-size: 1em !important;
                                    line-height: 1.1 !important;
                                    margin-top: 10px !important;
                                    text-align: justify !important;
                                    text-decoration: underline !important;
                                "
                            >
                                ${route}
                            </span>

                            <br>
                            <br>
                            <span class="card-text"
                                    style="
                                    font-size: 1em !important;
                                    line-height: 1.1 !important;
                                    margin-top: 10px !important;
                                    text-align: justify !important;
                                "
                            >
                                ${name}
                            </span>

                            <br>
                            <br>

                            <span class="card-text"
                                    style="
                                    font-size: 1em !important;
                                    line-height: 1.1 !important;
                                    margin-top: 10px !important;
                                    text-align: justify !important;
                                "
                            >
                                    ${bed} Bed  :  ${bath} Bath  : ${area} Sq. Ft
                            </span>
                        </div>
                    </div>

                </div>
            `)
            .addTo(map);


        new mapboxgl.Marker(el)
            .setLngLat([long, lat])
            .setPopup(popup) // sets a popup on this marker
            .addTo(map);


        map.addControl(new mapboxgl.NavigationControl());

    </script>

@endsection
