<?php
session_start();


$supabaseUrl = "https://cdhjzkmlucahtllfpdlx.supabase.co";
$supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g";


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
        "apikey: " . $supabaseKey,
        "Authorization: Bearer " . $supabaseKey,
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


if ($_SERVER['REQUEST_METHOD'] === 'PUT' || isset($_GET['marcar_visto'])) {
    $id = $_GET['marcar_visto'] ?? null;
    
    if ($id) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $supabaseUrl . "/rest/v1/denuncias?id=eq." . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['visto' => true]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "apikey: " . $supabaseKey,
            "Authorization: Bearer " . $supabaseKey,
            "Content-Type: application/json",
            "Prefer: return=minimal"
        ]);
        curl_exec($ch);
        curl_close($ch);
    }
    
    header('Location: Denuncia.php');
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $supabaseUrl . "/rest/v1/denuncias?order=criado_em.desc");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: " . $supabaseKey,
    "Authorization: Bearer " . $supabaseKey
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
  <title>GRIOT - Painel de Denúncias</title>
  <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <style>
    body {
      background: #f3f4f6;
      font-family: 'Poppins', sans-serif;
    }
    
    .banner {
      background: #e11d48;
      padding: 2.5rem 1.5rem;
      text-align: center;
      margin-top: 80px;
      color: white;
    }
    
    .banner h1 {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }
    
    .banner p {
      opacity: 0.95;
      font-size: 1rem;
    }
    
    .user-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(255,255,255,0.15);
      padding: 0.4rem 1rem;
      border-radius: 50px;
      margin-top: 1rem;
      font-size: 0.95rem;
    }

    
    .alerta-sucesso {
      background: #10b981;
      color: white;
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      text-align: center;
      font-weight: 600;
    }
    
    #lista {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      padding: 60px;
    }
    
    .card {
      position: relative;
      background: #d6ffd2;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(234, 179, 8, 0.15);
      transition: all 0.3s ease;
    }
    
    .card.visto {
      background: #ffb9b9;
      opacity: 0.8;
    }
    
    .card h3 {
      padding-right: 30px;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      gap: 8px;
      font-size: 1.1rem;
      margin-bottom: 15px;
    }
    
    .status-badge {
      font-size: 10px;
      padding: 4px 8px;
      border-radius: 12px;
      font-weight: 600;
      text-transform: uppercase;
    }
    
    .status-novo {
      background: #ef4444;
      color: white;
    }
    
    .status-lido {
      background: #64748b;
      color: white;
    }
    
    .card p {
      font-size: 14px;
      color: #4a5568;
      margin-bottom: 10px;
    }
    
    .card p strong {
      color: #2d3748;
      font-weight: 600;
    }
    
    .card p:last-child {
      margin-top: 16px;
      padding-top: 16px;
      border-top: 5px solid #cbd5e1;
      color: #2d3748;
      font-style: italic;
    }
    
    .btn-marcar-visto {
      margin-top: 10px;
      background: #10b981;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 12px;
      text-decoration: none;
      display: inline-block;
    }
    
    .btn-marcar-visto:hover {
      background: #059669;
    }
    
    .vazio {
      text-align: center;
      padding: 60px 20px;
      color: #6b7280;
      font-size: 1.1rem;
    }
    
    @media (max-width: 768px) {
      #lista {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
  <header class="header-area">
    <div class="container">
      <nav class="main-nav">
        <div class="left-menu">
          <button class="menu-trigger" aria-label="Abrir menu"><span></span></button>
          <ul class="menu-dropdown">
            <li><a href="Fotografias.html">Fotografias</a></li>
            <li><a href="Biblioteca.html">Biblioteca</a></li>
            <li><a href="Audiovisuais.html">Audiovisuais</a></li>
            <li><a href="Pinturas.html">Pinturas</a></li>
            <li><a href="LinhadoTempo.html">Linha do Tempo</a></li>
            <li><a href="Personalidades.html">Personalidades</a></li>
            <li><a href="Musica.html">Músicas</a></li>
            <li><a href="MensagemRecebida.php">Sugestões</a></li>
            <li><a href="adm.php">Administrador</a></li>
            
          </ul>
        </div>
        <div class="logo">
          <a href="index.php">
            <img src="mainStyle/assets/images/LogoEst_SF.png" alt="Logotipo GRIOT">
          </a>
        </div>
        <div class="right-menu">
          <a href="index.php" class="main-red-button">Início</a>
        </div>
      </nav>
    </div>
  </header>

  <section class="banner">
    <h1>Painel de Moderação</h1>
    <p>Análise de conteúdos denunciados pelos usuários</p>
    <div class="user-badge">
      👤 <?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?>
    </div>
  </section>

  <div class="container">
    <?php if (isset($_GET['denuncia'])): ?>
      <div class="alerta-sucesso">
        ✅ Denúncia recebida com sucesso!
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
            
            <p><strong>Obra:</strong> <span style="color: #e11d48; font-weight: 600;"><?= htmlspecialchars($item['nome_pintura'] ?? 'Não informado') ?></span></p>
            <p><strong>Motivo:</strong> <?= htmlspecialchars($item['motivo']) ?></p>
            <p><strong>ID da Pintura:</strong> <?= $item['id_pintura'] ?></p>
            
            <p>
              <strong>Data:</strong>
              <?= date('d/m/Y H:i', strtotime($item['criado_em'])) ?>
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
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática - IFPR Pinhais</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="mainStyle/script.js"></script>
</body>
</html>