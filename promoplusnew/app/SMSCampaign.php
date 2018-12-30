<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Twilio\Rest\Client;



class SMSCampaign extends Model
{
    
	public $guarded = [];



	//Send a SMS campaign to a list

	public function send () {

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
