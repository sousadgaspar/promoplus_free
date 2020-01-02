<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SMSCampaign;

use App\DistributionList;



class SMSCampaignController extends Controller
{


	public function __construct () {

		$this->middleware('auth');

	}
    

	public function index () {

		return view ('campaign.sms.index');


	}


	public function create () {

		return view ('campaign.sms.create');

	}


	public function store (Request $request) {

		//valida se a empresa possui uma subscricao ativa

		//se nao redireciona para a pagina de activacao de um plano

		$this->validate($request, [

			'from' => 'required',

			'message' => 'required'

		]);



		$campaign = new SMSCampaign();

		$campaign->from = $request->from;

		$campaign->to = DistributionList::setTarget($request->toPreDefinedList, $request->toRowList);

		$campaign->message = $request->message;



		if(!\Auth::user()->company->account) {

				return back()->withErrors('Adquira um plano para enviar campanhas de SMS.');

		}


		if(!\Auth::user()->company->account->isActive()) {

 			return back('campaign/sms/create')->withErrors('A sua conta foi desabilitada. Contacte  a nossa equipe de suporte.');

		}


		if(!\Auth::user()->company->account->canSendSMSCampaign()) {

				return redirect('campaign/sms/create')->withErrors('O seu credito de SMS expirou ou terminou. Adquira um plano para enviar campanhas de SMS.');

		}


		if(!$campaign->hasRecipients()) {

				return redirect('campaign/sms/create')->withErrors("Não sabemos para quem enviar a campanha. Defina uma lista de destinatários.");

		}



		if($campaign->amountOfSMSToBeSent() > \Auth::user()->company->account->current_sms_balance) {

			try {

				return redirect('campaign/sms/create')->withErrors('A sua campanha requer ' . $campaign->amountOfSMSToBeSent() . ' SMSs e neste momento você só possui ' . \Auth::user()->company->account->current_sms_balance . " SMSs. \n Adquira um plano para enviar mais mensagens." );

			} catch (Exception $e) {

				return redirect('campaign/sms/create')->withErrors('Erro ao enviar a campanha.');

			}
			

		}

		
		try {

			$campaign->sendAndReport();

			$request->session()->flash('message', 'Campanha enviada com sucesso! :)');

			unset( $campaign );

			return redirect('campaign/sms/create');

		} catch(Exception $e) {

			return redirect('campaign/sms/create')->withErrors($e->getMessage());

		}



	}


}
