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
          <h3><i class="fa fa-angle-right"></i> Corpo </h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
              
              <div class="row sc" style="width:100%">
                  <div style="float:left;width:50%">
                    <h4>Membros </h4>
                  </div>
                  <div style="float:right;width:50%">
                    <div style="float:right">
                      <h4>
                        <button class="btn btn-success" onclick="window.location.href='cadMembros.php'">ADD</button>
                      </h4>
                    </div>
                  </div>
              </div>
               
              
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed table-hover">
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
                      $_M = $membroC->listaMembros();



                      foreach($_M as $_M):
                        ?>
                            <tr>
                              <td><?= $_M['ID']; ?></td>
                              <td><?= $_M['NOME']; ?></td>
                              <td class="numeric"><?= $_M['CPF']; ?></td>                            
                              <td class="numeric"><?= $membroC->calculaIdade($_M['NASC']) ?></td>
                              <td class="numeric"><?= $_M['FONE1']; ?></td>
                              <td class="numeric"><?= $_M['EMAIL']; ?></td>
                              <td class="numeric"><?= $membroC->retornaFuncEcles($_M['FUNCECLES']); //$_M['FUNCECLES']; ?></td>
                              <td class="numeric"><?= $_M['SITUACAO']; ?></td>
                              <td class="numeric">
                                  <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                              </td>
                          </tr>
                          <?php
                          endforeach;
                      ?>
                    <!-- <tr>
                          <td>0001</td>
                          <td>Alisson Cavalcanti Galvão</td>
                          <td class="numeric">000.000.000-41</td>
                          <td class="numeric">Membro</td>
                          <td class="numeric">30</td>
                          <td class="numeric">(81) 98205-2544</td>
                          <td class="numeric">alisson@alstwo.com.br</td>
                          <td class="numeric">Ativo</td>
                          <td class="numeric">
                              <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                              <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                        </tr>
                        -->
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
