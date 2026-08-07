<?php
session_start();
if (empty($_SESSION['adm'])) {
    header('Location: index.php');
    exit;
}

require_once 'config/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    match ($_POST['secao']) {
        'fotografias' => supabaseDeleteItem(''),
        'pinturas' => supabaseDeleteItem('pinturas'),
        'filmes' => supabaseDeleteItem('filmes'),
        'livros' => supabaseDeleteItem('livros'),
        default => null
    };
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
    <meta name="description" content="Painel Administrativo ">
    <title>GRIOT - Exclusão de Conteúdo</title>


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


        main.container {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
        }


        .forms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }


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
            width: 10%;
            padding: 0.85rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-left: 20px;
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


    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>


    <header class="header-area">
        <div class="container">
            <nav class="main-nav">
                <div class="left-menu">
                    <button class="menu-trigger" aria-label="Abrir menu"><span></span></button>
                    <ul class="menu-dropdown">
                        <li><a href="Fotografias.html">Fotografias</a></li>
                        <li><a href="Biblioteca.html">Acervo Literário</a></li>
                        <li><a href="Audiovisuais.html">Audiovisuais</a></li>
                        <li><a href="Pinturas.html">Pinturas</a></li>
                        <li><a href="LinhadoTempo.html">Linha do Tempo</a></li>
                        <li><a href="Personalidades.html">Personalidades</a></li>
                        <li><a href="Musica.html"> Músicas</a>
                        <li>
                        <li><a href="mensagemRecebida.php">Sugestões</a></li>
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



    <section class="banner">
        <h1>Painel Administrativo</h1>
        <p>Gerencie o conteúdo do Museu Virtual GRIOT</p>
        <div class="user-badge">
            👤 <?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?>
        </div>
    </section>


    <main class="container">
        <a href="adm.php">
            <div class="icon-box">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
        </a>

        <h2 class="section-title">Exclusão de Conteúdo</h2>

        <div class="forms-grid">


            <article class="form-card">
                <h3>Obras</h3>
                <form method="POST" enctype="multipart/form-data">

                    <label for="secao">Selecione a seção *</label>
                    <select id="secao" name="secao" required>
                        <option value="">Selecione...</option>
                        <option value="pinturas">🎨 Pinturas</option>
                        <option value="fotografias">📷 Fotografias</option>
                        <option value="filmes">🎬 Audiovisuais</option>
                        <option value="livros">📚 Acervo literário</option>
                    </select>

                    <div id="sugestoes" style=" max-height:300px; overflow-y:auto; overflow-x:hidden; background:white; border:2px solid #e5e7eb; border-radius:8px; margin:20px"></div>

                    <label for="apagar_item"><strong>Qual ID do item que você deseja apagar?</strong></label>
                    <input type="number" id="apagar_item" name="id">
                    <button type="submit" class="btn-submit">Excluir Item</button>
                </form>
            </article>




        </div>
    </main>


    <footer class="footer">
        <p>
            Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais
    </footer>


    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="Vlibras/vlibras-plugin.js"></script>
    <script>
        globalThis.VLibras.Widget('https://vlibras.gov.br/app');
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

    <script>
        document.getElementById('secao').addEventListener('change', function() {

            switch (this.value) {

                case 'fotografias':
                    mostrarFotografias();
                    break;

                case 'pinturas':
                    mostrarPinturas();
                    break;

                case 'filmes':
                    mostrarFilmes();
                    break;

                case 'livros':
                    mostrarLivros();
                    break;

                default:
                    break;
            }

        });
    </script>

    <script>
        let dados = [];

        async function mostrarFotografias() {
            try {
                const response = await fetch('api/Fotografias.php');
                dados = await response.json();
                let html = '';
                dados.forEach((item) => {
                    html += `
                    <p style="padding: 12px 15px; cursor: pointer; border-bottom: 1px solid rgb(243, 244, 246); transition: background 0.2s; background: white;" onmouseover="this.style.background='#fef3c7'" onmouseout="this.style.background='white'">
                    <img style="width: 200px; height: 100px; object-fit: cover; border-radius: 8px;" src="${item.url}"/>
                    <strong>${item.titulo}</strong><br>
                    ${item.autor} • ${item.ano}<br>
                    <strong>ID: ${item.id}</strong>
                    </p>
                    `;
                });
                document.getElementById('sugestoes').innerHTML = html;
            } catch (erro) {
                console.error(erro);
                document.getElementById('sugestoes').innerHTML =
                    'Erro ao consumir API';
            }
        }

        async function mostrarPinturas() {
            try {
                const response = await fetch('api/Pinturas.php');
                dados = await response.json();
                let html = '';
                dados.forEach((item) => {
                    html += `
                    <p style="padding: 12px 15px; cursor: pointer; border-bottom: 1px solid rgb(243, 244, 246); transition: background 0.2s; background: white;" onmouseover="this.style.background='#fef3c7'" onmouseout="this.style.background='white'">
                    <img style="width: 200px; height: 100px; object-fit: cover; border-radius: 8px;" src="${item.url}"/>
                    <strong>${item.titulo}</strong><br>
                    ${item.autor} • ${item.ano}<br>
                    <strong>ID: ${item.id}</strong>
                    </p>
                    `;
                });
                document.getElementById('sugestoes').innerHTML = html;
            } catch (erro) {
                console.error(erro);
                document.getElementById('sugestoes').innerHTML =
                    'Erro ao consumir API';
            }
        }

        async function mostrarFilmes() {
            try {
                const response = await fetch('api/Audiovisuais.php');
                dados = await response.json();
                let html = '';
                dados.forEach((item) => {
                    html += `
                    <p style="padding: 12px 15px; cursor: pointer; border-bottom: 1px solid rgb(243, 244, 246); transition: background 0.2s; background: white;" onmouseover="this.style.background='#fef3c7'" onmouseout="this.style.background='white'">
                    <img style="width: 200px; height: 100px; object-fit: cover; border-radius: 8px;" src="${item.url}"/>
                    <strong>${item.titulo}</strong><br>
                    <strong>ID: ${item.id}</strong>
                    </p>
                    `;
                });
                document.getElementById('sugestoes').innerHTML = html;
            } catch (erro) {
                console.error(erro);
                document.getElementById('sugestoes').innerHTML =
                    'Erro ao consumir API';
            }
        }

        async function mostrarLivros() {
            try {
                const response = await fetch('api/Biblioteca.php');
                dados = await response.json();
                let html = '';
                dados.forEach((item) => {
                    html += `
                    <p style="padding: 12px 15px; cursor: pointer; border-bottom: 1px solid rgb(243, 244, 246); transition: background 0.2s; background: white;" onmouseover="this.style.background='#fef3c7'" onmouseout="this.style.background='white'">
                    <img style="width: 90px; height: 135px; object-fit: cover; border-radius: 8px;" src="${item.url}"/>
                    <strong>${item.titulo}</strong><br>
                    <strong>ID: ${item.id}</strong>
                    </p>
                    `;
                });
                document.getElementById('sugestoes').innerHTML = html;
            } catch (erro) {
                console.error(erro);
                document.getElementById('sugestoes').innerHTML =
                    'Erro ao consumir API';
            }
        }
    </script>

    <script src="mainStyle/script.js"></script>

</body>

</html>