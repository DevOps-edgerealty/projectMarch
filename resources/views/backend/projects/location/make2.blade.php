@extends('backend.layouts.master')


@section('content')

<style>
    body { margin: 0; padding: 0; height: 100%}
    #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    .coordinates {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        position: absolute;
        bottom: 40px;
        left: 10px;
        padding: 5px 10px;
        margin: 0;
        font-size: 11px;
        line-height: 18px;
        border-radius: 3px;
        display: none;
    }
    .card{
        height: 500px;
        width: 100%;
    }
</style>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Locations</h1>
            <p>
                Search the required location, then drag and drop the marker on the highlighted zone to confirm the coordinates to be submited.
            </p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Locations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card rounded-0" style="height: 100px; ">
                    <div class="card-body">
                        <h4 class="mx-0">
                            {{$projects->title_en}}
                            {{$projects->id}}
                        </h4>
                        <form  method="POST" action="{{url('admin/projects/location/update-create/')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="properties_id" value="{{ $projects->id }}">
                            <div class="row my-3">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-text bg-black text-white rounde-0">Longitude</span>
                                            <input type="text" aria-label="coordinate_lng" id="coordinate_lng" name="coordinate_lng" class="form-control rounded-0">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-text bg-black text-white rounde-0">Latitude</span>
                                            <input type="text" aria-label="coordinate_lat" id="coordinate_lat" name="coordinate_lat" class="form-control rounded-0">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-block bg-black rounded-0">
                                            Submit
                                        </button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body h-100 w-100 px-0">

                        <div id="map"></div>
                        <pre id="coordinates" class="coordinates"></pre>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWRnZXJlYWx0eSIsImEiOiJjbGNvcnE3eDgwYzBvM3JsYTB4dXpxa3I3In0.prc7SeJwtNYofG3O-fv61w';
        const coordinates = document.getElementById('coordinates');
        const map = new mapboxgl.Map({
            container: 'map',
            // style: 'mapbox://styles/edgerealty/clde93eip003001nm4dkn4izw',
            style: 'mapbox://styles/edgerealty/cldfzjqvo003r01lkn5msoiyu',
            // center: [55.220108, 25.111407], // starting position [lng, lat],
            // zoom: 11,
            center: [55.220091, 25.060663],
            // center: [-103.5917, 40.6699],
            zoom: 11,
            bearing: -52.40
,
            pitch: 0.00,
            projection: 'mercator'
        });

        const marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([55.17403938253406, 25.042732885964256])
        .addTo(map);

        // const marker = new mapboxgl.Marker() // Initialize a new marker
        // .setLngLat([-122.25948, 37.87221]) // Marker [lng, lat] coordinates
        // .addTo(map); // Add the marker to the map

        const geocoder = new MapboxGeocoder({
        // Initialize the geocoder
        accessToken: mapboxgl.accessToken, // Set the access token
        mapboxgl: mapboxgl, // Set the mapbox-gl instance
        marker: false, // Do not use the default marker style
        placeholder: 'Search for places in Berkeley', // Placeholder text for the search bar
        bbox: [54.849215, 24.973704, 55.779991, 25.171733], // Boundary for Berkeley
        proximity: {
            longitude: -122.25948,
            latitude: 37.87221
        }, // Coordinates of UC Berkeley
        zoom: 12
        });

        // Add the geocoder to the map
        map.addControl(geocoder);

        // After the map style has loaded on the page,
        // add a source layer and default styling for a single point
        map.on('load', () => {
        map.addSource('single-point', {
        'type': 'geojson',
        'data': {
        'type': 'FeatureCollection',
        'features': []
        }
        });

        map.addLayer({
        'id': 'point',
        'source': 'single-point',
        'type': 'circle',
        'paint': {
        'circle-radius': 10,
        'circle-color': '#448ee4'
        }
        });

        // Listen for the `result` event from the Geocoder // `result` event is triggered when a user makes a selection
        //  Add a marker at the result's coordinates
        geocoder.on('result', (event) => {
            map.getSource('single-point').setData(event.result.geometry);
            });
        });

        function onDragEnd() {
            const lngLat = marker.getLngLat();
            coordinates.style.display = 'block';
            coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
            document.getElementById('coordinate_lng').value = lngLat.lng;
            document.getElementById('coordinate_lat').value = lngLat.lat;
        }

        marker.on('dragend', onDragEnd);
    </script>
@endsection
