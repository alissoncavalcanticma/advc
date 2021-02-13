<?php 

session_start();

require '../autoload.php';

if(!isset($_SESSION['logon']) && empty($_SESSION['logon'])){

  header("Location:login.php");
  exit;
      
}


$LancC = new LancController();


?>

<!-- header start -->
<?php include_once 'header.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#TIPO').change(function(){
            //$('#CATEGORIA').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
            $('#CAT').load('categ.php?acao=getcat&TIPO='+$('#TIPO').val());
            //console.log(TIPO);
        });
    });
    </script>
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
          <h3><i class="fa fa-angle-right"></i> Financeiro </h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
              
              <div class="row sc_form" style="width:100%; padding-right: 0px;">
              <!-- MSG -->
                  <?= $_GET['display'] ? "<div style=display:".$_GET['display'].";margin-bottom:10px>".$_GET['msg']."</div>" : "" ?>
                  <div style="float:left;width:50%">
                    <h4>Lançamentos </h4>
                  </div>
                  <div style="float:right;width:50%">
                    <div style="float:right">
                        
                          <!-- Botão para acionar MODAL -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
                        <i class="fa fa-plus"></i>
                        </button>

                        <!---------- MODAL --------------->
                        <form method="get" action="../controller/LancController.class.php">
                              
                        <input type="hidden" name="acao" value="<?= !isset($_GET['ID']) ? 'insert' : 'edit' ?>">
                        <!-- Modal -->
                        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true" style="margin-top:5%">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCentralizado">Cadastrar lançamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container-fluid">
                                  <div class="row">
                                      <div class="col" style="float:left">
                                                <!-- TIPO -->
                                                <div class="row rowForm">
                                                        <div class="col-md-9">
                                                              <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                                                              <div class="form-group">
                                                                <select class="custom-select btn btn-default dropdown-toggle" id="TIPO" /*name="TIPO"*/ /*onChange="update()"*/ required>
                                                                    <option value="">........Selecione...........</option>
                                                                    <option value="ENTRADA" <?= isset($_GET['TIPO']) && $_GET['TIPO'] === 'ENTRADA' ? 'selected' : '' ?>>Entrada</option>
                                                                    <option value="SAIDA" <?= isset($_GET['TIPO']) && $_GET['TIPO'] === 'ENTRADA' ? 'selected' : '' ?>>Saída</option>
                                                                </select>
                                                              </div>
                                                              
                                                        </div>
                                                      </div>
                                            <!-- END TIPO -->
                                      </div>
                                      <div class="col"  style="float:right">
                                            <!-- CATEGORIA -->
                                            <div class="row rowForm">
                                                    <div class="col-md-9">
                                                          <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                                                          <div class="form-group">
                                                            <!-- Conteúdo do select carregado dinâmicamente via ajax -->
                                                            <select style="width:180px" class="custom-select btn btn-default dropdown-toggle" id="CAT" name="CAT" required>
                                                                
                                                            </select>
                                                          </div>
                                                          
                                                    </div>
                                                  </div>
                                              <!-- END CATEGORIA -->
                                      </div>

                                    
                                  </div>
                                  <div class="row">
                                        <!-- VALOR -->
                                        <div class="row rowForm">
                                                <div class="col-md-12">
                                                      <label class="input-group-text" for="inputGroupSelect01">Descrição:</label>
                                                      <div class="form-group">
                                                        <textarea class="form-control" placeholder="Descrição do lançamento" name="DESCRICAO" id="DESCRICAO" cols="70" rows="10" style="overflow-y: scroll; height: 100px; resize: none;" required><?= isset($_GET['PAI']) ? $_GET['PAI'] : "" ?></textarea>
                                                      </div>
                                                      
                                                </div>
                                        </div>
                                        <!-- END VALOR -->
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4" style="float:left;padding-left:0px">
                                                <!-- VENCIMENTO -->
                                                              <label class="input-group-text" for="inputGroupSelect01">Valor:</label>
                                                              <div class="form-group">
                                                                <input type="tel" name="VALOR" class="form-control" id="VALOR" placeholder="R$" data-rule="minlen:4" data-msg="R$" maxlength="11" value="<?= isset($_GET['VALOR']) ? $_GET['VALOR'] : "" ?>" required>
                                                              </div>
                                            <!-- END VENCIMENTO -->
                                      </div>
                                      <div class="col-md-3"  style="float:right;width:40%">
                                            <!-- CATEGORIA -->
                                                        <label class="input-group-text" for="inputGroupSelect01">Vencimento:</label>
                                                        <div class='input-group date' id='datetimepicker10'>
                                                            <input class="form-control" size="16" type="date" name="VENCIMENTO" id="VENCIMENTO" placeholder="ex: 19/02/1990" value="<?= isset($_GET['VENCIMENTO']) ? $_GET['VENCIMENTO'] : "" ?>">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar">
                                                                    </span>
                                                                </span>
                                                        </div>
                                          <!-- END CATEGORIA -->
                                      </div>
                                      

                                    
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>
              </div>
              
              </form>
              <!-------------- END MODAL------------------------>
              
              
            <section id="unseen">

            <?php

                $pdo = new Conexao();
                $pdo->exec("SET CHARACTER SET utf8");
                $lanc = new Lanc($pdo);
                  
                $maximo = 10;

                //pega o valor da pagina atual
                $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1'; 
                
                //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
                $inicio = $pagina - 1;
                //$inicio = $pagina - $links_laterais;
                //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
                $inicio = $maximo * $inicio; 
                
                if(isset($_GET['where']) && !empty($_GET['where'])){
                  $where = "WHERE ID_REG LIKE '%".$_GET['where']."%'";
                }else{
                  $where = "";
                }

                //fazemos um select na tabela que iremos utilizar para saber quantos registros ela possui
                $selectCount = $pdo->query("SELECT COUNT(*) AS 'ID' FROM FIN_LANC $where");
                //iniciamos uma var que será usada para armazenar a qtde de registros da tabela  
                $total = 0;
                if($selectCount->rowCount()){
                  foreach ($selectCount as $row) {
                    //armazeno o total de registros da tabela para fazer a paginação
                    $total = $row["ID"]; 
                  }
                }

                //guardo o resultado na variavel pra exibir os dados na pagina		
                $selectFull = $pdo->query("SELECT * FROM FIN_LANC $where ORDER BY ID LIMIT $inicio, $maximo");

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
                      <nav align="center" aria-label="Page navigation" class="nav-pagination" style="margin-bottom: -15px; margin-top: -15px; margin-left:10px;padding:1px">
                              <ul class="pagination pagination-pg">
                                <li>
                                <?php 
                                if($previous != 0) { ?>
                                    <a href=<?= $_SERVER['PHP_SELF']?>?active=<?= $_GET['active'] ?>&pagina=<?= $previous ?><?= isset($_GET['where']) ? '&where='.$_GET['where'] : "" ?> aria-label="Previous">
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
                                        echo "<li><a href=".$_SERVER['PHP_SELF']."?active=".$_GET['active']."&pagina=".$previous.(isset($_GET['where']) ? '&where='.$_GET['where'] : '').">".$previous."</a></li>";
                                        }
                                        echo "<li class='active'><a href=".$_SERVER['PHP_SELF']."?active=".$_GET['active']."&pagina=".$pagina.(isset($_GET['where']) ? '&where='.$_GET['where'] : '').">".$pagina."</a></li>";
                                        if($next <= $pgs){
                                            echo "<li><a href=".$_SERVER['PHP_SELF']."?active=".$_GET['active']."&pagina=".$next.(isset($_GET['where']) ? '&where='.$_GET['where'] : '').">".$next."</a></li>"; 
                                        }
                                        if($next < $pgs){
                                            echo "<li><span aria-hidden='true'>...</li>";
                                        }
                                        ?>
                                <li>
                                    <?php 
                                    if($next <= $pgs) { ?>
                                        <a href=<?= $_SERVER['PHP_SELF']?>?active=<?= $_GET['active'] ?>&pagina=<?= $next ?><?= isset($_GET['where']) ? '&where='.$_GET['where'] : "" ?> aria-label="Previous">
                                            <span aria-hidden="true">Próximo</span>
                                        </a>
                                    <?php } else { ?>
                                        <span aria-hidden="true">Próximo</span>
                                        <?php } ?>
                                </li>
                              </ul>
                      </nav>  
                      
                    </div>
                    <div class="col-md-6">
                      <form method="get" class="form-inline my-2 my-lg-10" style="float:right; margin-bottom: 20px; margin-top: 5px; padding-right:10px">
                      <?php
                        if(isset($_GET['active']) && !empty($_GET['active'])){
                            echo "<input type='hidden' name='active' value='$_GET[active]'>";
                        }
                        ?>  
                        <input name="where" class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" value="<?= isset($_GET['where']) && !empty($_GET['where']) ? $_GET['where'] : '' ?>">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Pesquisar</button>
                      </form>
                    </div>
                    <div style="margin-left:2%;padding-bottom:5px"><?= "Total de ".$total." registros" ?></div>
                  </div>

                    <table class="table table-striped table-bordered table-hover">
                    <thead style="color:honeydew;background-color:gray">
                      <tr>
                        <th>ID</th>
                        <th class="numeric">Registro</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th class="numeric">Valor</th>
                        <th class="numeric">Data de Emissão</th>
                        <th class="numeric">Vencimento</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php

                        if($selectFull->rowCount()){
                          foreach ($selectFull as $_L) { 
                      
                      ?>

                          <tr>
                              <td style="width: 3%"><?= $_L['ID']; ?></td>
                              <td <?= (substr($_L['ID_REG'], 0, 1) == 'E') ? "class='entrada'" : "class='saida'" ?> ><?= $_L['ID_REG']; ?></td>
                              <td class="numeric" style="width: 9%"><?= Lanc::getSGcat($_L['CAT'], $pdo); ?></td>                            
                              <td class="numeric" style="width: 30%"><?= $_L['DESCRICAO'] ?></td>
                              <td class="numeric" style="width: 10%"><?= $_L['VALOR']; ?></td>
                              <td class="numeric" style="width: 10%"><?= date('d-m-Y', strtotime($_L['DT_REG'])); ?></td>
                              <td class="numeric" style="width: 10%"><?= $_L['DT_VENC']; ?></td>
                              <td class="numeric" style="text-align: center; width: 8%">
                                  <!-- <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button> -->
                                  <button class="btn btn-primary btn-xs" onclick="window.location.href='cadLanc.php?acao=view&ID=<?= $_L['ID'] ?>'"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs" onclick="window.location.href='../controller/LancController.class.php?acao=delete&ID=<?= $_L['ID'] ?>'"><i class="fa fa-trash-o "></i></button>
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
<script type="text/javascript">
  
  /*function update() {
    var tipo = document.getElementById('TIPO');
	  var vtipo = tipo.options[tipo.selectedIndex].value;
        //console.log(vtipo);

        /*
        $.post("script.php", "vtipo=" + vtipo, function( data ) {
            console.log(data);
        });
        
        $.post("../controller/LancController.class.php", "vtipo=" + vtipo + "&acao=getCat", function( data ) {
            console.log(vtipo);
        });
				//document.getElementById('value').value = option.value;
				//document.getElementById('text').value = option.text;
			}*/
</script>
<?php include_once 'footer.php'; ?>
<!--footer end-->
