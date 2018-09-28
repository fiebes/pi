<?php
	require_once('include/header.php');
	require_once('class/Menu.php');
	If($_SESSION['alterouComSucesso']<>""){
    echo $_SESSION['alterouComSucesso'];
    $_SESSION['alterouComSucesso'] = "";
  };

	$listaMenu = new Menu;
  $listaMenu->listaMenu();
  require_once('include/footer.php');

?>
