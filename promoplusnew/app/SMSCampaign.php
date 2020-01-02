<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Twilio\Rest\Client;

use App\SMSCampaignReport;

class SMSCampaign extends Model
{


	public function __construct (){

		$this->SMSCampaignId = $this->generateCampaignId();

	}

    
	public $guarded = [];

	public $SMSCampaignId;


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

	public function sendAndReport () {

		$SMSClient = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));


		foreach($this->to as $contact) {

			try {

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

														'sms_sent' => ($result->errorCode == NULL)? 1:0,

														'error_code' => $result->errorCode,

														'size_of_the_list' => count($this->to),

												]);


			} catch(PDOException $e) {

				return "Erro ao tentar enviar a SMS para " . $contact . " com o conteudo " . $this->message;

			}
				

				\Auth::user()->company->account->debit();

				\Auth::user()->company->account->update();

		}

	}

}
