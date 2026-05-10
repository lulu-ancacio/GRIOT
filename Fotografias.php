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

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Fotografias GRIOT">
  <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">
  <meta charset="UTF-8">
  <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>GRIOT-Fotografias</title>

  <!-- Css principal -->
  <link rel="stylesheet" href="meanStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="meanStyle/assets/css/fontawesome.css">

  <!-- Pinturas e Fotografias -->
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


<script src="galeria/lib/jquery.js" type="text/javascript"></script>

<script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>
<link rel="stylesheet" href="galeria/css/lc_lightbox.css" />

<link rel="stylesheet" href="galeria/skins/minimal.css" />

</head>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown>
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


  </style>
  <br><br>
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h2><em>Diga X!</em> <span>Diga GRIOT!</span></h2>
                <p>A fotografia é muito mais do que um clique congelado no tempo; 
                é uma forma de escrever a história com a luz. No contexto da cultura 
                negra e da ancestralidade, a câmera torna-se uma ferramenta poderosa de
                 reexistência. Durante muito tempo, outras pessoas contaram as nossas histórias,
                  mas hoje, através das lentes, nós retomamos o protagonismo da nossa própria
                   narrativa.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="galeria/assets/images/Camera.jpg" alt="Menino negro com uma câmera analógica em suas mãos.">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <?php if ($fotos): ?>
        <?php foreach ($fotos as $row): ?>
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
          <p>Trabalho de Conclusão de Curso apresentado ao IFPR - 2026</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="galeria/vendor/jquery/jquery.min.js"></script>
  <script src="galeria/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="galeria/js/owl-carousel.js"></script>
  <script src="galeria/js/animation.js"></script>
  <script src="galeria/js/imagesloaded.js"></script>
  <script src="galeria/js/templatemo-custom.js"></script>

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