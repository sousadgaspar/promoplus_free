<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Contact;

class DistributionList extends Model
{

	public $guarded = [];
    

	public function contacts () {

		return $this->belongsToMany(Contact::class);

	}


	public static function setTarget($toPreDefinedList, $toRowList) {


		if($toPreDefinedList == 'all') {

			return static::sanitizeList(static::toAll());

		}


		if (($toRowList != '') and ($toPreDefinedList != -1)) {


			return static::joinLists($toRowList, $toPreDefinedList);


		}

		if (($toRowList != '') and ($toPreDefinedList == -1)) {


			return static::sanitizeList(explode(PHP_EOL, $toRowList));


		}


		if (($toRowList == '') and ($toPreDefinedList != -1)) {


			return static::getListNumbers($toPreDefinedList);
			

		}
						


	}


	public static function sanitizeList($rowList) {

			$cleanList = [];

			foreach($rowList as $number) {

				$number = (int) $number;

				//se for 244 mais 9 digitos adiciona

				if(! preg_match('/^(244)?[9][1-9][0-9]{7}/', $number)) {

					continue;

				}


				if(! preg_match('/^244[9][1-9][0-9]{7}/', $number)) { 

					$number = '244' . $number; 

				}

				$cleanList[] = (int) $number;		

			}

			return $cleanList;

	}


	public static function getListNumbers($listId) {

		return DistributionList::find($listId)

							->contacts()

							->pluck('mobilePhoneNumber')

							->toArray();

	}


	public static function joinLists($listOne, $listTwo) {

		return static::removeDuplicate(

					array_merge(

						static::sanitizeList(

							explode(PHP_EOL, $listOne)), 

							static::getListNumbers($listTwo)

						)
				);

	}


	public static function removeDuplicate ($array = []) {

		return array_unique($array);

	}


	public static function toAll(){

		return Contact::pluck('mobilePhoneNumber')->toArray();

	}

}
