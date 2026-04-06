<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pinturas GRIOT">
    <meta name="author" content="Lucas Ancacio e Maria Eduarda Gomes">

    <title>Filmes GRIOT</title>

    <link rel="icon" href="galeria\assets\images\FavIcon_SF.png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="galeria/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="galeria/assets/css/fontawesome.css">

    <link rel="stylesheet" href="galeria/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="galeria/assets/css/animated.css">
    <link rel="stylesheet" href="galeria/assets/css/owl.css">

    <link rel="stylesheet" type="text/css" href="Filme/css/styleFilme.css" />
    <link rel="stylesheet" type="text/css" href="Filme/css/jquery.jscrollpaneFilme.css" media="all" />

    <link rel="stylesheet" href="galeria/css/lc_lightbox.css" />
    <link rel="stylesheet" href="galeria/skins/minimal.css" />

    <style type="text/css">
        .lcl_fade_oc.lcl_pre_show #lcl_overlay,
        .lcl_fade_oc.lcl_pre_show #lcl_window,
        .lcl_fade_oc.lcl_is_closing #lcl_overlay,
        .lcl_fade_oc.lcl_is_closing #lcl_window {
            opacity: 0 !important;
        }

        .lcl_fade_oc.lcl_is_closing #lcl_overlay {
            -webkit-transition-delay: .15s !important;
            transition-delay: .15s !important;
        }

        .ca-container {
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <div class="logo">
                            <a href="index.php">
                                <img src="galeria/assets/images/LogoEst_SF.png" alt="Logo GRIOT">
                            </a>
                        </div>

                        <ul class="nav">
                            <li class="scroll-to-section">
                                <a href="Index.php" class="main-red-button">Início</a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <h2>Galeria <em>de Filmes</em> <span>GRIOT!</span></h2>
                                <p>A galeria de pinturas do GRIOT apresenta um conjunto de obras que expressam a
                                    profundidade da cultura afro-brasileira e as múltiplas dimensões da experiência
                                    negra.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="galeria/assets/images/Filmes.jpg" alt="Pintura GRIOT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="ca-container" class="ca-container">
            <div class="ca-wrapper">

                <div class="ca-item">
                    <div class="ca-item-main">
                        <img src="Filme/imagesFilmes/HotelHuanda.jpg" alt="Filme 1">
                        <div class="ca-more-wrap"><a class="ca-more" href="#">Ver Detalhes</a></div>
                    </div>
                    <div class="ca-content-wrapper">
                        <div class="ca-content">
                            <h6>Hotel Rwuanda</h6>
                            <a href="#" class="ca-close"><i class="fa fa-times"></i></a>
                            <div class="ca-content-text">
                                <p>Durante os conflitos políticos entre hutus e tutsis que mataram quase
                                    um milhão de ruandenses em 1994, Paul Rusesabagina, gerente do Hotel des
                                    Milles Collines, na capital do país,
                                    toma a decisão corajosa de abrigar sozinho mais de 1.200 refugiados.</p>
                            </div>
                            <ul>
                                <li><a href="https://www.primevideo.com/dp/amzn1.dv.gti.eeb75a41-ab07-6920-07d4-756d711e4c45?autoplay=0&ref_=atv_cf_strg_wb"
                                        target="_blank">
                                        Assistir </a>
                                <li><a href="#">Trailer</a></li>
                                <li><a href="#">Ler Mais</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="galeria/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="galeria/assets/js/owl-carousel.js"></script>
    <script src="galeria/assets/js/templatemo-custom.js"></script>

    <script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="Filme/js/jquery.easing.1.3Filme.js"></script>
    <script src="Filme/js/jquery.mousewheelFilme.js"></script>
    <script src="Filme/js/jquery.contentcarouselFilme.js"></script>

    <script src="galeria/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>
    <script src="galeria/js/lc_lightbox.lite.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $('#ca-container').contentcarousel({
                sliderSpeed: 600,
                sliderEasing: 'easeOutExpo',
                itemSpeed: 500,
                itemEasing: 'easeOutExpo',
                scroll: 1
            });
        });
    </script>

</body>

</html>