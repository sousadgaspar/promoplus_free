<?php
	
	/*
		Class: Owner
	*/
	
	
	/*
		requires
	*/
	require_once 'connection.php';
	require_once 'helpers/notifyer.php';
	require_once 'attendee.php';
	
	class Owner{
		
		//constructor
		public function __construct(string $name, string $telephone, string $email = "none" ) {
			$this->name = $name;
			$this->telephone = $telephone;
			$this->email = $email;
		}
		
		//Properties
		private $id;
		private $status;
		private $name;
		private $telephone;
		private $faceBook;
		private $email;
		private $address;
		private $returned;
		private $vipCode;
		
		//getters
		public function getId() {
			return $this->id;
		}
		
		public function getStatus() {
			return $this->status;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getTelephone() {
			return $this->telephone;
		}
		
		public function getFaceBook() {
			return $this->faceBook;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getAddress() {
			return $this->address;
		}
		
		public function getReturned() {
			return $this->returned;
		}
		
		public function getVipCode() {
			return $this->vipCode;
		}
		
		//Setters
		public function setId($id) {
			$this->id = $id;
		}
				
		public function setStatus($status) {
			$this->status = $status;
		}		

		public function setName($name) {
			$this->name = $name;
		}
		
		public function setTelephone ($telephone) {
			$this->telephone = $telephone;
		}
		
		public function setFaceBook($faceBook) {
			$this->faceBook = $faceBook;
		}	
	
		public function setEmail($email) {
			$this->email = $email;
		} 	

		public function setAddress($address) {
			$this->address = $address;
		}
		
		public function setReturn($returned) {
			$this->returned = $returned;
		}
		
		public function setVipCode(VipCode $vipCode) {
			$this->vipCode = $vipCode;
		}
		
		
		/*
			Busines methods
		*/
		
				
		//reffer attendee
		public function reffer(Attendee $attendee) {
			try {
				$attendee->saveRefferal();
				
				//notify the Attendee
				
			}
			catch(Exception $error) {
				//write the logs in the app logs
				$error->getTrace();
			}
			
		}
		
		//IsThisVipCodeMine
		public function isThisVipCodeMine() {
			$sql = "select ownerTelephone from tbVipCode where ownerTelephone = '{$this->telephone}'";
			
			$connection = new Conexao();
			$connection->setSQL($sql);
			
			$fetch = $connection->consultar();
			$fetchedTelephone = '';
			foreach($fetch as $value) {
				$fetchedTelephone = $value->ownerTelephone;
			}
			
			if($this->telephone == $fetchedTelephone) { 
				return true; 
			}
			else {
				return false;
			}
			
		}		
	
		
		
		
		
		
		
		
		
		//write a script for generating set and get classes.
		
	}