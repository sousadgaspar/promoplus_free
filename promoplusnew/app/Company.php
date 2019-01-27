<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


	protected $guarded = [];
    

	public function users () {

		return $this->hasMany(User::class);

	}


	public function account () {

		return $this->hasOne(Account::class);

	}


	private static $predefinedCompanies = [

		    		[
		    			'name' => "PromoPlusAdmin",
		    
		        		'marketingName' => "PromoPlus",
		    
		        		'telephoneNumber' => "244920000000",

		        	],

		        	[
		    			'name' => "PromoPlusSeller",
		    
		        		'marketingName' => "PromoPlus",
		    
		        		'telephoneNumber' => "244920000000",

		        	]

		];


	public static function produceIfNotExists () {

		if(count(static::all()->toArray()) > 0 )
            return __CLASS__ . ": exists";


        	foreach(static::$predefinedCompanies as $company) {

        		static::create([

	        		'name' => $company['name'],

	        		'marketingName' => $company['marketingName'],

	        		'telephoneNumber' => $company['telephoneNumber']

	        	]);

        	}

        	

	}

}
