<?php
session_start();
if (empty($_SESSION['adm'])) {
    header('Location: index.php');
    exit;
}

require_once 'config/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['tipo'] === 'fotografias') {
        supabaseCreatePhotoPainting('Fotografias', 'fotografias');
    }
    if ($_POST['tipo'] === 'pinturas') {
        supabaseCreatePhotoPainting('Pinturas', 'pinturas');
    }
    if ($_POST['tipo'] === 'filmes') {
        supabaseCreateFilm('filmes');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
    <meta name="description" content="Painel Administrativo ">
    <title>GRIOT-Painel Admin</title>


    <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">
    <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />


    <style>
        :root {
            --primary: #e74c3c;
            --accent: #03a4ed;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --secondary: #2c3e50;
            --border: #dee2e6;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-light);
            color: var(--secondary);
        }

        /* ===== BANNER ===== */
        .banner {
            background: #ff5845;
            padding: 7rem 1.5rem 2.5rem;
            text-align: center;
        }

        .banner h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: white;
        }

        .banner p {
            color: white;
        }

        .user-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            margin-top: 1rem;
            color: white;
        }

        /* ===== MAIN ===== */
        main.container {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        /* ===== GRID ===== */
        .forms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        /* ===== CARD ===== */
        .form-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .form-card:hover {
            transform: translateY(-4px);
        }

        .form-card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        .btn-submit {
            width: 100%;
            padding: 0.85rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: var(--accent);
        }

        .footer {
            text-align: center;
            padding: 2rem;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 768px) {
            .banner {
                padding-top: 6rem;
            }

            .forms-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>

    <!-- Preloader -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header-area">
        <div class="container">
            <nav class="main-nav">
                <div class="left-menu">
                    <button class="menu-trigger" aria-label="Abrir menu"><span></span></button>
                    <ul class="menu-dropdown">
                        <li><a href="Fotografias.php">Fotografias</a></li>
                        <li><a href="Biblioteca.php">Biblioteca</a></li>
                        <li><a href="Filmes.php">Filmes</a></li>
                        <li><a href="Pinturas.php">Pinturas</a></li>
                        <li><a href="LinhadoTempo.php">Linha do Tempo</a></li>
                        <li><a href="Músicas.php">Músicas</a></li>
                        <li><a href="mensagemRecebida.html">Sugestões</a></li>
                    </ul>
                </div>
                <div class="logo">
                    <a href="index.php">
                        <img src="mainStyle/assets/images/LogoEst_SF.png" alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
                    </a>
                </div>
                <div class="right-menu">
                    <a href="index.php" class="main-red-button">Início</a>
                </div>
            </nav>
        </div>
    </header>


    <!-- ===== BANNER ===== -->
    <section class="banner">
        <h1>Painel Administrativo</h1>
        <p>Gerencie o conteúdo do Museu Virtual GRIOT</p>
        <div class="user-badge">
            👤 <?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?>
        </div>
    </section>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container">
        <h2 class="section-title">Submissão de Conteúdo</h2>

        <div class="forms-grid">

            <!-- 📷 FORM: FOTOGRAFIAS -->
            <article class="form-card">
                <h3>📷 Fotografias</h3>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="tipo" value="fotografias">

                    <div class="form-group">
                        <label for="foto_titulo">Título *</label>
                        <input type="text" id="foto_titulo" name="titulo" required placeholder="Ex: Retrato da Liberdade">
                    </div>

                    <div class="form-group">
                        <label for="foto_autor">Autor(a) *</label>
                        <input type="text" id="foto_autor" name="autor" required placeholder="Nome do artista">
                    </div>

                    <div class="form-group">
                        <label for="foto_ano">Ano</label>
                        <input type="number" id="foto_ano" name="ano" min="1800" max="2100" placeholder="Ex: 2024">
                    </div>

                    <div class="form-group">
                        <label for="foto_imagem">Imagem *</label>
                        <input type="file" id="foto_imagem" name="imagem" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn-submit">Enviar Fotografia</button>
                    <p>Adicione uma fotografia por vez.</p>
                </form>
            </article>

            <!-- 🎨 FORM: PINTURAS -->
            <article class="form-card">
                <h3>🎨 Pinturas</h3>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="tipo" value="pinturas">

                    <div class="form-group">
                        <label for="pint_titulo">Título *</label>
                        <input type="text" id="pint_titulo" name="titulo" required placeholder="Ex: Raízes Ancestrais">
                    </div>

                    <div class="form-group">
                        <label for="pint_autor">Autor(a) *</label>
                        <input type="text" id="pint_autor" name="autor" required placeholder="Nome do artista">
                    </div>

                    <div class="form-group">
                        <label for="pint_ano">Ano</label>
                        <input type="number" id="pint_ano" name="ano" min="1800" max="2100" placeholder="Ex: 2023">
                    </div>

                    <div class="form-group">
                        <label for="pint_imagem">Imagem *</label>
                        <input type="file" id="pint_imagem" name="imagem" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn-submit">Enviar Pintura</button>
                    <p>Adicione uma pintura por vez.</p>
                </form>
            </article>

            <!-- 🎬 FORM: FILMES -->
            <article class="form-card">
                <h3>🎬 Filmes & Mídias</h3>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="tipo" value="filmes">

                    <div class="form-group">
                        <label for="filme_titulo">Título *</label>
                        <input type="text" id="filme_titulo" name="titulo" required placeholder="Ex: Quilombo dos Palmares">
                    </div>

                    <div class="form-group">
                        <label for="filme_desc">Descrição *</label>
                        <input type="text" id="filme_desc" name="desc" required placeholder="Breve descrição da obra">
                    </div>

                    <div class="form-group">
                        <label for="filme_link">Link *</label>
                        <input type="url" id="filme_link" name="link" required placeholder="https://...">
                    </div>

                    <div class="form-group">
                        <label for="filme_tipo">Tipo de Mídia *</label>
                        <select id="filme_tipo" name="tipomidia" required>
                            <option value="">Selecione...</option>
                            <option value="Filmes">🎬 Longas de Ficção</option>
                            <option value="Curtas">🎞️ Curtas</option>
                            <option value="Desenhos">✏️ Animações</option>
                            <option value="Documentarios">🎥 Documentários</option>
                            <option value="Series">📺 Séries</option>
                            <option value="Biografias">👤 Biografias</option>
                            <option value="Clipes">🎵 Musicais</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="filme_capa">Imagem de Capa *</label>
                        <input type="file" id="filme_capa" name="imagem" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn-submit">Enviar Mídia</button>
                    <p>Adicione uma mídia por vez.</p>
                </form>
            </article>

        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <p>
            Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais
    </footer>

    <!-- ===== VLibras (Acessibilidade) ===== -->
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


    <script src="Supabase/supabase.min.js"></script>
    <script>
        if (typeof window.SUPABASE_URL !== 'undefined') {
            const supabase = window.supabase.createClient(
                window.SUPABASE_URL,
                window.SUPABASE_KEY
            );

        }
    </script>
    <script src="mainStyle/script.js"></script>

</body>

</html>

