<?php

require '../autoload.php';

$membroC = new MembroController();


if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
}else{
	$acao = "";
}

class MembroController{

	
	public function listaMembros(){

			$pdo = new Conexao();
			$membro = new Membro($pdo);

			return $membro->getMembros();

		}
}


?>