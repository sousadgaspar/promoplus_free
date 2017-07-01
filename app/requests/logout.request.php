<?php
	
	session_start();
	define('APPPATH', dirname(__DIR__));
	define('CLASSESPATH', APPPATH . "/classes");
	
	require_once(CLASSESPATH . "/enterprise.php");
	require_once(CLASSESPATH . "/user.php");
	
	$enterprise = new Enterprise();
	$user = new User($enterprise);
	
	if($user->logout()) {
		echo 1;
	}
	else {
		echo 0;
	}
	
	
?>