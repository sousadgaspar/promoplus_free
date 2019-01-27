<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Subscription extends Model
{

	public $guarded = [];
    

	public function plan () {

		return $this->hasOne(Plan::class);

	}


	public function subscribe (Plan $plan) {


		/*

			The subscription process goes like tath:

				User Choose a plan
					-> User input the payment confirmation (image or pdf)
						-> Plan activation is pendent
							->Admin activate the plan
								->The account is ready for use

		*/


		//It has to be a transaction

		$this->company_id = \Auth::user()->company_id;

		$this->plan_id = $plan->plan_id;

		$this->start = Carbon::now('Africa/Luanda');

		$this->extendTheEndOfSubscription($plan->duration);

		$this->is_active = false;


		$this->save();

		//adiciona os dados do novo plano na conta

		//End Transaction


	}


	private function extendTheEndOfSubscription($planDuration) {

		return $this->end = $this->start->addDays($planDuration);

	}


	public function hasAValidPlan() {

		//check if in the company account is there a valid plan.

		//

	}


	public function isActive() {

		//check if the company has a valide subscription

	}


}
