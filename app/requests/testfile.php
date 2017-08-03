<?php
	session_start();
	define('APPPATH', dirname(__DIR__));
			
		require_once APPPATH.'/vendor/autoload.php';
		
	
		$enterprise = new Enterprise("Administrador");
		$enterprise->setMinDiscount(11);
		$enterprise->setMaxDiscount(22);
		$enterprise->setNumberOfIndicationsForMaxDiscount(7);
		
		//var_dump();
		
		print $enterprise->getMinDiscount() . PHP_EOL;
		print $enterprise->getMaxDiscount() . PHP_EOL;
		print $enterprise->getNumberOfIndicationsForMaxDiscount() . PHP_EOL;
		print $enterprise->getName() . PHP_EOL;
		
		var_dump($enterprise->updateEnterpriseVipcodeConfiguration());
		
		//$enterprise->setId(2);
		
		//$owner = new Owner('Sox', '923435465', 'so@gma.com');
		
		//$user = new User($enterprise);
		
/*
		$user->setName("Silvio Gomes");
		$user->setMobilePhone("skjkjkj2899382");
		$user->setEmail("silviogomes@sgenial.co");
		$user->setPassword("654321");
		$user->setCategory("basic");
*/
		
		//$vipcode = new Vipcode($enterprise, $owner);
		
		//$vipcode->setVipCode('DeVoltaAoRoot#14990150925508');
		
		//var_dump($vipcode->addCreditToVipCode());
		
/*
		$numberOfAttendees = 5;
		$credit = 10;
		$addicionalDiscount = 15;
		
		for ($i = 0; $i < $numberOfAttendees; $i++) {
					$credit += (15 * 0.2);
					
				}
		print $credit;
*/
	
	//$user->createNewUser();
	//var_dump($user->deativateUser());
	//var_dump($user->changePassword());
	//var_dump($user->login());
	

	


	

	
	/*
		$owner = new Owner("Sousa", '922300521');
		$vipCode = new VipCode($enterprise, $owner);
		//$vipCode->createNewVipCode(10, 30, 45, 'valid'));
		$vipCode->retrieveVipCode("DeVoltaAoMoments#14983080504158");
		
		$attendee = new Attendee("Domingos", '9223080521');
		$attendee->setVipCode($vipCode);
				
		if($attendee->wasEnvited()) {
			print "'{$attendee->getAttendeeTelephone()}' foi convidado  no vipCode '{$attendee->getVipCode()}'	";
			$attendee->attend();
		}
		else {
			print "'{$attendee->getAttendeeTelephone()}' nao foi convidado no vipCode '{$attendee->getVipCode()}'";
		}
		
	*/
	
	
	//rever o code $attendee->attend()

	
	
	
	/*
		Make the whole validation process of a vipCode
				Check if the vipCode Still valid
				Check if the owner is rerturning for invalidating the vipCode
				Check if the attendee was already envited
				Check if the attendee attended already the vip code
	*/
	
	

	//$vipCode->validateVipCode($notifyer, $attendee);
	
	//$attendee->attend();

	//$vipCode->setValidTill(23);
	
	
	
	
	
	//check if this user 
	//$owner->setTelephone ("922300521");
	
	
	//var_dump($owner->isThisVipCodeMine($vipCode));
	//$vipCode->isThisVipCodeMine("92230051");
	
	//$attendee = new Attendee("Rosario Miguel", "9234403252");
	
	//$vipCode->enviteAttendee ($attendee);
	
	//$attendee = new Attendee($owner->getVipCode());
	
	//$owner->reffer($attendee);
	

	
	//echo $vipCode->getValidTill();
	//$vipCode->createNewVipCode(20, 20, 40, "valid", $notifyer);
	
	//$vipCode->setVipCode('DeVoltaAoMoments#14983080928084');
	
	//$vipCode->addCreditToVipCode($notifyer);
	
	//Testing dates
	
	/*
			$numberOfDays = 10;
			$date = date('Y-m-d');
			$days = strtotime($date);
			$newDate = strtotime("+$numberOfDays day", $days);
			echo date('Y-m-d', $newDate);
	*/
	
	//echo $days;
	
	
	/*
		Retrieve Vip Code Test 
	*/
	/*
		$vipCode->retrieveVipCode("DeVoltaAoMoments#233442334");
		print $owner->getName() . PHP_EOL;
		print $vipCode->getVipCode() . PHP_EOL;
		print $owner->getEmail();
	*/
	
	//$vipCode->disableVipCode("Expired", Notifiyer("VipCode - " . $enterprise->getName(), $vipCode->getOwnerTelephone()));
	
	echo "\n";
?>