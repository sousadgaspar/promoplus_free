<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

	protected $guarded = [];
    


	protected static $predefinedPlans = [

					[

						'name' => 'Econômico',

						'description' => 'Plano ideal para pequenos negócios que têm poucos clientes.',

						'image' => 'economic.svg',

						'sms_amount' => '100',

						'price' => '7200', 

						'duration' => 30,

					], 

					[

						'name' => 'V.I.P',

						'description' => 'Plano ideal para pequenos e grandes negócios que têm uma excelente base de clientes e que pretendem crescer.',

						'image' => 'vip.svg',

						'sms_amount' => '400',

						'price' => '21600', 

						'duration' => 90,

					],

					[

						'name' => 'Big Boss',

						'description' => 'O plano para negócios mais exigentes.',

						'image' => 'bigboss.svg',

						'sms_amount' => '1500',

						'price' => '86999', 

						'duration' => 180,

					]

				];


	public static function produceIfNotExists () {

		if(count(static::all()->toArray()) > 0 )
            return __CLASS__ . ": exists";


			foreach(self::$predefinedPlans as $plan) {

				static::create([

					'name' => $plan['name'],

					'description' => $plan['description'],

					'image' => $plan['image'],

					'sms_amount' => $plan['sms_amount'],

					'price' => $plan['price'],

					'duration' => $plan['duration']

				]);

			}


	}


}
