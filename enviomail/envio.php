<?php
 
require_once('class.phpmailer.php');
 
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
 
$mailer->Host = 'localhost'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
//Para cPanel: 'localhost';
//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
 
//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
//$mailer->SMTPSecure = 'tls';
 
$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
$mailer->Username = 'contato@lenteskodak.com.br'; //Informe o e-mai o completo
$mailer->Password = '!QAZ2wsx#EDC4rfv'; //Senha da caixa postal
$mailer->FromName = 'Contato Lentes Kodak'; //Nome que será exibido para o destinatário
$mailer->From = 'contato@lenteskodak.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
$mailer->AddAddress('sacfaleconosco@essilor.com.br'); //Destinatários
$mailer->Subject = $_POST['assunto'];
$mailer->Body = 'Dados do Cliente | Email: '.$_POST['email'].' - Telefone: '.$_POST['telefone'].' - Mensagem: '.$_POST['mensagem'];

if(!$mailer->Send())
{
echo json_encode(array('success' => false));
echo "Erro: " . $mailer->ErrorInfo; exit; }
print json_encode(array('success' => true));
 
?>