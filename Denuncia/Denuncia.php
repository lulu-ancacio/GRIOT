<?php
session_start();
if (empty($_SESSION['adm'])) {
  header('Location: index.php');
  exit;
}

$supabaseUrl = "https://cdhjzkmlucahtllfpdlx.supabase.co";
$supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g";
define('HEADER_APIKEY', 'apikey: ' . $supabaseKey);
define('HEADER_AUTH', 'Authorization: Bearer ' . $supabaseKey);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_pintura = $_POST['id_pintura'] ?? '';
  $nome_pintura = $_POST['nome_pintura'] ?? 'Não informado';
  $motivo = $_POST['motivo'] ?? '';

  if (empty($id_pintura) || empty($motivo)) {
    header('Location: Pinturas.html?erro=1');
    exit;
  }

  $dados = [
    'id_pintura' => $id_pintura,
    'nome_pintura' => $nome_pintura,
    'motivo' => $motivo,
    'visto' => false
  ];

  $jsonDados = json_encode($dados);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $supabaseUrl . "/rest/v1/denuncias");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDados);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    HEADER_APIKEY,
    HEADER_AUTH,
    "Content-Type: application/json",
    "Prefer: return=minimal"
  ]);

  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($httpCode >= 200 && $httpCode < 300) {
    header('Location: Denuncia.php?denuncia=ok');
  } else {
    header('Location: Pinturas.html?erro=1');
  }
  exit;
}

if (isset($_GET['marcar_visto'])) {
  $id = filter_var($_GET['marcar_visto'], FILTER_VALIDATE_INT);

  if ($id) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $supabaseUrl . "/rest/v1/denuncias?id=eq." . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['visto' => true]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      HEADER_APIKEY,
      HEADER_AUTH,
      "Content-Type: application/json",
      "Prefer: return=representation"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);


    if ($httpCode < 200 || $httpCode >= 300) {
      header('Location: Denuncia.php?erro_atualizar=' . $httpCode);
      exit;
    }
  }

  header('Location: Denuncia.php');
  exit;
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $supabaseUrl . "/rest/v1/denuncias?order=criado_em.desc");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  HEADER_APIKEY,
  HEADER_AUTH
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$denuncias = [];
if ($httpCode >= 200 && $httpCode < 300) {
  $denuncias = json_decode($response, true) ?: [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
  <meta name="description" content="Painel Administrativo ">
  <title>GRIOT - Moderação de Conteúdo</title>


  <link rel="stylesheet" href="../mainStyle/assets/fonts/poppins.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../mainStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header class="header-area">
    <div class="container">
      <nav class="main-nav">
        <div class="left-menu">
          <button class="menu-trigger" aria-label="Abrir menu"><span></span></button>
          <ul class="menu-dropdown">
            <li><a href="../galeria/Fotografias.html">Fotografias</a></li>
            <li><a href="../biblioteca/Biblioteca.html">Acervo Literário</a></li>
            <li><a href="../Filmes/Audiovisuais.html">Audiovisuais</a></li>
            <li><a href="../galeria/Pinturas.html">Pinturas</a></li>
            <li><a href="../LinhaDoTempo/LinhadoTempo.html">Linha do Tempo</a></li>
            <li><a href="..Legislacao/Legislacao.html">Legislação</a></li>
            <li><a href="../personalidades/Personalidades.html">Personalidades</a></li>
            <li><a href="../musica/Musica.html">Músicas</a></li>


          </ul>
        </div>
        <div class="logo">
          <a href="../index.php">
            <img src="../mainStyle/assets/images/LogoEst_SF.png" alt="Logotipo GRIOT">
          </a>
        </div>
        <div class="right-menu">
          <a href="../index.php" class="main-red-button">Início</a>
        </div>
      </nav>
    </div>
  </header>

  <section class="banner">
    <h1>Painel Administrativo</h1>
    <p>Gerencie o conteúdo do Museu Virtual GRIOT</p>
    <div class="user-badge">
      👤 <?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?>
    </div>
  </section>

  <main class="container">
    <a href="../adm/adm.php">
      <div class="icon-box">
        <i class="fa-solid fa-arrow-left"></i>
      </div>
    </a>
    <h2 class="section-title">Moderação de Conteúdo</h2>

    <?php if (isset($_GET['denuncia'])): ?>
      <div class="alerta-sucesso">
        Denúncia recebida com sucesso!
      </div>
    <?php endif; ?>

    <?php if (empty($denuncias)): ?>
      <div class="vazio">
        Nenhuma denúncia registrada.
      </div>
    <?php else: ?>

      <div id="lista">
        <?php foreach ($denuncias as $item): ?>
          <div class="card <?= $item['visto'] ? 'visto' : '' ?>">
            <h3>
              <?php if ($item['visto']): ?>
                <span class="status-badge status-lido">Analisado</span>
              <?php else: ?>
                <span class="status-badge status-novo">Pendente</span>
              <?php endif; ?>
            </h3>

            <p><strong>Obra:</strong> <span
                id="nomeObra"><?= htmlspecialchars($item['nome_pintura'] ?? 'Não informado') ?></span>
            </p>
            <p><strong>Motivo:</strong> <?= htmlspecialchars($item['motivo']) ?></p>
            <p><strong>ID da Pintura:</strong> <?= $item['id_pintura'] ?></p>

            <p>
              <strong>Data:</strong>
              <?php
              $data = new DateTime($item['criado_em']);
              $data->setTimezone(new DateTimeZone('America/Sao_Paulo'));
              echo $data->format('d/m/Y H:i');
              ?>
            </p>

            <?php if (!$item['visto']): ?>
              <a href="?marcar_visto=<?= $item['id'] ?>" class="btn-marcar-visto">
                <i class="fa-solid fa-check"></i> Marcar como Analisado
              </a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática - IFPR Pinhais</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="../mainStyle/script.js"></script>
</body>

</html>
