<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use App\DistributionList;

class ContactController extends Controller
{
    

	public function index () {

		$lists = DistributionList::all();

		return view ('contact.index', compact('lists'));

	}


	public function create () {

		return view ('contact.create');

	}


	public function store (Request $request) {

		$this->validate($request, [

			'mobilePhoneNumber' => 'required|unique:contacts|regex:/^(244)[9][1-9][0-9]{7}/',

		]);

		//dd();


		try {

			$contact = Contact::create([

				'firstName' => $request->firstName,

				'lastName' => $request->lastName,

				'mobilePhoneNumber' => $request->mobilePhoneNumber,

				'gender' => $request->gender,

				'anniversaryDate' => $request->anniversaryDate

			]);
			

			if(isset($request->distributionLists)) {

				foreach($request->distributionLists as $list) {

					$contact->distributionLists()->attach($list);

				}

			}


			$request->session()->flash(

					'message', 

					'Contatacto do cliente ' . $request->firstName . ' foi gravado com sucesso!'
					
					);


			return redirect('contact/create');


		} catch (Exception $e) {

			return view ()->withErrors($e->getMessage());

		}

	}


	//using route model binding
	public function show (Contact $contact) {

		return view ('contact.show', compact('contact'));

	}

}
