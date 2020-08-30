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
	public function calculaIdade($pNasc){
		$nasc = $pNasc;

		// separando yyyy, mm, ddd
		list($ano, $mes, $dia) = explode('-', $nasc);

		// data atual
		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		// Descobre a unix timestamp da data de nascimento do fulano
		$nasc = mktime( 0, 0, 0, $mes, $dia, $ano);

		// cálculo
		$idade = floor((((($hoje - $nasc) / 60) / 60) / 24) / 365.25);
		
		return $idade;
	}
	public function retornaFuncEcles($pFUNCECLES){
		
		$func = $pFUNCECLES;
		$pdo = new Conexao();
		$membro = new Membro($pdo);
		
		return $membro->getFuncEcles($func);
	}
}


?>