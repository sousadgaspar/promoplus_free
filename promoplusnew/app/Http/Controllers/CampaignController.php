<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DistributionLIst;

class CampaignController extends Controller
{
    

	public function index () {

		return view ('campaign.index');


	}


}
