<?php
class Endereco {
  public function criarEndereco($pais, $estado, $cidade, $cep, $rua, $bairro, $numero, $complemento){
    $pais         = trim($pais);
    $estado       = trim($estado);
    $cidade       = trim($cidade);
    $rua          = trim($rua);
    $cep          = trim($cep);
    $bairro       = trim($bairro);
    $numero       = trim($numero);
    $complemento  = trim($complemento);

    $sql          = "INSERT INTO Endereco
                  VALUES (0,
                  '".$pais."',
                  '".$estado."',
                  '".$cidade."',
                  '".$cep."',
                  '".$rua."',
                  '".$bairro."',
                  '".$numero."',
                  '".$complemento."'
                  )";
    if (mysql_query($sql)) {
        //retorna ultimo id inserido
        return mysql_insert_id();
      }else{
        //echo "<script>alert('erro cadastrar endereco')</script>";
      }
    }

    public function removerEndereco(){}

  }
 ?>
