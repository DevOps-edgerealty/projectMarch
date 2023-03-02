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


    <section>
        <div class="container">
            <div class="row py-5"></div>
            <div class="row mx-auto mb-3">
                <span class=" mx-auto text-center d-md-block d-block d-lg-none" style="font-size: 1.3rem">
                    DUBAI PROPERTIES
                </span>

                <span class=" mx-auto text-center d-md-block d-lg-block d-none" style="font-size: 1.8rem">
                    DUBAI PROPERTIES
                </span>
            </div>
        </div>
    </section>
    </section>
    <div id='map' class="map" style='width: 100%; height: 100vh'></div>

    <script>


        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';

        var allpropertyfeatures = {!! json_encode($allfeatures) !!};

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

        const earthquakes = {
            type: 'geojson',
            // Points to a file stored within the Laravel Storage folder under Apps/Images/properties.geojson
            // data: 'https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson',
            // data: '{{ URL::asset('storage/app/publicGeospatial/properties2.geojson') }}',
            // data: 'public/assets/asset/geojson/dubai_metro_stations.geojson',
            // data: '{{ URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson') }}',
            // data: {
                //     'type': 'FeatureCollection',
                //     'features': [
                //     {
                //         'type': 'Feature',
                //         'geometry': {
                //             'type': 'Point',
                //             'coordinates': [-77.032, 38.913, 46.41]
                //         },
                //         'properties': {
                //             'title': 'Mapbox',
                //             'description': 'Washington, D.C.'
                //         }
                //     },
                //     {
                //         'type': 'Feature',
                //         'geometry': {
                //             'type': 'Point',
                //             'coordinates': [-122.414, 37.776, 104.5]
                //         },
                //         'properties': {
                //             'title': 'Mapbox',
                //             'description': 'San Francisco, California'
                //         }
                //     }
                //     ]
            // },
            data: '{{ URL::asset('public/assets/asset/geojson/dubai_metro_stations.geojson') }}',
            cluster: true,
            clusterMaxZoom: 14, // Max zoom to cluster points on
            clusterRadius: 50, // Radius of each cluster when clustering points (defaults to 50)
        };

        console.log(earthquakes);

        earthquakes.data.features.forEach(function (store, i) {
            store.properties.COMM_NUM = i;
        });

        function flyToStore(currentFeature) {
            map.flyTo({
                center: currentFeature.geometry.coordinates,
                zoom: 14
            });
        }

        // function buildLocationList(stores) {
        //     for (const store of stores.features) {

        //         /* Add a new listing section to the sidebar. */
        //         const listings = document.getElementById('listings');
        //         const listing = listings.appendChild(document.createElement('div'));

        //         /* Assign a unique `id` to the listing. */
        //         listing.id = `listing-${store.properties.id}`;

        //         /* Assign the `item` class to each listing for styling. */
        //         listing.className = 'item';

        //         /* Add the link to the individual listing created above. */
        //         const link = listing.appendChild(document.createElement('a'));
        //         link.href = '#';
        //         link.className = 'title';
        //         link.id = `link-${store.properties.id}`;
        //         link.innerHTML = `${store.properties.name}`;

        //         /* Add details to the individual listing. */
        //         const details = listing.appendChild(document.createElement('div'));
        //         details.innerHTML = `${store.properties.city}`;

        //         if (store.properties.phone) {
        //             details.innerHTML += ` · ${store.properties.phoneFormatted}`;
        //         }
        //         if (store.properties.distance) {
        //             const roundedDistance = Math.round(store.properties.distance * 100) / 100;
        //             details.innerHTML += `<div><strong>${roundedDistance} miles away</strong></div>`;
        //         }

        //         link.addEventListener('click', function () {
        //             for (const feature of earthquakes.features) {
        //                 if (this.id === `link-${feature.properties.id}`) {
        //                     flyToStore(feature);
        //                     // createPopUp(feature);
        //                 }
        //             }
        //             const activeItem = document.getElementsByClassName('active');
        //             if (activeItem[0]) {
        //                 activeItem[0].classList.remove('active');
        //             }
        //             this.parentNode.classList.add('active');
        //         });
        //     }
        // }

        map.on('load', () => {
            // Add a new source from our GeoJSON data and
            // set the 'cluster' option to true. GL-JS will
            // add the point_count property to your source data

            map.addSource('earthquakes', earthquakes);

            // map.addSource('properties', {
            //     type: 'geojson',
            //     data: allpropertyfeatures,
            //     cluster: true,
            //     clusterMaxZoom: 14, // Max zoom to cluster points on
            //     clusterRadius: 50, // Radius of each cluster when clustering points (defaults to 50)
            // });

            // console.log(earthquakes);

            map.addLayer({
                id: 'clusters',
                type: 'circle',
                source: 'earthquakes',
                filter: ['has', 'point_count'],
                paint: {
                    // "text-color": '#fff',
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
                        20,     //radius
                        100,    //count of the points
                        30,     //radius
                        750,    //count of the points
                        35,     //radius
                        1000,   //count of the points
                        40      //radius
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
                    'text-size': 14,

                },
                paint: {
                    'text-color': '#ffffff',
                }
            });

            // map.addLayer({
            //         id: 'unclustered-point',
            //         type: 'circle',
            //         source: 'earthquakes',
            //         filter: ['!', ['has', 'point_count']],
            //         paint: {
            //             'circle-color': '#000',
            //             'circle-radius': 4,
            //             'circle-stroke-width': 1,
            //             'circle-stroke-color': '#fff',
            //         }
            // });


            map.addLayer({
                id: 'unclustered-point',
                type: 'symbol',
                source: 'earthquakes',
                filter: ['!', ['has', 'point_count']],
                layout: {
                    "icon-allow-overlap": true,
                    'text-field': ['get', 'CNAME_E'],
                    'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                    'text-size': 16,
                    "text-transform": "uppercase",
                    "text-letter-spacing": 0.0,
                    "text-offset": [0, 1.0],
                    'icon-allow-overlap': true,
                    "icon-image": "accessible",
                    "icon-size": 3,

                },
                paint: {
                    'text-color': '#fff',
                    "text-halo-color": "#000",
                    "text-halo-width": 30,

                    // 'text-halo-style': "rectangle",

                    // 'fill-color': 'white'
                    // 'fill-color': '#000',
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
                // Copy coordinates array.
                const coordinates = e.features[0].geometry.coordinates.slice();
                const name = e.features[0].properties.name;
                const priceLong = e.features[0].properties.priceLong;
                const route = e.features[0].properties.address;
                const image = e.features[0].properties.image;
                const image_url = e.features[0].properties.image_url;
                const slug_link = e.features[0].properties.slug_link;
                const id = e.features[0].properties.id;
                const bed = e.features[0].properties.bed;
                const bath = e.features[0].properties.bath;
                const area = e.features[0].properties.area;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                /**
                 * Design the property cards on popup using bootstrap CSS
                 * and standard CSS
                */
                popup
                .setLngLat(coordinates)
                .setHTML(
                    `
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
                                        Bed: ${bed} | Bath: ${bath} | Area: ${area} Sq. Ft
                                    </span>
                                </div>
                            </div>

                        </div>
                    `
                )
                .addTo(map)
                .togglePopup();;
            });






            const popup = new mapboxgl.Popup({
                closeButton: false,
                closeOnClick: true
            });


            map.on('mouseenter', 'unclustered-point', (e) => {
                // Change the cursor style as a UI indicator.
                map.getCanvas().style.cursor = 'pointer';

                // Copy coordinates array.
                const coordinates = e.features[0].geometry.coordinates.slice();
                const name = e.features[0].properties.name;
                const priceLong = e.features[0].properties.priceLong;
                const route = e.features[0].properties.address;
                const slug_link = e.features[0].properties.slug_link;
                const id = e.features[0].properties.id;
                const bed = e.features[0].properties.bed;
                const bath = e.features[0].properties.bath;
                const area = e.features[0].properties.area;

                // image variables
                const image = e.features[0].properties.image;
                const image_url = e.features[0].properties.image_url;

                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                popup
                .setLngLat(coordinates)
                .setHTML(
                    `
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
                                        Bed: ${bed} | Bath: ${bath} | Area: ${area} Sq. Ft
                                    </span>
                                </div>
                            </div>

                        </div>
                    `
                )
                .addTo(map);
            });






            // map.on('mouseleave', 'clusters', () => {
            //     map.getCanvas().style.cursor = '';
            //     popup.remove();
            // });

            // console.log(earthquakes);

            // buildLocationList(earthquakes);


            map.setFog({
                color: 'rgb(186, 210, 235)', // Lower atmosphere
                'high-color': 'rgb(36, 92, 223)', // Upper atmosphere
                'horizon-blend': 0.02, // Atmosphere thickness (default 0.2 at low zooms)
                'space-color': 'rgb(11, 11, 25)', // Background color
                'star-intensity': 0.35 // Background star brightness (default 0.35 at low zoooms )
            });

        });







    </script>

@endsection
