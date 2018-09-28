<?php
  require_once('include/header.php');
if (isset($_POST['cadastrar'])) {
  require_once('class/Endereco.php');
  require_once('class/Conta.php');

  $cadastrarEndereco = new Endereco;
  $cadastrarConta = new Conta;
  $idEndereco = $cadastrarEndereco->criarEndereco($_POST['pais'], $_POST['estado'], $_POST['cidade'], $_POST['cep'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['complemento']);
  //echo $idEndereco;
  $cadastrarConta->addConta($_POST['nome'], $_POST['sobrenome'], $idEndereco, 1, $_POST['cpf'], $_POST['rg'], $_POST['email'], $_POST['senha']);
  //echo $_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['email'], $_POST['cpf'];
}
?>
  <style media="screen">
    body{
      font: 18px/27px 'Oxygen', sans-serif;
       color: #353d46;
    }
    h3{ color: rgb(40,70,200); margin: 0 0 27px; }
</style>
<div class="row">
<div class="col-md-12">
  <center>      <div class="row">&nbsp;</div> <div class="row">&nbsp;</div>
    <h3>Cadastre-se</h3>
    <a>Informe todas suas informações</a>
  </center>
</div>
</div>
<div class="row">
  <div class="col-md-5" style="margin-top:-70px;">
      <center>
        <img src="img/beneficios.png" style="width:200px;" alt="">
        <h4>Beneficios ao cadastrar:</h4>
        <h5>Terá acesso a todas as vagas dísponiveis</h5>
        <h5>Gerencia o seu perfil para empresas</h5>
        <h5>Avalia seu comportamento</h5>
        <h5>Anexa curriculo</h5>
      </center>
  </div>
  <div class="col-md-6">
    <form class="" action="#" method="post">
    <center>
      <div class="row">
        
          <div class="input-field center" style="width: 49%; ">
            <input id="nome" name="nome" type="text" class="" required/>
            <label for="nome">Nome</label>
          </div>
          <div class="input-field center" style="width: 49%; ">
            <input id="sobrenome" name="sobrenome" type="text" class="" required/>
            <label for="sobrenome">Sobrenome</label>
          </div>
          <div class="input-field center" style="width: 49%;">
            <input id="cpf" name="cpf" type="text" class="cpf-mask" required />
            <label for="cpf">CPF - Ex: 000.000.000-00</label>
          </div>
          <div class="input-field center" style="width: 49%;">
            <input id="rg" name="rg" type="text" class="form-control" required data-mask="00/00/0000" max="8" autocomplete="off" />
            <label for="rg">RG</label>
          </div>
          <div class="input-field center" style="width: 100%;">
            <input id="email" name="email" type="text" class="" required autocomplete="off"/>
            <label for="email">Email</label>
          </div>
          <div class="input-field center" style="width: 100%;">
            <input id="senha" name="senha" type="password" class="" required autocomplete="off"/>
            <label for="senha">Senha</label>
          </div>
          <div class="input-field center" style="width: 49%; ">
            <input id="rua" name="rua" type="text" class="" required/>
            <label for="rua">Rua</label>
          </div>
          <div class="input-field center" style="width: 49%;">
            <input id="bairro" name="bairro" type="text" class="" required />
            <label for="bairro">Bairro</label>
          </div>
          <div class="input-field center" style="width: 20%;">
            <input id="cep" name="cep" type="text" class="cep-mask" required/>
            <label for="cep">CEP</label>
          </div>
          <div class="input-field center" style="width: 5%; ">
             <input id="numero" name="numero" type="text" class="" required />
             <label for="numero">N°</label>
          </div>
          <div class="input-field center" style="width: 8%; ">
            <input id="estado" name="estado" type="text" class="" required/>
            <label for="estado">UF</label>
          </div>
          <div class="input-field center" style="width: 18%;">
            <input id="cidade" name="cidade" type="text" class="" required />
            <label for="cidade">Cidade</label>
          </div>
          <div class="input-field center" style="width: 32%;">
            <input id="complemento" name="complemento" type="text" class="" required/>
            <label for="complemento">Complemento</label>
          </div>
          <div class="input-field center" style="width: 8%;">
            <input id="pais" name="pais" type="text" class=""  required/>
            <label for="pais">Pais</label>
          </div>
        </div>
      <a class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 7px; text-decoration: none;" href="index.php">Cancelar</a>
      <button type="submit" name="cadastrar" class="waves-effect btn" style="background-color: rgb(11, 94, 215); color: white; margin-top: 7px; text-decoration: none;">Cadastrar</button>
      <div class="row">&nbsp;</div>
    </center>
  </form>
  </div>
  </div>
<?php
require_once("include/footer.php");

?>
