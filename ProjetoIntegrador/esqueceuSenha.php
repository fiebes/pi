<?php
	require_once("include/header.php");

	if (isset($_POST['enviar']) OR isset($_POST['formDetectado'])) {
		require_once('class/Email.php');
    $enviarEmail = new Email;
    $enviarEmail = $enviarEmail->enviarEmail($_POST['cpf'], $_POST['email']);
}

?>
	<div id="global">
	<div class="row">&nbsp;</div> <div class="row">&nbsp;</div> <div class="row">&nbsp;</div> <div class="row">&nbsp;</div>
	<div id="meio" class="" style="width: 100%; margin-top:-100px;">
		<center>
	<img src="img/logo_philips_azul.png" width="100px;"></center>
	<div class="row">&nbsp;</div>
	<h4><center>Recuperação de conta</center></h4>
	</br>
	</br>
	</br>
	<form class="" action="#" method="post" name='formDetectado'>
		<div class="row">
			<div class="input-field center" style="width: 30%;">
				<input id="cpf" name="cpf" type="text" class="cpf-mask" />
				<label for="cpf">CPF - Ex: 000.000.000-00</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field center" style="width: 30%;">
				<input id="email" name="email" type="text" class=""/>
				<label for="email">Email</label>
			</div>
		</div>
       	<center>
 			<a class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 10px; text-decoration: none;" href="index.php">Voltar</a>
			<button name='enviar' class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 10px; text-decoration: none;" >Enviar Minha Senha</button>
	    </center>
		</form>
		</div>
	</div>
	<?php
	require_once("include/footer.php");
	 ?>
