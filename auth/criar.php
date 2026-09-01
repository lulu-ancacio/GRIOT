<?php

use GuzzleHttp\Exception\GuzzleException;

require_once '../config/functions.php';
require_once '../composer/vendor/autoload.php';
$msg = '';

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['nome_criar']) &&
    isset($_POST['email_criar']) &&
    isset($_POST['senha_criar']) &&
    isset($_POST['pronome_criar'])
) {


    $email = $_POST['email_criar'];
    $senha = $_POST['senha_criar'];
    $nome = $_POST['nome_criar'];
    $pronome = $_POST['pronome_criar'];

    $client = new GuzzleHttp\Client();

    $body = [
        'email' => $email,
        'password' => $senha,

        'data' => [
            'nome' => $nome,
            'pronome' => $pronome
        ]
    ];

    try {
        $response = $client->post(
            baseUri('signup'),
            [
                'headers' => getHeader(),
                'json' => $body
            ]
        );

        $data = json_decode($response->getBody(), true);


        if (isset($data['user'])) {

            $msg = 'Usuário criado com sucesso!';
        } else {

            $msg = 'Erro inesperado no cadastro.';
        }
    } catch (GuzzleHttp\Exception\RequestException $e) {

        if ($e->hasResponse()) {

            $erro = json_decode(
                $e->getResponse()->getBody()->getContents(),
                true
            );


            if (
                isset($erro['msg']) &&
                str_contains(strtolower($erro['msg']), 'already registered')
            ) {

                $msg = 'Usuário já cadastrado!';
            } else {

                $msg = $erro['msg'] ?? 'Erro no cadastro.';
            }
        } else {

            $msg = 'Erro de conexão com o servidor.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }


        .container {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }


        .imagem {
            flex: 1;
            min-height: 350px;
        }

        .imagem img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        .form {
            flex: 1;
            padding: 40px;
            min-width: 320px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label,
        p {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #34495e;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }


        input[type="submit"] {
            width: 100%;
            display: inline-block;
            border: none;
            background: #03a4ed;
            color: #fff;
            padding: 16px 35px;
            border-radius: 999px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 25px;
        }

        input[type="submit"]:hover {
            background: #fe3f40;
            transform: translateY(-3px);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #fe3f40;
            text-decoration: none;
            font-weight: 600;
        }


        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .imagem {
                min-height: 250px;
            }

            .form {
                padding: 30px 20px;
            }
        }
    </style>

    <!-- FAVICON -->
    <link rel="icon" href="mainStyle/assets/images/FavIcon_SF.png">
    <!-- FONTES -->
    <link rel="stylesheet" href="mainStyle/assets/fonts/poppins.css">
</head>

<body>

    <div class="container">

        <div class="imagem">
            <img src="../mainStyle/assets/images/FotoPrincipal.jpg" alt="Dureg">
        </div>


        <div class="form">
            <form method="post">


                <div class="logo">
                    <a href="../index.php" class="logo">
                        <img src="../mainStyle/assets/images/LogoEst_SF.png"
                            alt="Logotipo do projeto GRIOT com tipografia colorida e ícone de ave estilizada, com o subtítulo Memória e História Afro-Brasileira">
                    </a>
                </div>
                <p><?php echo $msg ?></p>


                <label for="nome_criar">Como devemos te chamar?</label>
                <input id="nome_criar" type="text" name="nome_criar" required>

                <label for="email_criar">Digite seu email:</label>
                <input id="email_criar" type="email" name="email_criar" required>

                <label for="pronome_criar">Selecione seu pronome:</label>
                <select id="pronome_criar" name="pronome_criar" required="required">
                    <option value="F">Ela/Dela</option>
                    <option value="M">Ele/Dele</option>
                    <option value="N">Nenhum</option>
                </select>

                <label for="senha_criar">Digite sua senha:</label>
                <input id="senha_criar" type="password" name="senha_criar" required>

                <input type="submit" value="Criar conta">

            </form>
            <a href='../index.php'>◃ Voltar ao início..</a>
        </div>
    </div>

    <!-- VLibras Atualizadp -->
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


</body>

</html>
