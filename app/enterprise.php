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
		
		//constructor
		public function __construct($enterpriseName) {
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
	
		/*
			Business methods
		*/
		public function createNewEnterprise() {
			
		}
		
		
		//updateEnterpriseInformation
		public function updateEnterpriseInformation() {
			
		}
		
		//Delete enterprise
		public function deleteEnterprise($id) {
			
		}
		
		
	}
	
	
?>