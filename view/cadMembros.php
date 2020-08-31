<?php 

if(isset($_GET['display']) && !empty($_GET['display'])){
  $display = 'block';
}else{
  $display = 'none';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <meta name="theme-color" content="black">
  <title>Formulário de cadastro de membros</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">


  <script>
            setTimeout(function(){ 
              $('#alert').delay(300).fadeOut(300);   
            }, 3000);
  </script>
 

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      
      <!--logo start-->
      <div style="width:100%"> 
          <div style="width:20%;float:left; line-height: 55px">    
            <img src="assets/img/logoAtualPNG.png" width="40px" height="45px">
          </div>
          <div style="width:70%;float:left;color:ivory">
              <h4>Assembléia de Deus Ministério Vida e Comunhão - ADVC</h4>
          </div>
          
        
      </div>

    </header>
    <!--header end-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-6">

            <div class="alert alert-success" role="alert" id="alert" style="margin-top:40px; margin-bottom:0px; text-align: center; display:<?= $display ?>"><h4><strong>Cadastro realizado com Sucesso!</strong></h4></div>

            <br><br>
            <h3 style="text-align: center;"><i class="fa fa-angle-right"></i> Cadastro de Membros<i class="fa fa-angle-left"></i></h3>
            <br>
            <form class="contact-form php-mail-form" role="form" action="config/config.php" method="post">
            
            <div style="text-align:center"><strong>--------------- Informações Pessoais ---------------</strong></div><br>

            <!-- Nome -->
              <div class="form-group">
                <input type="text" name="NOME" class="form-control" id="NOME" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Insira seu nome!" required>
              </div>

              <!-- Sexo -->
              <div class="form-group">
              <label class="input-group-text" for="inputGroupSelect01">Sexo</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="SEXO" id="inlineRadio1" value="M" required>
                  <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="SEXO" id="inlineRadio2" value="F" required>
                  <label class="form-check-label" for="inlineRadio2">Feminino</label>
                </div>
              </div>

              <!-- Nascimento -->
              <div>
                <label>Data de Nascimento</label>
              </div>

              <div class="form-group" style="width:70%">
                      <div class='input-group date' id='datetimepicker10'>
                      <input class="form-control" size="16" type="text" name="NASC" id="NASC" value="" placeholder="ex: 19/02/1990" required>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar">
                              </span>
                          </span>
                      </div>
              </div>
                
              <!-- Naturalidade -->
              <div class="form-group" style="width:100%">
                <div style="float:left;width:80%">
                  <input type="text" name="NAT" class="form-control" id="NAT" placeholder="Naturalidade (Cidade)" data-rule="naturalidade" data-msg="Informe sua naturalidade!" required>
                </div>
                <div style="float:right;width:20%">
                      <input type="text" name="NAT_UF" class="form-control" id="NAT_UF" placeholder="UF" data-rule="maxlen:2" data-msg="UF" maxlength="2" required>
                  </div>
              </div>
              <br><br><br>
               <!-- Nacionalidade -->
               <div class="form-group">
                <input type="text" name="NAC" class="form-control" id="NAC" placeholder="Nacionalidade" data-rule="nacionalidade" data-msg="Informe sua nacionalidade!" required>
              </div>

               <!-- Estado Civil -->
               <div class="input-group mb-6">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Estado Civil</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="ESTCV" required>
                  <option value="">........Selecione...........</option>
                  <option value="SOLTEIRO">Solteiro(a)</option>
                  <option value="CASADO">Casado(a)</option>
                  <option value="DIVORCIADO">Divórciado(a)</option>
                  <option value="VIUDO">Viúvo(a)</option>
                  <option value="OUTROS">Outros</option>
                </select>
              </div>
              <br>
              <!-- CONJUGE -->

              <div class="form-group">
                <input type="text" name="CONJUGE" class="form-control" id="CONJUGE" placeholder="Nome do Cônjunge (Se houver)" data-rule="minlen:4" data-msg="Insira o nome do seu cônjunge!">
              </div>
            
              <!-- Data de Casamento -->

              <div>
                <label>Data de Casamento</label>
              </div>

              <div class="form-group" style="width:70%">
                      <div class='input-group date' id='datetimepicker10'>
                      <input class="form-control" size="16" type="text" name="DT_CASAMENTO" id="DT_CASAMENTO" value="" placeholder="ex: 19/02/1990">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar">
                              </span>
                          </span>
                      </div>
              </div>
              
              <!-- MAE -->

              <div class="form-group">
                <input type="text" name="MAE" class="form-control" id="MAE" placeholder="Nome da Mãe" data-rule="minlen:4" data-msg="Insira o nome da sua mãe!" required>
              </div>
              

              <!-- PAI -->

              <div class="form-group">
                <input type="text" name="PAI" class="form-control" id="PAI" placeholder="Nome do Pai" data-rule="minlen:4" data-msg="Insira o nome do seu pai!">
              </div>

              <!-- RG -->
              <div class="form-group" style="width:70%">
                  <div style="float:left;width:80%">
                      <input type="tel" name="RG" class="form-control" id="RG" placeholder="RG (Só números)" data-rule="minlen:4" data-msg="Insira seu número de RG!" maxlength="7" required>
                  </div>
                  <div style="float:right;width:20%">
                      <input type="text" name="UF_RG" class="form-control" id="UF_RG" placeholder="UF" data-rule="maxlen:2" data-msg="UF de seu RG!" maxlength="2" required>
                  </div>
              </div>
              <br><br><br>
              

              <!-- CPF -->
              <div class="form-group" style="width:70%">
                  <div style="float:left;width:80%">
                      <input type="tel" name="CPF" class="form-control" id="CPF" placeholder="CPF (Só número)" data-rule="minlen:4" data-msg="Insira seu número de CPF!" maxlength="11" required>
                  </div>
              </div>
              <br><br>

              <!-- TITULO -->
              <div class="form-group" style="width:100%" >
                  <div style="float:left;width:60%">
                      <input type="tel" name="TIT_NUM" class="form-control" id="TIT_NUM" placeholder="Título (Só números)" data-rule="minlen:4" data-msg="Insira seu número de RG!" maxlength="12">
                  </div>
                  <div style="float:right;width:20%">
                      <input type="tel" name="TIT_SEC" class="form-control" id="TIT_SEC" placeholder="Seção" data-rule="maxlen:4" data-msg="Seção do Título!" maxlength="4">
                  </div>
                  <div style="float:right;width:20%">
                      <input type="tel" name="TIT_ZONA" class="form-control" id="TIT_ZONA" placeholder="Zona" data-rule="maxlen:3" data-msg="Zona do Título!" maxlength="3">
                  </div>
              </div>
              <br><br>

              <!-- CNH -->
              <div class="form-group" style="width:70%">
                  <div style="float:left;width:80%">
                      <input type="tel" name="CNH" class="form-control" id="CNH" placeholder="CNH (Só números)" data-rule="minlen:12" data-msg="Insira seu número de CNH!" maxlength="12">
                  </div>
                  <div style="float:right;width:20%">
                      <input type="text" name="CAT_CNH" class="form-control" id="CAT_CNH" placeholder="Categ." data-rule="maxlen:2" data-msg="UF de seu RG!" maxlength="2" >
                  </div>
              </div>
              <br><br><br>


              <!-- Escolaridade -->
              
              <div class="input-group mb-6">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Escolaridade</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="ESC" required>
                  <option value="">........Selecione...........</option>
                  <option value="0">ALFABETIZAÇÃO</option>
                  <option value="1">FUNDAMENTAL - INCOMPLETO</option>
                  <option value="2">FUNDAMENTAL - COMPLETO</option>
                  <option value="3">MÉDIO - INCOMPLETO</option>
                  <option value="4">MÉDIO - COMPLETO</option>
                  <option value="5">SUPERIOR - INCOMPLETO</option>
                  <option value="6">SUPERIOR - COMPLETO</option>
                  <option value="7">ESPECIALIZAÇÃO - INCOMPLETO</option>
                  <option value="8">ESPECIALIZAÇÃO - COMPLETO</option>
                  <option value="9">MESTRADO - INCOMPLETO</option>
                  <option value="10">MESTRADO - COMPLETO</option>
                  <option value="11">DOUTORADO - INCOMPLETO</option>
                  <option value="12">DOUTORADO - COMPLETO</option>
                  <option value="13">PÓS-DOUTORADO - INCOMPLETO</option>
                  <option value="14">PÓS-DOUTORADO - COMPLETO</option>


                </select>
              </div>
              <br>
              <!-- Profissão -->
              <div class="form-group">
                <input type="text" name="PROF" class="form-control" id="PROF" placeholder="Profissão" data-rule="minlen:4" data-msg="Insira sua profissão!" required>
              </div>

              <div style="text-align:center"><strong>--------------- Endereço e contatos ---------------</strong></div><br>

              <!-- ENDEREÇO -->
              <div class="form-group">
                <input type="text" name="ENDERECO" class="form-control" id="ENDERECO" placeholder="Endereço" data-rule="minlen:4" data-msg="Insira seu endereço!" required>
              </div>

              <!-- COMPLEMENTO DO ENDEREÇO -->
              <div class="form-group">
                <input type="text" name="COMP_END" class="form-control" id="COMP_END" placeholder="Complemento / Ponto de Referência" data-rule="minlen:4" data-msg="Complemento de Endereço!">
              </div>

              <!-- BAIRRO/CIDADE -->
              <div class="form-group" style="width:100%">
                <div style="float:left; width:50%">
                  <input type="text" name="BAIRRO" class="form-control" id="BAIRRO" placeholder="Bairro" data-rule="minlen:4" data-msg="Insira seu bairro!" required>
                </div>
                <div style="float:left; width:50%">
                  <input type="text" name="CIDADE" class="form-control" id="CIDADE" placeholder="Cidade" data-rule="minlen:4" data-msg="Insira sua cidade!" required>
                </div>
              </div>
              <!-- UF e CEP -->
              <br><br><br>
              <div class="form-group" style="width: 60%;">
                <div style="float:left; width:30%">
                  <input type="text" name="UF" class="form-control" id="UF" placeholder="UF" data-rule="minlen:4" maxlength="2" data-msg="UF!" required>
                </div>
                <div style="float:right; width:70%">
                  <input type="tel" name="CEP" class="form-control" id="CEP" placeholder="CEP" data-rule="minlen:4" data-msg="Insira seu CEP!" maxlength="8" required> 
                </div> 
              </div>
              <br>
              <br>

              <!-- TELEFONEs -->
              <div class="form-group" style="width:100%">
                <div style="float:left; width:50%">
                  <label class="input-group-text" for="inputGroupSelect01">DDD + Telefone 1 <span style="color:crimson">*Apenas números</span></label>
                  <input type="tel" name="FONE1" class="form-control" id="FONE1" placeholder="ex: 81988776655" maxlength="11" data-rule="minlen:4" data-msg="Insira seu telefone!" required>
                </div>
                <div style="float:left; width:50%">
                    <label class="input-group-text" for="inputGroupSelect01">DDD + Telefone 2 <span style="color:crimson">*Apenas números</span></label>
                  <input type="tel" name="FONE2" class="form-control" id="FONE2" placeholder="ex: 81988776655" maxlength="11" data-rule="minlen:4" data-msg="Insira seu telefone!">
                </div>
              </div>

              <br><br><br>
              <!-- EMAIL -->
              <div class="form-group">
                <input type="email" name="EMAIL" class="form-control" id="EMAIL" placeholder="E-mail" data-rule="minlen:4" data-msg="Insira seu e-mail!">
              </div>

              <!-- Contato -->
              
              <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Pessoa para contato</label>
                </div>
              <div class="form-group" style="width:100%">

                <div style="float:left; width:55%">
                  <label class="input-group-text" for="inputGroupSelect01">Nome</label>
                  <input type="text" name="N_FONECT" class="form-control" id="N_FONECT" placeholder="Nome do Contato" data-msg="Insira seu telefone!">
                </div>
                <div style="float:left; width:45%">
                  <label class="input-group-text" for="inputGroupSelect01" style="white-space: normal"><span style="color:crimson">*Apenas números</span></label>
                    <input type="tel" name="FONECT" class="form-control" id="FONECT" placeholder="ex: 81988776655" maxlength="11" data-rule="minlen:4" data-msg="Insira seu telefone!" required>
                </div>
              </div>

              <br><br><br><br><div style="text-align:center"><strong>--------------- Informações ministeriais ---------------</strong></div>

              <!-- IGREJA -->
              
              <div class="input-group mb-6">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">IGREJA</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="IGREJA" required>
                  <option value="">........Selecione...........</option>
                  <option value="1">ADVC-SEDE</option>
                  <option value="2">ADVC-CRUZ</option>
                </select>
              </div>

              <br>
              
              <div class="form-group">

                    <!-- FUNÇÃO ECLESIÁSTICA -->
              
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">FUNÇÃO ECLESIÁSTICA</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" name="FUNCECLES" required>
                          <option value="">........Selecione...........</option>
                          <option value="1">CONGREGADO</option>
                          <option value="2">MEMBRO</option>
                          <option value="3">AUXILIAR</option>
                          <option value="4">DIÁCONO</option>
                          <option value="5">PRESBÍTERO</option>
                          <option value="6">EVANGELISTA</option>
                          <option value="7">PASTOR</option>
                        </select>
                      </div>


              </div>
              <br>

              <div class="form-group" style="width:100%">
                
                <div style="float:left;width:50%">

                      <!-- FUNÇÃO ADMINISTRATIVA -->
              
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">FUNÇÃO ADMINISTRATIVA</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" name="FUNCADM">
                          <option value="">........Selecione...........</option>
                          <option value="1">MEMBRO DO CONSELHO</option>
                          <option value="2">1º TESOUREIRO</option>
                          <option value="3">2º TESOUREIRO</option>
                          <option value="4">1º SECRETÁRIO</option>
                          <option value="5">2º SECRETÁRIO</option>
                          <option value="6">VICE-PRESIDENTE</option>
                          <option value="7">PRESIDENTE</option>
                        </select>
                      </div>

                </div>
                <div style="float:right;width:50%">

                      <!-- FUNÇÃO ADMINISTRATIVA 2 -->
              
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">FUNÇÃO ADMINISTRATIVA 2*</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect02" name="FUNCADM2">
                          <option value="">........Selecione...........</option>
                          <option value="1">MEMBRO DO CONSELHO</option>
                          <option value="2">1º TESOUREIRO</option>
                          <option value="3">2º TESOUREIRO</option>
                          <option value="4">1º SECRETÁRIO</option>
                          <option value="5">2º SECRETÁRIO</option>
                          <option value="6">VICE-PRESIDENTE</option>
                          <option value="7">PRESIDENTE</option>
                        </select>
                      </div>

                </div>
              </div>
              <br><br><br>

              <!-- RECEPÇÃO -->
              
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01"> RECEPÇÃO </label>
                </div>
                <select class="custom-select" id="inputGroupSelect02" name="RECEPCAO" required>
                  <option value="">........Selecione...........</option>
                  <option value="1">BATISMO</option>
                  <option value="2">ACLAMAÇÃO</option>
                  <option value="3">TRANSFERÊNCIA</option>
                </select>
              </div>

              <br>

              
              <div class="form-group" style="width:100%;">

                  <!-- BATISMO -->
                  
                      <div class="col"  style="width:50%;float:left"> 
                        <div>
                          <label>Data de Batismo</label>
                        </div>

                        <div class="form-group" style="width:100%">
                                <div class='input-group date' id='datetimepicker10'>
                                <input class="form-control" size="16" type="text" name="BAT" id="BAT" value="" placeholder="ex: 19/02/1990">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>
                        </div>
                      </div>

                  <!-- CONVERSÃO -->
            
                  
                      <div class="col" style="width:50%;float:left"> 
                        
                        <div>
                          <label>Data da Conversão</label>
                        </div>

                        <div class="form-group" style="width:100%">
                                <div class='input-group date' id='datetimepicker10'>
                                <input class="form-control" size="16" type="text" name="CV" id="CV" value="" placeholder="ex: 19/02/1990">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span>
                                    </span>
                                </div>
                        </div>

                      </div>
                  
              </div>              
              <br><br>
              <div style="text-align:center;margin-top:60px;margin-bottom:40px"><strong>----------------------------------- FIM ------------------------------------</strong></div>
              
              <!--<input type="hidden" name="SUCESS" value="true">-->

              <!-- -->
              <div class="btn col-md-10" style="padding:0px;width:100%">
                <input style="width:100%" type="submit" class="btn btn-large btn-success" value="Salvar Cadastro">
              </div>


              <div class="loading"></div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              

            </form>
          </div>
        </div>
        <!-- /row -->


        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong> <a href="http://www.alstwo.com.br">alsTwo.com.br</a> </strong>. All Rights Reserved
        </p> - Development by <a>Alisson Cavalcanti</a>
        <a href="form_component.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="assets/lib/jquery/jquery.min.js"></script>
  <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/lib/jquery.scrollTo.min.js"></script>
  <script src="assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="assets/lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="assets/lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="assets/lib/jquery.tagsinput.js"></script>