<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Edge Realty - @yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- Mapbox GL --}}
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <link
    href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css"
    rel="stylesheet"
    />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css"
    type="text/css"
    />

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/plugins/summernote/summernote-bs4.css')}}">
    <script src="https://cdn.tiny.cloud/1/ozwjgvjqccr9ar3gc14ts7dtrls72o06oi4ezriojf5gi023/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>


</head>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">

              <span class="fa fa-user"></span>
              <i class="fas fa-caret-down"></i>
            </a>
            @php
                $userId = \Auth::user()->id;
                $userName = \Auth::user()->name;
            @endphp
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

              <div class="dropdown-divider"></div>
              <a href="" class="dropdown-item">
                <i class="fas fa-user"> </i> {{$userName}}
              </a>
              <a href="{{url('/admin/user/edit' .'/'. $userId )}}" class="dropdown-item">
                <i class="fas fa-user"> </i> Profile
              </a>
              <a href="{{url('/logout')}}" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
              </a>

            </div>
          </li>

        </ul>
      </nav>
      <!-- /.navbar -->
