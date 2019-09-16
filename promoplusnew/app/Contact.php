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

		if(preg_match('/^(244)?[9][1-9][0-9]{7}/', $this->mobilePhoneNumber)) {

			$this->save();

			$this->distributionLists()->attach($list);

			$this;

		}
		else {

			dd('Nao foi possivel salvar a lista de contactos. por favor tente denovo.');
		}


	}

}
