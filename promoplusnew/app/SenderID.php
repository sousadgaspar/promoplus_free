<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SenderID extends Model
{

	 protected $fillable = [
        'senderid', 'company_id', 'status',
    ];


	    public static $predefinedSenderID = [

    		'senderid' => 'Promoplus',

    		'company_id' => 1, // The first company ID will always be the Promomplus company ID

    		'status' => true, // The Sender ID is activated by default

    	];
    


    public static function produceIfNotExists () {


    	if(count(static::all()->toArray()) > 0 )
            return __CLASS__ . ": exists";

    		static::create([

        		'senderid' => static::$predefinedSenderID['senderid'],

        		'company_id' => static::$predefinedSenderID['company_id'],

        		'status' => static::$predefinedSenderID['status'],

        	]);
	}



}
