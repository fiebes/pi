<?php
  require_once('include/header.php');
  if (isset($_POST['atualizar'])) {
      require_once('class/Endereco.php');
      require_once('class/Conta.php');
      $attEndereco = new Endereco;
      $attConta = new Conta;
      $idEndereco = $_SESSION['idEndereco'];
      $attConta->alterarConta($_SESSION['idUsuario_Logado'],$_POST['nome'], $_POST['sobrenome'], $idEndereco, $_POST['cpf'], $_POST['rg'], $_POST['email'], $_POST['senha'], $_POST['rua'], $_POST['bairro'],
      $_POST['cep'], $_POST['estado'], $_POST['pais'], $_POST['cidade'], $_POST['numero'], $_POST['complemento']);
    //If($_SESSION['alterouComSucesso']<>""){
    //  echo $_SESSION['alterouComSucesso'];
    //    $_SESSION['alterouComSucesso'] = "";
    //  };
  }
?>

<style>
      body{font: 18px/27px 'Oxygen', sans-serif; color: #353d46;}
      h3{ color: rgb(40,70,200); margin: 0 0 27px; }
</style>

<div class="row">
  <div class="col-md-12">
    <center>
      <h3>Edite suas informa&ccedil;&otilde;es</h3>
    </center>
  </div>
</div>

<div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6">
    <form class="" action="#" method="post">
      <center>
        <div class="row">
            <div class="input-field center" style="width: 100%; ">
              <input id="nome" name="nome" type="text" required class="" value="<?=$_SESSION['nome']?>"/>
              <label for="nome">Nome</label>
            </div>
            <div class="input-field center" style="width: 100%; ">
              <input id="sobrenome" name="sobrenome" type="text" required class="" value="<?=$_SESSION['sobrenome']?>"/>
              <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="cpf" name="cpf" type="text" class="cpf-mask" required value="<?=$_SESSION['cpf']?>" />
              <label for="cpf">CPF</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="rg" name="rg" type="text" class="form-control" required data-mask="##/##/####" value="<?=$_SESSION['rg']?>" />
              <label for="rg">RG</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="email" name="email" type="text" class="" required value="<?=$_SESSION['email']?>"/>
              <label for="email">Email</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="senha" name="senha" type="password" class="" required value="<?=$_SESSION['senha']?>" required/>
              <label for="senha">Senha</label>
            </div>
            <div class="input-field center" style="width: 100%; ">
              <input id="rua" name="rua" type="text" class="" required value="<?=$_SESSION['rua']?>"/>
              <label for="rua">Rua</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="bairro" name="bairro" type="text" class="" required value="<?=$_SESSION['bairro']?>" />
              <label for="bairro">Bairro</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="cep" name="cep" type="text" class="cep-mask" required value="<?=$_SESSION['cep']?>"/>
              <label for="cep">CEP</label>
            </div>
            <div class="input-field center" style="width: 100%; ">
               <input id="numero" name="numero" type="text" class="" required value="<?=$_SESSION['numero']?>" />
               <label for="numero">Número</label>
            </div>
            <div class="input-field center" style="width: 100%; ">
              <input id="estado" name="estado" type="text" class="" required value="<?=$_SESSION['estado']?>"/>
              <label for="estado">Estado</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="pais" name="pais" type="text" class="" required value="<?=$_SESSION['pais']?>" />
              <label for="pais">Pais</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="cidade" name="cidade" type="text" class="" required value="<?=$_SESSION['cidade']?>" />
              <label for="cidade">Cidade</label>
            </div>
            <div class="input-field center" style="width: 100%;">
              <input id="complemento" name="complemento" type="text" required class="" value="<?=$_SESSION['complemento']?>"/>
              <label for="complemento">Complemento</label>
            </div>
          </div>
        <a class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 10px; text-decoration: none;" href="principal.php">Cancelar</a>
    	  <button type="submit" name="atualizar" class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 10px; text-decoration: none;">Salvar Altera&ccedil;&otilde;es</button>
      </center>
    </form>
  </div>
</div>
  <?php
    require_once('include/footer.php');
  ?>
