<?php
	
	session_start();
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	use SGENIAL\VIPCODE\User;
	
	$enterprise = new Enterprise();
	$user = new User($enterprise);
	
	if($user->logout()) {
		echo 1;
	}
	else {
		echo 0;
	}
	
	
?>