<?php

require '../autoload.php';

$lancC = new LancController();


if(isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];
	switch ($acao) {
		case 'insert':
			$lancC->cadastrarLanc();
			//$_POST = array();
			//echo "Insert"; die();
			header("Location: ../view/lanc.php?display=true&msg=Registro inserido com sucesso");
			break;
		case 'view':
			$array = $lancC->listarLancamentos($_GET['ID']);
			//$_POST = array();
			header("Location: ../view/cadLanc.php?".http_build_query($array));
			break;
		case 'edit':			
			//echo "Edit"; die();
			//echo $_GET['acao'], $_GET['ID'], $_POST['NOME'],  $_POST['NASC']; die();
			$lancC->editarLancamento($_GET['ID']);
			//$_POST = array();
			//$array = $lancC->listarLancamento($_GET['ID']);
			//header("Location: ../view/cadLanc.php?".http_build_query($array));
			header("Location: ../view/lanc.php?display=true&msg=Registro alterado com sucesso");
			break;
		case 'delete':
			//echo $_GET['acao'], $_GET['ID'], $_POST['NOME'],  $_POST['NASC']; die();
			$lancC->deletarLancamento($_GET['ID']);
			//$_POST = array();
			//$array = $membroC->listarMembro($_GET['ID']);
			header("Location: ../view/lanc.php?display=true&msg=Registro deletado com sucesso");
			break;
		case 'listLanc':
			$id = $_GET['ID'];
			//$tipo = $_GET['TIPO'];
			$lancC->listarLancamento($id);
		    
			break;
		default:
			# code...
			break;
	}
}else{
	$acao = "";
}

class LancController{

	
	public function listarLancamentos(){

			$pdo = new Conexao();
			$lanc = new Lanc($pdo);

			return $lanc->get();

		}

	public function getCategoria($vtipo){
			
			$pdo = new Conexao();
			$lanc = new Lanc($pdo);

			if($vtipo === "ENTRADA"){
				$tipo = "E";
			}else{
				$tipo = "S";
			}
			//echo $tipo; die();
			return $lanc->getCat($tipo);
	}
	
	public function cadastrarLanc(){
	
		//$tipo = $_GET['TIPO'];
		$cat = $_GET['CAT'];
		$desc = $_GET['DESCRICAO'];
		$valor = $_GET['VALOR'];
		if(isset($_GET['VENCIMENTO']) && !empty($_GET['VENCIMENTO'])){
			$venc = date("Y-m-d", strtotime($_GET['VENCIMENTO']));
		}
		//echo $venc; die();			
		

		$pdo = new Conexao();
		$lanc = new Lanc($pdo);
		
		$lanc->insert($cat, $desc, $valor, $venc);

	}


	public function listarLancamento($id){
		$pdo = new Conexao();
		$lanc = new Lanc($pdo);

		echo json_encode($lanc->getLanc($id));
	}

	

	public function editarMembro($id){
		
		/*


		//40 campos
		//echo $id;die();
		$nome = strtoupper($_POST['NOME']); 
		if(isset($_FILES['fileUpload']) && !empty($_FILES['fileUpload']))
			{	
				
				//date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
				//$ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
				//$new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
				$primeiro_nome = explode(" ",$nome);
				$primeiro_nome = strtolower($primeiro_nome[0].$primeiro_nome[1]);
				$new_name = $primeiro_nome.'.jpg';
				$dir = '../assets/img/users/'; //Diretório para uploads de fotos de usuários
				
				$cfoto = $dir.$new_name;
				move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
				//echo $dir.$new_name;
				//die();

				//move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
				
			}
			//echo $cfoto;
			//die();

		$codmembro = $_POST['CODMEMBRO'];
		$sexo = $_POST['SEXO'];
			
		if(isset($_POST['NASC']) && !empty($_POST['NASC'])){
			$nasc = date("Y-m-d", strtotime($_POST['NASC']));
		}
		
		$nat = strtoupper($_POST['NAT']);
		$nat_uf = strtoupper($_POST['NAT_UF']);
		$nac = strtoupper($_POST['NAC']);
		$estcv = $_POST['ESTCV'];
		
		if(isset($_POST['ESC']) && !empty($_POST['ESC'])){
			$esc = intval($_POST['ESC']);
		}

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

		if(isset($_POST['FUNCECLES']) && !empty($_POST['FUNCECLES']) && $_POST['FUNCECLES'] != '0'){
			$funcecles = intval($_POST['FUNCECLES']);
		}
		if(isset($_POST['FUNCADM']) && !empty($_POST['FUNCADM']) && $_POST['FUNCADM'] != '0'){
			$funcadm = intval($_POST['FUNCADM']);
		}
		if(isset($_POST['FUNCADM2']) && !empty($_POST['FUNCADM2']) && $_POST['FUNCADM2'] != '0'){
			$funcadm2 = intval($_POST['FUNCADM2']);
		}
		if(isset($_POST['RECEPCAO']) && !empty($_POST['RECEPCAO']) && $_POST['RECEPCAO'] != '0'){
			$recepcao = $_POST['RECEPCAO'];
		}
		
		if(isset($_POST['CV']) && !empty($_POST['CV'])){
			$cv = date("Y-m-d", strtotime($_POST['CV']));
		}

		if(isset($_POST['BAT']) && !empty($_POST['BAT'])){
			$bat = date("Y-m-d", strtotime($_POST['BAT']));
		}


		$pdo = new Conexao();
		$membro = new Membro($pdo);

		$membro->edit($id, $nome, $cfoto, $codmembro, $sexo, $nasc, $nat, $nat_uf, $nac, $estcv, $esc, $prof, $rg, $uf_rg, $cpf, $cnh, $cat_cnh, $tit_num, $tit_zona, $tit_sec, $mae, $pai, $conjuge, $dt_casamento, $endereco, $comp_end, $bairro, $cidade, $cep, $uf, $fone1, $fone2, $fonect, $n_fonect, $email, $igreja, $funcecles, $funcadm, $funcadm2, $recepcao, $cv, $bat);
		*/
	}

	public function listarMembro($id){
		
		$id = addslashes($id);
		
		$pdo = new Conexao();
		$membro = new Membro($pdo);
		
		return $membro->getMembro($id);
	}

	public function deletarMembro($id){
		
		$id = addslashes($id);
		
		$pdo = new Conexao();
		$membro = new Membro($pdo);

		$membro->deleteMembro($id);

	}

}


?>