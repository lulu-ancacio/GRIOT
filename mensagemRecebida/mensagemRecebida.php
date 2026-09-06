<?php
if (empty($_SESSION['adm'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Museu virtual com tematica racial">
  <meta name="author" content="">
  <meta charset="UTF-8">
  <link rel="icon" href="../galeria/assets/images/FavIcon_SF.png">
  <link rel="stylesheet" href="../mainStyle/assets/fonts/poppins.css">

  <title>GRIOT - Controle de Sugestões</title>

  <script src="../Supabase/supabase.min.js"></script>

  <link rel="stylesheet" href="../mainStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../mainStyle/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../mainStyle/assets/css/templatemo-space-dynamic.css">
  <link rel="stylesheet" href="style.css">


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
            <li><a href="../galeria/Fotografias.html">Fotografias</a></li>
            <li><a href="../biblioteca/Biblioteca.html">Acervo Literário</a></li>
            <li><a href="../Filmes/Audiovisuais.html">Audiovisuais</a></li>
            <li><a href="../galeria/Pinturas.html">Pinturas</a></li>
            <li><a href="../LinhaDoTempo/LinhadoTempo.html">Linha do Tempo</a></li>
            <li><a href="../personalidades/Personalidades.html">Personalidades</a></li>
            <li><a href="../musica/Musica.html">Músicas</a></li>
          </ul>
        </div>
        <div class="logo">
          <a href="../index.php">
            <img src="../mainStyle/assets/images/LogoEst_SF.png"
              alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
          </a>
        </div>
        <div class="right-menu">
          <a href="../index.php" class="main-red-button">Início</a>
        </div>
      </nav>
    </div>
  </header>

  <section class="banner">
    <h1>Painel Administrativo</h1>
    <p>Gerencie o conteúdo do Museu Virtual GRIOT</p>
    <div class="user-badge">
      👤
      <?= htmlspecialchars($_SESSION['email'] ?? 'Administrador') ?>
    </div>
  </section>

  <main class="container">
    <a href="../adm/adm.php">
      <div class="icon-box">
        <i class="fa-solid fa-arrow-left"></i>
      </div>
    </a>
    <h2 class="section-title">Controle de Sugestões</h2>

    <section class="comments-section" style="padding: 60px 0;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="lista"></div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Trabalho de Conclusão de Curso apresentado ao curso técnico em Informática - IFPR Pinhais</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    const supabaseUrl = "https://cdhjzkmlucahtllfpdlx.supabase.co";
    const supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g";


    if (typeof supabase === 'undefined') {
      console.error(" Erro: Script do Supabase não carregou! Verifique o caminho de 'Supabase/supabase.min.js'");
    }

    const supabaseClient = supabase.createClient(supabaseUrl, supabaseKey);

    async function carregarComentarios() {
      console.log(" Carregando comentários do Supabase...");

      const {
        data,
        error
      } = await supabaseClient
        .from("comentarios")
        .select("*")
        .order("id", {
          ascending: false
        });

      if (error) {
        console.error(" Erro ao carregar dados:", error);
        document.getElementById("lista").innerHTML =
          "<p style='color:red; padding:20px;'>Erro ao carregar sugestões. Verifique o console (F12).</p>";
        return;
      }

      const lista = document.getElementById("lista");
      lista.innerHTML = "";

      if (data && data.length > 0) {
        console.log(`✅ ${data.length} comentário(s) carregado(s)`);

        data.forEach(item => {
          const div = document.createElement("div");
          div.classList.add("card");


          if (item.visto) {
            div.classList.add("visto");
          }

          const assunto = encodeURIComponent("Resposta ao seu comentário - Equipe GRIOT");
          const mensagem = encodeURIComponent(
            `Olá ${item.nome},\n\nRecebemos sua sugestão:\n\n"${item.msg}"\n\nResposta:\n`
          );


          const badgeStatus = item.visto ?
            '<span class="status-badge status-lido">Lido</span>' :
            '<span class="status-badge status-novo">Novo</span>';

          div.innerHTML = `
                    <h3>
                        ${item.nome} ${item.sobrenome || ''} ${badgeStatus}
                    </h3>
                    
                    <p><strong>Email: ${item.email} </strong></p>
                    <p>${item.msg}</p>
                    <p>
                        <strong>Data:</strong>
                        ${new Intl.DateTimeFormat('pt-BR').format(new Date(item.criado_em))}
                    </p>
                      <button
                      class="btn-email"
                      onclick="event.stopPropagation(); window.location.href='mailto:${item.email}?subject=${assunto}&body=${mensagem}'">
                      Responder por email
                  </button>
                `;


          div.addEventListener("click", async (e) => {
            if (e.target.tagName === 'A' || e.target.closest('a')) {
              return;
            }


            if (item.visto) {
              console.log("Card já marcado como lido");
              return;
            }

            console.log(` Marcando comentário #${item.id} como lido...`);

            const {
              data: updateData,
              error: updateError
            } = await supabaseClient
              .from("comentarios")
              .update({
                visto: true
              })
              .eq("id", item.id)
              .select();

            if (updateError) {
              console.error("Erro ao atualizar no Supabase:", updateError);
              alert(" Não foi possível salvar a marcação como lido. Verifique as permissões no Supabase.");
            } else {
              console.log(" Atualização realizada com sucesso!", updateData);


              div.classList.add("visto");
              div.querySelector('.status-novo')?.remove();
              div.querySelector('h3').insertAdjacentHTML('beforeend',
                '<span class="status-badge status-lido">Lido</span>');


              item.visto = true;
            }
          });

          lista.appendChild(div);
        });
      } else {
        lista.innerHTML = "<p style='padding:20px; text-align:center;'> Nenhuma sugestão recebida ainda.</p>";
      }
    }


    document.addEventListener("DOMContentLoaded", () => {
      carregarComentarios();

      setTimeout(() => {
        const preloader = document.getElementById('js-preloader');
        if (preloader) preloader.style.display = 'none';
      }, 500);
    });
  </script>
  <script src="../mainStyle/script.js"></script>
</body>

</html>
