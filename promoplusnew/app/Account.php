<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    

    public function plan () {

    	$this->belongsTo(Plan::class);

    }

    public function company () {

    	$this->hasOne(Account::class);

    }


    public function isActive () {

        return (bool) $this->is_active;

    }


    public function canSendSMSCampaign () {

    	if($this->validTill < date('Y-m-d h:i:s') or $this->current_sms_balance <= 0) {

    		return false;

    	}

    	return true;

    }


    public function debit () {

        $this->current_sms_balance -= 1;

    }
}
