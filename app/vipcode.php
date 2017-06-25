<?php
	
	/*
		Class: VipCode
	*/
	
	
	/*
		requires
	*/
	require_once 'connection.php';
	require_once 'helpers/notifyer.php';
	require_once 'enterprise.php';
	require_once 'attendee.php';
	class VipCode{
		
		//constructor
		public function __construct(Enterprise $enterprise, Owner $owner) {
			$this->enterprise = $enterprise;
			$this->owner = $owner;
			$this->owner->setVipCode($this);
		}
		
		//Properties
		private $id;
		private $vipCode;
		private $vipCodeUniqueId;
		private $minDiscount;
		private $maxDixount;
		private $credit;
		private $creationDate;
		private $validTill;
		private $status;
		private $isPublic;
		private $enterprise;
		private $owner;
		
		
		//getters
		public function getId() {
			return $this->id;
		}
		
		public function getVipCode() {
			return $this->vipCode;
		}
		
		public function getMinDiscount() {
			return $this->minDiscount;
		}
		
		public function getMaxDiscount() {
			return $this->maxDiscount;
		}
		
		public function getCredit() {
			return $this->credit;
		}
		
		public function getCreationTime() {
			return $this->creationTime;
		}
		
		public function getValidTill() {
			return $this->validTill;
		}
		
		public function getStatus() {
			return $this->status;
		}
		
		public function vipCodeIsPublic() {
			return $this->isPublic;
		}
		
		
		//Setters
		public function setId($id) {
			$this->id = $id;
		}
		
		public function setVipCode($vipCode) {
			$this->vipCode = $vipCode;
		}
		
		public function setMinDiscount($minDiscount) {
			$this->minDiscount = $minDiscount;
		}
		
		public function setMaxDiscount($maxDiscount) {
			$this->maxDiscount = $maxDiscount;
		}
				
		public function setCredit($credit) {
			$this->credit = $credit;
		}
		
		public function setValidTill($validTill) {
			$currentDate = strtotime(date('Y-m-d'));
			$newDate = strtotime("+$validTill day", $currentDate);
			$this->validTill = date('Y-m-d', $newDate);
		}	
		
		public function setCreationDate($creationDate) {
			$this->creationDate = $creationDate;
		}	
		
		public function setModificationDate($modificationDate) {
			$this->modificationDate = $modificationDate;
		}	
		
		public function setStatus($status) {
			$this->status = $status;
		}		
		
		public function setVipCodeVisibility($isPublic) {
			$this->isPublic = $isPublic;
		}
		

		
		
		/*
			Busines methods
		*/
		
		//form vipCode - generate a VIP CODE for being recoreded
		private function formVipCode() {
			$this->vipCodeUniqueId = explode('.', microtime(true))[0] . explode('.', microtime(true))[1];
			$this->vipCode = "DeVoltaAo" . ucfirst($this->enterprise->getName()) . "#". $this->vipCodeUniqueId;
			return $this->vipCode;
		}
		
		//New VipCode
		public function createNewVipCode($discount, $credit , $validityInDays, $status, Notifyer $notifyer) {
			$connection = new Conexao();
			$this->setVipCode($this->formVipCode());
			$this->setDiscount($discount);
			$this->setCredit($credit);
			$this->setValidityPeriod($validityInDays);
			$this->setStatus($status);
			
			$sql = "insert into tbVipCode(vipCode, 
											enterpriseId, 
											minDiscount,
											maxDiscount,
											credit,
											validTill,
											status,
											ownerName,
											ownerTelephone,
											ownerEmail,
											ownerFaceBook,
											ownerAddress ) 
											values( '$this->vipCode'
													, {$this->enterprise->getId()} 
													,'$this->mindiscount'
													,'$this->maxdiscount'
													,'$this->credit'
													,'$this->validTill'
													,'$this->status'
													,'{$this->owner->getName()}'
													,'{$this->owner->getTelephone()}'
													,'{$this->owner->getEmail()}'
													,'{$this->owner->getFaceBook()}'
													,'{$this->owner->getAddress()}')";
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				$connection->executar();
								
				//At the end nitify user with SMS
				//$notifiyer->sendSMS();
			}
			catch(Exception $error) {
				//write the logs in the app logs
				$error->getTrace();
			}
		}
		
		
		/*
			RetrieveVipCode
		*/
		public function retrieveVipCode($vipCode) {
			
			$this->setVipCode($vipCode);
			// Get all Vip Code Information
			$sql = "select * from tbVipCode where vipCode = '$this->vipCode'";
			
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetch = $connection->consultar();
				
				foreach($fetch as $value) {
					$this->setId($value->id);
					$this->setMinDiscount($value->minDiscount);
					$this->setMaxDiscount($value->maxDiscount);
					$this->setCredit($value->credit);
					$this->setCreationDate($value->creationtDate);
					$this->setModificationDate($value->modificationDate);
					$this->setValidTill($value->validTill);
					$this->setStatus($value->status);
					$this->setVipCodeVisibility($value->isPublic);
					$this->enterprise->setId($value->enterpriseId);
					$this->owner->setName($value->ownerName);
					$this->owner->setTelephone ($value->ownerTelephone);
					$this->owner->setEmail($value->OwnerEmail);
					$this->owner->setFaceBook($value->ownerFaceBook);
					$this->owner->setAddress($value->ownerAddress);
				}
				
				//foreach($fetch as $value) {
					
				//}
				
			}
			catch(Exception $error) {
				//Write the error to the application log
				$error->getTrace();
			}
		}
		
		
		//Disable VipCode
		public function disableVipCode($typeOfDisable="awnerAttended", Notifyer $notifiyer) {
			/*
				Vip code can assume the following status:
					- awnerAttended
					- Valid
					- Expired
			*/
			
			$this->setVipCode($vipCode);
			$this->setStatus($typeOfDisable);
			
			$sql = "update tbVipCode set status = $this->status where vipcode = $this->vipCode";
			
			try{
				$connection->setSQL($sql);
				$connection->executar();
				
				//Notify the client that vipCode expired
				$notifiyer->sendSMS();
			}
			catch(Exception $error) {
				//write the logs in the application log file
				$error->getTrace();
			}
		}
		
		//addCredit
		public function addCreditToVipCode() {
			//get the number of attendees for the vip code
			//select count(vipCode) from tbAttendee where vipCode = '{$this->vipCode}';
			$connection = new Conexao();
			
			$sql = "select count(vipCode) as numberOfAttendees from tbVipCodeAttendee where vipCode = '{$this->vipCode}'";
			$connection->setSQL($sql);
			
			$numberOfAttendees = $connection->consultar();
			foreach($numberOfAttendees as $value) {
				$numberOfAttendees = $value->numberOfAttendees;
			}
			
			//apply credit depending of the number os attendees.
			//if one indicated apply credit += (maxDiscount - minDiscount) * 0,2
			//if two indicated apply credit += (maxDiscount - minDiscount) * 0,4
			//if three indicated apply credit += (maxDiscount - minDiscount) * 0,6
			//if four indicated apply credit += (maxDiscount - minDiscount) * 0,8
			//if five indicated apply credit += (maxDiscount - minDiscount) * 1
			
			//if both min and max discount are iqual it means that there's no discount regardless the number of refferral vip code owner brings to a place. 
			if($this->minDiscount == $this->maxDiscount) {
				return $this->credit;
			}
			
			for ($i = 0; $i < $numberOfAttendees; $i + 0.2) {
				$this->credit += ($this->maxDiscount - $this-> minDiscount) * $i;
			}
			
			return $this->credit;
		}
		
		//validateVipCode
		public function validateVipCode(Notifyer $notifiyer) {
			//is VipCode still valid?
			if($this->isStillValid() == false) { return "O vipCode '{$this->vipCode}' j&aacute; n&atilde;o &eacute; v&aacute;lido."; }
			
			
			//if yes 
				//isOwner?
				//if yes
				//update table tbVipCode set ownerReturned = true, status = "expired", expirationDate = date('Y-m-da H:i:s')
			
				//if no
				//check if attendee attended already the vip code
				//attended?
				//if yes, says: sorry you already used this vipCode do you want a new one?
				//if no
				//
				
			//if no
			// sorry this vip code is still no longuer valid. Do you want a new one?
		}
		
		//
		
		//setValidityPeriod
		public function setValidityPeriod(int $days) {
			//update table tbVipCode set validTill = {$days};
		}
		
		//Envite attendee
		/*
			This function needs to be reviwed and given to Owner class
		*/
		public function enviteAttendee (Attendee $attendee) {
			if($this->isStillValid() == false) { return "VipCode '{$this->vipCode}' já não é válido"; }
			$attendee->setVipCode($this->getVipCode());
			try {
				$attendee->saveEnvite();
			}
			catch(Exception $error) {
				//write the logs in the application logs
				$error->getTrace();
			}
		}
		
		//Check validity
		public function isStillValid() {
			$connection = new Conexao();
			$connection->setSQL("select status from tbVipCode where vipCode = '{$this->vipCode}';");
			foreach($connection->consultar() as $value) {
				$this->setStatus($value->status);
			}
			if($this->status != null) {
				if($this->status == "valid") {return true;} // the vipCode is valid
				if($this->status == "expired") {return false;} //expired validity period
				if($this->status == "awnerAttended") {return false;} // owner of vipCode attended his own vipCode
			}
			else{
				return false;
			}
			
		}
		
		//is Owner?
		public function isOwner($telephone) {
			$this->owner->setTelephone($telephone);
			return $this->owner->isThisVipCodeMine();
		}
		
	
		
		
		
		
		
		
		
		//write a script for generating set and get classes.
		
	}