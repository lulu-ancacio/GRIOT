<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fotografia GRIOT">
    <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">
    <meta charset="UTF-8">
    <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">
    <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">

    <title>GRIOT-Fotografias</title>

    <!-- Css principal -->
    <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

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

    <h1>Teste da API</h1>

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="search-box">
                <input type="text" id="pesquisa" placeholder="Pesquisar...">
                <i class="fa-solid fa-magnifying-glass search-icon">
                </i>
            </div>
            <div class="grid-galeria" id="resultado">
            </div>
        </div>
    </div>

    <script>
        async function testarApi() {

            try {

                const response = await fetch('./api.php');

                const dados = await response.json();

                let html = '';

                dados.forEach(foto => {

                    html += `
          <a class="elem" href="${foto.url}" title="${foto.titulo}"
            data-lcl-author="${foto.autor} (${foto.ano})">
            <span style="background-image: url('${foto.url}');"></span>
          </a>
    `;

                });

                document.getElementById('resultado').innerHTML = html;

            } catch (erro) {

                console.error(erro);

                document.getElementById('resultado').textContent =
                    'Erro ao consumir API';
            }
        }

        testarApi();
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {


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
    <script src="../mainStyle/script.js"></script>
    <script>
        document.getElementById('pesquisa').addEventListener('input', async function() {

            let busca = this.value;
            let response = await fetch('api.php?q=' + busca);
            let html = await response.text();
            document.getElementById('resultados').innerHTML = html;

        });
    </script>

</body>

</html>