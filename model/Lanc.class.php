<?php
#Usar Desisgn Pattern Fluent Interface
#id dc motivo servico equipamento obs visitante empresa operador data entrada saida meio_de_contato solicitacao_acesso agendamento chegada area_atuacao
#
require '../autoload.php';


class Lanc extends Main{
	private $pdo;
	
	private $id;
	
	
	
	public function __construct($pdo){

		$this->pdo = $pdo;
		$this->pdo->exec('SET NAMES utf8');

	}
	
	

	
	public function get(){

		//$inicio = $ini;
		//$maximo = $max;

		$sql="SELECT * FROM FIN_LANC ORDER BY ID";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}
		
		return $array;

	}

	public function getLanc($params){

		$this->id = $id;
		$sql="SELECT * FROM MEMBROS WHERE ID = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();

			return $array;
		}
		
		return $array;

	}


	public function getTipo($cat){

		$cat = intval($cat);
		$sql = "SELECT TIPO FROM FIN_LANC_TIPO WHERE ID = $cat";

		$sql = $this->pdo->prepare($sql);
		$sql->execute();
		
		if($sql->rowCount() > 0){
			$cat = $sql->fetch();
			//print_r($cat);die();
			return $cat['TIPO'];
		}
		return false;
	}

	public function getCat($vtipo){
		
		//echo $vtipo;die();
		$sql="SELECT * FROM FIN_LANC_TIPO WHERE TIPO = '$vtipo'";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = Array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}
		
		return $array;

	}

	//get sigla do tipo de categoria
	public static function getSGCat($id, $pdo){
		
		//echo $vtipo;die();
		$sql="SELECT CAT FROM FIN_LANC_TIPO WHERE ID = :id";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			
			$sg = $sql[0];
			
			return $sg;
		}
		
		return $sg;

	}	

	public function getLasReg($tipo){
		//echo $vtipo;die();
		$sql="SELECT COUNT(FL.ID) FROM FIN_LANC FL INNER JOIN FIN_LANC_TIPO FLT ON FL.CAT = FLT.ID WHERE FLT.TIPO = :tipo";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":tipo", $tipo);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$last = $sql[0];

			return $last;
		}
		
		return $last;
	}

	public function insert($cat, $desc, $valor, $venc){

		$tipo = $this->getTipo(intval($cat));
		$venc = !empty($venc) ? ",DT_VENC = '$venc'" : '';
		/*if($tipo == "E"){
			echo 'E';die();

		}else if($tipo == "S"){
			echo 'S';die();
		}else{
			echo "false";die();
		}*/

		if(!isset($qtd_par)){
			$qtd_par = '01X';
		}

		
		$id_reg = $tipo.$qtd_par.str_pad(($this->getLasReg($tipo)+1) , 10 , '0' , STR_PAD_LEFT);

		//echo $id_reg;die();


		//echo $nasc, $dt_casamento, $cv, $bat; die();
		$sql = "INSERT INTO 
					FIN_LANC
				SET
					ID_REG			= '$id_reg',
					CAT  			= '$cat',
					DESCRICAO 		= '$desc',
					VALOR			= '$valor'
					".$venc."";
					
		$sql = $this->pdo->prepare($sql);
		$sql->execute();
	}

	public function edit($params){

		//$sql = "INSERT INTO MEMBROS (NOME, SEXO, NASC, NAT, NAT_UF, NAC, ESTCV, ESC, PROF, RG, UF_RG, CPF, CNH, CAT_CNH, TIT_NUM, TIT_ZONA, TIT_SEC, MAE, PAI, CONJUGE, DT_CASAMENTO, ENDERECO, COMP_END, BAIRRO, CIDADE, CEP, UF, FONE1, FONE2, FONECT, N_FONECT, EMAIL, IGREJA, FUNCECLES, FUNCADM, FUNCADM2, SITUACAO, RECEPCAO, CV, BAT) VALUES ('$nome', '$sexo', '$nasc', '$nat', '$nat_uf', '$nac', '$estcv', '$esc', '$prof', '$rg', '$uf_rg', '$cpf', '$cnh', '$cat_cnh', '$tit_num', '$tit_zona', '$tit_sec', '$mae', '$pai', '$conjuge', '$dt_casamento', '$endereco', '$comp_end', '$bairro', '$cidade', '$cep', '$uf', '$fone1', '$fone2', '$fonect', '$n_fonect', '$email', '$igreja', '$funcecles', '$funcadm', '$funcadm2', '$recepcao', '$cv', '$bat')";
		$cfoto = !empty($cfoto) ? "CFOTO = '$cfoto'," : '';
		$codmembro = !empty($codmembro) ? "CODMEMBRO = '$codmembro'," : '';
		$nasc = !empty($nasc) ? "NASC = '$nasc'," : '';
		$esc = !empty($esc) ? "ESC = '$esc'," : '';
		$dt_casamento = !empty($dt_casamento) ? "DT_CASAMENTO = '$dt_casamento'," : '';
		
		$funcecles = !empty($funcecles) ? ",FUNCECLES = '$funcecles'" : '';
		$funcadm = !empty($funcadm) ? ",FUNCADM = '$funcadm'" : '';
		$funcadm2 = !empty($funcadm2) ? ",FUNCADM2 = '$funcadm2'" : '';
		$recepcao = !empty($recepcao) ? ",RECEPCAO = '$recepcao'" : '';
		$cv = !empty($cv) ? ",CV = '$cv'" : '';
		$bat = !empty($bat) ? ",BAT = '$bat'" : '';

		//echo $nasc, $dt_casamento, $cv, $bat; die();
		$sql = "UPDATE 
					MEMBROS
				SET
					NOME 			= '$nome',
					".$cfoto."
					".$codmembro."
					SEXO 			= '$sexo',
					".$nasc."
					NAT  			= '$nat',
					NAT_UF 			= '$nat_uf',
					NAC 			= '$nac',
					ESTCV 			= '$estcv',
					".$esc."
					PROF 			= '$prof',
					RG 				= '$rg',
					UF_RG 			= '$uf_rg',
					CPF 			= '$cpf',
					CNH				= '$cnh',
					CAT_CNH			= '$cat_cnh',
					TIT_NUM			= '$tit_num',
					TIT_ZONA		= '$tit_zona',
					TIT_SEC			= '$tit_sec',
					MAE				= '$mae',
					PAI				= '$pai',
					CONJUGE			= '$conjuge',
					". $dt_casamento."
					ENDERECO		= '$endereco',
					COMP_END		= '$comp_end',
					BAIRRO			= '$bairro',
					CIDADE			= '$cidade',
					CEP				= '$cep',
					UF				= '$uf',
					FONE1			= '$fone1',
					FONE2			= '$fone2',
					FONECT			= '$fonect',
					N_FONECT		= '$n_fonect',
					EMAIL			= '$email',
					IGREJA			= '$igreja'
					". $funcecles."
					". $funcadm."
					". $funcadm2."
					". $recepcao."
					". $cv."
					". $bat."
				WHERE
					ID				= '$id'
				";
					

		/*echo $nome.','.$sexo.','.$nasc.','.$nat.','.$nat_uf.','.$nac.','.$estcv.','.$esc.','.$prof.',
		'.$rg.','.$uf_rg.','.$cpf.','.$cnh.','.$cat_cnh.','.$tit_num.','.$tit_zona.','.$tit_sec.',
		'.$mae.','.$pai.','.$conjuge.','.$dt_casamento.','.$endereco.','.$comp_end.','.$bairro.','.$cidade.',
		'.$cep.','.$uf.','.$fone1.','.$fone2.','.$fonect.','.$n_fonect.','.$email.','.$igreja.','.$funcecles.',
		'.$funcadm.','.$funcadm2.','.$recepcao.','.$cv.','.$bat; die();
		
		//*/
		//echo $nasc, $dt_casamento, $funcecles, $funcadm, $funcadm2, $recepcao, $cv, $bat; die();
		
		$sql = $this->pdo->prepare($sql);
		$sql->execute();
	}

	public function delete($params){
		
		$this->id = $id;
		$sql="DELETE FROM MEMBROS WHERE ID = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();

		return true;
	}
	
	/*
	public function getSelectCount($pdo){
		$selectCount = "SELECT COUNT(*) AS 'ID' FROM MEMBROS";
		$selectCount = $pdo->query($selectCount);
		return $selectCount;
	}

	public function getSelectFull($pdo, $inicio, $maximo){
		$selectFull = "SELECT * FROM MEMBROS ORDER BY ID LIMIT";
		$selectFull = $pdo->query("SELECT * FROM MEMBROS ORDER BY ID LIMIT $inicio, $maximo");
		return $selectFull;
	}
	*/
}
/*
include '../autoload.php';
$pdo = new Conexao();
$membro = new Membro($pdo);
$p = $membro->getMembros();
foreach($p as $m){
	echo $m['NOME'];
}
*/
?>