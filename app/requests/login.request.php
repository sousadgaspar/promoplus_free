<?
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	session_start();
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	use SGENIAL\VIPCODE\User;

	//test credencials
	//$_POST['email'] = 'silviogomes@sgenial.co';
	//$_POST['password'] = '654321';
	
	
	if(!isset($_POST['email']) or (!isset($_POST['password'])))
		return false;
	
	$enterprise = new Enterprise();
	$user = new User($enterprise);
	
	$user->setEmail($_POST['email']);
	$user->setPassword($_POST['password']);
	
	
	//login result
	$result = array();
	//try to login
	if($user->login()) {
		
		//get user information
		$user->retrieveUserInformation($user->getEmail());
		$user->getEnterpriseId();
		$enterprise->retrieveEnterpriseInformation($user->getEnterpriseId());
		$user->getSessionInformation();
		
		//flag the logged user
		$logged = true;
		
		$result['logged'] = $logged;
	}
	else {
		$logged = false;
		$result['logged'] = $logged;
	}
	
	return json_encode($result);

	
	
	
	
	
?>