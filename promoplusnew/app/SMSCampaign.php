<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Twilio\Rest\Client;

use App\SMSCampaignReport;

class SMSCampaign extends Model
{
    
	public $guarded = [];


	//Generate campaign ID
	public function generateCampaignId () {

		return \Auth()->user()->company->name . date('Ymdhis');

	}


	public function amountOfSMSToBeSent () {

		//numberOfSMS = ceil(message/160) * length(distributionList)
		//160 is the sms max charaters

		if(strlen($this->message) != 0)
			return (int) ceil(strlen($this->message)/160) * count($this->to);

	}


	public function hasRecipients () {

		return count($this->to) > 0;

	}


	//numberOfSMS = ceil(message/160) * length(distributionList)

	//Send a SMS campaign to a list

	public function send () {

		$SMSClient = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));

		foreach($this->to as $contact) {

			try {
					$campaignId = $this->generateCampaignId();

					$result = $SMSClient->messages->create(

						$contact,

						array(

							'from' => $this->from,

							'body' => $this->message,

							'statusCallback' => "https://postb.in/1570397422807-8620559803675"
						)

					);




					//Report the campaing
					(new SMSCampaignReport())->report($this, 
														['SMS_id' => $result->sid,

														'message_status' => $result->status,

														'error_code' => $result->errorCode,

												]);

			} catch(PDOException $e) {

				return "Erro ao tentar enviar a SMS para " . $contact . " com o conteudo " . $this->message;

			}
				

				\Auth::user()->company->account->debit();

				\Auth::user()->company->account->update();

		}

	}

}
