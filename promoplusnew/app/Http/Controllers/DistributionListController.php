<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\List;

use App\DistributionList;

use App\Contact;

class DistributionListController extends Controller
{


	public function __construct () {

		$this->middleware('auth');

	}
    

	public function index () {

		$lists = DistributionList::all();

		return view ('list.index', compact('lists'));

	}


	public function show (Request $list) {

		return view ('list.show', compact('list'));

	}


	public function create () {

		return view ('list.create');

	}


	public function addRowContactsTo(DistributionList $list, Request $rowContacts) {

			if($rowContacts['list']) {

				$file = file($rowContacts->list->path());

				if(is_array($file)) {

					//remove duplicate values
					$file = array_unique($file);

					foreach($file as $numero) {

						$contact = new Contact();

						$contact->mobilePhoneNumber = (int) $numero;

						$contact->storeFromList($list);

						unset($contact);

					}

				}


			}

	}


	public function store (Request $request) {

		$this->validate($request, [

			'name' => 'required|unique:distribution_lists'

		]);


		try {

			$list = DistributionList::create([

				'name' => $request->name,

				'description' => $request->description

			]);


			$this->addRowContactsTo($list, $request);


			$request->session()->flash(

					'message',

					'Lista de distribuição ' . $request->name . ' criada com sucesso!'
				);


			return view ('/list/create');

		} catch (Exception $e) {

			return view ('/list/create')->withErrors($e->getMessage());

		}

	}


}
