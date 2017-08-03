<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	define('APPPATH', dirname(__DIR__));
	
	require_once APPPATH.'/vendor/autoload.php';
	
	
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
	
		
		$message  = "VIPCode:\n{$vipcode->getVipCode()}\n\nQuando voltar ao {$enterpriseName} receberás um desconto de {$vipcode->getMinDiscount()}%. Partilhe o seu código VIP com 5 amigos desconto de {$vipcode->getMaxDiscount()}% se eles virem ao {$enterpriseName}. Eles também ganham {$vipcode->getMinDiscount()}% de desconto.";

		
		//Message to share with friends
		$message = "[Para enviar aos amigos]\n\n Oi,\n Ganhei {$vipcode->getMinDiscount()}% de desconto no {$enterpriseName}, quando lá fores também ganhas {$vipcode->getMinDiscount()}% de desconto apresentando esse código VIP:\n {$vipcode->getVipCode()}\n\nQualquer dúvida ligue-me\nForte Abraço\n '{$owner->getName()}'";
		
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