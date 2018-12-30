<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;





class SubscriptionController extends Controller
{
    

	public function dashboard () {

		Plan::produceIfNotExists();

		$plans = Plan::all();

		return view ('subscription.dashboard', compact('plans'));

	}



	public function create (Request $request) {

		

		return view ('subscription.create');

	}


}
