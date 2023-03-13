
@extends('layout.master')
@section('content')
<style>
  p{
    line-height: 1.6 !important;
  }
</style>

<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$seg1 = $uri_segments[1];
if($seg1 == 'en' || $seg1 == 'ar')
{
$langSeg = $uri_segments[1];
}
else
{
$langSeg = 'en';
}
?>
<!-- Event snippet for Submit lead form from Website conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-697745610/cftWCLiXm-kCEMqB28wC'});
</script>

<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    {{-- <h3>Thank You</h3> --}}
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>



<section class="mt-5 mb-5 bg-light">
    <div class="container d-flex flex-column h-50 my-auto">
        <div class="row my-auto">
            <div class="col-lg-12 mx-auto">
                <div class="text-dark mx-auto text-center" style="font-size: 1.5rem !important;" role="alert">
                    <img src="{{ URL::asset('public/assets/asset/ty.png') }}" style="max-height: 100px !important; max-width: 100px !important;" class="card-img-top rounded-0 text-center mx-auto my-3" alt="..." />
                    <b>Thank You For Submitting Your Information!</b><br>
                    We have received your request and will get back to you shortly.
                    <br>
                    <a href="{{url( $langSeg .'/') }}" class="btn btn-outline-dark text-dark rounded-0 my-4">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        &nbsp;
                        See More Properties
                    </a>

                    <p style="font-size: .9rem !important;" >
                        If you have any issues
                        <a href="tel:0097143881856" class="fw-bolder text-dark">
                            contact us
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>



@endsection
