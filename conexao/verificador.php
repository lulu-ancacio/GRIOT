<?php

    use GuzzleHttp\Exception\GuzzleException;

    session_start();
    require 'config.php';
    require 'E:/xampp/htdocs/GRIOT/composer/vendor/autoload.php';
    $msg = '';

    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' and
        isset($_POST['email_criar']) and
        isset($_POST['senha_criar'])
    ) {

        //Para criação de usuários
        $email = $_POST['email_criar'];
        $senha = $_POST['senha_criar'];

        $client = new GuzzleHttp\Client();

        $body = [
            'email' => $email,
            'password' => $senha
        ];

        try {
            $response = $client->post(
                baseUri('signup'),
                [
                    'headers' => getHeader(),
                    'body'    => json_encode($body)
                ]
            );
            $data = json_decode($response->getBody());
            if (isset($data->id)) {
                $msg = 'Usuário ' . $data->email . ' criado com sucesso!';
            } else {
                $msg = 'Erro criar usuário!';
            }
        } catch (GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                echo $e->getResponse()->getBody();
                exit;
            } else {
                echo $e->getMessage();
                header('Location: ./login.php');
                exit;
            }
        }
    }
?>