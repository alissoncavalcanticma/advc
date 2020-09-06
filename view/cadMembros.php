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
                    <h4></h4>
                  </div>
                  <div style="float:right;width:50%">
                    <div style="float:right">
                      <h4>
                        <button class="btn btn-success" onclick="window.location.href='../view/membros.php'"><<<</button>
                      </h4>
                    </div>
                  </div>
              </div>
              
              <section class="sc" id="unseen">
<!-- FORM -->
              <form action="">
                <!-- NOME -->
                    <div class="row rowForm">
                        <div class="col-md-9">
                            <label class="input-group-text" for="inputGroupSelect01">Nome:</label>
                            <input type="text" name="NOME" class="form-control" id="NOME" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Insira seu nome!" required>
                        </div>
                    </div>
                <!-- END NOME -->
                <!-- SEXO -->
                    <div class="row rowForm">
                        <div class="col-md-2">
                                <label class="input-group-text" for="inputGroupSelect01">Sexo:</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="SEXO" id="inlineRadio1" value="M" required>
                                  <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="SEXO" id="inlineRadio2" value="F" required>
                                  <label class="form-check-label" for="inlineRadio2">Feminino</label>
                                </div>
                        </div>
                      </div>
                <!-- END SEXO -->
                <!-- NASC -->
                <div class="row rowForm">
                        <div class="col-md-3">
                                <label class="input-group-text" for="inputGroupSelect01">Data de nascimento:</label>
                                <div class='input-group date' id='datetimepicker10'>
                                    <input class="form-control" size="16" type="text" name="NASC" id="NASC" value="" placeholder="ex: 19/02/1990" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                </div>
                        </div>
                      </div>
                <!-- END NASC -->
                <!-- NAT -->
                <div class="row rowForm">
                        <div class="col-md-9">
                                <label class="input-group-text" for="inputGroupSelect01">Naturalidade:</label>
                                <div class="form-group" style="width:100%">
                                    <div style="float:left;width:80%">
                                      <input type="text" name="NAT" class="form-control" id="NAT" placeholder="Naturalidade (Cidade)" data-rule="naturalidade" data-msg="Informe sua naturalidade!" required>
                                    </div>
                                    <div style="float:right;width:13%">
                                          <input type="text" name="NAT_UF" class="form-control" id="NAT_UF" placeholder="UF" data-rule="maxlen:2" data-msg="UF" maxlength="2" required>
                                    </div>
                                </div>
                        </div>
                      </div>
                <!-- END NAT -->
                <!-- NAC -->
                <div class="row rowForm">
                        <div class="col-md-9">
                                <label class="input-group-text" for="inputGroupSelect01">Nacionalidade:</label>
                                <div class="form-group">
                                  <input type="text" name="NAC" class="form-control" id="NAC" placeholder="Nacionalidade" data-rule="nacionalidade" data-msg="Informe sua nacionalidade!" required>
                                </div>
                        </div>
                      </div>
                <!-- END NAC -->
                <!-- ESTADO CIVIL -->
                <div class="row rowForm">
                        <div class="col-md-9">
                              <label class="input-group-text" for="inputGroupSelect01">Estado Civil</label>
                              <div class="form-group">
                                <select class="custom-select" id="inputGroupSelect02" name="ESTCV" required>
                                    <option value="">........Selecione...........</option>
                                    <option value="SOLTEIRO">Solteiro(a)</option>
                                    <option value="CASADO">Casado(a)</option>
                                    <option value="DIVORCIADO">Divórciado(a)</option>
                                    <option value="VIUDO">Viúvo(a)</option>
                                    <option value="OUTROS">Outros</option>
                                </select>
                              </div>
                              
                        </div>
                      </div>
                <!-- END ESTADO CIVIL -->
                <!-- CONJUGE -->
                <div class="row rowForm">
                        <div class="col-md-9">
                              <label class="input-group-text" for="inputGroupSelect01">Cônjuge:</label>
                              <div class="form-group">
                                <input type="text" name="CONJUGE" class="form-control" id="CONJUGE" placeholder="Nome do Cônjunge (Se houver)" data-rule="minlen:4" data-msg="Insira o nome do seu cônjunge!">
                            </div>
                              
                        </div>
                      </div>
                <!-- END CONJUGE -->
                <!-- DT_CASAMENTO -->
                <div class="row rowForm">
                        <div class="col-md-4">
                              <label class="input-group-text" for="inputGroupSelect01">Data de casamento:</label>
                              <div class="form-group" style="width:70%">
                                    <div class='input-group date' id='datetimepicker10'>
                                    <input class="form-control" size="16" type="text" name="DT_CASAMENTO" id="DT_CASAMENTO" value="" placeholder="ex: 19/02/1990">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                              </div>
                              
                        </div>
                      </div>
                <!-- END DT_CASAMENTO -->
                <!-- MAE -->
                <div class="row rowForm">
                        <div class="col-md-9">
                              <label class="input-group-text" for="inputGroupSelect01">Mãe:</label>
                              <div class="form-group">
                                <input type="text" name="MAE" class="form-control" id="MAE" placeholder="Nome da Mãe" data-rule="minlen:4" data-msg="Insira o nome da sua mãe!" required>
                              </div>
                              
                        </div>
                      </div>
                <!-- END MAE -->
                <!-- PAI -->
                <div class="row rowForm">
                        <div class="col-md-9">
                              <label class="input-group-text" for="inputGroupSelect01">Pai:</label>
                              <div class="form-group">
                                <input type="text" name="PAI" class="form-control" id="PAI" placeholder="Nome do Pai" data-rule="minlen:4" data-msg="Insira o nome do seu pai!">
                              </div>
                              
                        </div>
                      </div>
                <!-- END PAI -->
                <!-- RG - CPF -->
                <div class="row rowForm">
                        <div class="col-md-9">
                              
                              <div class="form-group" style="width:50%; float:left">
                                  <div>
                                    <label class="input-group-text" for="inputGroupSelect01"">RG:</label>
                                  </div>
                                  <div style="float:left;width:78%">
                                      <input type="tel" name="RG" class="form-control" id="RG" placeholder="RG (Só números)" data-rule="minlen:4" data-msg="Insira seu número de RG!" maxlength="7" required>
                                  </div>
                                  <div style="float:right;width:20%">
                                      <input type="text" name="UF_RG" class="form-control" id="UF_RG" placeholder="UF" data-rule="maxlen:2" data-msg="UF de seu RG!" maxlength="2" required>
                                  </div>
                              </div>

                              
                              <div class="form-group" style="width:45%; float:left; margin-left: 35px">
                                  <div>
                                    <label class="input-group-text" for="inputGroupSelect01">CPF:</label>
                                  </div>
                                  <div class="form-group" style="width:100%">
                                    <div style="float:left;width:100%">
                                        <input type="tel" name="CPF" class="form-control" id="CPF" placeholder="CPF (Só número)" data-rule="minlen:4" data-msg="Insira seu número de CPF!" maxlength="11" required>
                                    </div>
                                  </div>
                              </div>
                        </div>
                      </div>
                      <!-- END RG - CPF -->
                      <!-- TITULO -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                    <label class="input-group-text" for="inputGroupSelect01">Título:</label>
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
                                    
                              </div>
                      </div>
                      <!-- END TITULO -->
                      <!-- CNH -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                    <label class="input-group-text" for="inputGroupSelect01">CNH:</label>
                                    <div class="form-group" style="width:70%">
                                        <div style="float:left;width:80%">
                                            <input type="tel" name="CNH" class="form-control" id="CNH" placeholder="CNH (Só números)" data-rule="minlen:12" data-msg="Insira seu número de CNH!" maxlength="12">
                                        </div>
                                        <div style="float:right;width:20%">
                                            <input type="text" name="CAT_CNH" class="form-control" id="CAT_CNH" placeholder="Categ." data-rule="maxlen:2" data-msg="UF de seu RG!" maxlength="2" >
                                        </div>
                                    </div>
                                    
                              </div>
                      </div>
                      <!-- END CNH -->
                      <!-- ESCOLARIDADE - PROFISSAO -->
                      <div class="row rowForm">
                            <div class="col-md-8">
                                  <div style="width:50%; float: left;">
                                      <div>      
                                        <label class="input-group-text" for="inputGroupSelect01">Escolaridade:</label>
                                      </div> 
                                      <div>
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
                                  </div>
                                  
                                  <div style="width:50%; float: left;">
                                      <div>
                                        <label class="input-group-text" for="inputGroupSelect01">Profissão:</label>
                                      </div>    
                                      <div>      
                                        <input type="text" name="PROF" class="form-control" id="PROF" placeholder="Profissão" data-rule="minlen:4" data-msg="Insira sua profissão!" required>
                                      </div>
                                  </div>
                            </div>   
                      </div>
                      <!-- END ESCOLARIDADE - PROFISSAO -->
                      <div style="text-align:center;margin-top: 10px; margin-bottom: 10px"><strong>--------------- Endereço ---------------</strong></div>
                      <!-- ENDEREÇO -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                    <label class="input-group-text" for="inputGroupSelect01">Endereço:</label>
                                    <div class="form-group" style="width:100%">
                                    <div class="form-group">
                                      <input type="text" name="ENDERECO" class="form-control" id="ENDERECO" placeholder="Endereço" data-rule="minlen:4" data-msg="Insira seu endereço!" required>
                                    </div>
                                    </div>
                                    
                              </div>
                      </div>
                      <!-- END ENDEREÇO -->
                      <!-- COMPLEMENTO -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                    <div class="form-group" style="width:100%">
                                      <div class="form-group">
                                        <input type="text" name="COMP_END" class="form-control" id="COMP_END" placeholder="Complemento / Ponto de Referência" data-rule="minlen:4" data-msg="Complemento de Endereço!">
                                      </div>
                                    </div>
                                    
                              </div>
                      </div>
                      <!-- END COMPLEMENTO -->
                      <!-- BAIRRO - CIDADE -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                <div class="form-group" style="width:100%">
                                  <div style="float:left; width:50%">
                                    <input type="text" name="BAIRRO" class="form-control" id="BAIRRO" placeholder="Bairro" data-rule="minlen:4" data-msg="Insira seu bairro!" required>
                                  </div>
                                  <div style="float:left; width:50%">
                                    <input type="text" name="CIDADE" class="form-control" id="CIDADE" placeholder="Cidade" data-rule="minlen:4" data-msg="Insira sua cidade!" required>
                                  </div>
                                </div>
                                    
                              </div>
                      </div>
                      <!-- END BAIRRO - CIDADE -->
                      <!-- UF - CEP -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                  <div class="form-group" style="width: 60%;">
                                    <div style="float:left; width:30%">
                                      <input type="text" name="UF" class="form-control" id="UF" placeholder="UF" data-rule="minlen:4" maxlength="2" data-msg="UF!" required>
                                    </div>
                                    <div style="float:left; width:70%">
                                      <input type="tel" name="CEP" class="form-control" id="CEP" placeholder="CEP" data-rule="minlen:4" data-msg="Insira seu CEP!" maxlength="8" required> 
                                    </div> 
                                  </div>
                                    
                              </div>
                      </div>
                      <!-- END UF - CEP -->
                      <div style="text-align:center;margin-top: 10px; margin-bottom: 10px"><strong>--------------- Contatos ---------------</strong></div>
                      <!-- TELEFONEs -->
                      <div class="row rowForm">
                              <div class="col-md-9">
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
                              </div>
                      </div>
                      <!-- END TELEFONEs --> 
                      <!-- E-MAIL -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <input type="email" name="EMAIL" class="form-control" id="EMAIL" placeholder="E-mail" data-rule="minlen:4" data-msg="Insira seu e-mail!">
                                </div>
                              </div>
                      </div>
                      <!-- END E-MAIL --> 
                      <div style="text-align:center;margin-top: 10px; margin-bottom: 10px"><strong>--------------- Pessoa para contato ---------------</strong></div>
                      <!-- PESSOA P CONTATO -->
                      <div class="row rowForm">
                              <div class="col-md-9">
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
                              </div>
                      </div>
                      <!-- END PESSOA P CONTATO --> 
                      <div style="text-align:center;margin-top: 10px; margin-bottom: 10px"><strong>--------------- Informações Ministeriais ---------------</strong></div>
                      <!-- TELEFONEs -->
                      <div class="row rowForm">
                              <div class="col-md-9">
                                <div class="form-group" style="width:100%">
                                    <div style="float:left; width:50%">
                                      <div>
                                        <label class="input-group-text" for="inputGroupSelect01">IGREJA</label>
                                      </div>
                                      <div>
                                        <select class="custom-select" id="inputGroupSelect02" name="IGREJA" required>
                                          <option value="">........Selecione...........</option>
                                          <option value="1">ADVC-SEDE</option>
                                          <option value="2">ADVC-CRUZ</option>
                                        </select>
                                      </div>
                                      
                                    </div>
                                    <div style="float:left; width:50%">
                                      <div>
                                        <label class="input-group-text" for="inputGroupSelect01">FUNÇÃO ECLESIÁSTICA</label>
                                      </div>  
                                      <div>
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
                                </div>   
                              </div>
                      </div>
                      <!-- END TELEFONEs -->
              </form>
<!-- END FORM -->
                    
                      
                      <!-- BASIC FORM ELELEMNTS -->
                      <div class="row mt">
                        <div class="">


                           

                      


                            

                            
                            


                    

                            

                            
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
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" href="#">Ativo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link disabled" href="#">Desativado</a>
                              </li>
                            </ul>
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
