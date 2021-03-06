<?php //namespace SGENIAL\VIPCODE\DATABASE;
	/*
		Classe: Conexao.
		propriedades: server, bancoDados, user, pass.
		Visibilidade: private para todas.
	*/
	
	
	class Conexao{
		
		private $server;   //endereco do servidor
		private $bancoDados; //nome do banco de dodos
		private $user;       //nome do usuario do banco de dados
		private $pass;      //senha do usuario do banco de dados
		private $dbType;	//tipo do SGBD
		private $sql;		//consulta ou execucao no banco de dados
		
		//funcao contrutora
		public function __construct(){
			
			$this->server = 'localhost';
			$this->bancoDados = 'dbVipCode';
			$this->user = 'dbVipCodeUser';
			$this->pass = '10dbVipCode20$';
			$this->dbType = 'mysql';
			
/*
			$this->server = 'localhost';
			$this->bancoDados = 'dbVipCode';
			$this->user = 'root';
			$this->pass = '10senhapadrao20$';
			$this->dbType = 'mysql';
*/


			}
			
		//retorna uma mensagem caso a propriedade nao exista
		public function __call($metodo, $parametros){
			print "O método $this->$metodo que você chamou não existe! ";
			if(isset($parametros)){
				print 'Parametros: ';
				foreach($parametros as $parametro){
					print 'parametros: '.$parametro.' ';
					}
				}
			}
		
		//Setters	
		public function setSQL($sql){
				$this->sql =$sql;
			}
		
		//Getters
		public function getSQL(){
			return $this->sql;
			}
			
		//método para conectar ao banco de dados	
		public function conectar(){
			try{
				$conn = new PDO("$this->dbType:host=$this->server;dbname=$this->bancoDados", $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			}
			catch(PDOException $e){
				print "não foi possível connectar-se ao banco de dados #conectar Erro#". $e->getLine();
				}
			}
			
		//método para proteger os campos
		public function prepararCampo($campo, $tipoDados){

			}
		
	
		//metodo para executar actualizações, apagar
		public function executar(){
			$conexao = $this->conectar();
			$conexao->prepare($this->sql);
			$conexao->exec($this->sql);
			
			//termina a conexao com banco de dados
			$conexao = null;
			}
		
		//metodo para seleccionar registos no banco de dados
		public function consultar(){
			$conexao = $this->conectar();
			$result = $conexao->query($this->sql, PDO::FETCH_OBJ);
			
			//termina a conexao com banco de dados
			$conexao = null;

			return $result;
			}
		}
?>