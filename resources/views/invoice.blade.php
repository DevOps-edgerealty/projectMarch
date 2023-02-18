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
            <p class="text-right" >  <button class="btn btn-dark noprint" onclick="window.print()" >Print This Invoice</button>&nbsp; <a href="{{url('/en/invoice')}}" class="btn btn-dark noprint">Close</a> &nbsp;</p>
                {{-- <button id="cmd" class="noprint">Download PDF</button></p> --}}


            <div class=" p-4">

                <img class="pt-2 d-inline-block" src="https://www.edgerealty.ae/public/assets/images/logo-black.png" style="height: 80px" alt="">

                <div class="text-center" style="margin-top: -65px;">
                    <h3 class="mb-0"><b>  Edge Realty Real Estate </b></h3>
                    <h3 class="mb-0"><b> Office No, 117 , DNIC Building,Sheikh Zayed Road Dubai</b></h3>
                    <h3 class="mb-0"><b> Tel:+97143881856,Email: info@edgerealty.ae </b></h3>

                    <h3 class="mb-0"><b> TRNo: 10021283510003</b></h3>
                    <h3 class="mb-0"><b> TAX INVOICE</b></h3>
                    <br>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-borderless" style="border: 1px solid; font-size:18px" >
                        <tbody>
                            <tr>
                                <td style="padding:0px 10px;">Name: <b>{{$invoice_details->Name}}</b></td>
                                <td style="padding:0px 10px; border-left:1px solid;">Invoice No: <b>{{$invoice_details->invoice_no}}</b></td>

                            </tr>
                            <tr>
                                <td style="padding:0px 10px;">Address: <b>{{$invoice_details->address}}</b></td>
                                <td style="padding:0px 10px; border-left:1px solid;">Invoice Date: <b>{{date('d/m/Y', strtotime($invoice_details->invoice_date))}}</b></td>

                            </tr>
                            <tr>
                                <td style="padding:0px 10px;">Emirates: <b>{{$invoice_details->Emirates}}</b></td>
                                <td style="padding:0px 10px; border-left:1px solid;">Contract No: <b>{{$invoice_details->contract_no}}</b></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px;">Phone: <b></b></td>
                                <td style="padding:0px 10px; border-left:1px solid;">Contract Date : <b>{{ date('d/m/Y', strtotime($invoice_details->contract_date))}} </b></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px;">Email:</td>
                                <td style="padding:0px 10px; border-left:1px solid;"></td>
                            </tr>
                            <tr>
                                <td style="padding:0px 10px;">TRN: </td>
                                <td style="padding:0px 10px; border-left:1px solid;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-bordered" style="border: 1px solid black !important; font-size:18px">
                        <thead>
                            <tr>
                                <th class="text-center">SNo</th>

                                <th class="text-center">Description</th>
                                <th class="text-center">Unit Price</th>
                                <th class="text-center">Amount</th>

                            </tr>
                        </thead>
                        <tbody >
                            <tr style="margin-bottom: 10px">
                                <td class="text-center"><b>1</b></td>
                                <td class="left strong"><b> {{$invoice_details->description}}</b></td>
                                <td class="text-right left"><b>{{$invoice_details->unit_price}}</b></td>
                                <td class="text-right left"><b>{{$invoice_details->amount}}</b></td>


                            </tr>
                            @if ($invoice_details->description_2 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center"><b>2</b></td>
                                    <td class="left strong"><b> {{$invoice_details->description_2}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->unit_price_2}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->amount_2}}</b></td>

                                </tr>
                            @endif
                            @if ($invoice_details->description_3 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center"><b>2</b></td>
                                    <td class="left strong"><b> {{$invoice_details->description_3}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->unit_price_3}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->amount_3}}</b></td>

                                </tr>
                            @endif

                            @if ($invoice_details->description_4 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center"><b>2</b></td>
                                    <td class="left strong"><b> {{$invoice_details->description_4}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->unit_price_4}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->amount_4}}</b></td>

                                </tr>
                            @endif

                            @if ($invoice_details->description_5 != '')
                                <tr style="margin-bottom: 10px">
                                    <td class="text-center"><b>2</b></td>
                                    <td class="left strong"><b> {{$invoice_details->description_5}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->unit_price_5}}</b></td>
                                    <td class="text-right left"><b>{{$invoice_details->amount_5}}</b></td>

                                </tr>
                            @endif

                             <tr>
                                <td><br><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br><br></td>
                                <td><br><br><br><br><br><br><br><br></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <table class="table table table-bordered" style="font-size:18px">
                            <tbody>
                                <tr>
                                    <td rowspan="3" style="    width: 680px;">Amount In Words (AED): <b>{{$invoice_details->amount_words}}</b> <br>VAT Amount in Words (AED): <b>{{$invoice_details->VAT_words}}</b></td>
                                    <td class="left">
                                        <strong class="text-dark">Gross</strong>
                                    </td>
                                    <td class="text-right" ><b>{{$invoice_details->gross_amount}}</b></td>
                                </tr>
                                <tr>

                                    <td class="left">
                                        <strong class="text-dark">VAT 5%</strong>
                                    </td>
                                    <td class="text-right"><b>{{$invoice_details->VAT_amount}}</b></td>
                                </tr>
                                <tr>

                                    <td class="left">
                                        <strong class="text-dark">Invoice Total</strong>
                                    </td>
                                    <td class="text-right"><b>{{$invoice_details->total_amount}}</b></td>
                                </tr>
                                <tr>

                                    <td colspan="3"  style=" border-left:none !important; border-bottom: none;" class="text-right"><b style="margin-right: 50px;"><br>For : Edge Realty Real Estate</b><br><img src="{{URL::asset('public/assets/images/stamp.png')}}" style="height: 165px;
                                        margin-top: -28px;
                                        margin-right: 25px;" alt=""></td>

                                </tr>


                            </tbody>
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
            <div class="card-footer bg-white text-center" >
                <h3 class="mb-0" ><b><i> Thank you  for doing bussiness with us </i></b></h3><br>
                <h3 class="text-left"> Note: This is electronic generate invoice.</h3>

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
