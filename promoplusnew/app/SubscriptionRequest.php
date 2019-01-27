<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionRequest extends Model
{
    

    public function plan () {

    	return $this->belongsTo(Plan::class);

    }


    public function company () {

    	return $this->belongsTo(Company::class);

    }
}
