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

    <div class="main-wrapper">

        <!-- Header Section Start -->
        <div class="header-section section">

            <!-- Header Top Start -->

            <!-- Header Top End -->

            <!-- Header Bottom Start -->
            <?php include_once 'fixed/header.php' ?>
            <!-- Header BOttom End -->

        </div><!-- Header Section End -->

        <!-- Page Banner Section Start -->
        <div class="page-banner-section section" style="background-image: url(img/background.jpg)">
            <div class="container">
                <div class="row">
                    <div class="page-banner-content col">

                        <h1>Contato</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="contato.php">Contato</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->

        <!-- Page Section Start -->
        <div class="page-section section section-padding">
            <div class="container">
                <div class="row row-30 mbn-40">

                    <div class="contact-info-wrap col-md-6 col-12 mb-40">
                        <h3>Entre em Contato</h3>
                        <p>Bem vindos ao Ateliê Laura Laços aqui tudo é feito com muito amor, carrinho e dedicasão.</p>
                        <ul class="contact-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p>Rua Maceió,Vista Alegre, Ibirite <br>MG</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p><a href="#">(31)9834-8329</a></p>
                            </li>
                            <li>
                                <i class="fa fa-globe"></i>
                                <p><a href="#">suporte@lauralacosatelie.site</a></p>
                            </li>
                        </ul>
                    </div>

                    <div class="contact-form-wrap col-md-6 col-12 mb-40">
                        <h3>Envie sua Mensagem</h3>
                        <form id="contato_form" action="javascript:void(0)" method="POST">
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-30"><input id="nome" type="text" name="nome" placeholder="Seu nome"></div>
                                    <div class="col-lg-6 col-12 mb-30"><input id="assunto" type="text" name="assunto" placeholder="Assunto"></div>
                                    <div class="col-lg-6 col-12 mb-30"><input id="email" type="email" name="email" placeholder="Seu endereço de email"></div>
                                    <div class="col-12 mb-30"><textarea id="mensagem" name="messagem" placeholder="Sua mensagem"></textarea></div>
                                    <div class="col-12"><input id="enviar" type="submit" value="Enviar"></div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Section End -->

        <!-- Brand Section Start -->

        <!-- Brand Section End -->

        <!-- Footer Top Section Start -->

        <!-- Footer Top Section End -->

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
        $(document).ready(function() {
            $("#contato_form").submit(function(e) {
                var nome = $('#nome').val();
                var email = $('#email').val();
                var assunto = $('#assunto').val();
                var mensagem = $('#mensagem').val();
                $.post("./php/contato.php", {
                        nome,
                        email,
                        assunto,
                        mensagem
                    },
                    function(data) {
                        // console.log("Teste Cadastro", data);
                        location.reload();
                    }
                )
            })
        });
    </script>

</body>

</html>