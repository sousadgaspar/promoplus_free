<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SMSTemplate;

class SMStemplateController extends Controller
{
    

	public function index () {

		$templates = SMSTemplate::all()->reverse()->forPage(1,10);

		return view('campaign.sms.template.index', compact('templates'));

	}


	public function store (Request $request) {

		$this->validate($request, [

			'message' => 'required'

		]);

		$messageHasTemplate = new SMSTemplate();

		$messageHasTemplate->template = trim($request->message);

		$messageHasTemplate->user_id = \Auth::user()->id;

		try {

			$messageHasTemplate->save();

			$request->session()->flash('message', 'Template criado com sucesso.');

			return back();

		}
		catch(Exception $e) {

			return back()->withErrors($e->getMessage());

		}

	}

}
