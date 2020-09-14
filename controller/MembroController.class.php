<?php

require '../autoload.php';

$membroC = new MembroController();


if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
	switch ($acao) {
		case 'insert':
			$membroC->cadastrarMembro();
			//$_POST = array();
			header("Location: ../view/cadMembros.php?display=true");
			break;
		default:
			# code...
			break;
	}
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
		if(empty($ano) || $ano === null){

			return 0;
		}else{

			$nasc = mktime( 0, 0, 0, $mes, $dia, $ano);
			// cálculo
			$idade = floor((((($hoje - $nasc) / 60) / 60) / 24) / 365.25);
		
			return $idade;

		}		
		
	}
	public function retornaFuncEcles($pFUNCECLES){
		
		$func = $pFUNCECLES;
		$pdo = new Conexao();
		$membro = new Membro($pdo);
		
		return $membro->getFuncEcles($func);
	}
	public function cadastrarMembro(){
		/*
		$nome = strtoupper($_POST['NOME']);
		$sexo = $_POST['SEXO'];
		$nasc = $_POST['NASC'];
		$nat = strtoupper($_POST['NAT']);
		$nat_uf = strtoupper($_POST['NAT_UF']);
		$nac = strtoupper($_POST['NAC']);
		$estcv = $_POST['ESTCV'];
		$esc = intval($_POST['ESC']);
		$prof = strtoupper($_POST['PROF']);
		$rg = $_POST['RG'];
		$uf_rg = strtoupper($_POST['UF_RG']);
		$cpf = $_POST['CPF'];
		$cnh = $_POST['CNH'];
		$cat_cnh = $_POST['CAT_CNH'];
		$tit_num = $_POST['TIT_NUM'];
		$tit_zona = $_POST['TIT_ZONA'];
		$tit_sec = $_POST['TIT_SEC'];
		$mae = strtoupper($_POST['MAE']);
		$pai = strtoupper($_POST['PAI']);
		$conjuge = strtoupper($_POST['CONJUGE']);
		$dt_casamento = $_POST['DT_CASAMENTO'];
		$endereco = strtoupper($_POST['ENDERECO']);
		$comp_end = strtoupper($_POST['COMP_END']);
		$bairro = strtoupper($_POST['BAIRRO']);
		$cidade = strtoupper($_POST['CIDADE']);
		$cep = $_POST['CEP'];
		$uf = strtoupper($_POST['UF']);
		$fone1 = $_POST['FONE1'];
		$fone2 = $_POST['FONE2'];
		$fonect = $_POST['FONECT'];
		$n_fonect = strtoupper($_POST['N_FONECT']);
		$email = $_POST['EMAIL'];
		$igreja = intval($_POST['IGREJA']);
		$funcecles = intval($_POST['FUNCECLES']);
		$funcadm = intval($_POST['FUNCADM']);
		$funcadm2 = intval($_POST['FUNCADM2']);
		$recepcao = $_POST['RECEPCAO'];
		$cv = $_POST['CV'];
		$bat = $_POST['BAT'];
		*/
		//39

		$nome = strtoupper($_POST['NOME']); 
		$sexo = $_POST['SEXO'];
			
		if(isset($_POST['NASC']) && !empty($_POST['NASC'])){
			$nasc = date("Y-m-d", strtotime($_POST['NASC']));
		}
		
		$nat = strtoupper($_POST['NAT']);
		$nat_uf = strtoupper($_POST['NAT_UF']);
		$nac = strtoupper($_POST['NAC']);
		$estcv = $_POST['ESTCV'];
		$esc = intval($_POST['ESC']);
		$prof = strtoupper($_POST['PROF']);
		$rg = $_POST['RG'];
		$uf_rg = strtoupper($_POST['UF_RG']);
		$cpf = $_POST['CPF'];
		$tit_num = $_POST['TIT_NUM'];
		$tit_sec = $_POST['TIT_SEC'];
		$tit_zona = $_POST['TIT_ZONA'];
		$cnh = $_POST['CNH'];
		$cat_cnh = $_POST['CAT_CNH'];
		$mae = strtoupper($_POST['MAE']);
		$pai = strtoupper($_POST['PAI']);
		$conjuge = strtoupper($_POST['CONJUGE']);
			
		if(isset($_POST['DT_CASAMENTO']) && !empty($_POST['DT_CASAMENTO'])){
			$dt_casamento = date("Y-m-d", strtotime($_POST['DT_CASAMENTO']));
		}
		
		$endereco = strtoupper($_POST['ENDERECO']);
		$comp_end = strtoupper($_POST['COMP_END']);
		$bairro = strtoupper($_POST['BAIRRO']);
		$cidade = strtoupper($_POST['CIDADE']);
		$cep = $_POST['CEP'];
		$uf = strtoupper($_POST['UF']);
		$fone1 = $_POST['FONE1'];
		$fone2 = $_POST['FONE2'];
		$fonect = $_POST['FONECT'];
		$n_fonect = strtoupper($_POST['N_FONECT']);
		$email = $_POST['EMAIL'];
		$igreja = intval($_POST['IGREJA']);
		$funcecles = intval($_POST['FUNCECLES']);
		$funcadm = intval($_POST['FUNCADM']);
		$funcadm2 = intval($_POST['FUNCADM2']);
		$recepcao = $_POST['RECEPCAO'];
		
		if(isset($_POST['CV']) && !empty($_POST['CV'])){
			$cv = date("Y-m-d", strtotime($_POST['CV']));
		}

		if(isset($_POST['BAT']) && !empty($_POST['BAT'])){
			$bat = date("Y-m-d", strtotime($_POST['BAT']));
		}


		$pdo = new Conexao();
		$membro = new Membro($pdo);

		$membro->insert($nome, $sexo, $nasc, $nat, $nat_uf, $nac, $estcv, $esc, $prof, $rg, $uf_rg, $cpf, $cnh, $cat_cnh, $tit_num, $tit_zona, $tit_sec, $mae, $pai, $conjuge, $dt_casamento, $endereco, $comp_end, $bairro, $cidade, $cep, $uf, $fone1, $fone2, $fonect, $n_fonect, $email, $igreja, $funcecles, $funcadm, $funcadm2, $recepcao, $cv, $bat);
	}
}


?>