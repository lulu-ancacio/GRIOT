<?php
session_start();
require 'conexao/supabase.php';
$quadros = supabaseRequest("pinturas?select=*");

use GuzzleHttp\Exception\GuzzleException;

require 'conexao/config.php';
require 'C:/xampp/htdocs/GRIOT/composer/vendor/autoload.php';

$SUPABASE_URL = 'https://cdhjzkmlucahtllfpdlx.supabase.co';
$API_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc3NTI0ODE3MywiZXhwIjoyMDkwODI0MTczfQ.adPVCz1kuiC0M6Du7axunnXaySAfYV2hy7lpoplCY64'; // ⚠️ use service_role aqui (backend)
$BUCKET = 'Pinturas';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $file = $_FILES['imagem'];
  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $ano = $_POST['ano'];

  if ($file['error'] === 0) {

    $client = new GuzzleHttp\Client();

    // nome único do arquivo
    $fileName = uniqid() . '-' . basename($file['name']);

    // 📦 1. upload para o storage
    $response = $client->post(
      "$SUPABASE_URL/storage/v1/object/$BUCKET/$fileName",
      [
        'headers' => [
          'apikey' => $API_KEY,
          'Authorization' => "Bearer $API_KEY",
          'Content-Type' => $file['type']
        ],
        'body' => fopen($file['tmp_name'], 'r')
      ]
    );

    // 🔗 2. URL pública
    $publicUrl = "$SUPABASE_URL/storage/v1/object/public/$BUCKET/$fileName";

    // 🗄️ 3. inserir no banco
    $dbResponse = $client->post(
      "$SUPABASE_URL/rest/v1/pinturas",
      [
        'headers' => [
          'apikey' => $API_KEY,
          'Authorization' => "Bearer $API_KEY",
          'Content-Type' => 'application/json',
          'Prefer' => 'return=minimal'
        ],
        'json' => [
          'titulo' => $titulo,
          'autor' => $autor,
          'ano' => $ano,
          'url' => $publicUrl
        ]
      ]
    );

    header("Location: Pinturas.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pinturas GRIOT">
  <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">
  <meta charset="UTF-8">
  <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>GRIOT-Pinturas</title>

  <!-- Bootstrap core CSS -->
  <link href="galeria/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="galeria/assets/css/fontawesome.css">
  <link rel="stylesheet" href="galeria/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="galeria/assets/css/animated.css">
  <link rel="stylesheet" href="galeria/assets/css/owl.css">
  <!--
TemplateMo 562 Space Dynamic
https://templatemo.com/tm-562-space-dynamic
-->

  <!-- CSS da galeria -->
  <style type="text/css">
    .elem,
    .elem * {
      box-sizing: border-box;
      margin: 0 !important;
    }

    /* ===== FORMULÁRIO ===== */
    .form-container {
      background: #fff;
      padding: 40px;
      height: 480px;
      width: 650px;
      border-radius: 16px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      flex: 1;
      align-items: center;
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

  <!-- //////////////////////////////////////////////// -->
  <!-- //////////////////////////////////////////////// -->

</head>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <div class="logo">
            <a href="index.php">
              <img src="galeria\assets\images\LogoEst_SF.png">
            </a>
          </div>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section">
              <a href="Index.php" class="main-red-button">Início</a>
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



<body>
  <br><br>
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h2><em>Voilà!</em> <span>GRIOT!</span></h2>
                <p>A galeria de pinturas do GRIOT apresenta um conjunto de obras que expressam,
                  por meio da arte, a profundidade da cultura afro-brasileira e as múltiplas
                  dimensões da experiência negra. Cada pintura revela traços de história,
                  identidade e resistência, traduzidos em cores,
                  formas e simbolismos que dialogam com a ancestralidade e o presente.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="galeria/assets/images/Pintura.jpg" alt="Menino negro com uma câmera analógica em suas mãos.">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if (!empty($_SESSION['adm'])): ?>
  <div class="form-container">
    <form method="post" enctype="multipart/form-data">
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
  <?php endif; ?>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <?php if ($quadros): ?>
        <?php foreach ($quadros as $row): ?>
          <a class="elem"
            href="<?= $row['url'] ?>"
            title="<?= $row['titulo'] ?>"
            data-lcl-txt="<?= $row['desc'] ?>"
            data-lcl-author="<?= $row['autor'] ?> (<?= $row['ano'] ?>)">
            <span style="background-image: url('<?= $row['url'] ?>');"></span>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>Trabalho de Conclusão de Curso apresentado ao IFPR – 2025</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="galeria/vendor/jquery/jquery.min.js"></script>
  <script src="galeria/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="galeria/assets/js/owl-carousel.js"></script>
  <script src="galeria/assets/js/animation.js"></script>
  <script src="galeria/assets/js/imagesloaded.js"></script>
  <script src="galeria/assets/js/templatemo-custom.js"></script>

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

</body>

</html>