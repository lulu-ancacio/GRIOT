<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fotografia GRIOT">
    <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">
    <meta charset="UTF-8">
    <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">
    <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">

    <title>GRIOT-Fotografias</title>

    <!-- Css principal -->
    <link rel="stylesheet" href="../mainStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
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

    <style>
        .elem,
        .elem * {
            box-sizing: border-box;
            margin: 0 !important;
        }

        .elem {
            display: inline-block;
            font-size: 0;
            width: 33%;
            border: 20px solid transparent;
            border-bottom: none;
            background: #fff;
            padding: 10px;
            height: auto;
            background-clip: padding-box;
        }

        .elem>span {
            display: block;
            cursor: pointer;
            height: 0;
            padding-bottom: 70%;
            background-size: cover;
            background-position: center center;
        }

        .grid-galeria {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .elem {
            width: 100% !important;
            /* Reseta a largura fixa antiga */
        }
    </style>

    <script src="galeria/lib/jquery.js" type="text/javascript"></script>

    <script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>
    <link rel="stylesheet" href="galeria/css/lc_lightbox.css" />
    <link rel="stylesheet" href="galeria/skins/minimal.css" />
    <script src="galeria/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header-area">
        <div class="container">
            <nav class="main-nav">
                <div class="left-menu">
                    <button class="menu-trigger" aria-label="Abrir menu">
                        <span></span>
                    </button>
                    <ul class="menu-dropdown">
                        <li><a href="Pinturas.php">Pinturas</a></li>
                        <li><a href="Biblioteca.php">Biblioteca</a></li>
                        <li><a href="Filmes.php">Filmes</a></li>
                        <li><a href="Personalidades.php">Personalidades</a></li>
                        <li><a href="LinhadoTempo.php">Linha do Tempo</a></li>
                        <li><a href="Legislacao.php">Legislação</a></li>
                    </ul>
                </div>

                <div class="logo">
                    <a href="index.php">
                        <img src="mainStyle/assets/images/LogoEst_SF.png"
                            alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
                    </a>
                </div>


                <div class="right-menu">
                    <a href="index.php" class="main-red-button">Início</a>
                </div>
            </nav>
        </div>
    </header>

    <script>
        async function carregarObras(busca = '') {

            try {

                const response =
                    await fetch('./api.php?q=' + encodeURIComponent(busca));

                if (!response.ok) {
                    throw new Error(`Erro HTTP ${response.status}`);
                }

                const dados = await response.json();

                let html = '';

                dados.forEach(row => {

                    const titulo = row.titulo ?? 'Sem título';
                    const autor = row.autor ?? 'Autor desconhecido';
                    const ano = row.ano ?? '';
                    const url = row.url ?? '';

                    html += `
                <div class="obra-card">

                    <a class="elem"
                       href="${url}"
                       title="${titulo}"
                       data-lcl-author="${autor}${ano ? ' (' + ano + ')' : ''}">

                        <span
                            style="background-image:url('${url}')">
                        </span>

                    </a>

                    <h4>${titulo}</h4>
                    <p>${autor}</p>

                </div>
            `;
                });

                document.getElementById('resultados').innerHTML = html;

                // Inicializa o lightbox após inserir os elementos
                lc_lightbox('.elem', {
                    wrap_class: 'lcl_fade_oc',
                    gallery: true,
                    thumb_attr: 'data-lcl-thumb',
                    skin: 'minimal',
                    radius: 0,
                    padding: 0,
                    border_w: 0
                });

            } catch (erro) {

                console.error(erro);

                document.getElementById('resultados').innerHTML =
                    '<p>Erro ao carregar as obras.</p>';
            }
        }

        // Carrega tudo ao abrir a página
        carregarObras();

        // Pesquisa dinâmica
        document
            .getElementById('pesquisa')
            .addEventListener('input', function () {

                carregarObras(this.value);

            });
    </script>

</body>

</html>