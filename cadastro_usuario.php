<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ateliê - Laura Laços</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon12.ico">
    
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icon-font.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Helper CSS -->
    <link rel="stylesheet" href="assets/css/helper.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>

<style>
    .selecionar {
    width: 100%;
    border: 1px solid #333333;
    background-color: transparent;
    border-radius: 50px;
    height: 44px;
    line-height: 22px;
    padding: 10px 20px;
    font-size: 14px; }
</style>

<div class="main-wrapper">

    <!-- Header Section Start -->
    <div class="header-section section">

        <!-- Header Top Start -->
        <?php include_once 'fixed/header.php';?>
        <!-- Header Top End -->

    </div>
    <!-- Header Section End -->

    <!-- Page Banner Section Start -->
    <div class="page-banner-section section" style="background-image: url(img/background.jpg)">
        <div class="container">
            <div class="row">
                <div class="page-banner-content col">
                    <h1>Login & Cadastro</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cadastro_usuario.php">Registrar</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">
            <div class="row mbn-40">

                <div class="col-lg-4 col-12 mb-40">
                    <div class="login-register-form-wrap">
                        <h3>Login</h3>
                        <form action="#" class="mb-30">
                            <div class="row">
                                <div class="col-12 mb-15"><input type="text" placeholder="Nome ou Email"></div>
                                <div class="col-12 mb-15"><input type="password" placeholder="Senha"></div>
                                <div class="col-12"><input type="submit" value="Login"></div>
                            </div>
                        </form>
                        <h4>Você também pode fazer o login com...</h4>
                        <div class="social-login">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-12 mb-40 text-center">
                    <span class="login-register-separator"></span>
                </div>

                <div class="col-lg-6 col-12 mb-40 ml-auto">
                    <div class="login-register-form-wrap">
                        <h3>Registrar</h3>
                        <form id="cadastro" action="javascript:void(0)" method="$_POST">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-15"><input id="nome" type="text" placeholder="Seu nome"></div>
                                <div class="col-md-6 col-12 mb-15"><input id="nick" type="text" placeholder="Nome de usuário"></div>
                                <div class="col-md-6 col-12 mb-15"><input id="email" type="email" placeholder="Email"></div>
                                <div class="col-md-6 col-12 mb-15"><input id="senha" type="password" placeholder="Senha"></div>
                                <div class="col-md-6 col-12 mb-15"><input id="conf_senha" type="password" placeholder="Confirmar senha"></div>
                                <div class="col-md-6 col-12 mb-15">
                                    <select id="sexo" type="text" class="selecionar" style="color: gray;">
                                        <option selected value="">Selecione Sexo</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="indefinido">Prefiro não responder</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12"><input type="submit" value="Registrar"></div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Page Section End -->

    <!-- Footer Bottom Section Start -->
        <?php include_once 'fixed/footer-bottom.php' ?>
    <!-- Footer Bottom Section End -->

</div>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

<script>
    $(document).ready(function () {
        $("#cadastro").submit(function (e) { 
            var nome = $("#nome").val();
            var nick = $("#nick").val();
            var email = $("#email").val();
            var senha = $("#senha").val();
            var sexo = $("#sexo").val();
            $.post("./php/cadastro_usuario.php", {
                nome,
                nick,
                email,
                senha,
                sexo
            },
                function (data) {
                    console.log("Teste", data);
                },
                
            );
        });
    });
</script>

</body>

</html>