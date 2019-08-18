<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;

use App\Company;

use App\SubscriptionRequest;

use App\Account;

use App\Subscription;




class SubscriptionController extends Controller
{


	public function dashboard () {

		Plan::produceIfNotExists();

		$plans = Plan::all();

		return view ('subscription.dashboard', compact('plans'));

	}



	public function create (Request $request) {

		$plan = Plan::find($request->planId);

		return view ('subscription.create', compact('plan'));

	}


	public function sendSubscriptionRequest (Request $request) {

		$this->validate($request, [

			'paymentConfirmationDocument' => 'required'

		]);

		$plan = Plan::find($request->planId)->id;

		$company = Company::find($request->companyId)->id;


		if(is_object($request->paymentConfirmationDocument)) {

			$imageName = $request->paymentConfirmationDocument->getClientOriginalName();


			try{

				$request->paymentConfirmationDocument
				->storeAs('public/paymentconfimations', $imageName);


				$subscriptionRequest = new SubscriptionRequest();

				$subscriptionRequest->plan_id = $plan;

				$subscriptionRequest->company_id = $company;

				$subscriptionRequest->paymentConfirmationDocument = $imageName;


				$subscriptionRequest->save();

				$request->session()->flash('message', 'O seu pedido de subscrição será respondido em breve.');

				return redirect('/subscription');


			} catch(Exception $e) {

				return back()->withErrors($e->getMessage());

			}

		}
		else {

			return back()->withErrors('Carregue um fichiro.');

		}

	}


	public function validatePanel () {

		$subscriptionRequests = SubscriptionRequest::where('status', 'pending')->get();

		return view('subscription.validate', compact('subscriptionRequests'));

	}


	//I need to refactor this method is too giant. it part of the comment will to a method
	//all the methods inside approve method must be part of a transaction
	public function approve (Request $request) {

		//get the inputs from request


		$company = Company::find($request->companyId);

		$plan = Plan::find($request->planId);


			//update the request status to approved

		$subscriptionRequest = SubscriptionRequest::find($request->requestId);

		$subscriptionRequest->status = $request->status;

		$subscriptionRequest->update();


			//register the subscription to mantain the history

		$subscription = Subscription::create([

			'subscription_request_id' => $subscriptionRequest->id,

			'company_id' => $company->id,

			'plan_id' => $plan->id,

			'start' => date('Y-m-d H:i'),

			'end' => date('Y-m-d H:i', strtotime($plan->duration . ' days')),

			'is_active' => true

		]);


		//update the company account


			//is there an account?

		if($company->account) {

			$company->account->subscription_id = $subscription->id;

			$company->account->current_sms_balance += $plan->sms_amount;

			$company->account->plan_id = $plan->id;

			$company->account->validFrom = date('Y-m-d H:i');

			$company->account->validTill = date('Y-m-d H:i', strtotime($plan->duration . ' days'));


			$company->account->update();

		}
		else {

			$account = new Account();

			$account->company_id = $company->id;

			$account->subscription_id = $subscription->id;

			$account->current_sms_balance = $plan->sms_amount;

			$account->plan_id = $plan->id;

			$account->validFrom = date('Y-m-d H:i');

			$account->validTill = date('Y-m-d H:i', strtotime($plan->duration . ' days'));

			$account->save();

		}
		
		$request->session()->flash('message', 'O plano '. $plan->name . ' do cliente '. $company->name . '  foi aprovado.');

		return redirect('/subscription/validate');

	}

	//Both decline and approve will be converted into a single method "updateStatus"
	public function decline (Request $request) {

		$company = Company::find($request->companyId);

		$plan = Plan::find($request->planId);


			//update the request status to approved

		$subscriptionRequest = SubscriptionRequest::find($request->requestId);

		$subscriptionRequest->status = $request->status;

		$subscriptionRequest->update();

		return view('/subscription/validate');

	}


}
