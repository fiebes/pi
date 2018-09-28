<?php
  require_once("include/config.php");
  require_once("include/conn.php");
  session_start();
  //$_SESSION['enviouSenha'] = "nao";
  ini_set('display_errors', 0);

if (isset($_POST['sair'])) {
    session_destroy();
    session_start();
    $_SESSION['sair'] = "";
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <title>Projeto Integrador</title>

    <link rel="stylesheet" href="css/menulateral.css" type="text/css"/>
    <link href="css/twilight.css" rel="stylesheet">
    <link type="text/css" href="css/tes.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css"/>
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css"/>
    <!--
    <link type="text/css" href="css/twilight.css" rel="stylesheet">
    -->
    <script type="text/javascript" src="js/tes.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/analytics.js"></script>
    <script type="text/javascript" src="js/jquery2.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="js/bootstrapmm.js"></script>
    <script type="text/javascript" src="js/coin-slider.js"></script>

  </head>
  <body>
      <div class="barra_superior_azul">
        <div class="imagem_philips">
          <a href=<?=($_SESSION['autenticado'] == 'logado') ? "principal.php" : "index.php" ?>>
            <img src="img/logo_philips_branca.png" width="50"/>
          </a>
        </div>
        <div class="">
          <form class="texto_superior_usuario" action="#" method="post"><button name="sair" class="botao_superior_usuario"><?=$_SESSION['sair']?></button></form>
          <a class="nome_superior_usuario" ><?=($_SESSION['autenticado'] == 'logado') ? $_SESSION['nome'].", &nbsp; &nbsp;" : "" ?></a>
        </div>
      </div>
