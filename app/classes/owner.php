<?php namespace SGENIAL\VIPCODE;
	
	/*
		Class: Owner
	*/
	
	
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
		
		
		//Retrieve ownerInformation based on telephone
		public function getOwnerInformation(string $telephone) {
			$this->setTelephone ($telephone);
			try{
				$sql = "select 	vipCode, 
								ownerName, 
								ownerTelephone, 
								ownerEmail, 
								ownerFaceBook,
								ownerAddress, 
								ownerReturned from tbVipCode where vipCode = '{$this->vipCode->getVipCode()}' 
															 and ownerTelephone = '{$this->getTelephone()}';";
				
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetch = $connection->consultar();
				if($fetch != null) {
					foreach($fetch as $value) {
						$this->setName($value->ownerName);
						$this->setTelephone($value->ownerTelephone);
						$this->setEmail($value->ownerEmail);
						$this->setFaceBook($value->ownerFaceBook);
						$this->setAddress($value->ownerAddress);
						$this->setReturn($value->ownerReturned);
					}
				}
				}
				catch(Exception $error) {
					//write the logs in the application log
					$error->getTrace();
			}
			//select * from tbVipCode where vipCode = '{$this->vipCode}' and ownerTelephone = '{$this->owner->getTelephone()}';
			
		}
				
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
		public function isThisVipCodeMine(VipCode $vipCode) {
			
			$sql = "select ownerTelephone from tbVipCode where ownerTelephone = '{$this->telephone}' and vipCode = '{$vipCode->getVipCode()}'";
			
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
		
		
		//hasAValidVipCode
		public function hasAValidVipCode() {
			
			$sql = "select ownerTelephone from tbVipCode where ownerTelephone = '{$this->telephone}' and status='valid'";
			
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
		
		
		//attend
		public function attend() {
			//Owner attends his own vip code
			$this->setStatus("ownerAttended");
			
			$sql = "update tbVipCode set status = '{$this->status}', ownerAttededDate = '" . date('Y-m-d H:i:s') . "' where vipCode = '{$this->vipCode->getVipCode()}'";
			
			try{
				$connection = new Conexao();
				$connection->setSQL($sql);
				if($connection->executar() == null) {
					return true;
				}
				else {
					return false;
				}
			}
			catch(Exception $error) {
				//write the logs in the application log
				$error->getTrace();
			}
		}	
		
		
		
		
		
		
		
		
		//write a script for generating set and get classes.
		
	}