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


	public function store (Request $request) {

		\ini_set('max_execution_time', 300);

		$this->validate($request, [

			'name' => 'required'

		]);


		try {

			$list = DistributionList::create([

				'name' => $request->name,

				'description' => $request->description

			]);

			if($request['list']) {

				$file = file($request->list->path());

				if(is_array($file)) {


					foreach($file as $numero) {

						$contact = new Contact();

						$contact->mobilePhoneNumber = (int) $numero;

						if(is_integer($contact->mobilePhoneNumber) and ($contact->mobilePhoneNumber > 0)) {

							$contact->storeFromList($list);

						}

						unset($contact);

					}

				}


			}


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
