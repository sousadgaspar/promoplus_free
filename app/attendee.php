<?php
	
	/*
		
		Atendee Class
	*/
	
	/*
		requires
	*/
	require_once 'connection.php';
	
	class Attendee{
		//Preperties
		private $id;
		private $vipCode;
		private $attendeeName;
		private $attendeeTelephone;
		private $attendeeEmail;
		private $attendedDate;
		private $status;
		
		
		//costructor
		public function __construct(string $name, string $telephone) {
			$this->setAttendeeName($name);
			$this->setAttendeeTelephone($telephone);
		}
		//gettes
		public function getId() {
			return $this->id;
		} 
		
		public function getVipCode() {
			return $this->vipCode->getVipCode();
		}
		
		public function getAttendeeName() {
			return $this->attendeeName;
		} 
		
		public function getAttendeeTelephone() {
			return $this->attendeeTelephone;
		}
		
		public function getAttendeeEmail() {
			return $this->attendeeEmail;
		}
		
		public function getAttendedDate() {
			return $this->attendedDate;
		}
		
		public function getStatus() {
			return $this->status;
		}
		
		//Setters
		public function setId($id) {
			$this->id = $id;
		}
		
		public function setAttendeeName($attendeeName) {
			$this->attendeeName = $attendeeName;
		}
		
		public function setAttendeeTelephone($attendeeTelephone) {
			$this->attendeeTelephone = $attendeeTelephone;
		}
		
		public function setAttendeeEmail($attendeeEmail) {
			$this->AttendeeEmail = $attendeeEmail;
		}
		
		public function setAttendedDate($attendedDate) {
			$this->attendedDate = $attendedDate;
		}
		
		public function setStatus($status) {
			$this->status = $status;
		}
		
		public function setVipCode(VipCode $vipCode) {
			$this->vipCode = $vipCode;
		}
		
		//Crud methods
		public function saveEnvite() {
			$connection = new Conexao();
			
			try {
				$connection->setSQL("insert into tbVipCodeAttendee(	vipCode, 
																attendeeName, 
																attendeeTelephone, 
																attendeeEmail) 
																values ('{$this->vipCode->getVipCode()}'
																,'{$this->attendeeName}'
																,'{$this->attendeeTelephone}'
																,'{$this->attendeeEmail}'
																)");
				$connection->executar();
			} catch(Exception $error) {
				//write the error in the app log file.
				return $error->getTrace();
			}
			
		}
		
		//attend
		public function attend() {
			//attend a vip code
			//update tbVipCode set status = '{$this->status}';
			$this->setStatus("attended");
			
			$sql = "update tbVipCodeAttendee set status = '{$this->status}' where attendeeTelephone = '{$this->attendeeTelephone}'";
			
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				$connection->executar();
			}
			catch(Exception $error) {
				//write the logs in the application log
				$error->getTrace();
			}
		}
		
		
		//Attendee Attended vip code: check if attendee already attended or no a vip code
		public function attended() {
			//return true or false
			//select attendeeTelephone where vipCode = '{vipCode}' and status="attended";
			$sql = "select attendeeTelephone where vipCode = '{$this->vipCode}' and status=attended;";
			
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetch = $connection->consultar();
				
				$fetchedTelephone = '';
				foreach($fetch as $value) {
					$fetchedTelephone = $value->attendeeTelephone;
				}
				
				if(($fetchedTelephone != $this->attendeeTelephone) or ($fetchedTelephone == null)) {
					print "false" . PHP_EOL;
					print $sql . PHP_EOL;
					return false;
				}
				else{
					print "true" . PHP_EOL;
					print $sql . PHP_EOL;
					return true;
				}
			}
			catch(Exception $error) {
				//write error in application logs
				$error->getTrace();
			}
		}
		
		
		//receivedEnvite
		public function receivedEnvite() {
			$sql = "select attendeeTelephone where vipCode = '{$this->vipCode->getVipCode()}' and status=valid;";
			
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetch = $connection->consultar();
				
				$fetchedTelephone = '';
				foreach($fetch as $value) {
					$fetchedTelephone = $value->attendeeTelephone;
				}
				
				if(($fetchedTelephone == $this->attendeeTelephone)) {
					return true;
				}
				else{
					return false;
				}
			}
			catch(Exception $error) {
				//write error in application logs
				$error->getTrace();
			}

		}
		
		//Was envited : check if the attendee was already envited
		public function wasEnvited() {
			//return true or false
			//select attendeeTelephone where vipCode = '{vipCode}' and status="valid";
			$sql = "select attendeeTelephone from tbVipCodeAttendee where attendeeTelephone = '{$this->getAttendeeTelephone()}' and vipCode = '{$this->vipCode->getVipCode()}' and status= 'valid';";
			
			try {
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetch = $connection->consultar();
				$fetchedTelephone = '';
				foreach($fetch as $value) {
					$fetchedTelephone = $value->attendeeTelephone;
				}
				if($this->attendeeTelephone == $fetchedTelephone) {
					return true;
				}
				else {
					return false;
				}
				
				
				//return $this->attendeeTelephone . PHP_EOL . $fetchedTelephone . PHP_EOL . $sql;
			}
			catch(Exception $error) {
				//write logs in the application logs
				$error->getTrace();
			}
			
			
		}
	}
	
?>