<?php

session_start();

use GuzzleHttp\Exception\GuzzleException;

require_once 'conexao/config.php';
require_once './composer/vendor/autoload.php';

$prods = supabaseRequest("filmes?select=*");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="meanStyle/assets/images/FavIcon_SF.png">
    <link rel="stylesheet" href="meanStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="Filmes/style.css">
    <link rel="stylesheet" href="meanStyle/assets/fonts/poppins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
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
                <li><a href="Legislacao.php">Legislação</a></li>
                </ul>
            </div>
            <!-- ***** Logo Start ***** -->
            <div class="logo">
                <a href="index.php">
                <img src="meanStyle/assets/images/LogoEst_SF.png" alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
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
                        alt="Profissional de cinema operando câmera Panavision em set de filmagem externo, vestindo roupas escuras e boné, com paisagem natural ao fundo">
                </div>
            </div>
        </div>
    </section>
    
            <section class="movie-list-container">
                <h1 class="movie-list-title">Longas de Ficção</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Filmes'): ?>
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
    

                <h1 class="movie-list-title">Curtas</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Curtas'): ?>
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
        

                <h1 class="movie-list-title">Animações</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Desenhos'): ?>
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
    
                <h1 class="movie-list-title">Documentários</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Documentarios'): ?>
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

                <h1 class="movie-list-title">Séries</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Series'): ?>
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

                <h1 class="movie-list-title">Biográfias</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Biografias'): ?>
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

                <h1 class="movie-list-title">Musicais</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <?php if ($prods): ?>
                            <?php foreach ($prods as $row): ?>
                                <?php if ($row['tipo'] == 'Clipes'): ?>
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
                Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais.
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

    <script src="Vlibras/vlibras-plugin.js"></script>

    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <script src="meanStyle/script.js"></script>

</body>

</html>
