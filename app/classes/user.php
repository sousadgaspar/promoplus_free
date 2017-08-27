<?php	namespace SGENIAL\VIPCODE;
	
	use Conexao;
	/*
		Class: User
	*/
	
	class User {
		
		/*
			properties
		*/
		private $id;
		private $name;
		private $mobilePhone;
		private $email;
		private $category;
		private $passWord;
		private $passwordAttempts;
		private $status;
		private $enterprise;
		
		/*
			_costruct
		*/
		public function __construct(Enterprise $enterprise) {
			$this->enterprise = $enterprise;
		}
		
		
		/*
			getters
		*/
		public function getId() {
			return $this-id;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getMobilePhone() {
			return $this->mobilePhone;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getCategory() {
			return $this->category;
		}
		
		public function getPassword() {
			return $this->password;
		}
		
		public function getStatus() {
			return $this->status;
		}
		
		public function getEnterpriseId() {
			return $this->enterprise->getId();
		}
		
		
		//setters
		public function setId(int $id) {
			$this->id = $id;
		} 
		
		public function setName($name) {
			$this->name = $name;
		}
		
		public function setMobilePhone($mobilePhone) {
			$this->mobilePhone = $mobilePhone;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function setCategory($category) {
			$this->category = $category;
		}
		
		public function setPassword($password) {
			$this->password = $password;
		}
		
		public function setPasswordAttempts($passwordAttempts) {
			$this->password = $passwordAttempts;
		}
		
		public function hashPassword($passWord) {
			$this->password = password_hash($passWord, PASSWORD_BCRYPT, ['cost' => 12]);
		}
		
		public function setStatus($status) {
			$this->status = $status;
		}
		
		public function setEnterpriseId($id) {
			return $this->enterprise->setId($id);
		}
		
		
		
		
		/*
			business functions
		*/
		
		
		//create new User
		public function createNewUser(){
			$sql = "insert into tbUser(	name, 
										mobilePhone, 
										email, 
										category, 
										password, 
										enterpriseId) values (	'{$this->getName()}',
																'{$this->getMobilePhone()}',
																'{$this->getEmail()}',
																'{$this->getCategory()}',
																'{$this->getPassword()}', 
																'{$this->getEnterpriseId()}'
																);";
			try {
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
				//write to the aplication logs
				$error->getTrace();
			}
		}
		
		
		//deativate User
		public function deativateUser(){
			$sql = "update tbUser set isActive = 0 where email = '{$this->getEmail()}';";
			try {
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
				//write to the aplication logs
				$error->getTrace();
			}
		}
		
		//change password
		public function changePassword(){
			$sql = "update tbUser set password = '{$this->getPassword()}' where email = '{$this->getEmail()}';";
			try {
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
				//write to the aplication logs
				$error->getTrace();
			}
		}
		
		//login
		public function login(){
			$sql = "select email, password from tbUser where email = '{$this->getEmail()}';";
			try {
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetchedData = $connection->consultar();
				
				if($fetchedData == null) {
					return false;
				}
				$dbEmail = '';
				$dbPassword = '';
				
				foreach($fetchedData as $value) {
					$dbEmail = $value->email;
					$dbPassword = $value->password;
				}
				
				if(password_verify($this->password, $dbPassword)) {
					return true;
				}
				else {
					return false;
				}
				
				
			}
			catch(Exception $error) {
				//write to the aplication logs
				$error->getTrace();
			}
		}
		
		
		//retrieve user information
		public function retrieveUserInformation($email) {
			$sql = "select 	id, 
							name, 
							mobilePhone, 
							email, 
							category, 
							passwordAttempts, 
							hasToChangePassword, 
							isActive, 
							enterpriseId 
							
							from tbUser where email = '{$this->getEmail()}';";
			try {
				$connection = new Conexao();
				$connection->setSQL($sql);
				$fetchedData = $connection->consultar();
				
				if($fetchedData == null) {
					return false;
				}
					foreach($fetchedData as $value) {
					$this->setId($value->id);
					$this->setName($value->name);
					$this->setMobilePhone($value->mobilePhone);
					$this->setEmail($value->email);
					$this->setCategory($value->category);
					$this->setPasswordAttempts($value->passwordAttempts);
					$this->setStatus($value->isActive);
					$this->setEnterpriseId($value->enterpriseId);
				}
				
				if(is_string($this->getEmail())) {
					return true;
				}
			}
			catch(Exception $error) {
				//write error in the application log
				$error->getTrace();
			}

		}
		
		//getUser session information
		public function getSessionInformation() {
			$_SESSION['name'] = $this->name;
			$_SESSION['mobilePhone'] = $this->mobilePhone;
			$_SESSION['email'] = $this->email;
			$_SESSION['category'] = $this->category;
			$_SESSION['enterpriseId'] = $this->getEnterpriseId();
			$_SESSION['enterpriseName'] = $this->enterprise->getName();
			$_SESSION['minDiscount'] = $this->enterprise->getMinDiscount();
			$_SESSION['maxDiscount'] = $this->enterprise->getMaxDiscount();
			$_SESSION['numberOfIndicationsForMaxDiscount'] = $this->enterprise->getNumberOfIndicationsForMaxDiscount();
			$_SESSION['numberOfDaysForVipCodeExpire'] = $this->enterprise->getNumberOfDaysForVipCodeExpire();
			$_SESSION['logged'] = true;
		}
		
		//logout
		public function logout() {
			$_SESSION['name'] = null;
			$_SESSION['mobilePhone'] = null;
			$_SESSION['email'] = null;
			$_SESSION['category'] = null;
			$_SESSION['enterpriseId'] = null;
			$_SESSION['enterpriseName'] = null;
			$_SESSION['logged'] = false;
			if($_SESSION['logged'] == false) {
				return 1;
			}
			else {
				return 0;
			}
		}
	}
	
?>