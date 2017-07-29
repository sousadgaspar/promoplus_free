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
	$enterprise->retrieveEnterpriseInformation(2);
	
	//var_dump($enterprise);
	
	$user = new User($enterprise);
	
	$owner = new Owner("Sousa", '922300521');
	$vipCode = new VipCode($enterprise, $owner);
	
	//vipCode
	$vipcode = new VipCode($enterprise, $owner);
	
	//print $vipcode->getReturnRateForVipCode('DeVoltaAoMoments#14983080928084');
	
	//var_dump($vipcode->getVipCodeAttendeesByDate('2017-07-01', '2017-07-30'));
	//var_dump($vipcode->getCreatedVipCodesByDate('2017-07-01', '2017-07-30'));
	
	//print date('ymdhi') .PHP_EOL;
	$code = round(microtime(true) * 1000) .PHP_EOL;
	$quarters = array();
	
	$codeExploded = str_split($code);
	
	for($i=0; $i<count($codeExploded); $i++) {
		
		
		$quarters[] = $codeExploded[$i];
	}
	
	//The vipcode ii formed by y - Year 2 digits, z - day of the year, Hi - Hour and minutes, s - seconds
	print date('yz-Hi-s').PHP_EOL;
	print date('U');
	
	//$user->createNewUser();

	
	//var_dump($user->deativateUser());
	//var_dump($user->changePassword());
	//var_dump($user->login());
	
	//print dirname(__DIR__);

/*
	$conn = new Conexao();
	
	$conn->conectar();
*/
// 	
// 
/*
	$conn->setSQL("insert into tbUser(name, mobilePhone, email, password, category, enterpriseId) values('Sousa Gaspar', +244922300521, '', '{$user->getPassword()}', 'root', 2)");
	
*/
/*
	$conn->setSQL('select * from tbUser;');
	$res = $conn->consultar();
	
	foreach($res as $value) {
		print $value->name;
	}
	
*/
	
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