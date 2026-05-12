<?php
session_start();
if (empty($_SESSION['adm'])) {
    header('Location: index.php');
}

require 'conexao/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['tipo'] === 'fotografias') {
        supabaseCreatePhotoPainting('Fotografias', 'fotografias');
    }

    if ($_POST['tipo'] === 'pinturas') {
        supabaseCreatePhotoPainting('Pinturas', 'pinturas');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Museu virtual com tematica racial">
    <meta name="author" content=" ">
    <meta charset="UTF-8">
    <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <title>GRIOT-Início</title>

    <link rel="stylesheet" href="meanStyle/assets/css/templatemo-space-dynamic.css">
    <style>
        .form-container {
            background: #fff;
            padding: 40px;
            height: 540px;
            width: 650px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            flex: 1;
            align-items: center;
            margin: 50px;
        }

        .form-container h2 {
            text-align: center;
            color: #e74c3c;
            margin-bottom: 30px;
        }

        .form-container label {
            margin-top: 20px;
            display: block;
            font-weight: 600;
        }

        .form-container input,
        .form-container button {
            width: 100%;
            margin-top: 8px;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 15px;
        }

        .form-container button {
            margin-top: 30px;
            background: linear-gradient(135deg, #e74c3c, #d93b54);
            color: #fff;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        .form-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.4);
        }

        .lcl_fade_oc.lcl_pre_show #lcl_overlay,
        .lcl_fade_oc.lcl_pre_show #lcl_window,
        .lcl_fade_oc.lcl_is_closing #lcl_overlay,
        .lcl_fade_oc.lcl_is_closing #lcl_window {
            opacity: 0 !important;
        }

        .lcl_fade_oc.lcl_is_closing #lcl_overlay {
            -webkit-transition-delay: .15s !important;
            transition-delay: .15s !important;
        }
    </style>

    <!-- REQUIRED ELEMENTS -->

    <script src="galeria/lib/jquery.js" type="text/javascript"></script>

    <script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>
    <link rel="stylesheet" href="galeria/css/lc_lightbox.css" />


    <!-- SKINS -->
    <link rel="stylesheet" href="galeria/skins/minimal.css" />


    <!-- ASSETS -->
    <script src="galeria/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>

    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
</head>

<body>



    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <div class="logo">
                            <img src="galeria\assets\images\LogoEst_SF.png">
                        </div>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section">
                                <a href="./mensagemRecebida.html" class="main-red-button">Mensagens</a>
                            </li>
                            <li>
                                <a href="./index.php" class="main-red-button">
                                Tela inicial
                                </a>
                            </li>
                            <li class="scroll-to-section">
                                <a href="./conexao/logout.php" class="main-red-button">Sair</a>
                            </li>
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="welcome-box">
                                    <br> <br> <br>
                                    <h5>Bem-vindo(a), <?= $_SESSION['email'] ?> 👋</h5>
                                    <p>Você está logado como administrador(a)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="form-container">
            <h2>Submissão de Fotografias</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="tipo" value="fotografias">
                <labe>Título</label>
                <input type="text" name="titulo" required>
                <labe>Autor(a)</label>
                <input type="text" name="autor" required>
                <labe>Ano</label>
                <input type="number" name="ano">

                <input type="file" name="imagem" accept="image/*" required>

                <button type="submit">Enviar</button>
            </form>
        </div>

        <div class="form-container">
            <h2>Submissão de Pinturas</h2>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="tipo" value="pinturas">
                <labe>Título</label>
                <input type="text" name="titulo" required>
                <labe>Autor(a)</label>
                <input type="text" name="autor" required>
                <labe>Ano</label>
                <input type="number" name="ano">

                <input type="file" name="imagem" accept="image/*" required>

                <button type="submit">Enviar</button>
            </form>
        </div>


    </div>

    <br>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>Trabalho de Conclusão de Curso apresentado ao IFPR – 2025</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- LIGHTBOX INITIALIZATION -->
    <script type="text/javascript">
        $(document).ready(function(e) {

            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',

                skin: 'minimal',
                radius: 0,
                padding: 0,
                border_w: 0,
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script>
    <script>
        const supabaseUrl = "https://cdhjzkmlucahtllfpdlx.supabase.co";
        const supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g";

        const supabaseClient = supabase.createClient(supabaseUrl, supabaseKey);

        document.getElementById("contact").addEventListener("submit", async function(e) {
            e.preventDefault();

            const nome = document.getElementById("name").value;
            const sobrenome = document.getElementById("surname").value;
            const email = document.getElementById("email").value;
            const msg = document.getElementById("message").value;

            const {
                error
            } = await supabaseClient
                .from("comentarios")
                .insert([{
                    nome: nome,
                    sobrenome: sobrenome,
                    email: email,
                    msg: msg
                }]);

            if (error) {
                alert("Erro ao enviar ");
                console.log(error);
            } else {
                alert("Mensagem enviada com sucesso! 🚀");
                document.getElementById("contact").reset();
            }
        });
    </script>

    ... <!-- Conteúdo do Plug-in V-Libras -->

    <!-- VLibras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

</body>

</html>