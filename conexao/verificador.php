<?php
session_start();
require_once('seguranca.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['nome_criar']) and isset($_POST['email_criar']) and isset($_POST['senha_criar'])){
    //Para criação de usuários
    $nome = $_POST['nome_criar'];
    $email = $_POST['email_criar'];
    $senha = $_POST['senha_criar'];
    criar_usuario($nome, $email, $senha);
    header('Location: login.php');
    exit;
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['email_login']) and isset($_POST['senha_login'])){
        //Para login de usuários
        $email = $_POST['email_login'];
        $senha = $_POST['senha_login'];
        if (verificar_usuario($email, $senha)){
            session_regenerate_id(true);
            header('Location: ../adm.php');
            exit;
        } else {
            header('Location: login.php'); 
            exit;
        };
    } else {
        header('Location: login.php');
        
    }
}

?>
