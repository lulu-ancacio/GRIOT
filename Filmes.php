<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Filmes GRIOT</title>

    <style>
        body {
            margin: 0;
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            color: white;
        }

        .header {
            padding: 20px 40px;
            font-size: 24px;
            font-weight: bold;
        }

        .section-title {
            margin: 20px 40px;
            font-size: 26px;
        }

        /* LINHA DE FILMES */
        .movie-row {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 20px 40px;
        }

        .movie-row::-webkit-scrollbar {
            display: none;
        }

        /* CARD */
        .movie-card {
            min-width: 250px;
            height: 380px;
            background: #222;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .movie-card:hover {
            transform: scale(1.1);
            z-index: 2;
        }

        /* IMAGEM */
        .movie-card img {
            width: 100%;
            height: 60%;
            object-fit: cover;
        }

        /* INFO */
        .movie-info {
            padding: 15px;
        }

        .movie-info h3 {
            margin: 0 0 10px;
        }

        .movie-info p {
            font-size: 14px;
            color: #ccc;
        }

        /* BOTÕES */
        .buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .buttons button,
        .buttons a {
            background: #e50914;
            border: none;
            padding: 8px 12px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buttons button:hover,
        .buttons a:hover {
            background: #b20710;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            padding-top: 80px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
        }

        .modal-content {
            margin: auto;
            width: 80%;
            max-width: 800px;
        }

        .modal iframe {
            width: 100%;
            height: 450px;
        }

        .close {
            color: white;
            font-size: 30px;
            float: right;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="header">
        
    </div>

    <h2 class="section-title">Filmes</h2>

    <div class="movie-row">

        <!-- FILME 1 -->
        <div class="movie-card">
            <img src="Filme/imagesFilmes/HotelHuanda.jpg" alt="Hotel Rwanda">
            <div class="movie-info">
                <h3>Hotel Rwanda</h3>
                <p>Durante o genocídio em Ruanda, um gerente salva mais de 1.200 pessoas.</p>
                <div class="buttons">
                    <button onclick="openTrailer('https://www.youtube.com/embed/4dd8A_syhVg')">▶ Trailer</button>
                    <a href="https://www.primevideo.com/" target="_blank">Assistir</a>
                </div>
            </div>
        </div>

        <!-- FILME 2 -->
        <div class="movie-card">
            <img src="https://upload.wikimedia.org/wikipedia/pt/3/3b/12_Anos_de_Escravid%C3%A3o_poster.jpg" alt="12 Anos de Escravidão">
            <div class="movie-info">
                <h3>12 Anos de Escravidão</h3>
                <p>Um homem negro livre é sequestrado e vendido como escravo nos EUA.</p>
                <div class="buttons">
                    <button onclick="openTrailer('https://www.youtube.com/embed/z02Ie8wKKRg')">▶ Trailer</button>
                    <a href="#" onclick="return false;">Assistir</a>
                </div>
            </div>
        </div>

        <!-- FILME 3 -->
        <div class="movie-card">
            <img src="Filme\imagesFilmes\PanteraNegra.jpg" alt="Pantera Negra">
            <div class="movie-info">
                <h3>Pantera Negra</h3>
                <p>O rei de Wakanda enfrenta desafios políticos e ameaças globais.</p>
                <div class="buttons">
                    <button onclick="openTrailer('https://www.youtube.com/embed/xjDjIWPwcPU')">▶ Trailer</button>
                    <a href="#" onclick="return false;">Assistir</a>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL -->
    <div id="trailerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTrailer()">&times;</span>
            <iframe id="trailerFrame" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <script>
        function openTrailer(url) {
            document.getElementById("trailerModal").style.display = "block";
            document.getElementById("trailerFrame").src = url;
        }

        function closeTrailer() {
            document.getElementById("trailerModal").style.display = "none";
            document.getElementById("trailerFrame").src = "";
        }
    </script>

</body>

</html>