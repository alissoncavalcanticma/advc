<?php 

session_start();

require '../autoload.php';

if(!isset($_SESSION['logon']) && empty($_SESSION['logon'])){

  header("Location:login.php");
  exit;
      
}


$membroC = new MembroController();



?>
<!-- header start -->
<?php include_once 'header.php'; ?>
<!--header end-->

<link href="../assets/css/table-responsive.css" rel="stylesheet">



    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<?php include_once 'menu.php'; ?>    
<!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Home </h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
              
              <div class="row sc_form" style="width:100%">
              <!-- MSG -->
                  <?= $_GET['display'] ? "<div style=display:".$_GET['display'].";margin-bottom:20px>".$_GET['msg']."</div>" : "" ?>
                  <div style="float:left;width:50%">
                    <h4>Membros </h4>
                  </div>
                  <div style="float:right;width:50%">
                    <div style="float:right">
                      
                        <button class="btn btn-success" onclick="window.location.href='cadMembros.php'"><i class="fa fa-plus"></i></button>
                      
                    </div>
                  </div>
              </div>
              
              
            <section id="unseen">

            <?php

                $pdo = new Conexao();
                $membro = new Membro($pdo);
                  
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
                  <div class="row">
                    <div class="col-md-6" style="float:left">
                    <nav align="center" aria-label="Page navigation" class="nav-pagination" style="margin-bottom: 2px; margin-top: 1px; margin-left:10px;padding:1px">
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
                    </div>
                    <div class="col-md-5">
                      <input type="search" align="center" aria-label="Page navigation" class="nav-pagination" style="margin-bottom: 2px; margin-top: 28px; margin-right:0px;padding:1px;float:right">
                    </div>
                  </div>

                    <table class="table table-striped table-bordered table-hover">
                    <thead style="color:honeydew;background-color:gray">
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="numeric">CPF</th>
                        <th class="numeric">IDADE</th>
                        <th class="numeric">TELEFONE</th>
                        <th class="numeric">E-MAIL</th>
                        <th class="numeric">FUNÇÃO ECLESIÁSTICA</th>
                        <th class="numeric">Status</th>
                        <th class="numeric">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php

                        if($selectFull->rowCount()){
                          foreach ($selectFull as $res) { ?>

                          <tr>
                              <td><?= $res['ID']; ?></td>
                              <td><?= $res['NOME']; ?></td>
                              <td class="numeric"><?= $res['CPF']; ?></td>                            
                              <td class="numeric"><?= $membroC->calculaIdade($res['NASC']) ?></td>
                              <td class="numeric"><?= $res['FONE1']; ?></td>
                              <td class="numeric"><?= $res['EMAIL']; ?></td>
                              <td class="numeric"><?= $membroC->retornaFuncEcles($res['FUNCECLES']); //$_M['FUNCECLES']; ?></td>
                              <td class="numeric"><?= $res['SITUACAO']; ?></td>
                              <td class="numeric" style="text-align: center;">
                                  <!-- <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button> -->
                                  <button class="btn btn-primary btn-xs" onclick="window.location.href='cadMembros.php?acao=view&ID=<?= $res['ID'] ?>'"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs" onclick="window.location.href='../controller/MembroController.class.php?acao=delete&ID=<?= $res['ID'] ?>'"><i class="fa fa-trash-o "></i></button>
                              </td>
                          </tr>

                    <?php   }
                }
            ?>
                  
                         

                    </tbody>
                  </table>
                </section>
              </div>
              <!-- /content-panel -->
            </div>
            <!-- /col-lg-4 -->
          </div>
        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    
<!--footer start-->
<?php include_once 'footer.php'; ?>
<!--footer end-->
