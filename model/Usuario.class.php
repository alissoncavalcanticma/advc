<?php 

class Usuario{

	private $pdo;
	private $id;
	private $nome;
	private $email;
	private $login;
	private $senha;
	private $perfil;
	private $status;
	private $redef_senha;
	

	public function __construct($pdo, $id = '', $nome = '', $email = '', $login = '', $senha = '', $perfil = '', $status = '',  $redef_senha = ''){

		$this->pdo = $pdo;
		$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->login = $login;
		$this->senha = $senha;
		$this->perfil = $perfil;
		$this->status = $status;
		$this->redef_senha = $redef_senha;
	}

	public function getId(){
		return $this->id;
	}

	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getApelido(){
		return $this->apelido;
	}
	public function setApelido($apelido){
		$this->apelido = $apelido;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}


	public function getUsuarios($pStatus){

		$sql = "SELECT * FROM USUARIOS $pStatus";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;
	}

	public function validaLogin($pU, $pS){
		$array = array();
		$user = $pU;
		$pass = $pS;
		$sql = "SELECT * FROM USUARIOS WHERE LOGIN = :user AND SENHA = :pass AND STATUS != 0";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":user", $user);
		$sql->bindValue(":pass", $pass);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			session_start();
			$_SESSION['logon'] = $array['LOGIN'];
			$_SESSION['logon_email'] = $array['EMAIL'];
			$_SESSION['logon_nome'] = $array['NOME'];
			return true;
		}else{
			return false;
		}
	}

	public function deslogar(){
		
		//https://www.itmnetworks.com.br/suporte/manuais/php/function.session-destroy.html
		session_start();

		// Apaga todas as variáveis da sessão
		$_SESSION = array();

		// Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
		// Nota: Isto destruirá a sessão, e não apenas os dados!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		// Por último, destrói a sessão
		session_destroy();

		return true;
	}

	public function returnApelido($i){
		//$sql = "SELECT * FROM usuarios WHERE id = $i and status != 'inativo'";
		$sql = "SELECT apelido FROM usuarios WHERE id = $i";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		//$array = array();

		if($sql->rowCount() > 0){
			$apelido = $sql->fetch();

			return $apelido;
		}

		//return $apelido;
	}
}

?>