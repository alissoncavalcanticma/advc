<?php

require '../autoload.php';

$mc = new MainController();

/*
if(isset($_GET['acao']) && !empty($_GET['acao'])){
	$acao = $_GET['acao'];
	switch ($acao) {
		case 'insert':
			$membroC->cadastrarMembro();
			//$_POST = array();
			header("Location: ../view/cadMembros.php?display=true");
			break;
		case 'view':
			$array = $membroC->listarMembro($_GET['ID']);
			//$_POST = array();
			header("Location: ../view/cadMembros.php?".http_build_query($array));
			break;
		case 'edit':
			//echo $_GET['acao'], $_GET['ID'], $_POST['NOME'],  $_POST['NASC']; die();
			$membroC->editarMembro($_GET['ID']);
			//$_POST = array();
			$array = $membroC->listarMembro($_GET['ID']);
			header("Location: ../view/cadMembros.php?".http_build_query($array));
			break;
		case 'delete':
			//echo $_GET['acao'], $_GET['ID'], $_POST['NOME'],  $_POST['NASC']; die();
			$membroC->deletarMembro($_GET['ID']);
			//$_POST = array();
			//$array = $membroC->listarMembro($_GET['ID']);
			header("Location: ../view/membros.php?display=true&msg=Registro deletado com sucesso");
			break;
		default:
			# code...
			break;
	}
}else{
	$acao = "";
}
*/

class MainController{

	
	public static function paginar($pdo){

        $maximo = 10;

        //pega o valor da pagina atual
        $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1'; 
        
        //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
        $inicio = $pagina - 1;
        //$inicio = $pagina - $links_laterais;
        //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
        $inicio = $maximo * $inicio; 
        
        //fazemos um select na tabela que iremos utilizar para saber quantos registros ela possui
        $selectCount = $pdo->query("SELECT COUNT(*) AS 'ID' FROM MEMBROS");
        //iniciamos uma var que será usada para armazenar a qtde de registros da tabela  
        $total = 0;
        if($selectCount->rowCount()){
          foreach ($selectCount as $row) {
            //armazeno o total de registros da tabela para fazer a paginação
            $total = $row["ID"]; 
          }
        }
        //guardo o resultado na variavel pra exibir os dados na pagina		
        $selectFull = $pdo->query("SELECT * FROM MEMBROS ORDER BY ID LIMIT $inicio, $maximo");

        //determina de quantos em quantos links serão adicionados e removidos
        $max_links = 2;
        //dados para os botões
        $previous = $pagina - 1; 
        $next = $pagina + 1; 
        //usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
        $pgs = ceil($total / $maximo); 
        //se a tabela não for vazia, adiciona os botões

        ?>

            <nav align="center" aria-label="Page navigation" class="nav-pagination" style="margin-bottom: 5px; margin-top: 5px; margin-left:10px">
                    <ul class="pagination">
                    <li>
                    <?php 
                    if($previous != 0) { ?>
                        <a href=<?= $_SERVER['PHP_SELF']?>?active=m&pagina=<?= $previous ?> aria-label="Previous">
                            <span aria-hidden="true">Anterior</span>
                        </a>
                    <?php } else { ?>
                            <span aria-hidden="true">Anterior</span>
                    <?php } ?>
                    </li>
                    <?php
                            if($pagina > 2){
                                echo "<li><span aria-hidden='true'>...</li>";
                            }
                            if($pagina > 1){
                            echo "<li><a href=".$_SERVER['PHP_SELF']."?active=m&pagina=".$previous.">".$previous."</a></li>";
                            }
                            echo "<li class='active'><a href=".$_SERVER['PHP_SELF']."?active=m&pagina=".$pagina.">".$pagina."</a></li>";
                            if($next <= $pgs){
                                echo "<li><a href=".$_SERVER['PHP_SELF']."?active=m&pagina=".$next .">".$next."</a></li>"; 
                            }
                            if($next < $pgs){
                                echo "<li><span aria-hidden='true'>...</li>";
                            }
                            ?>
                    <li>
                        <?php 
                        if($next <= $pgs) { ?>
                            <a href=<?= $_SERVER['PHP_SELF']?>?active=m&pagina=<?= $next ?> aria-label="Previous">
                                <span aria-hidden="true">Próximo</span>
                            </a>
                        <?php } else { ?>
                            <span aria-hidden="true">Próximo</span>
                            <?php } ?>
                        </li>
                    </ul>
            </nav>   
        
        <?php
        
		}
	

}


?>