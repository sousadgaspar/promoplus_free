<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\Role;

use App\User;



class SessionController extends Controller
{
    

	public function create () {

		Company::produceIfNotExists();

		Role::produceIfNotExists();

		//Ate ao momento nao entendi porque um metodo estatico nao funcionou.
		(new User)->produceIfNotExists();

		return view('session.create');

	}


	public function destroy (Request $request) {

		\Auth::logout($request);

		$request->session()->flash('message', 'Volte sempre! :)');

		return redirect('/login');

	}


	public function store (Request $request) {


		$this->validate($request, [

			'email' => 'required',

			'password' => 'required'

		]);


		$credentials = $request->only('email', 'password');


		if(! \Auth::attempt($credentials)) {

			return redirect('/login')->withErrors("Ups! falha ao logar. tente vefificar a sua senha.");

		}


		if( \Auth::user()->password_has_to_be_changed ) {

			return view('user.changepassword');

		}

		return view('dashboard.index');		

	}


}
