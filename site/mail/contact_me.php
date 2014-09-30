<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
//====================================================
$email_remetente = "contato@williambraz.com.br"; // deve ser um email do dominio
//====================================================

//Configurações do email, ajustar conforme necessidade
//====================================================
$email_destinatario = "williambraz@gmail.com"; // qualquer email pode receber os dados
$email_reply = "$email_address";
$email_assunto = "Contato williambraz.com.br";
//====================================================


//Monta o Corpo da Mensagem
//====================================================
$email_conteudo = "Nome = $name \n";
$email_conteudo .= "Email = $email_address \n";
$email_conteudo .=  "Telefone = $phone \n";
$email_conteudo .=  "Mensagem = $message \n";
//====================================================


//Seta os Headers (Alerar somente caso necessario)
//====================================================
$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
//====================================================


//Enviando o email
//====================================================
mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers);
return true;

?>