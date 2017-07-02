<?php
	
	/*
		Enterprise class
	*/
	require_once 'connection.php';
	
	class Enterprise{
		//Properties
		private $id;
		private $name;
		private $enterpriseLegalId;
		private $address;
		private $coords;
		private $telephone;
		private $mobilePhone;
		private $mobilePhoneOptional;
		private $website;
		private $faceBookPage;
		private $managerName;
		private $managerMobilePhone;
		private $managerEmail;
		private $status;
		private $creationDate;
		
		//constructor
		public function __construct($enterpriseName = '') {
			$this->setName($enterpriseName);
		}
		
		//getters
		public function getId() {
			return $this->id;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getEnterpriseLegalId() {
			return $this->enterpriseLegalId;
		}
		
		public function getAddress() {
			return $this->address;
		}
		
		public function getCoords() {
			return $this->coords;
		}
		
		public function getTelephone() {
			return $this->telephone;
		}
		
		public function getMobilePhone() {
			return $$this->mobilePhone;
		}
		
		public function getMobilePhoneOptional() {
			return $$this->mobilePhoneOptional;
		}
		
		public function getWebsite() {
			return $this->webSite;
		}
		
		public function getFaceBookPage() {
			return $this->faceBookPage;
		}
		
		public function getManagerName() {
			return $this->managerName;
		}
		
		public function getManagerMobilePhone() {
			return $this->managerMobilePhone;
		}
		
		public function getManagerEmail() {
			return $this->managerEmail;
		}
		
		public function getStatus() {
			return $this->status;
		}
		
		public function getCreationDate() {
			return $this->creationDate;
		}
		
		//setters
		public function setId($id) {
			$this->id = $id;
		}
		
		public function setName($name) {
			$this->name = $name;
		}
		
		public function setEnterpriseLegalId($enterpriseLegalId) {
			$this->enterpriseLegalId = $enterpriseLegalId;
		}

		public function setAddress($address) {
			$this->address = $address;
		}
		
		public function setCoords($coords) {
			$this->coords = $coords;
		}
		
		public function setTelephone($telephone) {
			$this->telephone = $telephone;
		}

		public function setMobilePhone($mobilePhone) {
			$this->mobilePhone = $mobilePhone;
		}

		public function setMobilePhoneOptional($mobilePhoneOptional) {
			$this->mobilePhoneOptional = $mobilePhoneOptional;
		}
		
		public function setWebsite($website) {
			$this->website = $website;
		}
		
		public function setFaceBookPage($faceBookPage) {
			$this->faceBookPage = $faceBookPage;
		}
		
		public function setManagerName($managerName) {
			$this->managername = $managerName;
		}

		public function setManagerMobilePhone($managerMobilePhone) {
			$this->managerMobilePhone = $managerMobilePhone;
		}
		
		public function setManagerEmail($email) {
			$this->email = $email;
		}
		
		public function setStatus($status) {
			$this->status = $status;
		}
		
		public function setCreationDate($date) {
			$this->creationDate = $date;
		}
	
		/*
			Business methods
		*/
		public function createNewEnterprise() {
			try {
				$sql = "INSERT INTO tbenterprise (	
													name, 
													address, 
													coords, 
													telephone, 
													mobilePhone, 
													mobilePhoneOptional, 
													website, 
													faceBook, 
													managerName, 
													managerMobilePhone, 
													managerEmail, 
													enterpriseLegalId, 
													
													isActive)
						VALUES
							(
								'{$this->getName()}', 
								'{$this->getAddress()}', 
								'{$this->getTelephone()}', 
								'{$this->getMobileTelePhoneOptional()}', 
								'{$this->getWebsite}', 
								'{$this->getFaceBook()}', 
								'{$this->getManagerName()}', 
								'{$this->getManagerMobilePhone()}', 
								'{$this->getManagerEmail()}', 
								'{$this->getManagerEmail}', '', 
								'{$this->getEnterpriseLegalId()}',
								 1);";
								 
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
				//write to error logs
				$error->getTrace();
			}
		}
		
		//retrieve enterprise Information
		public function retrieveEnterpriseInformation($id) {
			$this->setId($id);
			try {
				//sql
				$sql = "select 	id,
								name, 
								address, 
								coords, 
								telephone, 
								mobilePhone, 
								mobilePhoneOptional, 
								website, 
								faceBook, 
								managerName, 
								managerMobilePhone, 
								managerEmail, 
								enterpriseLegalId, 
								creationDate,
								isActive 
								
								from tbEnterprise where id = '{$this->getId()}'";
				
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetchedData = $connection->consultar();
				
				foreach($fetchedData as $value) {
					$this->setId($value->id);
					$this->setName($value->name);
					$this->setAddress($value->address);
					$this->setCoords($value->coords);
					$this->setTelephone($value->telephone);
					$this->setMobilePhone($value->mobilePhone);
					$this->setMobilePhoneOptional($value->mobilePhoneOptional);
					$this->setWebsite($value->website);
					$this->setFaceBookPage($value->faceBook);
					$this->setManagerName($value->managerName);
					$this->setManagerMobilePhone($value->managerMobilePhone);
					$this->setManagerEmail($value->managerEmail);
					$this->setEnterpriseLegalId($value->enterpriseLegalId);
					$this->setCreationDate($value->creationDate);
					$this->setStatus($value->isActive);
				}
			}
			catch(Exception $error) {
				//write the error in the application logs
				$error->getTrace();
			}
		}
		//updateEnterpriseInformation
		public function updateEnterpriseInformation() {
			
		}
		
		//Delete enterprise
		public function deleteEnterprise($id) {
			
		}
		
		
	}
	
	
?>