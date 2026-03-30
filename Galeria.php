<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GRIOT - Galeria</title>

  <link rel="icon" href="galeria/assets/images/FavIcon_SF.png">

  <!-- Bootstrap -->
  <link href="galeria/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Lightbox -->
  <link rel="stylesheet" href="galeria/css/lc_lightbox.css">
  <link rel="stylesheet" href="galeria/skins/minimal.css">

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f4f4;
      padding-top: 80px;
    }

    /* HEADER */
    header {
      position: fixed;
      width: 100%;
      top: 0;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,.1);
      z-index: 1000;
    }

    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
    }

    .nav a {
      text-decoration: none;
      margin: 0 10px;
      color: #333;
      font-weight: 500;
    }

    /* GALERIA */
    .portfolio-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .elem {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0,0,0,.1);
      aspect-ratio: 4/3;
      transition: .3s;
    }

    .elem:hover {
      transform: translateY(-5px);
    }

    .elem a {
      display: block;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>

<!-- HEADER -->
<header>
  <div class="nav">
    <div><strong>GRIOT</strong></div>
    <div>
      <a href="index.php">Início</a>
      <a href="portfolio.php">Galeria</a>
      <a href="conexao/login.php">Login</a>
    </div>
  </div>
</header>

<!-- GALERIA -->
<div class="container">
  <h2>Galeria</h2>

  <div class="portfolio-grid">

    <?php
    require_once("conexao/config.php");

    $consulta = $mysqli->query("SELECT * FROM quadros ORDER BY ID_Quadros DESC");

    while ($row = $consulta->fetch_assoc()):
      $imgBase64 = base64_encode($row['imagem']);
    ?>

      <div class="elem">
        <a href="data:image/jpeg;base64,<?= $imgBase64 ?>"
           data-lcl-thumb="data:image/jpeg;base64,<?= $imgBase64 ?>"
           data-lcl-txt="<?= htmlspecialchars($row['descricao']) ?>"
           data-lcl-author="<?= htmlspecialchars($row['autor']) ?> (<?= $row['ano_obra'] ?>)"
           style="background-image: url('data:image/jpeg;base64,<?= $imgBase64 ?>');">
        </a>
      </div>

    <?php endwhile; ?>

  </div>
</div>

<!-- SCRIPTS -->
<script src="galeria/vendor/jquery/jquery.min.js"></script>
<script src="galeria/js/lc_lightbox.lite.js"></script>
<script src="galeria/lib/AlloyFinger/alloy_finger.min.js"></script>

<script>
  $(document).ready(function () {
    lc_lightbox('.elem a', {
      wrap_class: 'lcl_fade_oc',
      gallery: true,
      thumb_attr: 'data-lcl-thumb',
      skin: 'minimal'
    });
  });
</script>

</body>
</html>