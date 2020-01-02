<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SMSCampaignReport;

class SMSCampaingReportController extends Controller
{
    


	public function showHistory () {

		//$report = SMSCampaignReport::select("campaign_id", \DB::raw("sum(sms_sent) as amount_sms_sent"))->groupby("campaign_id")->get();


		//$report = \DB::table('SMS_campaign_reports')->select(	'campaign_id', 
																//\DB::raw('sum(sms_sent) as sms_sent'))->groupBy('campaign_id')->get();


		$report = SMSCampaignReport::select('campaign_id', 
											\DB::raw('min(size_of_the_list) as list_size'),
											\DB::raw('count(error_code) as errors'), 
											\DB::raw('min(created_at) as date'),
											\DB::raw('min(sms_content) as sms_content'),
											\DB::raw('sum(sms_sent) as sms_sent'))->where('company_id', \Auth()->user()->company_id)->groupBy('campaign_id')->paginate(15);

		//$statistics = SMSCampaignReport::select(\DB::raw('DATE_FORMAT(created_at, "%m/%Y") as tmm'), \DB::raw('sum(sms_sent) total_sms'))->where('company_id', \Auth()->user()->company_id)->groupBy('tmm')->paginate(15);

		
		//dd($statistics->toJson());

		return view('campaign.sms.history', compact('report'));

	}

}
