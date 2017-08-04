<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	use SGENIAL\VIPCODE\Owner;
	use SGENIAL\VIPCODE\VipCode;
	use Plivo\RestAPI;
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setId($_SESSION['enterpriseId']);
	
	$owner = new Owner($_POST['name'], $_POST['telephone'], $_POST['email']);
	//flag for js request handler
	$ownerHasAnOpenVipCode = '';
	
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
		
		
		//PLIVO API
		$auth_id = "MAM2U5NGY2NTVHMMEXOD";
		$auth_token = "ODViZjhkZWZmYWYyNWMwYzI1M2MwZmFkNGFkMTA5";
		$p = new RestAPI($auth_id, $auth_token);
	
		
		$message1  = "VIPCode:\n{$vipcode->getVipCode()}\n\nQuando voltar ao '{$enterprise->getName()}' receberás um desconto de {$vipcode->getMinDiscount()}%. Partilhe o seu código VIP com 5 amigos desconto de {$vipcode->getMaxDiscount()}% se eles virem ao '{$enterprise->getName()}'. Eles também ganham {$vipcode->getMinDiscount()}% de desconto.";

		
		//Message to share with friends
		$message2 = "[Para enviar aos amigos]\n\n Oi,\n Ganhei {$vipcode->getMinDiscount()}% de desconto no '{$enterprise->getName()}', quando lá fores também ganhas {$vipcode->getMinDiscount()}% de desconto apresentando esse código VIP:\n {$vipcode->getVipCode()}\n\nQualquer dúvida ligue-me\nForte Abraço\n '{$owner->getName()}'";
		
		$response1 = '';
		$response2 = '';	
			
		$params1 = array(
		    'src' => 'VIPCode',
		    'dst' => $_POST['telephone'],
		    'text' => $message1
		);
		$response1 = $p->send_message($params1);
		
		$params2 = array(
		    'src' => 'VIPCode',
		    'dst' => $_POST['telephone'],
		    'text' => $message2
		);
		$response2 = $p->send_message($params2);
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
				'smsresponse1' => @$response1,
				'smsresponse2' => @$response2,
				'numberOfIndicationsForMaxDiscount' => $_SESSION['numberOfIndicationsForMaxDiscount'],
				'enterpriseName' => $_SESSION['enterpriseName']
			
	);
	
	$json = json_encode($array);
	
	print $json;
	
	
	
	
	

	
/*
	
*/
	
	
	
	
?>