
@extends('layout.master')

<?php

		$meta_var = "meta_title_" . trans('backLang.boxCode');
		$meta_description_var = "meta_description_" . trans('backLang.boxCode');
		$meta_keywords_var = "meta_keywords_" . trans('backLang.boxCode');


?>

@section('meta_detail')

    <title> Sales Transaction | Best Real Estate Agency in Dubai </title>
    <meta name="description" content=" We are the Experienced &amp; Qualified Dubai Real Estate Agents. we can assist you to Buy, Sell leasing , Renting and Mortgage properties in Dubai. "/>
    <meta name="keywords" content=" careers, hiring, jobs in Dubai , "/>

@endsection
@section('content')

<style>
  p{
    line-height: 1.6 !important;
  }
  input, select {
        background-color: #000 !important;
        color: #fff !important;
        border-radius: 0px !important;
        border: 1px solid #fff !important;
    }
    .btn {
        /* transition: transform 5s  !important; */
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.125s !important;

    }
    .btn:hover {
        /* box-shadow: -5px 5px 1px #a2a2a2 !important; */
        /* translate: 2px -2px !important; */
        opacity: 1 !important;
        background-color: #fff !important;
        color: #000 !important;
        transform: scale(1) !important;
        border: 2px solid #000 !important;

        cursor: pointer !important;
    }
    .card {
        color: #fff !important;
        background-color: #000 !important;
        border: 0.5px solid gray !important;
        border-radius: 0 !important;
        transition-timing-function: cubic-bezier(.17,.67,.83,.67) !important;
        transition-duration: 0.5s !important;


    }
    .card:hover {
        /* box-shadow: 0px 0px 5px #fff !important; */
        opacity: 1 !important;
        transform: scale(1.07) !important;
        z-index: 1000 !important;
        /* margin-left: 20px !important;
        margin-right: 20px !important; */
        /* border: 5px solid #000 !important; */
    }
</style>
<?php



    $project_title_var = "title_" . trans('backLang.boxCode');
    $type_title_var = "name_" . trans('backLang.boxCode');
    $address_title_var = "address_" . trans('backLang.boxCode');




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
<style>

#searchfield { display: block; width: 100%; text-align: center; margin-bottom: 20px; }

#searchfield form {
  display: inline-block;
  background: #eeefed;
  padding: 0;
  margin: 0;
  padding: 5px;
  border-radius: 3px;
  margin: 5px 0 0 0;
}
#searchfield form .biginput {
  width: 100%;
  height: 40px;
  padding: 0 10px 0 10px;
  background-color: #fff;
  border: 1px solid #c8c8c8;
  border-radius: 3px;
  color: #aeaeae;
  font-weight:normal;
  font-size: 1.5em;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
#searchfield form .biginput:focus {
  color: #858585;
}
.flatbtn {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
  outline: 0;
  border: 0;
  color: #f3faef;
  text-decoration: none;
  background-color: #6bb642;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  font-size: 1.2em;
  font-weight: bold;
  padding: 12px 22px 12px 22px;
  line-height: normal;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  text-transform: uppercase;
  text-shadow: 0 1px 0 rgba(0,0,0,0.3);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
  -moz-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
  box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
}
.flatbtn:hover {
  color: #fff;
  background-color: #73c437;
}
.flatbtn:active {
  -webkit-box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);
  -moz-box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1);
  box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1);
}
.autocomplete-suggestions { border: 1px solid #999; background: #fff; cursor: default; overflow: auto; }
.autocomplete-suggestion { padding: 5px 5px; font-size: 1.0em; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #f0f0f0; }
.autocomplete-suggestions strong { font-weight: 700; color: #000; text-decoration: underline }
</style>
<section>

    <header>


        <!-- Background image -->
        <div id="intro-page" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgb(0 0 0);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100" style="margin-top: 40px;">
                <div class="text-white">
                    <h3  style="text-transform: uppercase;">Sales Transaction</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



</section>

<section class="mt-5 mb-5">
    <div class="container-fluid containerization">
        <form action="{{URL('/'.$langSeg.'/sale_transaction_search')}}" method="post" >
            @csrf
            <div class="row">
                <h3 class="text-left">Sales Transaction</h3>
                <div class="col-lg-9">
                    <div id="w">
                        <div id="content">

                          <div id="searchfield">
                            <input type="text" name="search" class="form-control form-control-lg" name="currency" class="biginput" id="autocomplete" placeholder="Community / Building">
                          </div><!-- @end #searchfield --></div><!-- @end #content -->
                      </div>
                </div>
                {{-- <div class="col-lg-9 mb-4">

                    <div class="">

                        <input type="text" value="{{@$request->search}}" name="search" id="search-dld" class="form-control form-control-lg" placeholder="Community / Building" />

                    </div>


                    <div id="List-dld"></div>
                </div> --}}

                <div class="col-lg-3 ">
                    <select name="property_type" class="form-select form-select-lg" aria-label="Default select example">
                        <option selected value="">Property Type</option>
                        <option value="villa">Villas</option>
                        <option value="land">Land</option>
                        <option value="Building">Building</option>
                        <option value="unit">Unit</option>
                    </select>

                </div>


            </div>
            {{-- <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <h6>Property Type</h6>

                    <div class="btn-group " role="group" aria-label="Basic radio toggle button group" style="display: flex;">
                        <input type="radio" class="btn-check" name="property_type"  value="" id="property_type1" autocomplete="off" checked>
                        <label class="btn btn-outline-dark" for="property_type1">All</label>

                        <input type="radio" class="btn-check" name="property_type" value="villa" id="property_type2" autocomplete="off">
                        <label class="btn btn-outline-dark" for="property_type2">Villas</label>

                        <input type="radio" class="btn-check" name="property_type" value="land" id="property_type3" autocomplete="off">
                        <label class="btn btn-outline-dark" for="property_type3">Land</label>

                        <input type="radio" class="btn-check" name="property_type" value="Building" id="property_type4" autocomplete="off">
                        <label class="btn btn-outline-dark" for="property_type4">Building</label>

                        <input type="radio" class="btn-check" name="property_type" value="unit" id="property_type5" autocomplete="off">
                        <label class="btn btn-outline-dark" for="property_type5">Unit</label>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>From</h6>
                            <input name="date_from" type="date" class="form-control form-control-lg"  >
                        </div>
                        <div class="col-lg-6">
                            <h6>To</h6>
                            <input name="date_to" type="date" class="form-control form-control-lg" >
                        </div>
                    </div>


                </div>
            </div> --}}
            <div class="row mt-4">

                <div class="col-lg-6 mb-4">
                    <h6>Transaction Type</h6>

                    <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="transtion_type"  value="" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-white" for="btnradio1">All</label>

                        <input type="radio" class="btn-check" name="transtion_type" value="Sales" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-white" for="btnradio2">Sales</label>

                        <input type="radio" class="btn-check" name="transtion_type" value="Mortgages" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-white" for="btnradio3">Mortgage</label>
                    </div>




                </div>
                <div class="col-lg-6 mb-4">
                    <h6>Status</h6>
                    <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="status" value="" id="status1" autocomplete="off" checked>
                        <label class="btn btn-outline-white" for="status1">All</label>

                        <input type="radio" class="btn-check" name="status" value="Existing Properties" id="status2" autocomplete="off">
                        <label class="btn btn-outline-white" for="status2">Existing Properties</label>

                        <input type="radio" class="btn-check" name="status" value="Off-Plan Properties"  id="status3" autocomplete="off">
                        <label class="btn btn-outline-white" for="status3">Off-Plan Properties</label>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mb-4">
                        <h6>Number of Transaction</h6>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio1" value="25" checked>
                            <label class="form-check-label" for="inlineRadio1">25</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio1" value="50">
                            <label class="form-check-label" for="inlineRadio1">50</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio2" value="100">
                            <label class="form-check-label" for="inlineRadio2">100</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio2" value="200">
                            <label class="form-check-label" for="inlineRadio2">200</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio2" value="500">
                            <label class="form-check-label" for="inlineRadio2">500</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="records" id="inlineRadio2" value="1000">
                            <label class="form-check-label" for="inlineRadio2">1000</label>
                          </div>

                    </div>

                </div>
                <div class="col-lg-12">
                    <button class="btn btn-outline-white rounded-0 rounded btn-lg btn-block" type="submit"><i class="fa fa-search"> </i> Search</button>
                </div>
            </div>

        </form>
        <hr class="mt-5">
    </div>
</section>
<?php $number = 1; ?>
<section class="mt-5 mb-5">
    <div class="container-fluid containerization">
        <div class="row">

            <div class="col-lg-12">

                <div style="overflow-y: hidden;width: 100%; ">
                    <table class="table table-2 table-responsive text-white" style="font-size:0.8rem; color: #fff;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Community</th>
                                <th>Project</th>
                                <th>Date</th>
                                <th>Procedure</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Price AED</th>
                                <th>Size Sq.Ft.</th>
                                <th>Price AED Per Sq.Ft.</th>


                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($dld) )
                                @foreach ($dld as $data)
                                    <tr>
                                        <td style="padding: 1rem 1.0rem !important;">{{$number++}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{$data->area_name_en}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{$data->building_name_en}}</td>
                                        <td style="padding: 1rem 0rem !important;">{{$data->instance_date}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{$data->procedure_name_en}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{$data->reg_type_en}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{$data->property_type_en}}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{ number_format($data->actual_worth) }}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{ round($data->procedure_area*'10.764')  }}</td>
                                        <td style="padding: 1rem 1.0rem !important;">{{ round( $data->meter_sale_price/'10.764')}}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="10" class="text-center">No Record Found</td>
                                    </tr>
                            @endif


                        </tbody>
                    </table>
                </div>


            </div>



        </div>

    </div>
</section>



@endsection
