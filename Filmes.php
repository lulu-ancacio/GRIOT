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
    <link rel="stylesheet" href="Filmes/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>GRIOT- Filmes</title>

</head>

<body>



    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <div class="logo">
                    <a href="index.php">
                        <img src="meanStyle\assets\images\LogoEst_SF.png">
                    </a>
                </div>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item">
                        <a href="index.php" class="main-red-button">Início</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div style="font-family: 'Poppins', sans-serif;">
        <div id="Fundo">
            <div class="main-banner">
                <div class="intro-section">
                    <div class="intro-text">
                        <h1>
                            Luz! <span class="blue">Câmera! </span><span class="red">GRIOT!</span>
                        </h1>

                        <p>
                            O GRIOT é um site web interativo que reúne pinturas sobre cultura negra.
                            Projetado como uma experiência imersiva, o site convida visitantes a percorrer
                            linhas do tempo e refletir sobre as marcas da ancestralidade na sociedade contemporânea.
                            Ideal para educação, pesquisa e reflexão comunitária.
                        </p>
                    </div>

                    <div class="intro-image">
                        <img src="Filmes/img/FotoPrincipal.jpg" alt="">
                    </div>
                </div>
            </div>

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
                                        <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  
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
                                        <!-- <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  -->
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
                                        <!-- <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  -->
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
                                        <!-- <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  -->
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
                                        <!-- <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  -->
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
                                        <!-- <p class="movie-list-item-desc"> <?= $row['desc'] ?>/ </p>  -->
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
                <p>Trabalho de Conclusão de Curso apresentado ao IFPR - 2026</p>
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

</body>

</html>