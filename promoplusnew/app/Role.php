<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


	protected $guarded = [];
    

	protected static $predefinedRoles = [

					'Administrador' => 'Possui total acesso ao sistema', 

					'Reseller' => 'Cria novas contas no sistema e activa licenças',

					'Revisor' => 'Cria e envia campanhas no sistema', 

					'operador' => 'envia campanhas apartir dos modelos pre-criados'

				];


	public static function produceIfNotExists () {

		if(count(static::all()->toArray()) > 0 )
            return __CLASS__ . ": exists";


		 if(! static::isThereRoles()) {

			foreach(self::$predefinedRoles as $role => $description) {

				static::create([

					'name' => $role,

					'description' => $description

				]);

			}

		 }


	}


	private static function isThereRoles () {

		return count(static::all()->toArray());

	}


	public function users () {

		//return $this->belongsToOne(User::class);

	}


}
