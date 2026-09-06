<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

$colunas = 'id,url,autor,titulo,ano,link,cc0';

if ($busca === '') {

    $endpoint =
        "livros?select={$colunas}&order=titulo.asc";

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "livros?select={$colunas}&or=(titulo.ilike.$busca,autor.ilike.$busca)&order=titulo.asc";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
