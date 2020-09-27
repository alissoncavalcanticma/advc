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
          <div>
            <!--
              <div style="float:left">
                <h3><i class="fa fa-angle-right"></i> Membros </h3>
              </div>

              <div style="float:right">
                <a href="#fim" class="go-down">
                  <i class="fa fa-angle-down" style="font-size: 21px;"></i>
                </a>
              </div>
            -->
          </div>
          <div class="row mt">
            <div class="col-lg-12 pd-30">
              <div class="content-panel">
                

              
              <section class="sc" id="unseen">
<!-- MSG -->
             <?= $_GET['display'] ? "<div style=display:".$_GET['display'].";margin-bottom:20px>Cadastro inserido!</div>" : "" ?>
<!-- JUMBOTRON -->
              
              <div class="jumbotron" style="margin-top:30px; margin-bottom:40px">
                <div style="padding-left: 3%">
                    <p class="lead"><strong><?php echo ucfirst($_SESSION['logon']); ?></strong>, seja bem vindo ao</p>
                    <h1 class="display-4"><b><span class="text-lowercase" style="color:steel">websys</span><span class="text-uppercase" style="color:#0D6DA2">ADVC</span></b></h1>
                </div>
                <div style="float:right;position:absolute; top:70px; left: 720px; right:10px; padding-left: 3%"><img src="../assets/img/advc.png" class="img" width="250"></div>
                <div style="padding-left: 3%">
                    <p class="lead"></p>
                    <br /><br /><br />
                    <p style="font-size:20px">Sistema web de gerenciamento ADVC</p>
                    <p style="font-size:20px">Assembleia de Deus Ministério Vida e Comunhão</p>
                </div>
              </div>
            
<!-- END JUMBOTRON -->
   
                      <!-- /row -->
                      <!-- /row -->
                    
                    <!-- /wrapper -->
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
