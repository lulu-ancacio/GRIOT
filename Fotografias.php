<?php
session_start();

require_once 'config/functions.php';
require_once './composer/vendor/autoload.php';

$busca = $_GET['q'] ?? '';
$filtro = "fotografias?or=(titulo.ilike.*$busca*,autor.ilike.*$busca*,tags.cs.{\"$busca\"})";
$fotos = supabaseRequest($filtro);
if (isset($_GET['q'])) {

  foreach ($fotos as $row) {

    echo '
        <a class="elem"
            href="' . $row['url'] . '"
            title="' . $row['titulo'] . '"
            data-lcl-author="' . $row['autor'] . ' (' . $row['ano'] . ')">

            <span style="background-image: url(\'' . $row['url'] . '\');"></span>

        </a>';
  }

  exit;
}
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
  <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>

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
   width: 100% !important; /* Reseta a largura fixa antiga */
    }
  </style>




  <!-- //////////////////////////////////////////////// -->
  <!-- REQUIRED ELEMENTS -->

  <script src="galeria/lib/jquery.js" type="text/javascript"></script>

  <script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>
  <link rel="stylesheet" href="galeria/css/lc_lightbox.css" />


  <!-- SKINS -->
  <link rel="stylesheet" href="galeria/skins/minimal.css" />


  <!-- //////////////////////////////////////////////// -->


  <!-- ASSETS -->
 <script src="galeria/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>
</head>

<body>
<!-- ***** Header Area Start ***** -->
<header class="header-area">
  <div class="container">
        <nav class="main-nav">
          <div class="left-menu">
            <button class="menu-trigger" aria-label="Abrir menu">
              <span></span>
            </button>
            <ul class="menu-dropdown">
              <li><a href="Pinturas.php">Pinturas</a></li>
              <li><a href="Textos.php">Textos</a></li>
              <li><a href="Filmes.php">Filmes</a></li>
              <li><a href="Musicas.php">Músicas</a></li>
              <li><a href="LinhadoTempo.php">Linha do Tempo</a></li>
              <li><a href="Legislacao.php">Legislação</a></li>
            </ul>
          </div>
          <!-- ***** Logo Start ***** -->
          <div class="logo">
            <a href="index.php">
              <img src="mainStyle/assets/images/LogoEst_SF.png" alt = "Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
            </a>
          </div>
          
        
          <div class="right-menu">
            <a href="index.php" class="main-red-button">Início</a>
          </div>
        </nav>
  </div>
</header>
<!-- ***** Header Area End ***** -->

  <div class="ImagemFundo">
    <section class = "main-banner" id = "top">

    <div class="container">

      <div class="banner-content">

      <div class = "left-content">
        <h6> Bem-Vindo ao GRIOT- Fotografias </h6>

        <h2>
         <em>Diga X</em>
          <span>Diga GRIOT</span>
        </h2>

         <p>A fotografia é muito mais do que um clique congelado no tempo;
           é uma forma de escrever a história com a luz. No contexto da cultura
            negra e da ancestralidade, a câmera torna-se uma ferramenta poderosa de
             reexistência. Durante muito tempo, outras pessoas contaram as nossas histórias,
              mas hoje, através das lentes,nós retomamos o protagonismo da nossa própria narrativa.
         </p>
        </div>

        <!--IMAGEM-->
      
              <div class="right-image">

                <img src="mainStyle/assets/images/Camera.jpg" alt="Fotografia em preto e branco de um menino negro olhando fixamente para a frente enquanto segura uma câmera fotográfica profissional com as duas mãos.">
              
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="search-box">
        <input type = "text" id="pesquisa" placeholder="Pesquisar...">
        <i class = "fa-solid fa-magnifying-glass search-icon">
        </i>
      </div>
      <div class="grid-galeria" id="resultados">

        <?php foreach ($fotos as $row): ?>
          <a class="elem" href="<?= $row['url'] ?>" title="<?= $row['titulo'] ?>" data-lcl-txt="<?= $row['desc'] ?>"
            data-lcl-author="<?= $row['autor'] ?> (<?= $row['ano'] ?>)">
            <span style="background-image: url('<?= $row['url'] ?>');"></span>
          </a>
        <?php endforeach; ?>

      </div>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
         <p>
            Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais
         </p>
        </div>
      </div>
    </div>
  </footer>


 
  <!-- VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>


<script src="Vlibras/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <!-- LIGHTBOX INITIALIZATION -->
  <script type="text/javascript">
    $(document).ready(function (e) {

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
  <script src="mainStyle/script.js"></script>
    <script>
    document.getElementById('pesquisa').addEventListener('input', async function() {

      let busca = this.value;
      let response = await fetch('Fotografias.php?q=' + busca);
      let html = await response.text();
      document.getElementById('resultados').innerHTML = html;

    });
  </script>

</body>

</html>
