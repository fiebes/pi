<?php
  require_once('/include/header.php');
  if (isset($_POST['logar'])) {
    require_once('class/Conta.php');
    $cadastrar = new Conta;
    $cadastrar->logarConta($_POST['cpf'],$_POST['senha']);
  }
  If($_SESSION['enviouSenha']<>""){
    echo $_SESSION['enviouSenha'];
    $_SESSION['enviouSenha'] = "";
  };
  If($_SESSION['cadastrou']<>""){
    echo $_SESSION['cadastrou'];
    $_SESSION['cadastrou'] = "";
  };
?>

  <div id="global">
    <div id="sub_topo" class="" style="margin-top: 30px;">
      <center>
        <img src="img/logo_philips_azul.png" width="170px">
      </center>
    </div>
     <div id="meio" class="" style="width: 100%;">
       <form id="formLogar" method="POST" action="#" enctype="multipart/form-data">
           <center>
             <div class="input-field" style="width: 30%;">
               <input id="cpf" name="cpf" type="text" class="cpf-mask"/>
               <label for="cpf">CPF - Ex: 000.000.000-00</label>
             </div>
           </center>
           <center>
             <div class="input-field" style="width: 30%;">
               <input id="senha" name="senha" type="password" class="validate">
               <label for="senha">Senha</label>
             </div>
           </center>
           <div class="" style="width: 30%; margin-left: 35%; ">
             <a style="color: rgb(11, 94, 215); text-decoration: none;" href="cadastro.php">Criar Conta</a></br>
             <a style="color: rgb(11, 94, 215); text-decoration: none;" href="esqueceuSenha.php">Esqueceu sua senha?</a>
           </div>
           <center>
              <button type="submit" class="waves-effect btn" name="logar" style="background-color: rgb(11, 94, 215); color: white; margin-top: 10px; text-decoration: none;">Entrar</button>
           </center>
         </form>
      </div>
  </div>





<?php
  require_once('/include/footer.php');
?>
