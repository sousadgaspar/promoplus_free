<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    

	public $guarded = [];


	public function distributionLists () {

		return $this->belongsToMany(DistributionList::class);

	}


		public function storeFromList(DistributionList $list) {

		if($this->isValidMSISDN()) {

			try{

				$this->save();

				$this->distributionLists()->attach($list);

			} catch(\PDOException $e) {

				//throw new \PDOException("Nao foi possivel duplicar os registos.");

				try {

					if($contacts = $this->exitsInDatabase()) {


						foreach($contacts as $contact) {

								//dd($contact);

								//dd($list);

								$contact->distributionLists()->attach($list);
						}
					}
				} catch(Exception $e) {

					$e->getMessage();
				}

				$e->getMessage();

			}


		}


	}


	public function isValidMSISDN() {

		return preg_match('/^(244)?[9][1-9][0-9]{7}/', $this->mobilePhoneNumber);

	}


	public function exitsInDatabase () {

		if(self::where('mobilePhoneNumber', $this->mobilePhoneNumber)->get()) {

			$contact = self::where('mobilePhoneNumber', $this->mobilePhoneNumber)->get();

			return $contact;

		}

		

	}

}
