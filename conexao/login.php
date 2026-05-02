<?php
require 'verificador.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar sua conta</title>

    <style>
        .body
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         .container {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }
        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
  
        .imagem {
            flex: 1;
            min-height: 500px;
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
            margin-bottom: 24px;
            color: #2c3e50;
            font-size: 26px;
        }
        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #34495e;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #fe3f40;
            box-shadow: 0 0 0 3px rgba(254, 63, 64, 0.2);
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
            transition: all 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #e6393b;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(254, 63, 64, 0.3);
        }

        /* Link de cadastro */
        .cadastro-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            text-decoration: none;
            color: #fe3f40;
            font-weight: 600;
            font-size: 15px;
        }

        .cadastro-link:hover {
            text-decoration: underline;
        }
        a {
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #3498db;
    font-weight: 600;
}

a:hover {
    text-decoration: underline;
}

   
/* Responsivo: empilha no celular */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .imagem {
                min-height: 280px;
            }

            .form {
                padding: 40px 25px;
            }

            .form img {
                width: 150px;
            }

            h2 {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .form {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>


    <div class= "container">
         <div class="imagem">
            <img src="../galeria/assets/images/FotoPrincipal2.jpg" alt="Dureg">
    </div>

    <form method="post" action="verificador.php" class="form">
        <p><?php echo $msg ?></p>

    <!-- ***** Logo Start ***** -->
        <div class="logo">
            <img src="../galeria\assets\images\LogoEst_SF.png">
        </div>
    <!-- ***** Logo End ***** -->

        <label for="email_login">Digite seu e-mail</label>
        <input type="email" id="email_login" name="email_login" required autocomplete="email">

        <label for="senha_login">Digite sua senha</label>
        <input type="password" id="senha_login" name="senha_login" required autocomplete="current-password">

        <input type="submit" value="Entrar no Griot">
       <a href='./criar.php'>Não tenho uma conta.</a>
       <a href='../index.php'>◃ Voltar ao início..</a>

    </form>
</div>

</body>
</html>