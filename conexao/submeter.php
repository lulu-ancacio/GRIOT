<?php
session_start();
require_once("config.php");

function submeter($id_usuario, $titulo, $imagem, $descricao, $autor, $ano){
    global $mysqli;
    if (strlen($titulo)>0 && strlen($descricao)>0 && strlen($autor)>0 && 0<$ano && isset($imagem)){
        $consulta = $mysqli->prepare("INSERT INTO quadros (ID_Usuario, imagem, autor, ano_obra, titulo, descricao) VALUES (?,?,?,?,?,?)");
        $null = null;
        $consulta->bind_param("ibsiss", $id_usuario, $null, $autor, $ano, $titulo, $descricao);
        $consulta->send_long_data(1, $imagem);
        $consulta->execute();
        $consulta->close();
    }
    header('Location:../adm.php');
}

$id_usuario = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'
 ) {
    $titulo = $_POST['titulo'];
    $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    $descricao = $_POST['descricao'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    submeter($id_usuario,$titulo, $imagem, $descricao, $autor, $ano);
    exit;
} 
?>
