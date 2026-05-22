<?php
session_start();
if (empty($_SESSION['adm'])) {
    header('Location: index.php');
    exit;
}

require_once 'conexao/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['tipo'] === 'fotografias') {
        supabaseCreatePhotoPainting('Fotografias', 'fotografias');
    }
    if ($_POST['tipo'] === 'pinturas') {
        supabaseCreatePhotoPainting('Pinturas', 'pinturas');
    }
    if ($_POST['tipo'] === 'filmes') {
        supabaseCreateFilm('Filmes', 'filmes');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="meanStyle/assets/images/FavIcon_SF.png">
    <meta name="description" content="Painel Administrativo ">
    <title>GRIOT • Painel Admin</title>
    

    <link rel="stylesheet" href="meanStyle/assets/fonts/poppins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>

    
    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #e74c3c;
            --primary-dark: #c0392b;
            --secondary: #2c3e50;
            --accent: #03a4ed;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --gray: #6c757d;
            --border: #dee2e6;
            --shadow: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-hover: 0 8px 30px rgba(0,0,0,0.12);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-light);
            color: var(--secondary);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* ===== HEADER ===== */
        .header {
            background: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--primary);
            font-weight: 700;
            font-size: 1.25rem;
        }

        .logo img {
            height: 40px;
            width: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 0.5rem 1rem;
            background: #e74c3c;
            color: var(--white) !important;
            text-decoration: none;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .nav-btn:hover {
            background: #03a4ed;
            transform: translateY(-2px);
        }

        .nav-btn.secondary {
            background:#e74c3c;
        }

        .nav-btn.secondary:hover {
            background: #03a4ed;
        }


        /* ===== BANNER ===== */
        .banner {
            background: #e74c3c;
            padding: 2.5rem 1.5rem;
            text-align: center;
        }

        .banner h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color:white;
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

        /* ===== MAIN CONTENT ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--secondary);
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* ===== FORMS GRID ===== */
        .forms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .form-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .form-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-4px);
        }

        .form-card h3 {
            color: var(--primary);
            margin-bottom: 1.25rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--border);
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.4rem;
            color: var(--secondary);
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: var(--transition);
            background: var(--white);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.15);
        }

        .form-group input[type="file"] {
            padding: 0.5rem;
            background: var(--bg-light);
        }

        .btn-submit {
            width: 100%;
            padding: 0.85rem;
            background:#e74c3c;
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            background: #03a4ed;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* ===== FOOTER ===== */
        .footer {
          
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .header-inner {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                justify-content: center;
                width: 100%;
            }

            .banner h1 {
                font-size: 1.5rem;
            }

            .forms-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 1.5rem;
            }
        }

        /* ===== UTILS ===== */
        .hidden { display: none; }
        .text-center { text-align: center; }
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
    </style>
</head>
<body>

    <!-- ===== HEADER ===== -->
    <header class="header">
        <div class="header-inner">
            <a href="index.php">
              <img src="meanStyle/assets/images/LogoEst_SF.png" alt ="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira Griot">
            </a>
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
                            <option value="F">🎬 Longas de Ficção</option>
                            <option value="CU">🎞️ Curtas</option>
                            <option value="DE">✏️ Animações</option>
                            <option value="DO">🎥 Documentários</option>
                            <option value="S">📺 Séries</option>
                            <option value="B">👤 Biografias</option>
                            <option value="CL">🎵 Musicais</option>
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

</body>
</html>
