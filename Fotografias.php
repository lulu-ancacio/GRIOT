<!DOCTYPE html>
<html lang="pt">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Museu virtual com tematica racial">
  <meta name="author" content=" ">
  <meta charset="UTF-8">
  <link rel="icon" href=" galeria\assets\images\FavIcon_SF.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>GRIOT</title>


  <!-- Scripts -->
  <script src="galeria/vendor/jquery/jquery.min.js"></script>
  <script src="galeria/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="galeria/assets/js/owl-carousel.js"></script>
  <script src="galeria/assets/js/templatemo-custom.js"></script>


  <!-- Bootstrap core CSS -->
  <link href="galeria/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="galeria/assets/css/fontawesome.css">
  <link rel="stylesheet" href="galeria/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="galeria/assets/css/animated.css">
  <link rel="stylesheet" href="galeria/assets/css/owl.css">


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
                 <a href="index.php">
              <img src="galeria\assets\images\LogoEst_SF.png">
            </a>
          </div>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section">
                <a href="index.php" class="main-red-button">HOME</a>
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
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h2>Luz <em>Câmera</em> <span>GRIOT!</span></h2>
                <p>A fotografia é muito mais do que um clique congelado no tempo; 
                é uma forma de escrever a história com a luz. No contexto da cultura 
                negra e da ancestralidade, a câmera torna-se uma ferramenta poderosa de
                 reexistência. Durante muito tempo, outras pessoas contaram as nossas histórias,
                  mas hoje, através das lentes, nós retomamos o protagonismo da nossa própria
                   narrativa.</p>
              </div>
            </div>
             <div class="col-lg-6">
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
      <?php
      require_once("conexao/config.php");
      $consulta = $mysqli->query("SELECT * FROM quadros ORDER BY ID_Quadros DESC");
      while ($row = $consulta->fetch_assoc()):
        $imgBase64 = base64_encode($row['imagem']);
      ?>
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


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p> Trabalho de Conclusão de Curso apresentado ao IFPR – 2025</p>
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