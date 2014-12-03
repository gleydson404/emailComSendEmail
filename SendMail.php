<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require ("phpmailer/class.phpmailer.php");
date_default_timezone_set('Europe/Lisbon');

$email = $_POST['email'];
$mensagem  = $_POST['mensagem'];

// $email = "gleydson.c.s@hotmail.com";
// $mensagem  = "Testando irrull";

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
$mail->CharSet = 'UTF-8';
$mail->Port = '465'; //porta
$mail->SMTPDebug  = 0; //debug
$mail->SMTPSecure = 'ssl'; 
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'seuemail@gmail.com'; // Usuário do servidor SMTP
$mail->Password = 'suasenha'; // Senha do servidor SMTP

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddReplyTo($email, 'Resposta ao Leitor');
$mail->From = $email; // Seu e-mail
$mail->FromName = $email; // Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('destinatario@qualqueremail', 'Nome do Destinatário');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Assunto Email"; // Assunto da mensagem
$mail->Body = $mensagem;
//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :) ";

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
if ($enviado) {
echo "E-mail enviado com sucesso!";
 echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=contato.php">';
} else {
echo "Não foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}

?>
