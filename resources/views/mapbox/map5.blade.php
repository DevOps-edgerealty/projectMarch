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
                right: 0%;
                width: 100%;
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



    <div id='map' class="map" style='width: 100%; height: 100vh'></div>


    {{ json_encode($allfeatures) }}

<br>
<br>
{
    "type": "FeatureCollection",
    "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
    "features": [
    { "type": "Feature", "properties": { "STATION_NO": "E07", "COMMUNITY_NAME": "Expo Station", "STATION_NAME": "Expo Station", "LAT_STATION": 24.9633681281314, "LON_STATION": 55.146201157033303, "ROUTE": "Expo" }, "geometry": { "type": "Point", "coordinates": [ 55.146201157033303, 24.9633681281314 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G11", "COMMUNITY_NAME": "AL QUSAIS THIRD", "STATION_NAME": "Etisalat", "LAT_STATION": 25.2548051022099, "LON_STATION": 55.401007112089999, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.401007112089999, 25.2548051022099 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G12", "COMMUNITY_NAME": "AL QUSAIS SECOND", "STATION_NAME": "Al Qusais", "LAT_STATION": 25.2626590142929, "LON_STATION": 55.387476335906499, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.387476335906499, 25.2626590142929 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G13", "COMMUNITY_NAME": "AL QUSAIS FIRST", "STATION_NAME": "Dubai Airport Free Zone", "LAT_STATION": 25.269928721847698, "LON_STATION": 55.375009253901297, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.375009253901297, 25.269928721847698 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G14", "COMMUNITY_NAME": "AL QUSAIS FIRST", "STATION_NAME": "Al Nahda", "LAT_STATION": 25.273273519638298, "LON_STATION": 55.3693408984036, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.3693408984036, 25.273273519638298 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G15", "COMMUNITY_NAME": "AL QUSAIS FIRST", "STATION_NAME": "Stadium", "LAT_STATION": 25.277802143601999, "LON_STATION": 55.3615799355075, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.3615799355075, 25.277802143601999 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G16", "COMMUNITY_NAME": "AL TWAR FIRST", "STATION_NAME": "Al Qiyadah", "LAT_STATION": 25.277667358880301, "LON_STATION": 55.352764628124802, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.352764628124802, 25.277667358880301 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G17", "COMMUNITY_NAME": "AL KHABAISI", "STATION_NAME": "Abu Hail", "LAT_STATION": 25.275241585244199, "LON_STATION": 55.346267588138097, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.346267588138097, 25.275241585244199 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G18", "COMMUNITY_NAME": "AL KHABAISI", "STATION_NAME": "Abu Baker Al Siddique", "LAT_STATION": 25.270903837355998, "LON_STATION": 55.332983016961002, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.332983016961002, 25.270903837355998 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G19", "COMMUNITY_NAME": "AL KHABAISI", "STATION_NAME": "Salah Al Din", "LAT_STATION": 25.2703452035284, "LON_STATION": 55.3206686042492, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.3206686042492, 25.2703452035284 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G20", "COMMUNITY_NAME": "AL RIGGA", "STATION_NAME": "Union", "LAT_STATION": 25.266335620495799, "LON_STATION": 55.313902788853802, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.313902788853802, 25.266335620495799 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G21", "COMMUNITY_NAME": "AL RIGGA", "STATION_NAME": "Baniyas Square", "LAT_STATION": 25.269415877691699, "LON_STATION": 55.307602065776003, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.307602065776003, 25.269415877691699 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G22", "COMMUNITY_NAME": "", "STATION_NAME": "Gold Souq", "LAT_STATION": 25.276195589844001, "LON_STATION": 55.301777918385604, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.301777918385604, 25.276195589844001 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G23", "COMMUNITY_NAME": "AL RAS", "STATION_NAME": "Al Ras", "LAT_STATION": 25.268862237556402, "LON_STATION": 55.293727707874503, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.293727707874503, 25.268862237556402 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G24", "COMMUNITY_NAME": "AL SOUQ AL KABEER", "STATION_NAME": "Al Ghubaiba", "LAT_STATION": 25.2650853837246, "LON_STATION": 55.288953522221199, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.288953522221199, 25.2650853837246 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G25", "COMMUNITY_NAME": "MANKHOOL", "STATION_NAME": "Al Fahidi", "LAT_STATION": 25.2583014052076, "LON_STATION": 55.297558994148403, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.297558994148403, 25.2583014052076 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G26", "COMMUNITY_NAME": "AL KARAMA", "STATION_NAME": "BurJuman", "LAT_STATION": 25.254855735173301, "LON_STATION": 55.3042525286521, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.3042525286521, 25.254855735173301 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G27", "COMMUNITY_NAME": "OUD METHA", "STATION_NAME": "Oud Metha", "LAT_STATION": 25.243667163822899, "LON_STATION": 55.315956645388603, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.315956645388603, 25.243667163822899 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G28", "COMMUNITY_NAME": "UMM HURAIR SECOND", "STATION_NAME": "Dubai Health Care", "LAT_STATION": 25.2309030025053, "LON_STATION": 55.322866868879103, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.322866868879103, 25.2309030025053 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G29", "COMMUNITY_NAME": "AL JADAF", "STATION_NAME": "Al Jadaf", "LAT_STATION": 25.224977572299601, "LON_STATION": 55.333674346569602, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.333674346569602, 25.224977572299601 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "G30", "COMMUNITY_NAME": "AL JADAF", "STATION_NAME": "Creek", "LAT_STATION": 25.218948928265899, "LON_STATION": 55.3389528013223, "ROUTE": "Green" }, "geometry": { "type": "Point", "coordinates": [ 55.3389528013223, 25.218948928265899 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R11", "COMMUNITY_NAME": "AL RASHIDIYA", "STATION_NAME": "Rashidiya", "LAT_STATION": 25.2302229156378, "LON_STATION": 55.391198058160903, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.391198058160903, 25.2302229156378 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R12", "COMMUNITY_NAME": "AL GARHOUD", "STATION_NAME": "Emirates", "LAT_STATION": 25.241059374339098, "LON_STATION": 55.365726970030103, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.365726970030103, 25.241059374339098 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R13", "COMMUNITY_NAME": "DUBAI INT'L AIRPORT", "STATION_NAME": "Airport Terminal 3", "LAT_STATION": 25.245012664151702, "LON_STATION": 55.359525981441699, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.359525981441699, 25.245012664151702 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R14", "COMMUNITY_NAME": "DUBAI INT'L AIRPORT", "STATION_NAME": "Airport Terminal 1", "LAT_STATION": 25.2484279923512, "LON_STATION": 55.3524744810233, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.3524744810233, 25.2484279923512 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R15", "COMMUNITY_NAME": "AL GARHOUD", "STATION_NAME": "GGICO", "LAT_STATION": 25.249497122949101, "LON_STATION": 55.340033767055303, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.340033767055303, 25.249497122949101 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R16", "COMMUNITY_NAME": "PORT SAEED", "STATION_NAME": "Deira City Centre", "LAT_STATION": 25.254303650825399, "LON_STATION": 55.330077056259597, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.330077056259597, 25.254303650825399 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R17", "COMMUNITY_NAME": "AL MURAQQABAT", "STATION_NAME": "Al Rigga", "LAT_STATION": 25.263261140686801, "LON_STATION": 55.324122868900702, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.324122868900702, 25.263261140686801 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R18", "COMMUNITY_NAME": "AL RIGGA", "STATION_NAME": "Union", "LAT_STATION": 25.266335620495799, "LON_STATION": 55.313902788853802, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.313902788853802, 25.266335620495799 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R19", "COMMUNITY_NAME": "AL KARAMA", "STATION_NAME": "BurJuman", "LAT_STATION": 25.254855735173301, "LON_STATION": 55.3042525286521, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.3042525286521, 25.254855735173301 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R20", "COMMUNITY_NAME": "AL KARAMA", "STATION_NAME": "Abu Dhabi Commercial Bank", "LAT_STATION": 25.244493559729001, "LON_STATION": 55.298195986543497, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.298195986543497, 25.244493559729001 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R21", "COMMUNITY_NAME": "AL KIFAF", "STATION_NAME": "Al Jafiliya", "LAT_STATION": 25.233496843283302, "LON_STATION": 55.292131580607702, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.292131580607702, 25.233496843283302 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R22", "COMMUNITY_NAME": "TRADE CENTER SECOND", "STATION_NAME": "World Trade Centre", "LAT_STATION": 25.224828875157598, "LON_STATION": 55.285060983639099, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.285060983639099, 25.224828875157598 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R23", "COMMUNITY_NAME": "TRADE CENTER SECOND", "STATION_NAME": "Emirates Towers", "LAT_STATION": 25.217214466715401, "LON_STATION": 55.279820972138303, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.279820972138303, 25.217214466715401 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R24", "COMMUNITY_NAME": "TRADE CENTER SECOND", "STATION_NAME": "Financial Centre", "LAT_STATION": 25.211030168092801, "LON_STATION": 55.2755866549779, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.2755866549779, 25.211030168092801 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R25", "COMMUNITY_NAME": "", "STATION_NAME": "Burj Khalifa \/ Dubai Mall", "LAT_STATION": 25.2014008833475, "LON_STATION": 55.269518165901097, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.269518165901097, 25.2014008833475 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R26", "COMMUNITY_NAME": "", "STATION_NAME": "Business Bay", "LAT_STATION": 25.191274579750399, "LON_STATION": 55.260418558149603, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.260418558149603, 25.191274579750399 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R29", "COMMUNITY_NAME": "AL QUOZ IND. FIRST", "STATION_NAME": "Noor Bank", "LAT_STATION": 25.155727126445999, "LON_STATION": 55.228508721671503, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.228508721671503, 25.155727126445999 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R31", "COMMUNITY_NAME": "AL QUOZ IND. THIRD", "STATION_NAME": "FGB", "LAT_STATION": 25.126721479884999, "LON_STATION": 55.207898000868099, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.207898000868099, 25.126721479884999 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R32", "COMMUNITY_NAME": "AL QUOZ IND. THIRD", "STATION_NAME": "Mall of the Emirates", "LAT_STATION": 25.121231270560699, "LON_STATION": 55.200443193545397, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.200443193545397, 25.121231270560699 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R33", "COMMUNITY_NAME": "AL BARSHA FIRST", "STATION_NAME": "Mashreq", "LAT_STATION": 25.1148094971836, "LON_STATION": 55.1909310963335, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.1909310963335, 25.1148094971836 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R34", "COMMUNITY_NAME": "EMIRATES HILL SECOND", "STATION_NAME": "Dubai Internet City", "LAT_STATION": 25.102095496372701, "LON_STATION": 55.173781467906103, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.173781467906103, 25.102095496372701 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R35", "COMMUNITY_NAME": "EMIRATES HILL SECOND", "STATION_NAME": "Nakheel", "LAT_STATION": 25.088916889510202, "LON_STATION": 55.158026285693602, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.158026285693602, 25.088916889510202 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R36", "COMMUNITY_NAME": "EMIRATES HILL FIRST", "STATION_NAME": "DAMAC", "LAT_STATION": 25.079929079358799, "LON_STATION": 55.147522713994299, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.147522713994299, 25.079929079358799 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R37", "COMMUNITY_NAME": "EMIRATES HILL FIRST", "STATION_NAME": "DMCC", "LAT_STATION": 25.070824345125398, "LON_STATION": 55.138672670031902, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.138672670031902, 25.070824345125398 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R38", "COMMUNITY_NAME": "", "STATION_NAME": "Jabal Ali", "LAT_STATION": 25.057853068537501, "LON_STATION": 55.127173450259299, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.127173450259299, 25.057853068537501 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R39", "COMMUNITY_NAME": "", "STATION_NAME": "Ibn Battuta", "LAT_STATION": 25.046725855619499, "LON_STATION": 55.1175279089437, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.1175279089437, 25.046725855619499 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R40", "COMMUNITY_NAME": "", "STATION_NAME": "Energy", "LAT_STATION": 25.0262906333183, "LON_STATION": 55.101247438110299, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.101247438110299, 25.0262906333183 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R41", "COMMUNITY_NAME": "JEBEL ALI IND.", "STATION_NAME": "Danube", "LAT_STATION": 25.001291055166899, "LON_STATION": 55.0956978985296, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.0956978985296, 25.001291055166899 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R42", "COMMUNITY_NAME": "", "STATION_NAME": "UAE Exchange", "LAT_STATION": 24.977524324382099, "LON_STATION": 55.091040890658199, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.091040890658199, 24.977524324382099 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R70", "COMMUNITY_NAME": "", "STATION_NAME": "Station R70", "LAT_STATION": 25.0434380845794, "LON_STATION": 55.135050795473298, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.135050795473298, 25.0434380845794 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R71", "COMMUNITY_NAME": "", "STATION_NAME": "Stations R71", "LAT_STATION": 25.0352240803185, "LON_STATION": 55.145318168377898, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.145318168377898, 25.0352240803185 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R72", "COMMUNITY_NAME": "", "STATION_NAME": "Stations R72", "LAT_STATION": 25.0304517839174, "LON_STATION": 55.152194156178297, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.152194156178297, 25.0304517839174 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R73", "COMMUNITY_NAME": "", "STATION_NAME": "Station R73", "LAT_STATION": 25.017796814205401, "LON_STATION": 55.163351403859402, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.163351403859402, 25.017796814205401 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R74", "COMMUNITY_NAME": "", "STATION_NAME": "Station R74", "LAT_STATION": 25.005796166597602, "LON_STATION": 55.155841065527298, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.155841065527298, 25.005796166597602 ] } },
    { "type": "Feature", "properties": { "STATION_NO": "R75", "COMMUNITY_NAME": "", "STATION_NAME": "Station R75", "LAT_STATION": 24.9840139598227, "LON_STATION": 55.149135501371099, "ROUTE": "Red" }, "geometry": { "type": "Point", "coordinates": [ 55.149135501371099, 24.9840139598227 ] } }
    ]
}


    <script>


        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';

        var allpropertyfeatures = {!! json_encode($allfeatures) !!};

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/edgerealty/cldfzjqvo003r01lkn5msoiyu',
            center: [55.220091, 25.060663],
            zoom: 11,
            bearing: -52.40,
            pitch: 0.00,
            projection: 'mercator'
        });

        // const earthquakes = {
        //     type: 'geojson',
        //     data: allpropertyfeatures,
        //     cluster: true,
        //     clusterMaxZoom: 14, // Max zoom to cluster points on
        //     clusterRadius: 50, // Radius of each cluster when clustering points (defaults to 50)
        // };

        // console.log(earthquakes);


        map.on('load', () => {
            // Add a new source from our GeoJSON data and
            // set the 'cluster' option to true. GL-JS will
            // add the point_count property to your source data.
            map.addSource('earthquakes', {
                type: 'geojson',
                // Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
                // from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
                data: allpropertyfeatures,
                cluster: true,
                clusterMaxZoom: 14, // Max zoom to cluster points on
                clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
            });

            // console.log(source);

            map.addLayer({
                id: 'clusters',
                type: 'circle',
                source: 'earthquakes',
                filter: ['has', 'point_count'],
                paint: {
                    // Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
                    // with three steps to implement three types of circles:
                    //   * Blue, 20px circles when point count is less than 100
                    //   * Yellow, 30px circles when point count is between 100 and 750
                    //   * Pink, 40px circles when point count is greater than or equal to 750
                    'circle-color': [
                        'step',
                        ['get', 'point_count'],
                        '#000',
                        100,
                        '#000',
                        750,
                        '#000'
                    ],
                    'circle-radius': [
                        'step',
                        ['get', 'point_count'],
                        20,
                        100,
                        30,
                        750,
                        40
                    ]
                }
            });

            map.addLayer({
                id: 'cluster-count',
                type: 'symbol',
                source: 'earthquakes',
                filter: ['has', 'point_count'],
                layout: {
                'text-field': ['get', 'point_count_abbreviated'],
                'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                'text-size': 12
                }
                });

                map.addLayer({
                id: 'unclustered-point',
                type: 'circle',
                source: 'earthquakes',
                filter: ['!', ['has', 'point_count']],
                paint: {
                'circle-color': '#11b4da',
                'circle-radius': 4,
                'circle-stroke-width': 1,
                'circle-stroke-color': '#fff'
                }
                });

                // inspect a cluster on click
                map.on('click', 'clusters', (e) => {
                const features = map.queryRenderedFeatures(e.point, {
                layers: ['clusters']
                });
                const clusterId = features[0].properties.cluster_id;
                map.getSource('earthquakes').getClusterExpansionZoom(
                clusterId,
                (err, zoom) => {
                if (err) return;

                map.easeTo({
                center: features[0].geometry.coordinates,
                zoom: zoom
                });
                }
                );
                });

                // When a click event occurs on a feature in
                // the unclustered-point layer, open a popup at
                // the location of the feature, with
                // description HTML from its properties.
                map.on('click', 'unclustered-point', (e) => {
                const coordinates = e.features[0].geometry.coordinates.slice();
                const mag = e.features[0].properties.mag;
                const tsunami =
                e.features[0].properties.tsunami === 1 ? 'yes' : 'no';

                // Ensure that if the map is zoomed out such that
                // multiple copies of the feature are visible, the
                // popup appears over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(
                .setHTML(
                        `
                            <h1>${price}</h1>

                            <p style="
                            font-size: 1.3em !important;
                            line-height: 1 !important;
                            ">
                                ${route}
                            </p>

                            <p style="
                                font-size: 1em !important;
                                line-height: 1.1 !important;
                                margin-top: 10px !important;
                                text-align: justify !important;
                            ">
                                ${name}
                            </p>
                        `
                    )
                )
                .addTo(map);
                });

                map.on('mouseenter', 'clusters', () => {
                map.getCanvas().style.cursor = 'pointer';
                });
                map.on('mouseleave', 'clusters', () => {
                map.getCanvas().style.cursor = '';
                });
        });









    </script>

    <script>
	    // mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';
        // const map = new mapboxgl.Map({
        // container: 'map',
        // // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        // style: 'mapbox://styles/mapbox/dark-v11',
        // center: [-103.5917, 40.6699],
        // zoom: 3
        // });

        // map.on('load', () => {
        // // Add a new source from our GeoJSON data and
        // // set the 'cluster' option to true. GL-JS will
        // // add the point_count property to your source data.
        // map.addSource('earthquakes', {
        // type: 'geojson',
        // // Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
        // // from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
        // data: 'https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson',
        // cluster: true,
        // clusterMaxZoom: 14, // Max zoom to cluster points on
        // clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
        // });

        // map.addLayer({
        // id: 'clusters',
        // type: 'circle',
        // source: 'earthquakes',
        // filter: ['has', 'point_count'],
        // paint: {
        // // Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
        // // with three steps to implement three types of circles:
        // //   * Blue, 20px circles when point count is less than 100
        // //   * Yellow, 30px circles when point count is between 100 and 750
        // //   * Pink, 40px circles when point count is greater than or equal to 750
        // 'circle-color': [
        // 'step',
        // ['get', 'point_count'],
        // '#51bbd6',
        // 100,
        // '#f1f075',
        // 750,
        // '#f28cb1'
        // ],
        // 'circle-radius': [
        // 'step',
        // ['get', 'point_count'],
        // 20,
        // 100,
        // 30,
        // 750,
        // 40
        // ]
        // }
        // });

        // map.addLayer({
        // id: 'cluster-count',
        // type: 'symbol',
        // source: 'earthquakes',
        // filter: ['has', 'point_count'],
        // layout: {
        // 'text-field': ['get', 'point_count_abbreviated'],
        // 'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
        // 'text-size': 12
        // }
        // });

        // map.addLayer({
        // id: 'unclustered-point',
        // type: 'circle',
        // source: 'earthquakes',
        // filter: ['!', ['has', 'point_count']],
        // paint: {
        // 'circle-color': '#11b4da',
        // 'circle-radius': 4,
        // 'circle-stroke-width': 1,
        // 'circle-stroke-color': '#fff'
        // }
        // });

        // // inspect a cluster on click
        // map.on('click', 'clusters', (e) => {
        // const features = map.queryRenderedFeatures(e.point, {
        // layers: ['clusters']
        // });
        // const clusterId = features[0].properties.cluster_id;
        // map.getSource('earthquakes').getClusterExpansionZoom(
        // clusterId,
        // (err, zoom) => {
        // if (err) return;

        // map.easeTo({
        // center: features[0].geometry.coordinates,
        // zoom: zoom
        // });
        // }
        // );
        // });

        // // When a click event occurs on a feature in
        // // the unclustered-point layer, open a popup at
        // // the location of the feature, with
        // // description HTML from its properties.
        // map.on('click', 'unclustered-point', (e) => {
        // const coordinates = e.features[0].geometry.coordinates.slice();
        // const mag = e.features[0].properties.mag;
        // const tsunami =
        // e.features[0].properties.tsunami === 1 ? 'yes' : 'no';

        // // Ensure that if the map is zoomed out such that
        // // multiple copies of the feature are visible, the
        // // popup appears over the copy being pointed to.
        // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        // coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        // }

        // new mapboxgl.Popup()
        // .setLngLat(coordinates)
        // .setHTML(
        // `magnitude: ${mag}<br>Was there a tsunami?: ${tsunami}`
        // )
        // .addTo(map);
        // });

        // map.on('mouseenter', 'clusters', () => {
        // map.getCanvas().style.cursor = 'pointer';
        // });
        // map.on('mouseleave', 'clusters', () => {
        // map.getCanvas().style.cursor = '';
        // });
        // });
    </script>
@endsection
