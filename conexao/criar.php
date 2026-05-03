<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Criar Conta</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }

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
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

            label {
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
                box-shadow: 0 0 0 3px rgba(254,63,64,0.1);
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
                .form{
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
                <form method="post" action="verificador.php">

                    <!-- ***** Logo Start ***** -->
                <div class="logo">
                    <img src="../galeria\assets\images\LogoEst_SF.png">
                    </div>
                    <!-- ***** Logo End ***** -->
                    <label>Digite seu email:</label>
                    <input type="email" name="email_criar" required>

                    <label>Digite sua senha:</label>
                    <input type="password" name="senha_criar" required>

                    <input type="submit" value="Criar conta">
                </form>
                <a href='../index.php'>◃ Voltar ao início..</a>
            </div>
        </div>

    </body>
</html>