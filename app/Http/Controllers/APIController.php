<?php

namespace App\Http\Controllers;

use App\Campaign;
use Datatables;

class APIController extends Controller
{
    public function getCampaigns()
    {
        $query=Campaign::select('id','campaign_name','campaign_initdate','campaign_enddate','campaign_state','created_at','updated_at');
        return datatables($query)
        ->addColumn('btn','campaign._actions')
        ->rawColumns(['btn'])
        ->make(true);
    }

}
