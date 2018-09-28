<?php
class Email {
  public function enviarEmail($cpf, $email){
		echo "emtrou aqui";
		require 'email/class.smtp.php';
    require 'email/class.phpmailer.php';
    $sql            = mysql_query("SELECT * FROM Conta WHERE cpf = '".$cpf."' AND email='".$email."'");
    $qtdRegistros   = mysql_num_rows($sql);
    $dados          = mysql_fetch_array($sql);
    If($qtdRegistros >= 1){
    $senha          = $dados['senha'];
		$emailInformado = $dados['email'];
		echo  $senha;
    //echo mysql_fetch_array(mysql_query($sql['senha']));,

  	$Mailer = new PHPMailer();
  	//Define que ser� usado SMTP
  	$Mailer->IsSMTP();
  	//Enviar e-mail em HTML
  	$Mailer->isHTML(true);
  	//Aceitar carasteres especiais
  	$Mailer->Charset = 'UTF-8';
  	//Configura��es
  	$Mailer->SMTPAuth = true;
  	$Mailer->SMTPSecure = 'ssl';
  	//nome do servidor
  	$Mailer->Host = 'smtp.gmail.com';
  	//Porta de saida de e-mail
  	$Mailer->Port = 465;
  	//Dados do e-mail de saida - autentica��o
  	$Mailer->Username = 'richardsassers@gmail.com';
  	$Mailer->Password = 'trinta&cinco35';
  	//E-mail remetente (deve ser o mesmo de quem fez a autentica��o)
  	$Mailer->From = $dados['email'];
  	//Nome do Remetente
  	$Mailer->FromName = 'Suporte';
  	//Assunto da mensagem
  	$Mailer->Subject = 'Senha Philips Project';
  	//Corpo da Mensagem
  	$Mailer->Body = 'Sua senha �: '. $senha;
  	//Corpo da mensagem em texto
  	$Mailer->AltBody = '';
  	//Destinatario
  	$Mailer->AddAddress('richardsassers@gmail.com');
  	$Mailer->AddAddress($dados['email']);
  	if($Mailer->Send()){
      $_SESSION['enviouSenha'] = "<div class='alert alert-success' role='alert'>
          <strong>Enviado com sucesso!</strong> &nbsp; Verifique seu email, em alguns casos pode levar em torno de 10 minutos.
      </div>";
      header('Location: index.php');


    //  echo "<div class='alert alert-success' role='alert'>
      //    <strong>Well done!</strong> You successfully read this important alert message.
    ///  </div>";

      //echo "<script>alert('E-mail enviado com sucesso! Verifique seu email!');</script>";
  	}else{
			echo "Erro no envio do e-mail: Contate um administrador " //. $Mailer->ErrorInfo;
		
  	}
  }else{
    echo "<div class='alert alert-danger' role='alert'>
        <strong>Opa, parece que ouve algum erro!</strong> &nbsp; Os valores informados n�o pertecem ao mesmo cadastro, verifique e tente novamente!
    </div>";
  }
}
}
?>
