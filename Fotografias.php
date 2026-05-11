<?php
session_start();

require 'conexao/config.php';
require './composer/vendor/autoload.php';

$fotos = supabaseRequest("fotografias?select=*");
supabaseCreatePhoto('Fotografias', 'fotografias', 'Fotografias');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <!-- META -->
  <meta charset="UTF-8">

  <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- SEO -->
  <meta name="description"
        content="Galeria de Fotografias GRIOT">

  <meta name="author"
        content="Lucas Ancacio e Maria Eduarda Gomes">

  <!-- TÍTULO -->
  <title>GRIOT - Fotografias</title>

  <!-- FAVICON -->
  <link rel="icon"
        href="meanStyle/assets/images/FavIcon_SF.png">

  <!-- FONTES -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

  <!-- ÍCONES -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- CSS PRINCIPAL -->
  <link rel="stylesheet"
        href="meanStyle/assets/css/templatemo-space-dynamic.css">

  <!-- LIGHTBOX CSS -->
  <link rel="stylesheet"
        href="FotografiaPintura/css/lc_lightbox.css">

  <!-- SKIN -->
  <link rel="stylesheet"
        href="FotografiaPintura/skins/minimal.css">

  <!-- GALERIA CSS -->
  <style>

    .elem,
    .elem * {
      box-sizing: border-box;
      margin: 0 !important;
    }

    .elem {
      display: inline-block;
      width: 33%;
      padding: 10px;
      border: 15px solid transparent;
      background-clip: padding-box;
    }

    .elem span {
      display: block;
      width: 100%;
      height: 300px;
      border-radius: 12px;
      background-size: cover;
      background-position: center;
      cursor: pointer;
      transition: .3s;
    }

    .elem span:hover {
      transform: scale(1.02);
    }

    @media(max-width: 768px) {

      .elem {
        width: 50%;
      }

    }

    @media(max-width: 500px) {

      .elem {
        width: 100%;
      }

    }

    .form-container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,.08);
    }

    .form-container input,
    .form-container button {
      width: 100%;
      margin-top: 15px;
      padding: 14px;
      border-radius: 10px;
      border: 1px solid #ddd;
      font-family: Poppins;
    }

    .form-container button {
      background: #ff695f;
      color: white;
      border: none;
      font-weight: 600;
      transition: .3s;
    }

    .form-container button:hover {
      background: #03a4ed;
    }

  </style>

</head>

<body>

<!-- =========================
     HEADER
========================= -->
<header class="header-area">

  <div class="container">

    <nav class="main-nav">

      <!-- LOGO -->
      <a href="index.php" class="logo">

        <img src="meanStyle/assets/images/LogoEst_SF.png"
             alt="Logo GRIOT">

      </a>

      <!-- MENU -->
      <ul class="nav">

        <li>

          <a href="index.php"
             class="main-red-button">

            Início

          </a>

        </li>

      </ul>

      <!-- MOBILE -->
      <button class="menu-trigger">

        <span></span>

      </button>

    </nav>

  </div>

</header>

<!-- =========================
     BANNER
========================= -->
<div class="ImagemFundo">

<section class="main-banner">

  <div class="container">

    <div class="banner-content">

      <!-- TEXTO -->
      <div class="left-content">

        <h6>
          Bem-vindo ao GRIOT
        </h6>

        <h2>

          Galeria de
          <em>Fotografias</em>
          <span>Afro-brasileiras</span>

        </h2>

        <p>

          A fotografia é muito mais do que um clique congelado no tempo; 
                é uma forma de escrever a história com a luz. No contexto da cultura 
                negra e da ancestralidade, a câmera torna-se uma ferramenta poderosa de
                 reexistência. Durante muito tempo, outras pessoas contaram as nossas histórias,
                  mas hoje, através das lentes, nós retomamos o protagonismo da nossa própria
                   narrativa.

        </p>

      </div>

      <!-- IMAGEM -->
      <div class="right-image">

        <img src="meanStyle/assets/images/Pintura.jpg"
             alt="Fotografia GRIOT">

      </div>

    </div>

  </div>

</section>

<!-- =========================
     FORM ADM
========================= -->
<?php if (!empty($_SESSION['adm'])): ?>

<section>

  <div class="container">

    <div class="form-container">

      <form method="post"
            enctype="multipart/form-data">

        <label>Título</label>

        <input type="text"
               name="titulo"
               required>

        <label>Autor(a)</label>

        <input type="text"
               name="autor"
               required>

        <label>Ano</label>

        <input type="number"
               name="ano">

        <input type="file"
               name="imagem"
               accept="image/*"
               required>

        <button type="submit">

          Enviar Fotografia

        </button>

      </form>

    </div>

  </div>

</section>

<?php endif; ?>

<!-- =========================
     GALERIA
========================= -->
<section class="content-section">

  <div class="container">

    <div class="section-heading">

      <h2>

        Obras em
        <em>Destaque</em>

      </h2>

      <p>

        Explore fotografias inspiradas
        na cultura negra e afro-brasileira.

      </p>

    </div>

      <div id="portfolio" class="our-portfolio section">
    <div class="container">

      <?php foreach ($fotos as $row): ?>
        $imgBase64 = base64_encode($row['imagem']);
        <a class="elem"
          href="data:image/jpeg;base64,<?= $imgBase64 ?>"
          title="<?= $row['titulo'] ?>"
          data-lcl-txt="<?= $row['descricao'] ?>"
          data-lcl-author="<?= $row['autor'] ?> (<?= $row['ano_obra'] ?>)">
          <span style="background-image: url(data:image/jpeg;base64,<?= $imgBase64 ?>);"></span>
        </a>
      <?php endwhile; ?>
    </div>
  </div>

</section>

</div>

<!-- =========================
     FOOTER
========================= -->
<footer class="footer">

  <div class="container">

    <p>

      Trabalho de Conclusão de Curso
      apresentado ao IFPR - 2026

    </p>

  </div>

</footer>

<!-- JQUERY -->
<script src="FotografiaPintura/lib/jquery.js"></script>

<!-- LIGHTBOX -->
<script src="FotografiaPintura/js/lc_lightbox.lite.js"></script>

<!-- TOUCH -->
<script src="FotografiaPintura/lib/AlloyFinger/alloy_finger.min.js"></script>

<!-- LIGHTBOX INIT -->
<script>

  $(document).ready(function () {

    lc_lightbox('.elem', {

      gallery: true,

      thumb_attr: 'data-lcl-thumb',

      skin: 'minimal',

      wrap_class: 'lcl_fade_oc',

      radius: 0,

      padding: 0,

      border_w: 0,

      slideshow: true,

      counter: true,

      fullscreen: true,

      download: false,

      thumbnails: true

    });

  });

</script>

<!-- VLibras -->
<div vw class="enabled">

  <div vw-access-button class="active"></div>

  <div vw-plugin-wrapper>

    <div class="vw-plugin-top-wrapper"></div>

  </div>

</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

<script>

  new window.VLibras.Widget(
    'https://vlibras.gov.br/app'
  );

</script>

<!-- MENU MOBILE -->
<script src="galeria/script.js" defer></script>

</body>
</html>