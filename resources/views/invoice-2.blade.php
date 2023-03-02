<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice - Edge Realty</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <style>
        p{
            line-height: 1.6 !important;
        }
      body {
        background-color: #000;
        font-family: 'Circular Std Medium';
        }

        .padding {
            padding: 2rem !important
        }

        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2
        }

        h3 {
            font-size: 20px
        }

        h5 {
            font-size: 15px;
            line-height: 26px;
            color: #3d405c;
            margin: 0px 0px 15px 0px;
            font-family: 'Circular Std Medium'
        }

        .text-dark {
            color: #3d405c !important
        }
        @media print {
        /* style sheet for print goes here */
        .noprint {
            visibility: hidden;
        }
        }




    </style>

</head>
<body >
    <div>
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding" id="content">

        <div class="card">
            <p class="text-right" ></p>
            <p class="text-right" >
                <button class="btn btn-dark text-white noprint rounded-0 " style="background-color: #000 !important;" onclick="window.print()" >Print This Invoice</button>&nbsp;
                <a href="{{url('/en/invoice')}}" class="btn btn-dark noprint rounded-0" style="background-color: #000 !important;">Close</a> &nbsp;
            </p>
                {{-- <button id="cmd" class="noprint">Download PDF</button></p> --}}


            <div class="px-4 py-0">

                <img class="pt-0 mb-0 d-inline-block" src="https://www.edgerealty.ae/public/assets/images/logo-black.png" style="height: 100px; right: 0; float: right;" alt="">
                <p class="pt-0 mb-0 d-inine-block fw-bold" style="font-size: 3em; font-weight:800">
                    Tax Invoice
                </p>

                {{-- <div class="text-center" style="margin-top: -65px;">
                    <h3 class="mb-0"><b>  Edge Realty Real Estate </b></h3>
                    <h3 class="mb-0"><b> Office No, 117 , DNIC Building,Sheikh Zayed Road Dubai</b></h3>
                    <h3 class="mb-0"><b> Tel:+97143881856,Email: info@edgerealty.ae </b></h3>

                    <h3 class="mb-0"><b> TRNo: 10021283510003</b></h3>
                    <h3 class="mb-0"><b> TAX INVOICE</b></h3>
                    <br>
                </div> --}}
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive-sm">
                    <p style="padding:0px 10px; font-size: 18px; margin:0 ">
                        Bill To:
                    </p>
                    <table class="table table-borderless" style="font-size:18px" >
                        <tbody>
                            <tr>
                                <td style="padding:0px 10px; width: 180px; color: #000 !important; font-size: 18px">
                                    Name
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                     : <b>{{$invoice_details->Name}}</b>
                                </td>



                                <td style="padding:0px 10px; width: 180px;  color: #000 !important; font-size: 18px">
                                    Invoice No
                                </td>

                                <td style="padding:0px 10px; color: #000 !important; font-size: 18px">
                                     : <b>{{$invoice_details->invoice_no}}</b>
                                </td>

                            </tr>
                            <tr>
                                <td style="padding:0px 10px; width: 180px; color: #000 !important; font-size: 18px">
                                    Address
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                     :  <b>{{$invoice_details->address}}</b>
                                </td>



                                <td style="padding:0px 10px; width: 180px;  color: #000 !important; font-size: 18px">
                                    Invoice Date:
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                     : <b>{{date('d/m/Y', strtotime($invoice_details->invoice_date))}}</b>
                                    </td>

                            </tr>
                            <tr>
                                <td style="padding:0px 10px; width: 180px; color: #000 !important; font-size: 18px">
                                    Emirates
                                </td>
                                <td style="padding:0px 10px; color: #000 !important; font-size: 18px">
                                     : <b>{{$invoice_details->Emirates}}</b>
                                </td>



                                <td style="padding:0px 10px; width: 180px;  color: #000 !important; font-size: 18px">
                                    Contract No
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                     : <b>{{$invoice_details->contract_no}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px; width: 180px; color: #000 !important; font-size: 18px">
                                    Phone <b></b>
                                </td>

                                <td style="padding:0px 10px; color: #000 !important; font-size: 18px">
                                    : <b>{{$invoice_details->phone}}</b>
                                </td>


                                <td style="padding:0px 10px; width: 180px;  color: #000 !important; font-size: 18px">
                                    {{-- Contract Date --}}
                                    TRN
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                      {{-- : <b>{{ date('d/m/Y', strtotime($invoice_details->contract_date))}} </b> --}}
                                      : <b>100212835100003</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px; width: 180px; color: #000 !important; font-size: 18px">
                                    Email <b></b>
                                </td>

                                <td style="padding:0px 10px; color: #000 !important; font-size: 18px">
                                     : <b>{{$invoice_details->email}}</b>
                                </td>


                                <td style="padding:0px 10px; width: 180px;  color: #000 !important; font-size: 18px">
                                    {{-- Contract Date --}}
                                </td>

                                <td style="padding:0px 10px;  color: #000 !important; font-size: 18px">
                                      {{-- : <b>{{ date('d/m/Y', strtotime($invoice_details->contract_date))}} </b> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive-sm">
                    <table class="w-100" style="border: 2px solid black !important; font-size:18px">
                        <thead style="border: 2px solid black !important;" class="py-3">
                            <tr style="border: 2px solid black !important;">
                                <th class="text-center py-3">SNo</th>
                                <th class="text-center py-3">Description</th>
                                <th class="text-center py-3">Unit Price</th>
                                <th class="text-center py-3">Amount</th>

                            </tr>
                        </thead>
                        <tbody >
                            <tr style="margin-bottom: 10px">
                                <td class="text-center" style="font-size: 20px;"><b>1</b></td>
                                <td class="left strong" style="font-size: 20px;"><b> {{$invoice_details->description}}</b></td>
                                <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->unit_price, 2) }}</b></td>
                                <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->amount, 2) }}</b></td>
                            </tr>
                            @if ($invoice_details->description_2 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center" style="font-size: 20px;"><b>2</b></td>
                                    <td class="left strong" style="font-size: 20px;"><b> {{$invoice_details->description_2}}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->unit_price_2, 2) }}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->amount_2, 2) }}</b></td>
                                </tr>
                            @endif
                            @if ($invoice_details->description_3 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center" style="font-size: 20px;"><b>2</b></td>
                                    <td class="left strong" style="font-size: 20px;"><b> {{$invoice_details->description_3}}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->unit_price_3, 2) }}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->amount_3, 2) }}</b></td>
                                </tr>
                            @endif

                            @if ($invoice_details->description_4 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center" style="font-size: 20px;"><b>2</b></td>
                                    <td class="left strong" style="font-size: 20px;"><b> {{$invoice_details->description_4}}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->unit_price_4, 2) }}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->amount_4, 2) }}</b></td>
                                </tr>
                            @endif

                            @if ($invoice_details->description_5 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center" style="font-size: 20px;"><b>2</b></td>
                                    <td class="left strong" style="font-size: 20px;"><b> {{$invoice_details->description_5}}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->unit_price_5, 2) }}</b></td>
                                    <td class="text-right left" style="font-size: 20px;"><b>{{ number_format($invoice_details->amount_5, 2) }}</b></td>
                                </tr>
                            @endif

                             <tr>
                                <td><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <table class="table table-borderless" style="font-size:18px">
                            <tbody>
                                <tr>
                                    <td style="width: 180px; font-size:14px" class="py-1">
                                        Amount In Words (AED)
                                    </td>
                                    <td style="width: 500px; font-size:14px" class="py-1">
                                        : <b>
                                            {{$invoice_details->amount_words}}
                                        </b>
                                    </td>


                                </tr>
                                <tr>
                                    <td style="width: 180px; font-size:14px" class="py-1">
                                        VAT Amount in Words (AED)
                                    </td>
                                    <td style="width: 500px; font-size:14px" class="py-1" >
                                        <b>
                                             : {{$invoice_details->VAT_words}}
                                        </b>
                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <table class="table table-borderless" style="font-size:18px">
                            <tbody>
                                <tr>
                                    <td class="left py-1" style="width: 150px; font-size:20px">
                                        <strong class="" style="font-size: 18px; color: #000 !important; font-size: 20px;">
                                            Sub Total
                                        </strong>
                                        <span class="float-right"><b>:</b></span>
                                    </td>
                                    <td class="text-right py-1" style="font-size: 20px;">
                                        <b>
                                            {{ number_format($invoice_details->gross_amount, 2) }}
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left py-1" style="font-size: 20px; width: 150px">
                                        <strong class="" style=" color: #000 !important; font-size: 20px;">
                                            VAT 5%
                                        </strong>
                                        <span class="float-right"><b>:</b></span>
                                    </td>
                                    <td class="text-right py-1" style="font-size: 18px">
                                        <b>
                                            {{ number_format($invoice_details->VAT_amount, 2) }}
                                        </b>
                                    </td>
                                </tr>
                                <tr>

                                    <td class="left py-1" style="font-size: 20px">
                                        <strong class="" style=" color: #000 !important;">
                                            Invoice Total
                                        </strong>
                                        <span class="float-right"><b>:</b></span>
                                    </td>
                                    <td class="text-right py-1" style="font-size: 20px; width: 150px">
                                        <b>
                                            {{ number_format($invoice_details->total_amount, 2) }}
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>


                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 col-sm-6">
                        <h3 class="px-2">
                            <u>
                                Bank Details
                            </u>
                        </h3>
                        <table class="table table-borderless" style="font-size:14px">
                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    Account Name
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : Edge Realty Real Estate
                                </td>
                            </tr>

                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    Bank Name
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : Abu Dhabi Commercial Bank (ADCB)
                                </td>
                            </tr>

                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    Bank Address
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : Sheikh Zayed Road Branch
                                </td>
                            </tr>

                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    Account Number
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : 10095595020001
                                </td>
                            </tr>

                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    IBAN Number
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : AE620030010095595020001
                                </td>
                            </tr>

                            <tr>
                                <td class="py-1" style="width: 150px; font-size:16px">
                                    BIC/Swift Code
                                </td>
                                <td class="py-1" style="font-size:16px">
                                    : ADCBAEAA
                                </td>
                            </tr>


                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <table class="table table-borderless" style="font-size:16px">
                            <tr>
                                <td></td>
                                 <td style=" border-left:none !important; border-bottom: none; text-align: center" >
                                    <b>
                                        For : Edge Realty Real Estate
                                    </b>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-4">
                        <img src="{{URL::asset('public/assets/asset/qr-code.svg')}}" style="height: 125px;" alt="">
                    </div>
                    <div class="col-lg-4 col-sm-4">

                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <img src="{{URL::asset('public/assets/images/stamp.png')}}" style="max-height: 165px; margin-top: -28px;" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <table class="table table-borderless w-100" style="font-size:16px">
                            <tr>
                                <td class="py-0" style="width: 300px">
                                    Edge Realty Real Estate
                                    <br>
                                    Showroom #4, Aswar Building, Sheikh Zayed Road, Dubai
                                    <br>
                                    +971 4 388 1856
                                    <br>
                                    info@edgerealty.ae
                                </td>
                                <td class="py-0" style="font-weight: 800; font-size:18px; text-align: center; width: 220px">
                                    {{-- <hr class="my-0 border-2 border-dark"> --}}
                                    <span class="text-center">
                                        <u>
                                            Authorized Signature
                                        </u>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>



                {{-- <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><br><br><br><br></td>
                                    <td><br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td>Receiver's Signature</td>
                                    <td>Authorized Signature</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
            <div class="card-footer bg-white text-center" style="border-top: 1px solid #000000 !important" >
                <p class="py-0" style="color: #00000; font-size: 14px;">
                    Thank you for doing business with us
                </p>

            </div>
        </div>
    </div>

</body>

<script>
var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>
</html>
