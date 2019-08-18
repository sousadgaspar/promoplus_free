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


	public function amountOfSMSToBeSent () {

		//numberOfSMS = ceil(message/160) * length(distributionList)
		//160 is the sms max charaters

		if(strlen($this->message) != 0)
			return (int) ceil(strlen($this->message)/160) * count($this->to);

	}


	//numberOfSMS = ceil(message/160) * length(distributionList)

	//Send a SMS campaign to a list

	public function send () {

		$SMSClient = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));

		//dd(env('TWILIO_SID'));

		foreach($this->to as $contact) {

			try {

					$result = $SMSClient->messages->create(

						$contact,

						array(

							'from' => $this->from,

							'body' => $this->message
						)


					);

					//dd($result);

			} catch(Exception $e) {

				return "Erro ao tentar enviar a SMS para " . $contact . " com o conteudo " . $this->message;

			}
				

				\Auth::user()->company->account->debit();

				\Auth::user()->company->account->update();

		}

	}

}
