<?php
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	header('Content-type: application/json');
	session_start();
	define('APPPATH', dirname(__DIR__));
	
	require_once '../../vendor/autoload.php';
	
	use SGENIAL\VIPCODE\Enterprise;
	use SGENIAL\VIPCODE\Owner;
	use SGENIAL\VIPCODE\VipCode;
	use SGENIAL\VIPCODE\Attendee;
	
	$enterprise = new Enterprise($_SESSION['enterpriseName']);
	$owner = new Owner($_POST['name'], $_POST['telephone']);
	$vipcode = new Vipcode($enterprise, $owner);
	
	$attendee = new Attendee($_POST['name'], $_POST['telephone']);
	$vipcode->setVipCode($_POST['vipCode']);
	
	$validity = $vipcode->isStillValid();
	$isOwner = '';
	$ownerAttended = '';
	$isAttendee = '';
	$attendeeAlreadyAttended = ''; // This attendee needs a new vipCode
	$newAttendee = ''; // The attendee that comes by referrals
	
	//check if this vipCode is valid
	if($validity == 'valid') {
		
		$isOwner = $owner->isThisVipCodeMine($vipcode);
		
		//check if the vipcode is of owner
		if($isOwner) {
				$owner->setVipCode( $vipcode );
				$ownerAttended = $owner->attend();
				$vipcode->retrieveVipCode($vipcode->getVipCode());
		} 
		else {
				$attendee->setVipCode($vipcode);
				$attendee->getAttendeeInformation($_POST['telephone']);
				if($attendee->attended()) {
					$attendeeAlreadyAttended = 'true';
				}
				else {	
						$vipcode->retrieveVipCode($vipcode->getVipCode());
						if($attendee->wasEnvited()) {
							
						//Attendee alter the status of his own vipcode
						$attendee->attend();
						
						//vipCode add credit to awner 
						$vipcode->addCreditToVipCode();
						
						//flag for js request handler 
						$newAttendee = 'true';
						}
						else {
							//owener sends an invite to attendee
							$vipcode->enviteAttendee( $attendee );
							
							//attendee accept the envite - alter the status to attended
							$attendee->attend();
							
							//increese the discount of the vipcode owner
							$vipcode->addCreditToVipCode();
							
							//flag for js request handler
							$newAttendee = 'true';
						}
				}
				
		}
		
	}//End check if this vipCode is valid
	
	
	//Data for JS request handler
	$array = array(	'newAttendee'=>$newAttendee, 
					'attendeeAlreadyAttended'=>$attendeeAlreadyAttended, 
					'isOwner'=>$isOwner, 
					'ownerAttended' => $ownerAttended,
					'ownerName' => $owner->getName(),
					'ownerTelephone' => $owner->getTelephone(),
					'owenrEmail' => $owner->getEmail(),
					'vipCodeCreationTime' => $vipcode->getCreationTime(),
					'minVipCodeDiscount' => $vipcode->getMinDiscount(),
					'credit' => $vipcode->getCredit(),
					'attendeeName' => $attendee->getAttendeeName(),
					'validity'=>$validity,
					'name'=>$_POST['name'], 
					'vipcode'=>$_POST['vipCode'], 
					'telephone'=>$_POST['telephone'], 
					'enterpriseName'=>$_SESSION['enterpriseName']);
	$json = json_encode($array);
	echo ($json);
	
	
?>