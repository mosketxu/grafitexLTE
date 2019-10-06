<?php

namespace App\Http\Controllers;

use App\Campaign;

class APIController extends Controller
{
    public function getCampaigns()
    {
        $query=Campaign::select('id','campaign_name','campaign_initdate','campaign_enddate','created_at','updated_at');
        return datatables($query)->make(true);
    }

}
