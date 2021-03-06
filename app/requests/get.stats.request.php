<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	use SGENIAL\VIPCODE\VipCode;

	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$enterprise->setId($_SESSION['enterpriseId']);
	$vipcode = new VipCode($enterprise);
	
	//get dates
	$firstDate = $_POST['requestedFromDate'];
	$secondDate = $_POST['requestedToDate'];
	
	$response = array();
	
	//collect the date range
	$response['fromDate'] = $firstDate;
	$response['toDate'] = $secondDate;	
	
	//get The KPIs
	$response['totalOfCreatedVipCodes'] = $vipcode->getNumberOfCreatedVipCodes($firstDate, $secondDate);
	$response['totalOfReturnedVipCodes'] = $vipcode->getNumberOfReturnedVipCodes($firstDate, $secondDate);

	//get the aggregated trend
	$createdVipCodeTrend = $vipcode->getCreatedVipCodesByDate($firstDate, $secondDate);
	$createdVipCodeTrendDates = array();
	$createdVipCodeTrendValues = array();
	
	foreach($createdVipCodeTrend as $key=>$value) {
		$createdVipCodeTrendDates[] = $key;
		$createdVipCodeTrendValues[] = $value;
		
	}
	
	$attendedVipCodesTrend = $vipcode->getVipCodeAttendeesByDate($firstDate, $secondDate);
	$attendedVipCodesTrendDates = array();
	$attendedVipCodesTrendValues = array();
	
	foreach($attendedVipCodesTrend as $key=>$value) {
		$attendedVipCodesTrendDates[] = $key;
		$attendedVipCodesTrendValues[] = $value;
		
	}
	
	$response['createdVipCodeTrendDates'] = $createdVipCodeTrendDates;
	$response['createdVipCodeTrendValues'] = $createdVipCodeTrendValues;
	$response['attendedVipCodesTrendDates'] = $attendedVipCodesTrendDates;
	$response['attendedVipCodesTrendValues'] = $attendedVipCodesTrendValues;
	
	//$response['trendOfCreatedVipCodes'] = $vipcode->getCreatedVipCodesByDate($firstDate, $secondDate);
	//$response['trendOfVipCodeAttendeesByDate'] = $vipcode->getVipCodeAttendeesByDate($firstDate, $secondDate);
	
	print json_encode($response);
	
	
	?>