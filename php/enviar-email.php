<?php
//Importar classes PHPMailer para o namespace global
//Eles devem estar no topo do seu script, não dentro de uma função
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Carregar autoloader do Composer
require 'vendor/autoload.php';

include_once "conexao.php";
// esse significa colocar hora de acordo com a região
date_default_timezone_set('America/Sao_Paulo');
// date() função de pegar a hora
$data = date('d/m/Y');

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$verficar_assunto = "SELECT * FROM `contato` WHERE `assunto` = '$assunto'";
if ($execute = mysqli_query($conn, $verficar_assunto)) {
    $row_assunto = mysqli_fetch_assoc($execute);
    $assuntoVerifiacar = $row_assunto['assunto'];
    if ($assuntoVerifiacar == $assunto) {
        echo "Um mesmo assunto já esta sendo tratado, por favor agurde!";
    } else {
        $insert_contato = "INSERT INTO `contato`(`id`,`nome`,`email`,`assunto`,`mensagem`,`data_cad`) VALUES (NULL,'$nome','$email','$assunto','$mensagem','$data')";
        echo $insert_contato;
        $execute_contato = mysqli_query($conn, $insert_contato);
    }
}

if ($assunto == NULL) {
//Crie uma instância; passar `true` permite exceções
$mail = new PHPMailer(true);

try {
    //Configurações do servidor
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Ativar saída de depuração detalhada
    $mail->isSMTP();                                            //Enviar usando SMTP
    $mail->Host       = 'mail.lauralacosatelie.com.br';          //Defina o servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                   //Habilitar autenticação SMTP
    $mail->Username   = 'suporte@lauralacosatelie.com.br';        //Nome de usuário SMTP
    $mail->Password   = 'C_PJRYjNeewZ';                             //SMTP password
    $mail->SMTPSecure = 'SSL';                                  //Ativar criptografia TLS implícita
    $mail->Port       = 465;                                    //Porta TCP para conexão; use 587 se você definiu `SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('suporte@lauralacosatelie.com.br', 'Ateliê Laura Laços');
    $mail->addAddress( $email, $nome);     //Adicionar um destinatário
    $mail->addAddress('suporte@lauralacosatelie.com.br');               //O nome é opcional
    $mail->addReplyTo( $email, $assunto);
    $mail->addCC('suporte@lauralacosatelie.com.br');
    $mail->addBCC('suporte@lauralacosatelie.com.br');

    //Attachments
    $mail->addAttachment('../assets/images/logo.png');         //Adicionar Anexos
    $mail->addAttachment('../assets/images/logo.png');    //Nome opcional

    //Content
    $mail->isHTML(true);                                  //Definir formato de e-mail para HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Email não foi enviado!";
}
