<?php
  require_once("include/header.php");
  require_once("class/PerguntaPessoal.php");
  $listar = new PerguntaPessoal;
  $listar->listaPergunta(null);
  require_once("include/footer.php");
?>

<script>
	$('#games').coinslider();
</script>
