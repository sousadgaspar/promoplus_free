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
		
		public function setVipCode($vipCode) {
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
																values ('{$this->vipCode}'
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
		
		
		//Attendee Attended vip code: check if attendee already attended or no a vip code
		public function attended() {
			//return true or false
			//select attendeeTelephone where vipCode = '{vipCode}' and status="attended";
		}
		
		//Was envited : check if the attendee was already envited
		public function wasEnvited() {
			//return true or false
			//select attendeeTelephone where vipCode = '{vipCode}' and status="valid";
		}
	}
	
?>