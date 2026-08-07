<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

if ($busca === '') {

    $endpoint =
        'filmes?select=*&order=titulo.asc';

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "filmes?select=*&or=(titulo.ilike.$busca,tipo.ilike.$busca,desc.ilike.$busca)&order=titulo.asc";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
