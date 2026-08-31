<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Museu virtual com temática racial">
  <title>GRIOT - Início</title>
  <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
  <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="mapaInterativo/style.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="anonymous" />



</head>

<body>


  <header class="header-area">
    <div class="container">
      <nav class="main-nav">
        <div class="left-menu">
          <button class="menu-trigger" aria-label="Abrir menu">
            <span></span>
          </button>
          <ul class="menu-dropdown">
            <li><a href="galeria/Pinturas.html">Pinturas</a></li>
            <li><a href="galeria/Fotografias.html">Fotografias</a></li>
            <li><a href="biblioteca/Biblioteca.html">Acervo Literário</a></li>
            <li><a href="Filmes/Audiovisuais.html">Audiovisuais</a></li>
            <li><a href="Personalidades/Personalidades.html">Personalidades</a></li>
            <li><a href="LinhaDoTempo/LinhadoTempo.html">Linha do Tempo</a></li>
            <li><a href="Legislacao/Legislacao.html">Legislação</a></li>
            <li><a href="musica/Musica.html">Músicas</a></li>

          </ul>
        </div>
        <a href="index.php" class="logo">
          <img src="mainStyle/assets/images/LogoEst_SF.png"
            alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
        </a>

        <div class="right-menu">
          <a href="QuemSomos/quemsomos.html" class="main-red-button">
            Quem Somos
          </a>
          <?php if (empty($_SESSION['email'])): ?>
            <a href="./auth/login.php" class="main-blue-button">
              Login
            </a>
          <?php else: ?>
            <?php if ($_SESSION['adm']): ?>
              <a href="./adm/adm.php" class="main-red-button">
                Painel Administrativo
              </a>
            <?php endif; ?>
            <a href="./auth/logout.php" class="main-red-button">
              Sair
            </a>
          <?php endif; ?>
        </div>
      </nav>
    </div>
  </header>

  <div class="ImagemFundo">
    <section class="main-banner" id="top">
      <div class="container">
        <div class="banner-content">

          <div class="left-content">
            <?php if (!empty($_SESSION['email'])): ?>
              <div class="welcome-box">
                <h5>
                  <?php if (($_SESSION['pronome']) == "M"): ?>Bem-vindo,<?php elseif (($_SESSION['pronome']) == "F"): ?>Bem-vinda,<?php else: ?>Boas-vindas,<?php endif; ?>
                  <?= $_SESSION['nome'] ?> 👋
                </h5>
                <?php if (!empty($_SESSION['adm'])): ?>
                  <p>
                    <?php if (($_SESSION['pronome']) == "M"): ?>Você está logado como
                      administrador<?php elseif (($_SESSION['pronome']) == "F"): ?> Você está logada como administradora
                    <?php else: ?> Você está com função de administrar<?php endif; ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>


            <h6>
              Boas-vindas ao GRIOT
            </h6>
            <h2>Seu repositório <em>com temática </em><span>racial</span></h2>
            <p>
              O GRIOT é um site web interativo que reúne conteúdos
              sobre cultura negra.
              Projetado como uma experiência imersiva,
              o site convida visitantes a percorrer diversos cenários
              e refletir sobre as marcas da ancestralidade
              na sociedade contemporânea.
              Ideal para educação, pesquisa e reflexão comunitária,
              o GRIOT transforma memória em diálogo.
            </p>
          </div>
          <div class="right-image">
            <img src="mainStyle/assets/images/FotoPrincipal.jpg" alt="Jovem negro com 3 pentes garfos em seu cabelo">
          </div>
        </div>
      </div>
    </section>
    <section class="content-section" id="redirection">
      <div class="container">
        <div class="section-heading">
          <h2>Conteúdos que valorizam a <em>Cultura Negra</em></h2>
          <p>
            Fotografias, Pinturas, Recomendações de Filmes, Personalidades e mais.
            <br>
            Selecione o seu desejado e acesse um mundo novo.
          </p>
        </div>

        <div class="content-grid">
          <a href="galeria/Fotografias.html" class="content-card card-roxo">
            <div class="icon-box">
              <i class="fa fa-camera"></i>
            </div>
            <h4>Fotografias</h4>
          </a>

          <a href="galeria/Pinturas.html" class="content-card card-amarela">
            <div class="icon-box">
              <i class="fa fa-paint-brush"></i>
            </div>
            <h4>Pinturas</h4>
          </a>


          <a href="biblioteca/Biblioteca.html" class="content-card card-vermelho">
            <div class="icon-box">
              <i class="fa fa-book"></i>
            </div>
            <h4>Acervo literário</h4>
          </a>


          <a href="Filmes/Audiovisuais.html" class="content-card
          card-marrom">
            <div class="icon-box">
              <i class="fa fa-film"></i>
            </div>
            <h4>
              Audiovisuais
            </h4>
          </a>


          <a href="personalidades/Personalidades.html" class="content-card card-azul">
            <div class="icon-box">
              <i class="fa-solid fa-person"></i>
            </div>
            <h4>Personalidades</h4>
          </a>


          <a href="LinhaDoTempo/LinhadoTempo.html" class="content-card card-roxo">
            <div class="icon-box">
              <i class="fa fa-clock"></i>
            </div>

            <h4>
              Linha do Tempo
              <br>
            </h4>

          </a>

          <a href="musica/Musica.html" class="content-card card-amarela">
            <div class="icon-box">
              <i class="fa-solid fa-headphones-simple"></i>
            </div>

            <h4>
              Música
              <br>
            </h4>

          </a>

          <a href="Legislacao/Legislacao.html" class="content-card card-vermelho">
            <div class="icon-box">
              <i class="fa fa-gavel"></i>
            </div>

            <h4>
              Legislação
              <br>
            </h4>
          </a>
        </div>
      </div>
    </section>

    <div class="section-heading">
      <h2>Quem fomenta a <em>Cultura Negra</em> na RMC?</h2>
      <p>
        Poetizas, ativistas, musicistas, políticas...
        <br>
        Conheça mais pessoas negras que movimentam a região.
      </p>
    </div>
    <div id="mapa">
      <div class="painel-info" id="painel">
        <h3>Municípios da RMC</h3>
        <p id="conteudo">Passe o mouse em uma cidade para ver os detalhes.</p>
      </div>
    </div>

    <section class="content-section" id="api">
      <div class="container">
        <div class="section-heading">
          <h2>Faça <em>igual</em>, faça <em>mais</em> com a nossa <em>API</em></h2>
          <p>
            Acesso massificado e livre dos Recursos Educacionais Digitais da plataforma GRIOT para o seu projeto!
          </p>
        </div>

        <button onclick="window.location.href='./Documentacao/documentacao.html'" class="btn-documentacao">
          Documentação
        </button>

        <div class="content-grid">
          <a href="api/Fotografias.php" class="content-card card-roxo">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>Fotografias</h4>
          </a>

          <a href="api/Pinturas.php" class="content-card card-amarela">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>Pinturas</h4>
          </a>


          <a href="api/Biblioteca.php" class="content-card card-vermelho">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>Acervo literário</h4>
          </a>


          <a href="api/Audiovisuais.php" class="content-card
          card-marrom">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>
              Audiovisuais
            </h4>
          </a>


          <a href="api/Personalidades.php" class="content-card card-azul">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>Personalidades</h4>
          </a>


          <a href="api/Legislacao.php" class="content-card card-vermelho">
            <div class="icon-box">
              <i class="fa-solid fa-gear"></i>
            </div>
            <h4>Legislação</h4>
          </a>

        </div>
      </div>
    </section>

    <section class="contact-section">
      <div class="container">
        <div class="contact-content">
          <div class="contact-info">
            <div class="section-heading">
              <h2>
                Se você tem uma sugestão,
                não hesite em nos avisar
              </h2>
              <p>
                É muito importante sua opinião para
                a evolução do nosso projeto.
                Deixe elogios, críticas e sugestões.
              </p>
            </div>


            <div class="phone-info">
              <h4>
              </h4>
            </div>
          </div>

          <div class="contact-form">
            <form id="contact">
              <div class="input-group">
                <input type="text" name="name" id="name" placeholder="Nome" autocomplete="on" required>
                <input type="text" name="surname" id="surname" placeholder="Sobrenome" autocomplete="on" required>
              </div>

              <input type="email" name="email" id="email" placeholder="Seu Email" required>
              <textarea name="message" id="message" placeholder="Digite aqui sua mensagem" required></textarea>
              <button type="submit" id="form-submit" class="main-blue-button"> Enviar Mensagem </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>



  <footer class="footer">
    <div class="container">
      <p>
        Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática IFPR Pinhais
      </p>
    </div>
  </footer>


  <script src="Supabase/supabase.min.js"></script>


  <script>
    const supabaseUrl =
      "https://cdhjzkmlucahtllfpdlx.supabase.co";

    const supabaseKey =
      "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g";

    const supabaseClient =
      supabase.createClient(
        supabaseUrl,
        supabaseKey
      );

    document
      .getElementById("contact")
      .addEventListener("submit", async function (e) {

        e.preventDefault();

        const nome =
          document.getElementById("name").value;

        const sobrenome =
          document.getElementById("surname").value;

        const email =
          document.getElementById("email").value;

        const msg =
          document.getElementById("message").value;

        const {
          error
        } =
          await supabaseClient
            .from("comentarios")
            .insert([{
              nome: nome,
              sobrenome: sobrenome,
              email: email,
              msg: msg
            }]);

        if (error) {

          alert("Erro ao enviar");
          console.log(error);

        } else {

          alert("Mensagem enviada com sucesso!");

          document
            .getElementById("contact")
            .reset();
        }

      });
  </script>

  <script src="mainStyle/script.js" defer></script>


  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    const vw = new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <script>
    const map = L.map('mapa', {
      zoomControl: false,
      dragging: false,
      scrollWheelZoom: false,
      doubleClickZoom: false,
      boxZoom: false,
      touchZoom: false,
      keyboard: false
    }).setView([-25.4284, -49.2733], 10);

    function definirEstilo(feature) {
      return {
        fillColor: ' #3260B9 ',
        weight: 2,
        opacity: 1,
        color: 'purple',
        fillOpacity: 0.7
      };
    }

    let camadaGeoJson;

    function destacarCidade(e) {
      const camada = e.target;
      camada.setStyle({
        fillColor: '#DA3A2D',
        fillOpacity: 0.7
      });

      const props = camada.feature.properties;
      const nomeCidade = props.NM_MUNICIP || props.name || props.NM_MUN || props.nome || "Cidade";

      document.getElementById('conteudo').innerHTML = `<strong>${nomeCidade}</strong>`;
    }

    function resetarDestaque(e) {
      camadaGeoJson.resetStyle(e.target);
      document.getElementById('conteudo').innerHTML = "Passe o mouse em uma cidade para ver os detalhes.";
    }

    function interacoes(feature, layer) {
      layer.on({
        mouseover: destacarCidade,
        mouseout: resetarDestaque,
        click: PaginaCidade
      });
    }

    function PaginaCidade(e) {
      const prop = e.target.feature.properties;
      const nomeCidade = prop.NM_MUNICIP || prop.name || prop.NM_MUN || prop.nome;
      if (nomeCidade) {
        const nomeFormatado = nomeCidade
          .toLowerCase()
          .normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
          .replace(/\s+/g, "-");

        window.location.href = `Cidades/${nomeFormatado}.html`;
      }

    }

    fetch('mapaInterativo/mapa.json')
      .then(resposta => resposta.json())
      .then(dados => {
        camadaGeoJson = L.geoJSON(dados, {
          style: definirEstilo,
          onEachFeature: interacoes
        }).addTo(map);



        map.fitBounds(camadaGeoJson.getBounds(), {
          padding: [50, 50]
        });

        setTimeout(() => {
          map.invalidateSize();
        }, 200);
      })
      .catch(erro => {
        console.error("Erro ao carregar o arquivo de vetores:", erro);
        document.getElementById('conteudo').innerHTML = "Erro ao carregar os vetores.";
      });
  </script>


</body>

</html>