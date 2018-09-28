<?php
  class Conta{
    public function addConta($nome, $sobrenome, $idEndereco, $sexo, $cpf, $rg, $email, $senha){

      $nome         = trim($nome      );
      $sobrenome    = trim($sobrenome );
      $idEndereco   = trim($idEndereco);
      $sexo         = trim($sexo      );
      $cpf          = trim($cpf       );
      $rg           = trim($rg        );
      $email        = trim($email     );
      $senha        = trim($senha     );

      $sql = "INSERT INTO Conta VALUES (
            0,
            '".$nome."',
            '".$sobrenome."',
            '".$idEndereco."',
            'now()',
            '".$sexo."',
            '".$cpf."',
            '".$rg."',
            '".$email."',
            '".$senha."'
            )";
      if (mysql_query($sql)) {
        $_SESSION['cadastrou'] = "<div class='alert alert-success' role='alert'>
            <strong>Cadastrado com sucesso!</strong>
        </div>";
        header('Location: index.php');
      }else{
        echo "<div class='alert alert-danger' role='alert'>
                <strong>Ops, ocorreu um erro ao cadastrar, verifique suas informações!</strong>
              </div>";
        //$this->alertaMensagem("Não cadastrou! Verifique os dados informados!");
      }
    }

    public function removerConta(){}

    public function logarConta($usuario, $senha){
      $usuario          = trim($usuario);
      $senha            = trim($senha);

      $sql              = "SELECT * FROM Conta WHERE cpf = '".$usuario."'";
      $query            = mysql_query($sql);
      $registros        = mysql_num_rows($query);

      if ($registros >= 1) {
        $sql            = "SELECT * FROM Conta WHERE senha = '".$senha."' AND (cpf = '".$usuario."')";
        $query          = mysql_query($sql);
        $infoUsu        = $query;
        $registros      = mysql_num_rows($infoUsu);
        if ($registros == 1) {
          $infoUsu      = mysql_fetch_array($infoUsu);
          $this->preencherSessoes($infoUsu['idConta']);
          header('Location: principal.php');
        }else {
          echo "<div class='alert alert-danger' role='alert'>
              <strong>Opa, parece que ouve algum erro!</strong> &nbsp; Verifique os dados informados!
          </div>";
          //$this->alertaMensagem("Senha ou Usuário Invalido, tente novamente!");
        }
      }else {
        echo "<div class='alert alert-danger' role='alert'>
            <strong>Opa, parece que ouve algum erro!</strong> &nbsp; Verifique os dados informados!
        </div>";
      //    $this->alertaMensagem("Senha ou Usuário Invalido, tente novamente!");
      }
    }

    public function alterarConta($idUsuario, $nome, $sobrenome, $idEndereco, $cpf, $rg, $email, $senha, $rua, $bairro, $cep, $estado, $pais, $cidade, $numero, $complemento){
      $sqlConta        = "UPDATE Conta SET
                       nome = '".$nome."',
                       sobrenome = '".$sobrenome."',
                       idEndereco = ".$idEndereco.",
                       dtNasc=now(),
                       sexo=1,
                       cpf='".$cpf."',
                       rg='".$rg."',
                       email='".$email."',
                       senha='".$senha."'
                       WHERE idConta =".$idUsuario;

      $sqlEndereco      = "UPDATE endereco SET
                        pais = '".$pais."',
                        estado= '".$estado."',
                        cidade = '".$cidade."',
                        cep='".$cep."',
                        rua='".$rua."',
                        bairro='".$bairro."',
                        numero='".$numero."',
                        complemento='".$complemento."'
                        WHERE idEndereco =".$idEndereco;

      if (mysql_query($sqlConta) AND mysql_query($sqlEndereco)) {
        $this->alertaMensagem("Alterado com Sucesso!");
        header('Location: principal.php');
        $this->preencherSessoes($idUsuario);
        $_SESSION['alterouComSucesso'] = "<div class='alert alert-success' role='alert'>
            <strong>Alterado com sucesso!</strong>
        </div>";
      }else{
        $this->alertaMensagem("Erro ao alterar!");
        $_SESSION['alterouComSucesso'] = "<div class='alert alert-alert' role='alert'>
            <strong>Erro ao alterar!</strong>
        </div>";
      }
    }

    public function alertaMensagem($mensagem){
      echo "<script>alert('".$mensagem."')</script>";
    }

    public function preencherSessoes($idUsuario_Logado){
      $sql = "SELECT * FROM
              Conta WHERE
              idConta = '".$idUsuario_Logado."' ";
      $query                          = mysql_query($sql);
      $dadosUsu                       = $query;
      $dadosUsu                       = mysql_fetch_array($dadosUsu);

      $_SESSION['idUsuario_Logado']   = $dadosUsu['idConta'];
      $_SESSION['autenticado']        = "logado";
      $_SESSION['sair']               = "Sair";
      $_SESSION['nome']               = $dadosUsu['nome'];
      $_SESSION['sobrenome']          = $dadosUsu['sobrenome'];
      $_SESSION['dtNasc']             = $dadosUsu['dtNasc'];
      $_SESSION['sexo']               = $dadosUsu['sexo'];
      $_SESSION['telefone']           = $dadosUsu['telefone'];
      $_SESSION['cpf']                = $dadosUsu['cpf'];
      $_SESSION['rg']                 = $dadosUsu['rg'];
      $_SESSION['email']              = $dadosUsu['email'];
      $_SESSION['senha']              = $dadosUsu['senha'];
      $_SESSION['idEndereco']         = $dadosUsu['idEndereco'];

      $sqlEndereco                    = mysql_query("SELECT * FROM
                                        endereco WHERE
                                        idEndereco = ".$dadosUsu['idEndereco']);
      $dadosEnd                       = mysql_fetch_array($sqlEndereco);

      $_SESSION['pais']               = $dadosEnd['pais'];
      $_SESSION['estado']             = $dadosEnd['estado'];
      $_SESSION['cidade']             = $dadosEnd['cidade'];
      $_SESSION['cep']                = $dadosEnd['cep'];
      $_SESSION['rua']                = $dadosEnd['rua'];;
      $_SESSION['bairro']             = $dadosEnd['bairro'];
      $_SESSION['numero']             = $dadosEnd['numero'];
      $_SESSION['complemento']        = $dadosEnd['complemento'];
    }


  }





?>
