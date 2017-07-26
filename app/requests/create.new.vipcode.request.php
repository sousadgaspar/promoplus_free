<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	define('APPPATH', dirname(__DIR__));
	define('CLASSESPATH', APPPATH . "/classes");
	
	//helpers
	require_once CLASSESPATH.'/helpers/smsGateway.php';
	
	//business classes
	require_once CLASSESPATH . '/enterprise.php';
	require_once CLASSESPATH . '/owner.php';
	require_once CLASSESPATH . '/vipcode.php';
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setId($_SESSION['enterpriseId']);
	
	$owner = new Owner($_POST['name'], $_POST['telephone'], $_POST['email']);
	//flag for js request handler
	$ownerHasAnOpenVipCode = '';
	$smsResponse = '';
	
	$vipcode = new Vipcode($enterprise, $owner);

	
	
	//check if the owner as a valid vipcode
	if($owner->hasAValidVipCode()) {
		
		$ownerHasAnOpenVipCode = 'true';
		$vipcode->retrieveVipCodeFromOwnerTelephone();
		
	}
	else {
		//create the new vipCode
		$vipcode->setVipCode(($vipcode->createNewVipCode($_SESSION['minDiscount'], $_SESSION['maxDiscount'], 30)));
		$vipcode->retrieveVipCode($vipcode->getVipCode());
		
		//Send a SMS to vipCode owner
		$notifiyer = new SmsGateway('sousadgaspar@gmail.com', '10senhapadrao20');
		
		$deviceId = '51532';
		$enterpriseName = @$_SESSION[enterpriseName];
	
		
		$message  = "VIPCode: {$vipcode->getVipCode()} Quando voltar ao {$enterpriseName} recebera {$vipcode->getMinDiscount()}% de desconto. Se partilhar esse VIPCode com os seus amigos o seu desconto pode aumentar ate {$vipcode->getMaxDiscount()}, eles tambem recebem {$vipcode->getMinDiscount()}% de desconto. Reencaminhe essa SMS para os seu amigos!";
		
		$smsResponse = $notifiyer->sendMessageToNumber($owner->getTelephone(), $message, $deviceId);
		
	}
	
	
	
	$array = array(
		
				'hasAnOpenVipCode' => $ownerHasAnOpenVipCode,
				'vipcode' => $vipcode->getVipCode(),
				'minDiscount' => $vipcode->getMinDiscount(),
				'maxDiscount' => $vipcode->getMaxDiscount(),
				'credit' => $vipcode->getCredit(),
				'creationTime' => $vipcode->getCreationTime(),
				'validTill' => $vipcode->getValidTill(),
				'status' => $vipcode->getStatus(),
				'vipCodeIsPublic' => $vipcode->vipCodeIsPublic(),
				'name' => $owner->getName(),
				'ownerId' => $owner->getId(),
				'OwnerStatus' => $owner->getStatus(),
				'telephone' => $owner->getTelephone(),
				'faceBook' => $owner->getFaceBook(),
				'email' => $owner->getEmail(),
				'address' => $owner->getAddress(),
				'returned' => $owner->getReturned(),
				'smsResponse' => $smsResponse,
				'numberOfIndicationsForMaxDiscount' => $_SESSION['numberOfIndicationsForMaxDiscount'],
				'enterpriseName' => $_SESSION['enterpriseName']
			
	);
	
	$json = json_encode($array);
	
	print $json;
	
	
	
	
	

	
/*
	
*/
	
	
	
	
?>