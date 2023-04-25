<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\City;

use Illuminate\Support\Facades\Redirect;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoice = Invoice::get();

        //return $invoice;
        $this->data['invoice'] = $invoice;

        return view('backend.invoice.show',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cities_array=array();
        $Cities = City::where('id', '>=', '1')->orderby('city_name_en', 'asc')->get();
		foreach($Cities as $City)
		{
			$cities_array[$City->city_name_en]=$City->city_name_en;
		}




        $this->data['cities_array'] = $cities_array;

        return view("backend.invoice.create",$this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $bool=0;
        $invoice_no = $request->invoice_number;

        $invoice = Invoice::where('invoice_no', '=', $invoice_no)->get();


		foreach($invoice as $invoices)
		{
			$bool=1;
		}


        if($bool==0)
		{


            try {
                $invoice = new invoice;
                $invoice->Name = $request->name;
                $invoice->address = $request->address;
                $invoice->phone = $request->phone;
                $invoice->Emirates = $request->city_id;
                $invoice->email = $request->email;

                $invoice->invoice_date = $request->invoice_date;
                $invoice->trn = $request->trn_number;
                $invoice->invoice_no = $request->invoice_number;

                $invoice->contract_no = $request->invoice_number;
                $invoice->contract_date = $request->contract_date;

                $invoice->unit_price = $request->unit_price;
                $invoice->amount = $request->amount;

                $invoice->unit_price_2 = $request->unit_price_2;
                $invoice->amount_2 = $request->amount_2;

                $invoice->unit_price_3 = $request->unit_price_3;
                $invoice->amount_3 = $request->amount_3;

                $invoice->unit_price_4 = $request->unit_price_4;
                $invoice->amount_4 = $request->amount_4;

                $invoice->unit_price_5 = $request->unit_price_5;
                $invoice->amount_5 = $request->amount_5;

                $invoice->gross_amount = $request->gross_amount;
                $invoice->VAT_amount = $request->vat_amount;
                $invoice->total_amount = $request->total_amount;
                $invoice->amount_words = $request->amount_words;
                $invoice->VAT_words = $request->vat_amount_words;

                $invoice->description = $request->description;
                $invoice->description_2 = $request->description_2;
                $invoice->description_3 = $request->description_3;
                $invoice->description_4 = $request->description_4;
                $invoice->description_5 = $request->description_5;

                $invoice->save();

              } catch (\Exception $e) {

                  dd($e->getMessage());
                //   return Redirect::to('admin/invoice/show')->with('error','Invalid data input format. Please check and re-enter.');
              }

            return Redirect::to('admin/invoice/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/invoice/show')->withErrors(['message', 'Record is already Exist']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cities_array=array();
        $Cities = City::where('id', '>=', '1')->orderby('city_name_en', 'asc')->get();
		foreach($Cities as $City)
		{
			$cities_array[$City->city_name_en]=$City->city_name_en;
		}

        $invoice = Invoice::find($id);

        $this->data['invoice'] = $invoice;

        $this->data['cities_array'] = $cities_array;

        return view("backend.invoice.edit",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $invoice = Invoice::find($id);


        if (!empty($invoice)) {
            try {

                $invoice->Name = $request->name;
                $invoice->address = $request->address;
                $invoice->phone = $request->phone;
                $invoice->Emirates = $request->city_id;
                $invoice->email = $request->email;
                $invoice->invoice_date = $request->invoice_date;
                $invoice->trn = $request->trn_number;
                $invoice->invoice_no = $request->invoice_number;

                $invoice->contract_no = $request->invoice_number;
                $invoice->contract_date = $request->contract_date;

                $invoice->unit_price = $request->unit_price;
                $invoice->amount = $request->amount;

                $invoice->unit_price_2 = $request->unit_price_2;
                $invoice->amount_2 = $request->amount_2;

                $invoice->unit_price_3 = $request->unit_price_3;
                $invoice->amount_3 = $request->amount_3;

                $invoice->unit_price_4 = $request->unit_price_4;
                $invoice->amount_4 = $request->amount_4;

                $invoice->unit_price_5 = $request->unit_price_5;
                $invoice->amount_5 = $request->amount_5;

                $invoice->gross_amount = $request->gross_amount;
                $invoice->VAT_amount = $request->vat_amount;
                $invoice->total_amount = $request->total_amount;
                $invoice->amount_words = $request->amount_words;
                $invoice->VAT_words = $request->vat_amount_words;
                $invoice->description = $request->description;
                $invoice->description_2 = $request->description_2;
                $invoice->description_3 = $request->description_3;
                $invoice->description_4 = $request->description_4;
                $invoice->description_5 = $request->description_5;

                $invoice->save();

              } catch (\Exception $e) {

                  //   return $e->getMessage();
                  return Redirect::to('admin/invoice/edit/'.$id)->with('error','Invalid data input format. Please check and re-enter.');
              }






            return Redirect::to('admin/invoice/show')->withSuccess('message','Record has Been Uploaded.');
        }
        else
        {
            return Redirect::to('admin/invoice/show')->withErrors(['message', 'Record is already Exist']);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
