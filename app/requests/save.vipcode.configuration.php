<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	
	//collect VipCode configuration information from POST request
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setMinDiscount($_POST['newMinDiscount']);
	$enterprise->setMaxDiscount($_POST['newMaxDiscount']);
	$enterprise->setNumberOfIndicationsForMaxDiscount($_POST['newNumberOfIndicationsForMaxDiscount']);
	$enterprise->setNumberOfDaysForVipCodeExpire($_POST['newNumberOfDaysForVipCodeExpire']);
	
	//prepare the array for result return
	$result = array();
	$isUpdated = $enterprise->updateEnterpriseVipcodeConfiguration();
	if($isUpdated) {
		$_SESSION['minDiscount'] = $enterprise->getMinDiscount();
		$_SESSION['maxDiscount'] = $enterprise->getMaxDiscount();
		$_SESSION['numberOfIndicationsForMaxDiscount'] = $enterprise->getNumberOfIndicationsForMaxDiscount();
		$_SESSION['numberOfDaysForVipCodeExpire'] = $enterprise->getNumberOfDaysForVipCodeExpire();
	}
	$result['isUpdated'] = $isUpdated;
	$result['numberOfDaysForVipCodeExpire'] = $_SESSION['numberOfDaysForVipCodeExpire'];
	
	$json = json_encode($result);
	
	print $json;
	
	
?>