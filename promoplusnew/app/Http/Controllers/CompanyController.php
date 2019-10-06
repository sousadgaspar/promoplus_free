<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\SenderID;



class CompanyController extends Controller
{


	public function __construct () {

		//$this->middleware('auth');

	}

    

	public function index () {

		return view ('admin.company.create');

	}



	public function create () {

		return view ('admin.company.create');

	}

	


	public function show (Company $id) {


		return view ('admin.company.show', compact('id'));


	}



	public function store (Request $request) {

		$this->validate($request, [

			'name' => 'required|unique:companies',

			'senderid' => 'unique:sender_i_ds|required|regex:/^[a-zA-Z0-9]{2,15}$/',

			'telephoneNumber' => 'regex:/^(244)?[9][1-9][0-9]{7}/' 

		]);


		try {


			$company = Company::create([

				'name' => $request->name,

				'telephoneNumber' => $request->telephoneNumber,

				'address' => $request->address

			]);


			SenderID::create([

				'senderid' => $request->senderid,

				'company_id' => $company->id,

				'status' => true,

			]);


			$request->session()->flash('message', 'Empresa ' . $request->name . ' criada com sucesso.');


			return redirect('/company');

		} catch(PDOException $e) {

			return redirect('/company')->withErrors('Ups! parece que n&atilde;o foi poss&iacute;vel criar a empresa ' . $request->name . ' tente outra vez.');

		}

	}

}
