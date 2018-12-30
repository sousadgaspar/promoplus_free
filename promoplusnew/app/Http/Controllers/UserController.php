<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\Role;

use App\User;




class UserController extends Controller
{
    

	public function __construct() {

		$roles = new Role();

		$roles->produceIfNotExists();

	}


	public function create () {

		$companies = Company::all();

		$roles = Role::all();

		return view('/user/create', compact('companies', 'roles'));

	}



	public function store (Request $request) {

		$this->validate($request, [

			'name' => 'required',

			'email' => 'regex:/\w+@\w+\.\w/',

			'telephoneNumber' => 'regex: /(^244)?[9][1-9][0-9]{7}/',

		]);




		try {

				$user = new User();

				$user->name = $request->name;

				$user->email = $request->email;

				$user->company_id = $request->company_id;

				$user->role_id = $request->role_id;

				$user->telephoneNumber = $request->telephoneNumber;

				$user->password = bcrypt($request->password);

				$user->save();


				$request->session()->flash('message', 'Usuário ' . $request->name . ' criado com sucesso.');

				return redirect('/user/create');

		} catch (Exception $e) {

			return redirect('/user/create')->withErrors($e->getMessage());

		}

	}



	public function update (User $id) {

		return view('user.update', compact('$id'));

	}


	public function changepassword (Request $request) {

		$user = User::find($request->id);

		$user->password = bcrypt($request->password);

		$user->noLonguerNeedToChangePassword();


		try {

			$user->update();

			$request->session()->flash('message', $user->name . ' a sua senha foi actualizada com sucesso.' );

			return redirect('dashboard');

		} catch (Exception $e) {

			return redirect('user.changepassword')->withErrors('Erro ao actualizar a senha. Tente denovo ou contacte o contacte o suporte.');

		}

	}


}
