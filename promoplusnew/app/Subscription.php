<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    

	public function plan () {

		return $this->hasOne(Plan::class);

	}


	public function subscribe (Plan $plan) {


		//recebe id da empresa

		//recebe os dados do plano

		//regista a subscricao

		//adiciona os dados do novo plano na conta


	}


	public function hasAValidPlan() {

		//check if in the company account is there a valid plan.

		//

	}


	public function isActive() {

		//check if the company has a valide subscription

	}


}
