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
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>
  <link rel="stylesheet" href="mainStyle/assets/css/templatemo-space-dynamic.css">


</head>

<body>

  
  <header class="header-area">
  <div class="container">
    <nav class="main-nav">
      <!-- MENU ESQUERDO -->
      <div class="left-menu">
        <button class="menu-trigger" aria-label="Abrir menu">
          <span></span>
        </button>
        <ul class="menu-dropdown">
          <li><a href="Pinturas.html">Pinturas</a></li>
          <li><a href="Fotografias.html">Fotografias</a></li>
          <li><a href="Biblioteca.html">Biblioteca</a></li>
          <li><a href="Audiovisuais.html">Audiovisuais</a></li>
          <li><a href="Personalidades.html">Personalidades</a></li>
          <li><a href="LinhadoTempo.html">Linha do Tempo</a></li>
          <li><a href="Legislacao.html">Legislação</a></li>
           <li><a href="Musica.html">Músicas</a></li>
          
        </ul>
      </div>
      <a href="index.php" class="logo">
        <img src="mainStyle/assets/images/LogoEst_SF.png" alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
      </a>

      <div class="right-menu">
        <?php if (empty($_SESSION['email'])): ?>
          <a href="./auth/login.php" class="main-blue-button">
            Login
          </a>
        <?php else: ?>
          <a href="./auth/logout.php" class="main-red-button">
            Sair
          </a>
          <?php if ($_SESSION['adm']): ?>
            <a href="./adm.php" class="main-red-button">
              Painel de Administrador
            </a>
            <a href="./mensagemRecebida.html" class="main-red-button">
              Mensagens
            </a>
          <?php endif; ?>
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
                  <?php if (($_SESSION['pronome']) == "M"): ?>Bem-vindo,<?php elseif (($_SESSION['pronome']) == "F"):?>Bem-vinda,<?php else: ?>Boas-vindas,<?php endif; ?>
                <?= $_SESSION['nome'] ?> 👋
                </h5>
                <?php if (!empty($_SESSION['adm'])): ?>
                  <p>
                    <?php if (($_SESSION['pronome']) == "M"): ?>Você está logado como administrador<?php elseif (($_SESSION['pronome']) == "F"):?> Você está logada como administradora <?php else: ?> Você está com função de administrar<?php endif; ?>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>


            <h6>
              Bem Vindo ao GRIOT
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
            Fotografias, Pinturas, Recomendações de Filmes e Personalidades.
            <br>
            Selecione o seu desejado e acesse um mundo novo.
          </p>

        </div>

        <div class="content-grid">
          <a href="Fotografias.html" class="content-card card-roxo">
            <div class="icon-box">
              <i class="fa fa-camera"></i>
            </div>
            <h4>Fotografias</h4>
          </a>

          <a href="Pinturas.html" class="content-card card-amarela">
            <div class="icon-box">
              <i class="fa fa-paint-brush"></i>
            </div>
            <h4>Pinturas</h4>
          </a>

        
          <a href="Biblioteca.html" class="content-card card-vermelho">
            <div class="icon-box">
              <i class="fa fa-book"></i>
            </div>
            <h4>Biblioteca</h4>
          </a>

         
          <a href="Audiovisuais.html" class="content-card card-marrom">
            <div class="icon-box">
              <i class="fa fa-film"></i>
            </div>
            <h4>Audiovisuais</h4>
          </a>

         
          <a href="Personalidades.html" class="content-card card-azul">
            <div class="icon-box">
              <i class="fa-solid fa-person"></i>
            </div><h4>Personalidades</h4>
          </a>

      
          <a href="LinhadoTempo.html" class="content-card card-roxo">
            <div class="icon-box">
              <i class="fa fa-clock"></i>
            </div>

            <h4>
              Linha do Tempo
              <br>
            </h4>

          </a>

           <a href="LinhadoTempo.html" class="content-card card-amarela">
            <div class="icon-box">
              <i class="fa-solid fa-headphones-simple"></i>
            </div>

            <h4>
              Música
              <br>
            </h4>

          </a>

          <a href="Legislacao.html" class="content-card card-vermelho">
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
                <i class="fa fa-phone"></i>
                Ligue para nosso telefone:
                <a href="tel:+5541984748028">
                  41 98474-8028
                </a>
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

        const { error } =
          await supabaseClient
            .from("comentarios")
            .insert([
              {
                nome: nome,
                sobrenome: sobrenome,
                email: email,
                msg: msg
              }
            ]);

        if (error) {

          alert("Erro ao enviar");
          console.log(error);

        } else {

          alert("Mensagem enviada com sucesso! 🚀");

          document
            .getElementById("contact")
            .reset();
        }

      });

  </script>
  <!-- JS -->
  <script src="mainStyle/script.js" defer></script>
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

