<?php
	//Recimento das variáveis.................
	$rementeNome = $_POST['nome'];
	$rementeEmail = $_POST['email'];
	$telefone = $_POST['telefone'];
	$assunto = $_POST['assunto'];
	$mensagem = n12br($_POST['mensagem']);


	//Dados do servidor......................
	$caixaPostalServidorEmail = 'bymeia@uol.com.br';
	$caixaPostalServidorSenha = 'felipe66';
	$caixaPostalServidorNome = 'By Meia Site | Arquitetura & Construção';

	$enviaFormularioParaNome = 'By Meia Site | Arquitetura & Construção';
	$enviaFormularioParaEmail = 'bymeia@uol.com.br';

	//Mensagem cancatenada.................................................

	$mensagemConcatenada = 'Formulário de contato do site'.'<br/>';
	$mensagemConcatenada .= '----------------------------------<br/><br/>';
	$mensagemConcatenada .= 'Nome: '.$remententeNome.'<br/>';
	$mensagemConcatenada .= 'E-mail: '.$rementeEmail.'<br/>';
	$mensagemConcatenada .= 'Telefone: '.$telefone.'<br/>';
	$mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
	$mensagemConcatenada .= '----------------------------------<br/><br/>';
	$mensagemConcatenada .= 'Mensagem: "<br/>'.$mensagem.'"<br/>';

	//Incluindo Arquivo class
	 require_once('PHPMailer-master/PHPMailerAutoload.php');
 
	$mail = new PHPMailer();
	 
	$mail->IsSMTP();
	$mail->SMTPAuth  = true;
	$mail->Charset   = 'utf8_decode()';
	$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
	$mail->Port  = '587';
	$mail->Username  = $caixaPostalServidorEmail;
	$mail->Password  = $caixaPostalServidorSenha;
	$mail->From  = $caixaPostalServidorEmail;
	$mail->FromName  = utf8_decode($caixaPostalServidorNome);
	$mail->IsHTML(true);
	$mail->Subject  = utf8_decode($assunto);
	$mail->Body  = utf8_decode($mensagemConcatenada);
	 
	 
	$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
	 
	if(!$mail->Send()){
		$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
	}else{
		$mensagemRetorno = 'Formulário enviado com sucesso!';
	} 
 
 
}

?>	

