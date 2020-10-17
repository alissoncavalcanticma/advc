<?php
#Usar Desisgn Pattern Fluent Interface
#id dc motivo servico equipamento obs visitante empresa operador data entrada saida meio_de_contato solicitacao_acesso agendamento chegada area_atuacao
#
class Membro{
	private $pdo;
	
	private $id;
	private $nome;
	private $cfoto;
	private $sexo;
	private $nasc;
	private $idade;
	private $nat;
	private $nac;
	private $estcv;
	private $esc;
	private $prof;
	private $rg;
	private $uf_rg;
	private $cpf;
	private $cnh;
	private $cat_cnh;
	private $tit_num;
	private $tit__zona;
	private $tit_sec;
	private $mae;
	private $pai;
	private $conjuge;
	private $dt_casamento;
	private $endereco;
	private $bairro;
	private $cidade;
	private $cep;
	private $uf;
	private $fone1;
	private $fone2;
	private $email;
	private $igreja;
	private $funcecles;
	private $funcadm;
	private $situacao;
	private $recepcao;
	private $cv;
	private $bat;
	private $obs;
	

	public function __construct($pdo){

		$this->pdo = $pdo;
		$this->pdo->exec('SET NAMES utf8');

	}

	public function getMembros(){

		//$inicio = $ini;
		//$maximo = $max;
		$sql="SELECT * FROM MEMBROS ORDER BY ID";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}
		
		return $array;

	}
	public function getMembro($id){

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

	public function getFuncEcles($pFUNCECLES){

		$sql = "SELECT FUNCAO FROM FUNCECLES WHERE ID = $pFUNCECLES";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$fe = "";
		if($sql->rowCount() > 0){
			$fe = $sql->fetch(); 
			return $fe = $fe[0];

		}
		return $fe;
		//echo $funcecles;die("oi");
	}
	public function insert($nome, $cfoto, $sexo, $nasc, $nat, $nat_uf, $nac, $estcv, $esc, $prof, $rg, $uf_rg, $cpf, $cnh, $cat_cnh, $tit_num, $tit_zona, $tit_sec, $mae, $pai, $conjuge, $dt_casamento, $endereco, $comp_end, $bairro, $cidade, $cep, $uf, $fone1, $fone2, $fonect, $n_fonect, $email, $igreja, $funcecles, $funcadm, $funcadm2, $recepcao, $cv, $bat){

		//$sql = "INSERT INTO MEMBROS (NOME, SEXO, NASC, NAT, NAT_UF, NAC, ESTCV, ESC, PROF, RG, UF_RG, CPF, CNH, CAT_CNH, TIT_NUM, TIT_ZONA, TIT_SEC, MAE, PAI, CONJUGE, DT_CASAMENTO, ENDERECO, COMP_END, BAIRRO, CIDADE, CEP, UF, FONE1, FONE2, FONECT, N_FONECT, EMAIL, IGREJA, FUNCECLES, FUNCADM, FUNCADM2, SITUACAO, RECEPCAO, CV, BAT) VALUES ('$nome', '$sexo', '$nasc', '$nat', '$nat_uf', '$nac', '$estcv', '$esc', '$prof', '$rg', '$uf_rg', '$cpf', '$cnh', '$cat_cnh', '$tit_num', '$tit_zona', '$tit_sec', '$mae', '$pai', '$conjuge', '$dt_casamento', '$endereco', '$comp_end', '$bairro', '$cidade', '$cep', '$uf', '$fone1', '$fone2', '$fonect', '$n_fonect', '$email', '$igreja', '$funcecles', '$funcadm', '$funcadm2', '$recepcao', '$cv', '$bat')";
		$cfoto = !empty($cfoto) ? "CFOTO = '$cfoto'," : '';
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
		$sql = "INSERT INTO 
					MEMBROS
				SET
					NOME 			= '$nome',
					".$cfoto."
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

	public function edit($id, $nome, $cfoto, $sexo, $nasc, $nat, $nat_uf, $nac, $estcv, $esc, $prof, $rg, $uf_rg, $cpf, $cnh, $cat_cnh, $tit_num, $tit_zona, $tit_sec, $mae, $pai, $conjuge, $dt_casamento, $endereco, $comp_end, $bairro, $cidade, $cep, $uf, $fone1, $fone2, $fonect, $n_fonect, $email, $igreja, $funcecles, $funcadm, $funcadm2, $recepcao, $cv, $bat){

		//$sql = "INSERT INTO MEMBROS (NOME, SEXO, NASC, NAT, NAT_UF, NAC, ESTCV, ESC, PROF, RG, UF_RG, CPF, CNH, CAT_CNH, TIT_NUM, TIT_ZONA, TIT_SEC, MAE, PAI, CONJUGE, DT_CASAMENTO, ENDERECO, COMP_END, BAIRRO, CIDADE, CEP, UF, FONE1, FONE2, FONECT, N_FONECT, EMAIL, IGREJA, FUNCECLES, FUNCADM, FUNCADM2, SITUACAO, RECEPCAO, CV, BAT) VALUES ('$nome', '$sexo', '$nasc', '$nat', '$nat_uf', '$nac', '$estcv', '$esc', '$prof', '$rg', '$uf_rg', '$cpf', '$cnh', '$cat_cnh', '$tit_num', '$tit_zona', '$tit_sec', '$mae', '$pai', '$conjuge', '$dt_casamento', '$endereco', '$comp_end', '$bairro', '$cidade', '$cep', '$uf', '$fone1', '$fone2', '$fonect', '$n_fonect', '$email', '$igreja', '$funcecles', '$funcadm', '$funcadm2', '$recepcao', '$cv', '$bat')";
		$cfoto = !empty($cfoto) ? "CFOTO = '$cfoto'," : '';
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

	public function deleteMembro($id){
		
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