<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SenderID;

class SenderIDController extends Controller
{


	public function index () {



	}
    
	public function create (Request $request) {

		return view('admin.senderid.create');

	}


	public function store (Request $request) {

		$this->validate($request, [

			'senderid' => 'unique:Sender_i_ds|required|regex:/^[a-zA-Z0-9]{2,15}$/',

		]);


		try {

				SenderID::create([

					'senderid' => $request->senderid,

					'company_id' => \Auth::user()->company->id,

						]);


				$request->session()->flash('message', 'Solicitação feita com sucesso! O remetente estará disponível após aprovação do administrador.');

				return view('admin.senderid.create');	

		} catch (PDOException $e) {

			dd('Nao foi possivel solicitar um novo Remetente.');


		}
		
	}


	public function review () {

		\Carbon\Carbon::setLocale('pt_BR');

		$pendingSenderIDs = SenderID::where('status', 0)->get();

		//dd($pendingSenderIDs->get());


		return view('admin.senderid.review', compact('pendingSenderIDs'));

	}


	public function approve (Request $request) {

		$senderID = SenderID::find($request->senderID);

		$senderID->status = $request->status;

		$senderID->update();

		$pendingSenderIDs = SenderID::where('status', 0)->get();

		$request->session()->flash('message', "Remetente $senderID->senderid aprovado!");

		return view('admin.senderid.review', compact('pendingSenderIDs'));

	}


	public function decline (Request $request) {

		$senderID = SenderID::find($request->senderID);

		$senderID->status = $request->status;

		$senderID->update();

		$pendingSenderIDs = SenderID::where('status', 0)->get();

		$request->session()->flash('message', "Remetente $senderID->senderid Recusado com sucesso!");

		return view('admin.senderid.review', compact('pendingSenderIDs'));

	}


}
