<?php 

require '../autoload.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'deslogar') {
	$userController = new UsuarioController();
	$userController->deslogar();
}

class UsuarioController{
	private $pdo;
	private $user;

	public function __construct(){

		$this->pdo = new Conexao();
		$this->user = new Usuario($this->pdo);
	}
	public function logar($u, $s){

		$usuario = $u;
		$senha = $s;

		if($this->user->validaLogin($usuario, $senha)){
			header("Location:dash.php");
			//header("Location:../view/dashboard.php");
    	}else{
      		header("Location:../view/login.php");
    	}
	}
	public function deslogar(){

		$this->user->deslogar();
     	header("Location: ../view/login.php");

		exit;

	}
	public function retornaId(){
		$this->user->getId();
	}
	public function listaUsuarios($pSt){
		$pStatus = $pSt;
		return $this->user->getUsuarios($pStatus);
	}
	public function retornaApelido($id){
		$i = $id;
		return $this->user->returnApelido($i);
	}
}

?>