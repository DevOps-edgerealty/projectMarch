<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Leads;

use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class LeadController extends Controller
{
    public function index()
    {
        $leads = Leads::orderBy('id', 'desc')->paginate(30);

        // $leads = $leads->paginate(30);
        $leads->withPath(url('admin/leads/show'));

        $this->data['leads'] = $leads;



        /**
         * Algorithm to check leads per month
         */

        // $lead_all = Leads::all();

        // foreach($lead_all as $data )
        // {
        //     if($data->email)
        // }
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $leadscount = Leads::orderBy('id', 'desc')->whereMonth('created_at', $month)->whereYear('created_at', $year)->count();

        $this->data['leadscount'] = $leadscount;



        return view('backend.leads.show',$this->data);
    }
}
