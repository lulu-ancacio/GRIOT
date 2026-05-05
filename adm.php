<?php
session_start();
echo $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Museu virtual com temática racial">
    <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">

    <link rel="icon" href="assets/images/Icone_rmbd.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>GRIOT - Memória e História Afro-brasileira</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* ===== HEADER ===== */
        .top-header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 40px;
            position: relative;
        }

        .header-center {
            display: flex;
            flex-direction: column;
            /* joga o texto para baixo da logo */
            align-items: center;
            gap: 10px;
            text-align: center;
        }

        .logo-img {
            max-width: 120px;
        }

        .paragrafo {
            font-size: 18px;
            color: #666;
            max-width: 600px;
        }

        /* ===== BOTÃO LOGOUT ===== */
        .main-red-button {
            position: absolute;
            right: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fe3f40;
            color: #fff;
            padding: 10px 28px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .main-red-button:hover {
            background: #e03030;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(254, 63, 64, 0.4);
        }

        /* ===== CONTEÚDO ===== */
        .main-wrapper {
            display: flex;
            flex-wrap: wrap;
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 30px 100px;
            gap: 50px;
        }

        .gallery-section {
            flex: 1.3;
            min-width: 300px;
        }

        .form-section {
            flex: 1;
            min-width: 360px;
            position: sticky;
            top: 30px;
        }

        /* ===== GALERIA ===== */
        .elem {
            display: inline-block;
            width: calc(50% - 20px);
            margin: 10px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        .elem:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .elem>span {
            display: block;
            padding-bottom: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.6s;
        }

        .elem:hover>span {
            transform: scale(1.08);
        }

        /* ===== FORMULÁRIO ===== */
        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
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

        /* ===== FOOTER ===== */
        footer {
            background: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 50px 20px;
        }

        /* ===== RESPONSIVO ===== */
        @media (max-width: 768px) {
            .top-header {
                flex-direction: column;
                gap: 20px;
            }

            .main-red-button {
                position: static;
            }

            .main-wrapper {
                flex-direction: column;
            }

            .elem {
                width: 100%;
            }
        }
    </style>

    <!-- LIGHTBOX FADING SHOW/HIDE EFFECT (as explained in documentation) -->
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

    <!-- REQUIRED ELEMENTS -->

    <script src="galeria/lib/jquery.js" type="text/javascript"></script>

    <script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>
    <link rel="stylesheet" href="galeria/css/lc_lightbox.css" />


    <!-- SKINS -->
    <link rel="stylesheet" href="galeria/skins/minimal.css" />


    <!-- ASSETS -->
    <script src="galeria/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>

</head>

<body>
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
  <style>
    width: 50px;
    height: 50px;
    z-index: 1;
    position: fixed;
    border: 2px solid;
    color: #EECC3F;
    border-radius:  100%;


  </style>

    <header class="top-header">
        <div class="header-center">
            <img src="assets/images/Icone_rmbd.png" class="logo-img">
            <p class="paragrafo">Museu virtual com temática racial.</p>
        </div>
        <a href="conexao/logout.php" class="main-red-button">Logout</a>
    </header>

    <div class="main-wrapper">
        <div class="gallery-section">
            <?php
            require_once("conexao/config.php");
            $consulta = $mysqli->query("SELECT * FROM quadros ORDER BY ID_Quadros DESC");
            while ($row = $consulta->fetch_assoc()):
                $imgBase64 = base64_encode($row['imagem']);
                ?>
                    <a class="elem" href="data:image/jpeg;base64,<?= $imgBase64 ?>" title="<?= $row['titulo'] ?>"
                        data-lcl-txt="<?= $row['descricao'] ?>"
                        data-lcl-author="<?= $row['autor'] ?> (<?= $row['ano_obra'] ?>)">
                        <span style="background-image: url(data:image/jpeg;base64,<?= $imgBase64 ?>);"></span>
                    </a>
            <?php endwhile; ?>
        </div>

        <div class="form-section">
            <div class="form-container">
                <h2>Adicionar Nova Obra</h2>
                <form method="post" action="conexao/submeter.php" enctype="multipart/form-data">

                    <label>Título</label>
                    <input type="text" name="titulo" required>

                    <label>Imagem</label>
                    <input type="file" name="imagem" accept="image/*" required>

                    <label>Descrição</label>
                    <input type="text" name="descricao" required>

                    <label>Autor</label>
                    <input type="text" name="autor" required>

                    <label>Ano</label>
                    <input type="number" name="ano" min="1500" max="2025" required>

                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>

    </div>

    <footer>
        <p>Trabalho de Conclusão de Curso apresentado ao IFPR – 2025</p>
    </footer>

    <script src="galeria/vendor/jquery/jquery.min.js"></script>
    <script src="galeria/assets/js/lc_lightbox.lite.js"></script>
    <script>
        $(document).ready(function () {
            lc_lightbox('.elem', {
                gallery: true,
                skin: 'minimal',
                radius: 12
            });
        });
    </script>

</body>

</html>