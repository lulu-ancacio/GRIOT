<?php
session_start();

use GuzzleHttp\Exception\GuzzleException;

require 'conexao/config.php';
require './composer/vendor/autoload.php';

$prods = supabaseRequest("filmes?select=*");

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="meanStyle/assets/images/FavIcon_SF.png">
     <link rel="stylesheet" href="meanStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="Filmes/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>GRIOT- Filmes</title>

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
                <li><a href="Fotografias.php">Fotografias</a></li>
                <li><a href="Textos.php">Textos</a></li>
                <li><a href="Filmes.php">Filmes</a></li>
                <li><a href="Musicas.php">Músicas</a></li>
                <li><a href="LinhadoTempo.php">Linha do Tempo</a></li>
                <li><a href="Legislação.php">Legislação</a></li>
                </ul> 
            </div>
            <!-- ***** Logo Start ***** -->
            <div class="logo">
                <a href="index.php">
                <img src="meanStyle/assets/images/LogoEst_SF.png">
                </a>
            </div>
            
            
            <div class="right-menu">
                <a href="index.php" class="main-red-button">Início</a>
            </div>
            </nav>
    </div>
    </header>
   <div class="ImagemFundo">
    <section class="main-banner">
        <div class="container">
            <div class="banner-content">
                <div class="left-content">
                    <h6>
                        Bem-vindo ao GRIOT- Filmes
                    </h6>
                    <h2>
                        Luz! <em>Câmera!</em> <span>GRIOT!</span>
                    </h2>
                    <p>
                        O GRIOT é um site web interativo que reúne filmes,
                        documentários, séries e conteúdos voltados à cultura negra.
                        Projetado como uma experiência imersiva,
                        o site convida visitantes a refletir sobre ancestralidade,
                        representatividade e memória na sociedade contemporânea.
                        Ideal para educação, pesquisa e reflexão comunitária.
                    </p>
                </div>
                <div class="right-image">
                    <img src="meanStyle/assets/images/Filme.jpg"
                        alt="Câmera de cinema">
                </div>
            </div>
        </div>
    </section>
    
            <section id="filmes" class="movie-list-container">

                <h1 class="movie-list-title">Filmes</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'F'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>  
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class = "arrow">
                    <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </section>

            <section id="filmes" class="movie-list-container">

                <h1 class="movie-list-title">Desenhos</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'DE'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class = "arrow">
                    <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </section>


            <section id="documentarios" class="movie-list-container">
                <h1 class="movie-list-title">Documentários</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'DO'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="arrow">
                    <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </section>

            <section id="series" class="movie-list-container">
                <h1 class="movie-list-title">Séries</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'S'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class ="arrow">
                    <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </section>

            <section id="biografias" class="movie-list-container">
                <h1 class="movie-list-title">Biográfias</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'B'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                    
                </div>
            </section>

            <section id="biografias" class="movie-list-container">
                <h1 class="movie-list-title">Clipes</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'C'): ?>
                                    <div class="movie-list-item">
                                        <img class="movie-list-item-img" src="<?= $row['url'] ?>" alt="">
                                        <span class="movie-list-item-title"><?= $row['titulo'] ?></span>
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?> </p>
                                        <button class="movie-list-item-button"
                                            onclick="window.open('<?= $row['link'] ?>', '_blank')">
                                            Assistir
                                        </button>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                       <div class="arrow">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </section>

            <footer>
            <p>
                Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais 
            </p>
            </footer>
        </div>
    </div>
    </div>

    <script src="Filmes/app.js"></script>
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
    <script src="meanStyle/script.js"></script>

</body>

</html>