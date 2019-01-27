<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Twilio\Rest\Client;



class SMSCampaign extends Model
{
    
	public $guarded = [];


	//Generate campaign ID
	public function generateCampaignId () {

		return date('Ymdhis');

	}


	//numberOfSMS = ceil(message/160) * length(distributionList)

	//Send a SMS campaign to a list

	public function send () {

		//calculate the total of sms to be sent

		//check the amount of sms credit

		//if as credit: send the sms 

		//else return a messagem that the campaign did not finish due to the credit

		$SMSClient = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));

		foreach($this->to as $contact) {


				$SMSClient->messages->create(

					$contact,

					array(

						'from' => $this->from,

						'body' => $this->message
					)

				);

		}

	}

}
