<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


	public function __construct () {

		$this->middleware('auth');

	}
    

	public function index () {

		return view('landing.index');

	}


	public function dashboard () {

		return view('dashboard.index');

	}


	public function showConfiguration () {

		return view('dashboard.configuration.show');


	}

}
