<?php
#Usar Desisgn Pattern Fluent Interface
#id dc motivo servico equipamento obs visitante empresa operador data entrada saida meio_de_contato solicitacao_acesso agendamento chegada area_atuacao
#
class Membro{
	private $pdo;
	/*
	private $id;
	private $nome;
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
	*/

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