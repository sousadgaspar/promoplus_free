<?php
	session_start();
	
	require_once 'connection.php';
	require_once 'enterprise.php';
	require_once 'vipcode.php';
	require_once 'attendee.php';
	require_once 'owner.php';
	require_once 'user.php';
	require_once 'helpers/notifyer.php';
	

	$enterprise = new Enterprise("root");
	//$enterprise->createNewEnterprise();
	
	$user = new User($enterprise);
	
	$user->setName("Sousa Gaspar");
	$user->setMobilePhone("923433423");
	$user->setEmail("sousagaspar@sgenial.co");
	$user->setPassword("654321");
	$user->setCategory("root");
	$user->setEnterpriseId(6);
	
	$user->createNewUser();

	
	//var_dump($user->deativateUser());
	//var_dump($user->changePassword());
	//var_dump($user->login());
	
	//print dirname(__DIR__);

	//$conn = new Conexao();
	
	//var_dump($conn->conectar());
	
	//$conn->setSQL("insert into tbUser(name, mobilePhone, email, password, category, enterpriseId) values('Sousa Gaspar', +244922300521, 'sousadgaspar@gmail.com', 654321, 'root', 2)");
	
	//$conn->executar();

	
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