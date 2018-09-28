<?php
$conn 	= mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Erro de conexao');
$bd 	= mysql_select_db(DB_NAME, $conn) or die('Banco de dados nao encontrado');
?>
