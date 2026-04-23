<?php

require_once("config.php");

function verificar_usuario($email, $senha)
{
    global $mysqli;

    $consulta = $mysqli->prepare("SELECT ID_Usuario, senha FROM usuarios WHERE email = ?");
    $consulta->bind_param("s", $email);
    $consulta->execute();
    $resultado = $consulta->get_result();
    $dados = $resultado->fetch_assoc();
    $consulta->close();

    if (!$dados) {
        return false; // email não encontrado
    }

    $hash = $dados['senha'];

    if (password_verify($senha, $hash)) {
        // guarda o ID do usuário na sessão
        $_SESSION['id'] = $dados['ID_Usuario'];
        return true;
    } else {
        return false;
    }
}

function verificar_sessao()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }
}

function criar_usuario($nome, $email, $senha)
{
    $context = stream_context_create([
        "ssl" => [
            "verify_peer"      => false,
            "verify_peer_name" => false
        ]
    ]);
    $json = file_get_contents('https://www.disify.com/api/email/'.$email, false, $context);
    $dados = json_decode($json, true);
    if ($dados['disposable']) {
        header('Location: criar.php');
        exit;
    } else {
        global $mysqli;
        if (strlen($nome) > 0 && strlen($email) > 0 && strlen($senha) > 0) {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $consulta = $mysqli->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (?,?,?)");
            $consulta->bind_param("sss", $nome, $email, $hash);
            $consulta->execute();
            $consulta->close();
        } else {
            header('Location: criar.php');
            exit;
        }
    }
}
