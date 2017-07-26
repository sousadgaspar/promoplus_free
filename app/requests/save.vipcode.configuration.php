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
	
	
	//collect VipCode configuration information from POST request
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setMinDiscount($_POST['newMinDiscount']);
	$enterprise->setMaxDiscount($_POST['newMaxDiscount']);
	$enterprise->setNumberOfIndicationsForMaxDiscount($_POST['newNumberOfIndicationsForMaxDiscount']);
	
	//prepare the array for result return
	$result = array();
	$isUpdated = $enterprise->updateEnterpriseVipcodeConfiguration();
	if($isUpdated) {
		$_SESSION['minDiscount'] = $enterprise->getMinDiscount();
		$_SESSION['maxDiscount'] = $enterprise->getMaxDiscount();
		$_SESSION['numberOfIndicationsForMaxDiscount'] = $enterprise->getNumberOfIndicationsForMaxDiscount();
	}
	$result['isUpdated'] = $isUpdated;
	
	$json = json_encode($result);
	
	print $json;
	
	
?>