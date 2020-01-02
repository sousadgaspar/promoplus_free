<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SMSCampaignReport extends Model
{


	protected $table = 'SMS_campaign_reports'; 
    

	public function report (SMSCampaign $smsCampaign, $campaignResult) {

		$this->campaign_id = $smsCampaign->SMSCampaignId;

		$this->sms_sent = $campaignResult['sms_sent'];

		$this->size_of_the_list = $campaignResult['size_of_the_list'];

		$this->SMS_id = $campaignResult['SMS_id'];

		$this->from = $smsCampaign->from;

		$this->to = $smsCampaign->to[0];

		$this->message_status = $campaignResult['message_status'];

		$this->error_code = $campaignResult['error_code'];

		$this->sms_content = $smsCampaign->message;

		$this->user_id = \Auth::user()->id;

		$this->company_id = \Auth::user()->company->id;


		try {

			$this->save();

		} catch(PDOException $e) {

			$e->getTrace();

		}

		

	}


}
