<?php
require_once("conexao/supabase.php");

$quadros = supabaseRequest("pinturas?select=*");

?>

<!DOCTYPE html>
<html lang="pt">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Pinturas GRIOT">
  <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">
  <meta charset="UTF-8">
  <link rel="icon" href="assets\images\Icone_rmbd.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Pinturas GRIOT</title>

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
                <h2>xxxxxx <em>xxxxx</em> <span>GRIOT!</span></h2>
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
          <p> Trabalho desenvolvido para a disciplina de Desenvolvimento Web-2025</p>
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