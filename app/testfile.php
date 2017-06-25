<?php
	
	
	require_once 'enterprise.php';
	require_once 'vipcode.php';
	require_once 'attendee.php';
	require_once 'owner.php';
	require_once 'helpers/notifyer.php';

	$enterprise = new Enterprise("moments");
	$enterprise->setId(2);
	$owner = new Owner("Sgenio Gaspar", "922300521", "sousa@gmail.com");
	$vipCode = new VipCode($enterprise, $owner);
	$vipCode->setVipCode('DeVoltaAoMoments#14983080928084');
	$vipCode->setValidTill(23);
	
	var_dump($vipCode->isStillValid());
	
	//check if this user 
	
	$vipCode->isOwner("92230051");
	
	//$attendee = new Attendee("Rosario Miguel", "9234403252");
	
	//$vipCode->enviteAttendee ($attendee);
	
	//$attendee = new Attendee($owner->getVipCode());
	
	//$owner->reffer($attendee);
	
	//$notifyer = new Notifyer("VipCode - " . $enterprise->getName(), $owner->getTelephone());
	
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