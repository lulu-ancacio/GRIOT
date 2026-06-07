
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Museu virtual com tematica racial">
  <meta name="author" content=" ">
  <meta charset="UTF-8">
  <link rel="icon" href=" mainStyle\assets\images\FavIcon_SF.png">
  <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">

  <title>GRIOT-Legislação</title>



  <!-- Additional CSS Files -->
   <link rel="stylesheet" href="Legislacao/style.css">
  <link rel="stylesheet" href="mainStyle/assets/css/fontawesome.css">
  <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">


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

  <!-- Banner Principal -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="banner-content">
        <div class="left-content">
          <h6>Bem-Vindo ao GRIOT-Legislação</h6>
          <h2><em>Eu os declaro LIVRES.</em> <span>GRIOT!</span></h2>
          <p> A lei é muito mais do que um texto congelado no papel; é uma forma de moldar o destino e garantir o direito de existir. No contexto da cultura negra e da ancestralidade, a legislação torna-se uma ferramenta poderosa de reparação e reexistência.

Durante muito tempo, as leis foram escritas para nos silenciar e outras pessoas ditaram as regras da nossa história. Mas hoje, apropriando-nos das normas, dos códigos e da justiça, nós retomamos o protagonismo e escrevemos a nossa própria libertação.</p>
        </div>
        <div class="right-image">
          <img src="mainStyle/assets/images/Legislacao.jpg" alt="Fotografia em tom sépia de uma mulher negra personificando a deusa da Justiça. Ela está de olhos vendados, veste mantos tradicionais e segura uma balança na mão esquerda e uma espada na mão direita.">
        </div>
      </div>
    </div>
  </section>

  
  <section class="legislacao-section">
    <div class="container">
      <div id="container-leis"></div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="mainStyle/script.js"></script>
  <script>
 
  const leis = [
    {
      id: 1,
      nome: "Lei Áurea",
      numero: "Lei n°3.353/1888",
      data: "13 de maio de 1888",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/leis/lim/lim3353.htm"
    },
    {
      id: 2,
      nome: "Injúria Racial",
      numero: "Lei nº 2.848/1940",
      data: "7 de dezembro de 1940",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/decreto-lei/del2848.htm"
    },
    {
      id: 3,
      nome: "Lei Afonso Arinos",
      numero: "Lei nº 1.390/1951",
      data: "3 de julho de 1951",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/leis/l1390.htm"
    },
    {
      id: 4,
      nome: "Lei do Genocídio",
      numero: "Lei nº 2.889/1956",
      data: "1° de outubro de 1956",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/leis/l2889.htm"
    },
    {
      id: 5,
      nome: "Lei Caó",
      numero: "Lei nº 7.716/1989",
      data: "5 de janeiro de 1989",
      descricao: "",
      link: "https://www.planalto.gov.br/ccivil_03/leis/l7716.htm"
    },
    {
      id: 6,
      nome: "Lei das diretrizes e bases da educação nacional",
      numero: "Lei nº 10.639/2003",
      data: "9 de janeiro de 2003",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/leis/2003/l10.639.htm#:~:text=L10639&text=LEI%20No%2010.639%2C%20DE%209%20DE%20JANEIRO%20DE%202003.&text=Altera%20a%20Lei%20no,%22%2C%20e%20d%C3%A1%20outras%20provid%C3%AAncias."
    },
     
    {
      id: 7,
      nome: "Estatuto da Igualdade Racial",
      numero: "Lei nº 12.288/2010",
      data: "20 de julho de 2010",
      descricao: " ",
      link: "http://planalto.gov.br/ccivil_03/_ato2007-2010/2010/lei/l12288.htm"
    },
    {
      id: 8,
      nome: "Em memória de Zumbi dos Palmares, Dia da Consciência Negra",
      numero: "Lei nº 12.519/2011",
      data: "10 de novembro de 2011",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2011/lei/l12519.htm"
    },
    {
      id: 9,
      nome: "Lei das Cotas",
      numero: "Lei nº 12.711/2012",
      data: "29 de agosto de 2012",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/lei/l12711.htm"
    },
    {
      id: 10,
      nome: "Lei Juventude Negra Viva",
      numero: "Lei nº 12.990/2014",
      data: "9 de julho de 2014",
      descricao: " ",
      link: "https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2014/lei/l12990.htm"
    },
  ];

  const container = document.getElementById('container-leis');

  function renderizarLeis() {
    container.innerHTML = '';

    leis.forEach(l => {
      const card = document.createElement('article');

      card.className = 'lei-card';

      card.innerHTML = `
        <h3>${l.nome}</h3>
        <span class="numero">${l.numero}</span>
        <span class="data">${l.data}</span>
        <p>${l.descricao}</p>
        <a href="${l.link}" target="_blank" rel="noopener">
          📖 Texto oficial →
        </a>
      `;

      container.appendChild(card);
    });
  }

  renderizarLeis();
</script>
</body>
</html>
