<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    

	public $guarded = [];


	public function distributionLists () {

		return $this->belongsToMany(DistributionList::class);

	}

}
