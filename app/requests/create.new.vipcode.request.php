<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	define('APPPATH', dirname(__DIR__));
	define('CLASSESPATH', APPPATH . "/classes");
	
	require_once CLASSESPATH . '/enterprise.php';
	require_once CLASSESPATH . '/owner.php';
	require_once CLASSESPATH . '/vipcode.php';
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setId($_SESSION['enterpriseId']);
	
	$owner = new Owner($_POST['name'], $_POST['telephone'], $_POST['email']);
	$vipcode = new Vipcode($enterprise, $owner);
	
	//check if the client as an open vipCode
	
/*
	Debug
	print $_POST['name'];
	print $_POST['telephone'];
	print $_POST['email'];
*/
	
	//create the new vipCode
	$vipcode->setVipCode(($vipcode->createNewVipCode(10, 25, 30)));
	$vipcode->retrieveVipCode($vipcode->getVipCode());
	
	$array = array('vipcode' => $vipcode->getVipCode(),
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
			 'returned' => $owner->getReturned()
			
	);
	
	$json = json_encode($array);
	
	print $json;
	
	
	
	
	

	
/*
	
*/
	
	
	
	
?>