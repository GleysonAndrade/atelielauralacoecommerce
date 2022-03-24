<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once 'conexao.php';

require '../components/vendor/autoload.php';
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

        $_SESSION['processo'] = "
        <div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </svg>
            <div>
                Um mesmo assunto já esta sendo tratado, por favor agurde.
            </div>
        </div>";
        mysqli_close($conn);
        
    } else {
        $insert_contato = "INSERT INTO `contato`(`id`,`nome`,`email`,`assunto`,`mensagem`,`data_cad`) VALUES (NULL,'$nome','$email','$assunto','$mensagem','$data')";
        $execute_contato = mysqli_query($conn, $insert_contato);
        // echo $insert_contato;
        $mail = new PHPMailer(true);

        try {

            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = 'mail.lauralacosatelie.com.br';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'suporte@lauralacosatelie.com.br';
            $mail->Password   = 'C_PJRYjNeewZ';
            $mail->SMTPSecure = 'SSL';
            $mail->Port       = 587;
            $mail->CharSet = 'UTF-8';
            // $mail->isSMTP();
            // $mail->Host       = 'smtp.mailtrap.io';
            // $mail->SMTPAuth   = true;
            // $mail->Username   = 'd04f43d32343b4';
            // $mail->Password   = '780c1dfd7e7b53';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->Port       = 2525;

            //Enviar email para o cliente
            $mail->setFrom('gleysonsystec@hotmail.com', 'Suporte');
            $mail->addAddress("$email", "$nome");

            $mail->isHTML(true);
            $mail->Subject = "$assunto";
            $mail->Body    = "Prezado (a)" . " $nome " . "<br><br>Seu email foi recebido com sucesso<br>Será lido o mais rápido possivel.<br>Em breve você será respondido<br><br>Assunto: " . " $assunto " . "<br>Conteúdo" . " $mensagem ";
            $mail->AltBody = "Olá $nome, Seu email foi enviado com sucesso.\nAguarde pelo email de resposta.";

            $mail->send();

            //Enviar email para administrador da loja
            $mail->setFrom('suporte@lauralacosatelie.com.br', 'Suporte');
            $mail->addAddress("suporte@lauralacosatelie.com.br", "Laura");

            $mail->isHTML(true);
            $mail->Subject = "$assunto";
            $mail->Body    = "<p>Prezado (a)" . " $nome " . "<br><br>Seu email foi recebido com sucesso<br>Será lido o mais rápido possivel.<br>Em breve você será respondido<br><br>Assunto: " . " $assunto " . "<br>Conteúdo" . " $mensagem ";
            $mail->AltBody = "Olá $nome, Seu email foi enviado com sucesso.\nAguarde pelo email de resposta.";

            $mail->send();

            //echo 'Email enviado com sucesso!';

            $_SESSION['enviado'] = "
            <div class='alert alert-success d-flex align-items-center' role='alert'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </svg>
                <div>
                    Email enviado com sucesso.
                </div>
            </div>";

        } catch (Exception $e) {
            $_SESSION['nãoenviado'] = "
            <div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </svg>
                <div>
                     Seu email não foi enviado..
                </div>
            </div>";
            //echo "Seu email não foi enviado.";
        }
    }
}
