<?php
session_start();

require '../autoload.php';

if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
      if(isset($_POST['senha']) && !empty($_POST['senha'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $userController = new UsuarioController();
        $retorno = $userController->logar($usuario, $senha);
        //var_dump($retorno);die;
  }
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
  <title>websysADVC</title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <br/>
    <br/>
    <br/>
    <br/>
    <div id="login-page">
    <div class="container">
      
    <form class="form-login" action="" method="post">

        <h2 class="form-login-heading">Login</h2>

        <div class="login-wrap">

          <input type="text" name="usuario" class="form-control" placeholder="Usuário" autofocus>
            <br>
          <input type="password" name="senha" class="form-control" placeholder="Senha">
          
          
          <!-- <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          -->

          <br/>
          <button class="btn btn-theme btn-block" href="index.html" type="submit">
            <i class="fa fa-lock"></i> 
            Acessar 
          </button>
          
          <hr>
          <!-- 
          <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div>
          -->
        </div>

        <!-- Modal

        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>

        Modal -->

      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../assets/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../assets/img/bg-login-hxg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
