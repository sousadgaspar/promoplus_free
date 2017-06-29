<?php
	/*
		Notifiyer class
	*/
	class Notifyer{
		private $sms;
		private $email;
		private $genericTextMessage;
		private $to;
		private $from;
		
		//construct
		public function __construct($from, $to) {
			$this->setFrom($from);
			$this->setTo($to);
		}
		
		
		//getters
		public function getSMS() {
			return $this->sms;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getGenericTextMessage() {
			return $this->genericTextMessage;
		}
		
		public function getFrom() {
			return $this->from;
		}
		
		
		//setters
		public function setSMS($sms) {
			$this->sms = htmlspecialchars($sms);
		}
		
		public function setEmail($email) {
			$this->email = htmlspecialchars($email);
		}
		
		public function setGenericTextMessage($genericTextMessage) {
			$this->genericTextMessage = htmlspecialchars($genericTextMessage);
		}
		
		public function setFrom($from) {
			$this->from = $from;
		}
		
		public function setTo($to) {
			$this->to = $to;
		}
		
		public function sendSMS() {
			echo "SMS to: ". $this->to . " Sent!";
		}
		
		
		/*
			Business case functions
		*/
		public function sendEmail() {
			echo "E-mail to: " . $this->to . " Sent!";
		}

	}
	
	
?>