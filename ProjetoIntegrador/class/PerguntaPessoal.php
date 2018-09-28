<?php
class perguntaPessoal {

  public function listaPergunta(){
    $idPergunta = null;
    if (isset($_POST['mandar'])) {
      if (isset($_POST['id_pergunta'])) {
        $idPergunta           = $_POST['id_pergunta'];
        $id_questao           = $_POST['id_questao'];
        $sqlBuscaPontos       = mysql_query("SELECT * FROM
                              caracteristica_has_alternativarespostapessoal
                              WHERE AlternativaRespostaPessoal_idAlternativaRespostaPessoal = ".$id_questao);
        while ($dados         = mysql_fetch_array($sqlBuscaPontos)) {
          $sqlInsertPontuacao = mysql_query("INSERT INTO
                              Pontuacao(nome, x, y, questao, idCont)
                              VALUES
                              ('Questão".$idPergunta."',".($idPergunta*2).",
                              ".$dados['pontuacaoCaracteristica'].",".$idPergunta.", ".$_SESSION['idUsuario_Logado'].")");
        }
      }else {
        $this->alertaMensagem("Selecione uma opcao!");
        }
    }

    //vou armazenar o idDaPrimeiraPergunta
    if ($idPergunta == null) {
      $idPergunta = 5;
    }

    //selecionar a pergunta
    $sqlPergunta  = mysql_query("SELECT * FROM perguntaPessoal            WHERE idPerguntaPessoal           = ".$idPergunta);
    //selecionar todas imagens da pergunta
    $sqlImagens   = mysql_query("SELECT * FROM imagemHistoria             WHERE idPerguntaPessoalImagem     = ".$idPergunta);
    //selecionar todas opcoes da pergunta
    $sqlOpcoes    = mysql_query("SELECT * FROM alternativarespostapessoal WHERE idPerguntaPessoal           = ".$idPergunta);

    //$this->verificaSeJaRespondeu($_SESSION['idUsuario_Logado'],$idPergunta);

    echo "<div id='games'>";
    while ($exibeImagem = mysql_fetch_array($sqlImagens)) {
      echo "<img src='".$exibeImagem['link']."'alt='' />";
    }
    echo "</div>";

    while ($exibePergunta = mysql_fetch_array($sqlPergunta)) {
      echo "<center><p><h4>".$exibePergunta['perguntaPessoal']."</h4></p></center>";
    }
    echo "<form class='' action='#' method='POST'>";
    echo "<p><center>";
    while ($exibeOpcoes = mysql_fetch_array($sqlOpcoes)) {
      echo "<input type='hidden' name='id_questao' value='".$exibeOpcoes['idAlternativaRespostaPessoal']."'/>";
      echo "<input name='id_pergunta' type='radio' value='".$exibeOpcoes['idPergunta']."' id='".$exibeOpcoes['idAlternativaRespostaPessoal']."'/>";
      echo "<label for='".$exibeOpcoes['idAlternativaRespostaPessoal']."'>".$exibeOpcoes['alternativa']."</label>";
      echo "&nbsp;&nbsp;&nbsp;";
    }
    echo "<p><center><button type='submit' name='mandar'class='waves-effect waves-light btn'>Confirmar</button></center></p>";
    echo "</center></p></form>";
    echo "</br>";

  }

  public function alertaMensagem($mensagem){
    echo "<script>alert('".$mensagem."')</script>";
  }

  public function verificaSeJaRespondeu($idUsuario, $idPergunta){
    $sql = mysql_query("SELECT * FROM pontuacao WHERE idCont=".$idUsuario." AND questao =".$idPergunta);
    $qtd = mysql_num_rows($sql);
    if ($qtd >= 1) {
      echo "<script>alert('ja respondeu');</script>";
    }else{
      echo "<script>alert('nao respondeu');</script>";
    }
  }



}
 ?>
