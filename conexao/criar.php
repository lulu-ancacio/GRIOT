<?php

use GuzzleHttp\Exception\GuzzleException;

require_once 'config.php';
require_once '../composer/vendor/autoload.php';
$msg = '';

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['nome_criar']) &&
    isset($_POST['email_criar']) &&
    isset($_POST['senha_criar']) &&
    isset($_POST['nome_criar']) &&
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
  <link rel="icon" href="meanStyle/assets/images/FavIcon_SF.png">
    <!-- FONTES -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
  rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="imagem">
            <img src="../meanStyle/assets/images/FotoPrincipal.jpg" alt="Dureg">
        </div>


        <div class="form">
            <form method="post">

                <!-- ***** Logo Start ***** -->
                <div class="logo">
                    <a href="../index.php" class="logo">
                      <img src="../meanStyle/assets/images/LogoEst_SF.png" alt="Logo GRIOT">
                 </a>
                </div>
                <p><?php echo $msg ?></p>
                <!-- ***** Logo End ***** -->

                <label for="nome_criar">Como devemos te chamar?</label>
                <input id="nome_criar" type="text" name="nome_criar" required>

                <label for ="email_criar">Digite seu email:</label>
                <input id = "nome_criar "type="email" name="email_criar" required>

                <label for = "pronome_criar">Com que pronome você prefere ser tratado?</label>
                <select name="pronome_criar" required="required">
                    <option value="fem">Ela/Dela</option>
                    <option value="masc">Ele/Dele</option>
                    <option value="nd">Nenhum</option>
                </select>

                <label for = "senha_criar">Digite sua senha:</label>
                <input type="password" name="senha_criar" required>

                <label for = "genero_criar">Selecione seu gênero:</label>
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
      <!-- VLibras -->
<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

<script>
  new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>


</body>

</html>
