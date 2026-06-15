<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

if ($busca === '') {

    $endpoint =
        'fotografias?select=*';

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "fotografias?select=*&or=(titulo.ilike.$busca,autor.ilike.$busca,tags.cs.{{$buscaNaoEncodada}})";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
