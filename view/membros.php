<?php 

session_start();

if(!isset($_SESSION['logon']) && empty($_SESSION['logon'])){

  header("Location:login.php");
  exit;
      
}

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
                <h4><i class="fa fa-angle-right"></i> Membros </h4>
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed table-hover">
                    <thead style="color:honeydew;background-color:gray">
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="numeric">CPF</th>
                        <th class="numeric">Função</th>
                        <th class="numeric">Idade</th>
                        <th class="numeric">Telefone</th>
                        <th class="numeric">E-mail</th>
                        <th class="numeric">Status</th>
                        <th class="numeric">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
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
