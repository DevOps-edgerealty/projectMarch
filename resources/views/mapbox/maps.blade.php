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

    {{-- <div class='sidebar'>
        <div class='heading'>
            <h1>OUR PROPERTIES</h1>
        </div>
        <div id='listings' class='listings'></div>

        <div id='listings' class='listings'>
        </div>
    </div> --}}

    <div id='map' class="map" style='width: 100%; height: 100vh'></div>


    {{-- {{ json_encode($allfeatures)}} --}}


    <script>

        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';

        // var allpropertyfeatures = {!! json_encode($allfeatures) !!};

        // var map = new mapboxgl.Map({
        //     container: 'map',
        //     style: 'mapbox://styles/edgerealty/clcua390700ab14mqppduwm8p',
        //     center: [-77.034084142948, 38.909671288923], // starting position [lng, lat],
        //     zoom: 7
        // });

        var map = new mapboxgl.Map({
            container: 'map',
            // style: 'mapbox://styles/edgerealty/clde93eip003001nm4dkn4izw',
            style: 'mapbox://styles/edgerealty/cldfzjqvo003r01lkn5msoiyu',
            // center: [55.220108, 25.111407], // starting position [lng, lat],
            // zoom: 11,
            center: [55.220091, 25.060663],
            // center: [-103.5917, 40.6699],
            zoom: 11,
            bearing: -52.40,
            pitch: 0.00,
            projection: 'mercator'
        });





        const stores = {
            type: 'geojson',
            // data: allpropertyfeatures,
            data: '{{ URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson') }}',
            cluster: true,
            clusterMaxZoom: 14, // Max zoom to cluster points on
            clusterRadius: 50, // Radius of each cluster when clustering points (defaults to 50)
        };


        console.log(stores.data.features);




        stores.data.features.forEach(function (store, i) {
            store.properties.id = i;
        });





        function flyToStore(currentFeature) {
            map.flyTo({
                center: currentFeature.geometry.coordinates,
                zoom: 14
            });
        }





        function createPopUp(currentFeature) {
            const popUps = document.getElementsByClassName('mapboxgl-popup');
            /** Check if there is already a popup on the map and if so, remove it */
            // if (popUps[0]) popUps[0].remove();

            // const popup = new mapboxgl.Popup({ closeOnClick: false })
            //     .setLngLat(currentFeature.geometry.coordinates)
            //     .setHTML(`<h6>EDGE REALTY</h6><p>${currentFeature.properties.address}</p>`)
            //     .addTo(map);
        }





        map.on('click', (event) => {
            /* Determine if a feature in the "locations" layer exists at that point. */
            const features = map.queryRenderedFeatures(event.point, {
                layers: ['locations']
            });

            /* If it does not exist, return */
            if (!features.length) return;

            const clickedPoint = features[0];

            console.log(features);

            /* Fly to the point */
            flyToStore(clickedPoint);

            /* Close all other popups and display popup for clicked store */
            // createPopUp(clickedPoint);

            /* Highlight listing in sidebar (and remove highlight for all other listings) */
            const activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
                activeItem[0].classList.remove('active');
            }
            const listing = document.getElementById(
                `listing-${clickedPoint.properties.id}`
            );
            listing.classList.add('active');
        });





        function buildLocationList(stores) {
            for (const store of stores.data.features) {

                /* Add a new listing section to the sidebar. */
                const listings = document.getElementById('listings');
                const listing = listings.appendChild(document.createElement('div'));

                /* Assign a unique `id` to the listing. */
                listing.id = `listing-${store.properties.id}`;

                /* Assign the `item` class to each listing for styling. */
                listing.className = 'item';

                /* Add the link to the individual listing created above. */
                const link = listing.appendChild(document.createElement('a'));
                link.href = '#';
                link.className = 'title';
                link.id = `link-${store.properties.id}`;
                link.innerHTML = `${store.properties.address}`;

                /* Add details to the individual listing. */
                const details = listing.appendChild(document.createElement('div'));
                details.innerHTML = `${store.properties.city}`;

                if (store.properties.phone) {
                    details.innerHTML += ` · ${store.properties.phoneFormatted}`;
                }
                if (store.properties.distance) {
                    const roundedDistance = Math.round(store.properties.distance * 100) / 100;
                    details.innerHTML += `<div><strong>${roundedDistance} miles away</strong></div>`;
                }

                link.addEventListener('click', function () {
                    for (const feature of stores.features) {
                        if (this.id === `link-${feature.properties.id}`) {
                        flyToStore(feature);
                        createPopUp(feature);
                        }
                    }
                    const activeItem = document.getElementsByClassName('active');
                    if (activeItem[0]) {
                        activeItem[0].classList.remove('active');
                    }
                    this.parentNode.classList.add('active');
                });
            }
        }



        map.on('load', () => {
            /* Add the data to your map as a layer */
            map.addLayer({
                id: 'locations',
                type: 'circle',
                /* Add a GeoJSON source containing place coordinates and information. */
                source: {
                    type: 'geojson',
                    data: stores
                },
            });

            // map.addSource('places', {
            //     type: 'geojson',
            //     data: stores
            // });

            // addMarkers();

            buildLocationList(stores);



        });










        // add markers to map
        stores.features.forEach(function(marker) {

            // create a HTML element for each feature
            var el = document.createElement('div');
            el.className = 'marker';
            // el.className = 'item';
            el.style.width = marker.properties.iconSize[0] + 'px';
            el.style.height = marker.properties.iconSize[1] + 'px';

            // el.addEventListener('click', function() {
            //     window.alert(marker.properties.message);
            // });

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({closeOnClick: false, closeButton: false}).setText(`${marker.properties.address}`))
                .addTo(map)
                .togglePopup();
        });


        function addMarkers() {
            /* For each feature in the GeoJSON object above: */
            for (const marker of stores.features) {

                /* Create a div element for the marker. */
                const el = document.createElement('div');

                /* Assign a unique `id` to the marker. */
                el.id = `marker-${marker.properties.id}`;

                /* Assign the `marker` class to each marker for styling. */
                el.className = 'marker';

                /**
                 * Create a marker using the div element
                 * defined above and add it to the map.
                 **/
                new mapboxgl.Marker(el, { offset: [0, -23] })
                    .setLngLat(marker.geometry.coordinates)
                    .addTo(map);
            }
        }


        // stores.features.forEach(function(marker))

        map.on('click', (event) => {
            // If the user clicked on one of your markers, get its information.

            const features = map.queryRenderedFeatures(event.point, {
                layers: ['chicago-parks'] // replace with your layer name
            });



            if (!features.length) {
                return;
            }
            const feature = features[0];

            /*
                Create a popup, specify its options
                and properties, and add it to the map.
            */
            const popup = new mapboxgl.Popup({ offset: [0, -15] })
            .setLngLat(feature.geometry.coordinates)
            .setHTML(
                `<h5 style="color: #000 !important;">${feature.properties.title}</h5><p style="color: #000 !important; font-size: 14px !important; line-height: 1.3 !important;">${feature.properties.description}</p>`
            )


            .addTo(map);

            buildLocationList(features);

            // Code from the next step will go here.
        });

    </script>

@endsection
