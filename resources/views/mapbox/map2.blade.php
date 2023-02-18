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
                color: #fff;
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
                width: 20%;
                height: 100vh;
                top: 98px;
                right: 0;
                overflow: scroll;
                /* z-index: -100; */
                border-right: 1px solid rgba(0, 0, 0, 0.25);
            }

            .map {
                position: absolute;
                right: 20%;
                width: 80%;
                height: 100vh;
                top: 0;
                bottom: 0;
            }

            .heading {
                background: #000;
                border-bottom: 1px solid #eee;
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
                max-width: 180px;
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
                background-image: url({{asset('public/assets/asset/map/2.png')}});
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

        </style>
@endsection



@section('content')

    <div class='sidebar's>
        <div class='heading'>
            <h1>OUR PROPERTIES</h1>
        </div>
        <div id='listings' class='listings'></div>

        <div id='listings' class='listings'>
        </div>
    </div>

    <div id='map' class="map" style='width: 100%; height: 100vh'></div>


    <script>

        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';

        var map = new mapboxgl.Map({
            container: 'map',
            // style: 'mapbox://styles/edgerealty/clde93eip003001nm4dkn4izw',
            // center: [55.220108, 25.111407], // starting position [lng, lat],
            // zoom: 11,
            // center: [-96, 37.8],
            // zoom: 3,
            // bearing: -52.40,
            // pitch: 0.00,

            style: 'mapbox://styles/edgerealty/cldfzjqvo003r01lkn5msoiyu',
            center: [55.220091, 25.060663],
            zoom: 11,
            bearing: -52.40,
            pitch: 0.00,
            projection: 'mercator'
        });


        // const geojson = {
        //     'type': 'FeatureCollection',
        //     'features': [
        //     {
        //         'type': 'Feature',
        //         'geometry': {
        //         'type': 'Point',
        //         'coordinates': [-77.032, 38.913]
        //         },
        //         'properties': {
        //         'title': 'Mapbox',
        //         'description': 'Washington, D.C.'
        //         }
        //     },
        //     {
        //         'type': 'Feature',
        //         'geometry': {
        //         'type': 'Point',
        //         'coordinates': [-122.414, 37.776]
        //         },
        //         'properties': {
        //         'title': 'Mapbox',
        //         'description': 'San Francisco, California'
        //         }
        //     }
        //     ]
        // };

        const geojson = {
            type: 'geojson',
            data: allpropertyfeatures,
            cluster: true,
            clusterMaxZoom: 14, // Max zoom to cluster points on
            clusterRadius: 50, // Radius of each cluster when clustering points (defaults to 50)
        };






        // add markers to map
        for (const feature of geojson.features) {
            // create a HTML element for each feature
            const el = document.createElement('div');
            el.className = 'marker';

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
            .setLngLat(feature.geometry.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                .setHTML(
                    `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                )
            )
            .addTo(map);
        }




    </script>

@endsection
