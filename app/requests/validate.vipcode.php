<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	define('APPPATH', dirname(__DIR__));
	define('CLASSESPATH', APPPATH . "/classes");

	//requires 
	require_once CLASSESPATH . '/vipcode.php';
	require_once CLASSESPATH . '/owner.php';
	require_once CLASSESPATH . '/attendee.php';
	require_once CLASSESPATH . '/enterprise.php';
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$vipcode = new Vipcode($enterprise);
	$vipcode->setVipCode($_POST['vipCode']);
	
	$validity = [];
	$validity['validity'] = $vipcode->isStillValid();
	$isOwner = '';
	$ownerAttended = '';
	//check if this vipCode is valid
	if(($validity['validity']) == 'valid') {
		
		$owner = new Owner($_POST['name'], $_POST['telephone']);
		$isOwner = $owner->isThisVipCodeMine($vipcode);
		
		//check if the vipcode is of owner
		if($isOwner) {
			$owner->attend();
		}
	}

	
	$array = array('isOwner'=>$isOwner, 'validity'=>$validity['validity'],'name'=>$_POST['name'], 'vipcode'=>$_POST['vipCode'], 'telephone'=>$_POST['telephone'], 'enterpriseName'=>$_SESSION['enterpriseName']);
	$json = json_encode($array);
	echo ($json);
	
	
?>