<?php 

    require '../autoload.php';

    $pdo = new Conexao();
    $pdo->exec("SET CHARACTER SET utf8");
    
    $TIPO = $_GET['TIPO'];

    $lancC = new LancController($pdo);

    $cat = $lancC->getCategoria($TIPO);

    foreach($cat as $c){
        echo "<option value='$c[ID]'>$c[DESCRICAO]</option>";
    }

?>