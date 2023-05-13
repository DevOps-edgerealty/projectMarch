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

@section('meta_detail')

    <title> Mortgage Advisory  | Best Real Estate Agency in Dubai </title>
    <meta name="description" content=" We are the Experienced &amp; Qualified Dubai Real Estate Agents. we can assist you to Buy, Sell leasing , Renting and Mortgage properties in Dubai. "/>
    <meta name="keywords" content=" careers, hiring, jobs in Dubai , "/>

@endsection
@section('content')
<style>
    .center-images {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
<section>

    <header>
        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                    <div class="text-white">
                        <h3 style="text-transform: uppercase;">{{ trans('frontLang.Mortgagecalculator') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>

</section>

<section class="mt-5">
    <div class="container">

        <h3 class="text-left">{{ trans('frontLang.Mortgagecalculator') }}</h3>
        @if ($langSeg == "ru")
        <P>Если Вы ищете недвижимость для продажи в Дубае, обратите внимание на этот сайт. Мы расскажем обо всем, что Вам необходимо знать для обеспечения гладкого процессв. Edge Realty —  крупнейший сайт по недвижимости с широким жилой и коммерческой недвижимости на продажу.</P>
        @else
        <P>If you are looking For properties for sale in Dubai, look no further than this website. We round off the things you need to ensure a smooth process. Edgerealty is the largest real estate website with a wide range of residential and commercial properties for sale.</P>
        @endif


    </div>




</section>
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-md-2">
                <form action="" id="myForm">
                    <div class="form-group mb-4">
                        <label for="">{{ trans('frontLang.loanamount') }}</label>
                        <input type="text" class="form-control form-control-lg" id="inCost" placeholder="{{ trans('frontLang.loanamount') }} AED" />
                    </div>
                    <div class="form-group mb-4">
                        <label for="">{{ trans('frontLang.downpayment') }}</label>
                        <input type="text" class="form-control form-control-lg" id="inDown" placeholder="{{ trans('frontLang.downpayment') }} AED" />
                    </div>

                    <div class="form-group mb-4">
                        {{ trans('frontLang.interestrate') }} (%)
                        <input type="text" class="form-control form-control-lg" id="inInterest" placeholder="{{ trans('frontLang.interestrate') }} (%)" />
                    </div>
                    <div class="form-group mb-4">
                        <label for=""> {{ trans('frontLang.tenure') }} ({{ trans('frontLang.year') }})</label>
                        <Select id="inTerm" class="form-control form-control-lg">
                            <option value="5">5 {{ trans('frontLang.year') }} </option>
                            <option value="6">6 {{ trans('frontLang.year') }}</option>
                            <option value="7">7 {{ trans('frontLang.year') }}</option>
                            <option value="8">8 {{ trans('frontLang.year') }}</option>
                            <option value="9">9 {{ trans('frontLang.year') }}</option>
                            <option value="10">10 {{ trans('frontLang.year') }}</option>
                            <option value="11">11 {{ trans('frontLang.year') }}</option>
                            <option value="12">12 {{ trans('frontLang.year') }}</option>
                            <option value="13">13 {{ trans('frontLang.year') }}</option>
                            <option value="14">14 {{ trans('frontLang.year') }}</option>
                            <option value="15">15 {{ trans('frontLang.year') }}</option>
                            <option value="16">16 {{ trans('frontLang.year') }}</option>
                            <option value="17">17 {{ trans('frontLang.year') }}</option>
                            <option value="18">18 {{ trans('frontLang.year') }}</option>
                            <option value="19">19 {{ trans('frontLang.year') }}</option>
                            <option value="20">20 {{ trans('frontLang.year') }}</option>
                            <option value="21">21 {{ trans('frontLang.year') }}</option>
                            <option value="22">22 {{ trans('frontLang.year') }}</option>
                            <option value="23">23 {{ trans('frontLang.year') }}</option>
                            <option value="24">24 {{ trans('frontLang.year') }}</option>
                            <option value="25">25 {{ trans('frontLang.year') }}</option>



                        </Select>

                    </div>
                    <div class="form-group mb-4 text-center">
                        <button type="button" class="btn btn-dark btn-lg" id="btnCalculate">{{ trans('frontLang.calculate') }}</button>
                        <button type="button" class="btn btn-dark btn-lg" onclick="myFunction('myForm')" >{{ trans('frontLang.resetvalues') }}</button>

                    </div>



                </form>


                <div class="col-lg-12 mb-4 text-center" style="background-color:;">
                    <br>
                    <h3 class="calcAnswer"><b>{{ trans('frontLang.totalmonthlypayment') }}</b>:
                        <br/>
                        @if ($langSeg == "ru")
                            <br/><span id="outMonthly">Пожалуйста, введите указанные выше значения.</span></h3>
                        @else
                            <br/><span id="outMonthly">Please enter the values above.</span></h3>
                        @endif

                        <br>
                </div>

                <div class="col-lg-12">
                    <a href="#" class="btn btn-danger btn-block btn-lg" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="background-color: #ff0000" > {{ trans('frontLang.applynow') }} </a>

                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">{{URL('/mortgage/Enquiry')}}</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                        <form class="contact-form" method="post" action="{{URL('/mortgage/submit')}}">
                            @csrf

                            <input type="text" name="utm_source" class="utm_parameters" hidden>
                            <input type="text" name="utm_id" class="utm_parameters" hidden>
                            <input type="text" name="utm_campaign" class="utm_parameters" hidden>
                            <input type="text" name="utm_medium" class="utm_parameters" hidden>

                            <div class=" mb-4">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name"  required />

                            </div>

                            <!-- Email input -->
                            <div class="mb-4">
                                <input type="phone" name="phone" class="form-control form-control-lg iti-phone" placeholder="Phone Number" required />

                            </div>

                            <!-- Email input -->
                            <div class="mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required />

                            </div>

                            <button type="submit" class="btn btn-dark btn-lg btn-block ">
                                {{ trans('frontLang.submit') }}
                            </button>
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<section class="mt-5 mb-5">
    <div class="container">
        @if ($langSeg == "ru")
        <h3 class="text-left">Мы работаем с банками</h3>
        <P>Если вы ищете недвижимость для продажи в Дубае, не ищите дальше, чем этот сайт. Мы завершаем то, что вам нужно для обеспечения бесперебойного процесса. Edgerealty — крупнейший сайт недвижимости с широким выбором жилой и коммерческой недвижимости для продажи</P>
        @else
        <h3 class="text-left">We Deals Banks</h3>
        <P>If you are looking For properties for sale in Dubai, look no further than this website. We round off the things you need to ensure a smooth process. Edgerealty is the largest real estate website with a wide range of residential and commercial properties for sale.</P>
        @endif

        <div class="row">
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/adcb.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/adib.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/emirates.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/cbd.jpg')}}" alt="" class="center-images">
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/dib.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/rakbank.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/hsbc.jpg')}}" alt="" class="center-images">
            </div>
            <div class="col-lg-3">
                <img src="{{URL::asset('public/assets/images/banks/fab.jpg')}}" alt="" class="center-images">
            </div>


        </div>
    </div>




</section>
<script>
   function myFunction(id) {
    document.getElementById(id).reset();
    }
    function inputReset(id) {
    var input = document.getElementById(id);
    input.value = null;
    input.focus();
    return false;
    }
    // formula: c = (r * p) / (1 - (Math.pow((1 + r), (-n))))
function calculateMortgage(p, r, n) {
  r = percentToDecimal(r);
  n = yearsToMonths(n);
  var pmt = (r * p) / (1 - (Math.pow((1 + r), (-n))));
  return parseFloat(pmt.toFixed(2));
}

function percentToDecimal(percent) {
  return (percent / 12) / 100;
}

function yearsToMonths(year) {
  return year * 12;
}
var htmlEl = document.getElementById("outMonthly");

function postPayments(pmt) {
  htmlEl.innerText = "AED " + pmt;
}
var btn = document.getElementById("btnCalculate");
btn.onclick = function() {
  var cost = document.getElementById("inCost").value.replace('$', '');
  var downPayment = document.getElementById("inDown").value.replace('$', '');
  var interest = document.getElementById("inInterest").value.replace('%', '');
  var term = document.getElementById("inTerm").value.replace(' years', '');

  if (cost == "" && downPayment == "" && interest == "" && term == "") {
    htmlEl.innerText = "Please fill out all fields.";
    return false;
  }
  if (cost < 0 || cost == "" || isNaN(cost)) {
    htmlEl.innerText = "Please enter a valid loan amount.";
    return false;
  }
  if (downPayment < 0 || downPayment == "" || isNaN(downPayment)) {
    htmlEl.innerText = "Please enter a valid down payment.";
    return false;
  }
  if (interest < 0 || interest == "" || isNaN(interest)) {
    htmlEl.innerText = "Please enter a valid interest rate.";
    return false;
  }
  if (term < 0 || term == "" || isNaN(term)) {
    htmlEl.innerText = "Please enter a valid length of loan.";
    return false;
  }
  var amountBorrowed = cost - downPayment;
  var pmt = calculateMortgage(amountBorrowed, interest, term);
  postPayments(pmt);
};
</script>

@endsection
