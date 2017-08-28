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
	$enterprise->setNumberOfDaysForVipCodeExpire($_SESSION['numberOfDaysForVipCodeExpire']);
	$enterprise->setNumberOfIndicationsForMaxDiscount($_SESSION['numberOfIndicationsForMaxDiscount']);
	$owner = new Owner($_POST['name'], "+244" . $_POST['telephone']);
	$vipcode = new Vipcode($enterprise, $owner);
	
	$attendee = new Attendee($_POST['name'], "+244" . $_POST['telephone'], $_SESSION['enterpriseId']);
	$attendee->setInvoiceValue($_POST['invoiceValue']);
	$vipcode->setVipCode($_POST['vipCode']);
	
	
	$validity = $vipcode->isStillValid();
	$isOwner = '';
	$ownerAttended = '';
	$isAttendee = '';
	$attendeeAlreadyAttended = ''; // This attendee needs a new vipCode
	$newAttendee = ''; // The attendee that comes by referrals
	
	//check if this vipCode is valid
	if($validity == 'valid') {
		
		//get the vipCode ownerShip
		$isOwner = $owner->isThisVipCodeMine($vipcode);
		
		//Retrieve vipcode information
		$vipcode->retrieveVipCode($vipcode->getVipCode());
		
		
		
		//check if the vipcode is of owner
		if($isOwner) {
				$owner->setVipCode( $vipcode );
				$ownerAttended = $owner->attend();
				
				//owener register it self as attendee
				$vipcode->enviteAttendee( $attendee );
				
				//Retrieve attendee information for being used in the save invoice method
				$attendee->getAttendeeInformation($attendee->getAttendeeTelephone());
				
				//Owner as attendee - alter the status to attended
				$attendee->attend();
				
				//register the invoice value in the vipCode registry
				$attendee->saveInvoiceValue();	
				
		} 
		else {
				$attendee->setVipCode($vipcode);
				$attendee->getAttendeeInformation("+244" . $_POST['telephone']);
				
				
				if($attendee->attended()) {
					$attendeeAlreadyAttended = 'true';
				}
				else {	
							if($attendee->wasEnvited()) {
							
							//Retrieve attendee information for being used in the save invoice method
							$attendee->getAttendeeInformation($attendee->getAttendeeTelephone());
								
							//Attendee alter the status of his own vipcode
							$attendee->attend();

							//register the invoice value in the vipCode registry
							$attendee->saveInvoiceValue();
							
							//vipCode add credit to awner 
							$vipcode->addCreditToVipCode();
							
							//flag for js request handler 
							$newAttendee = 'true';
						}
						else {
							//owener sends an invite to attendee
							$vipcode->enviteAttendee( $attendee );
							
							//Retrieve attendee information for being used in the save invoice method
							$attendee->getAttendeeInformation($attendee->getAttendeeTelephone());
							
							//register the invoice value in the vipCode registry
							$attendee->saveInvoiceValue();
							
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
	
	$discountInBucks = ''; // The discount value in kwanzas
	//Set the discount in terms of real money
	if( $isOwner ) {
		$discountInBucks = ($vipcode->getCredit() * $vipcode->getInvoiceValue())/100;
	}
	else {
		$discountInBucks = ($vipcode->getMinDiscount() * $vipcode->getInvoiceValue())/100;
	}
	
	
	//Data for JS request handler
	$array = array(	'newAttendee' => $newAttendee, 
					'attendeeAlreadyAttended' => $attendeeAlreadyAttended, 
					'isOwner' => $isOwner, 
					'ownerAttended' => $ownerAttended,
					'ownerName' => $owner->getName(),
					'ownerTelephone' => $owner->getTelephone(),
					'owenrEmail' => $owner->getEmail(),
					'vipCodeCreationTime' => $vipcode->getCreationTime(),
					'minVipCodeDiscount' => $vipcode->getMinDiscount(),
					'credit' => $vipcode->getCredit(),
					'attendeeName' => $attendee->getAttendeeName(),
					'validity'=> $validity,
					'name' => $_POST['name'], 
					'vipcode' => $_POST['vipCode'], 
					'telephone' => $_POST['telephone'], 
					'credit' => $vipcode->getCredit(),
					'maxDiscount' => $vipcode->getMaxDiscount(),
					'discountInBucks' => $discountInBucks,
					'invoiceValue' => $attendee->getInvoiceValue(),
					'enterpriseName' => $_SESSION['enterpriseName']);
	$json = json_encode($array);
	echo ($json);
	
	
?>