<style>
  p{
    line-height: 1.6 !important;
  }
</style>
@extends('layout.master')
<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

        <title> Book A Viewing | Edge Realty Real Estate  </title>
        <meta name="description" content="Explore properties for sale and rent in Dubai with edgerealty. We have a wide range of villas, apartments, and commercials with complete verified "/>
        <meta name="keywords" content=" Contact us, get in touch , message us, connect us "/>


@endsection

@section('content')

<section>
    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3>{{ trans('frontLang.bookaviewing') }}</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
</section>

<section class="mt-5">
    <div class="container">

        <h3 class="text-center">{{ trans('frontLang.bookaviewing') }}</h3>

    </div>
</section>


<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-md-3">
                <form class="contact-form" method="post" action="{{URL('/book_viewing/submit')}}">
                    @csrf
                    @honeypot
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <label for=""> {{ trans('frontLang.date') }}</h3></label>
                                <input name="book_date" type="date" class="form-control form-control-lg"  name="viewing Date">

                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ trans('frontLang.Time') }}</label>
                                <select name="book_time" id="cars" class="form-control form-control-lg" >
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 AM">12:00 AM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="2:00 PM">2:00 PM</option>
                                    <option value="3:00 PM">3:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                    <option value="5:00 PM">5:00 PM</option>
                                    <option value="6:00 PM">6:00 PM</option>
                                    <option value="7:00 PM">7:00 PM</option>
                                    <option value="8:00 PM">8:00 PM</option>
                                    <option value="9:00 PM">9:00 PM</option>

                                </select>
                            </div>
                        </div>

                        <div class=" mb-4">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="{{ trans('frontLang.fullname') }}"  required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="{{ trans('frontLang.phone') }}" required />

                        </div>

                        <!-- Email input -->
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="{{ trans('frontLang.email') }}" required />

                        </div>

                        <button type="submit" class="btn btn-outline-white btn-block btn-lg" >
                            {{ trans('frontLang.submit') }}
                        </button>
                    </form>
            </div>
        </div>

    </div>
</section>



@endsection
