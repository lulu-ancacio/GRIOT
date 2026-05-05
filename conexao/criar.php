<?php

use GuzzleHttp\Exception\GuzzleException;

require 'config.php';
require '../composer/vendor/autoload.php';
$msg = '';

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' and
    isset($_POST['nome_criar']) and
    isset($_POST['email_criar']) and
    isset($_POST['senha_criar']) and
    isset($_POST['nome_criar']) and
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
        'display_name'=> $nome,
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
        } elseif (isset($data['error'])) {
            $msg = 'Usuário já cadastrado!';
        } else {
            $msg = 'Erro no cadastro!';
        }
    } catch (GuzzleHttp\Exception\RequestException $e) {
        if ($e->hasResponse()) {
            $msg = 'Usuário já cadastrado';
        } else {
            header('Location: ./login.php');
            exit;
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

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #fe3f40;
            box-shadow: 0 0 0 3px rgba(254, 63, 64, 0.1);
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #fe3f40;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 24px;
        }

        input[type="submit"]:hover {
            background-color: #e6393b;
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
</head>

<body>

    <div class="container">

        <div class="imagem">
            <img src="../galeria/assets/images/FotoPrincipal.jpg" alt="Dureg">
        </div>


        <div class="form">
            <form method="post">

                <!-- ***** Logo Start ***** -->
                <div class="logo">
                    <img src="../galeria\assets\images\LogoEst_SF.png">
                </div>
                <p><?php echo $msg ?></p>
                <!-- ***** Logo End ***** -->

                <label>Como devemos te chamar?</label>
                <input type="text" name="nome_criar" required>

                <label>Digite seu email:</label>
                <input type="email" name="email_criar" required>

                <label>Com que pronome você prefere ser tratado?</label>
                <select name="pronome_criar" required="required">
                    <option value="fem">Feminino</option>
                    <option value="masc">Masculio</option>
                    <option value="nd">Nenhum</option>
                </select>

                <label>Digite sua senha:</label>
                <input type="password" name="senha_criar" required>

                <label>Selecione seu gênero:</label>
                <select name="genero_criar" required>
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>

                <input type="submit" value="Criar conta">

            </form>
            <a href='../index.php'>◃ Voltar ao início..</a>
        </div>
    </div>

</body>

</html>