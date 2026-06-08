<?php

class Livro {
    public $titulo;
    public $autor;
    public $ano;
    public $capa;
    public $link;

    // ADICIONADO: $link foi incluído aqui nos parâmetros do construtor
    public function __construct($titulo, $autor, $ano, $capa, $link) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->capa = $capa;
        $this->link = $link;
    }
}

$biblioteca = [
    new Livro("Quarto de Despejo", "Carolina Maria de Jesus", 1960, "https://m.media-amazon.com/images/I/71z42zpEwbL._AC_UF1000,1000_QL80_.jpg", "https://www.amazon.com.br/Quarto-Despejo-Di%C3%A1rio-Uma-Favelada/dp/8508171277"),
    new Livro("Dispositivo de Racialidade", "Sueli Carneiro", 2023, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTA5yQwy9g20EjW_fAynhEEuRVkUZ6XDvSYeg&s", "https://www.amazon.com.br/Dispositivo-racialidade-constru%C3%A7%C3%A3o-outro-fundamento/dp/6559790967"),
 
];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Museu virtual com tematica racial">
    <meta name="author" content="GRIOT">
    <title>GRIOT - Biblioteca</title>

    <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
    <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">

    <!-- CSS -->
    <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="mainStyle/assets/css/fontawesome.css">
    <link rel="stylesheet" href="biblioteca/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>

<body>
    <!-- Header Area Start -->
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
                        <li><a href="Biblioteca.php">Linha do Tempo</a></li>
                        <li><a href="Filmes.php">Filmes</a></li>
                        <li><a href="Personalidades.php">Personalidades</a></li>
                        <li><a href="Legislacao.php">Legislação</a></li>
                    </ul>
                </div>
                <!-- Logo Start -->
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

    <div class="ImagemFundo">
        <section class="main-banner">
            <div class="container">
                <div class="banner-content">
                    <div class="left-content">
                        <h6>Bem-vindo ao GRIOT - Biblioteca</h6>
                        <h2>Páginas que libertam <em>Leituras que transformam </em> <span>GRIOT!</span></h2>
                        <p>
                            Explore o acervo do GRIOT, onde cada livro é uma história, cada prateleira
                            é um capítulo e cada obra é um passo em direção a um futuro mais inclusivo e
                             igualitário. Navegue por páginas de resistência, conquistas culturais e saberes
                              que moldaram a narrativa da luta contra o racismo. Descubra como a literatura
                               conecta o passado ao presente e inspire-se a folhear as páginas de um futuro onde a
                            diversidade seja celebrada e a igualdade seja uma realidade para todos.
                        </p>
                    </div>
                    <div class="right-image">
                        <img src="mainStyle/assets/images/Biblioteca.jpg" alt="Capa de livro com fundo bege. No topo esquerdo, o título "Querido estudante negro" em letras brancas; à direita, o nome da autora Bárbara Carine. No centro, ilustração de um homem negro sentado em uma cadeira giratória diante de uma escrivaninha de madeira, lendo uma folha de papel. Sobre a mesa há um computador portátil e outros objetos. Acima da mesa, um espelho oval reflete uma criança negra estudando. Na parte inferior esquerda aparece o logotipo da editora Planeta.">
                    </div>
                </div>
            </div>
        </section>

        <!-- Primeiro Carrossel (Livros disponíveis) -->
        <div class="carousel-containeNPagos">
            <p class="Classificacao">Livros disponíveis</p>
            <!-- CORRIGIDO: Passando o ID específico do carrossel na função JS -->
            <button class="carousel-btn prev" onclick="scrollCarousel(-1, 'carousel-disponiveis')">❮</button>
            <div class="carousel" id="carousel-disponiveis">
                <?php foreach ($biblioteca as $livro): ?>
                    <div class="livro-cardNP">
                        <img src="<?php echo $livro->capa; ?>" alt="<?php echo $livro->titulo; ?>" onerror="this.src='https://via.placeholder.com/250x350?text=Sem+Capa'">
                        <h3><?php echo $livro->titulo; ?></h3>
                        <p><strong><?php echo $livro->autor; ?></strong></p>
                        <p class="ano"><?php echo $livro->ano; ?></p>
                        <button class="link-btn" onclick="window.open('<?php echo $livro->link; ?>', '_blank')">Comprar</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-btn next" onclick="scrollCarousel(1, 'carousel-disponiveis')">❯</button>
        </div>

        <!-- Segundo Carrossel (Livros externos) -->
        <div class="carousel-containePagos">
            <p class="Classificacao">Livros externos</p>
           
            <button class="carousel-btn prev" onclick="scrollCarousel(-1, 'carousel-externos')">❮</button>
            <div class="carousel" id="carousel-externos">
                <?php foreach ($biblioteca as $livro): ?>
                    <div class="livro-cardP">
                        <img src="<?php echo $livro->capa; ?>" alt="<?php echo $livro->titulo; ?>" onerror="this.src='https://via.placeholder.com/250x350?text=Sem+Capa'">
                        <h3><?php echo $livro->titulo; ?></h3>
                        <p><strong><?php echo $livro->autor; ?></strong></p>
                        <p class="ano"><?php echo $livro->ano; ?></p>
                        <button class="link-btn" onclick="window.open('<?php echo $livro->link; ?>', '_blank')">Comprar</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-btn next" onclick="scrollCarousel(1, 'carousel-externos')">❯</button>
        </div>
    </div>
        <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <p>
            Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais
    </footer>

    <script src="biblioteca/main.js"></script>
    <script src="mainStyle/script.js"></script>

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
</body>
</html>
