<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

if ($busca === '') {

    $endpoint =
        'legislacao?select=*&order=id.asc';

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "legislacao?select=*&or=(titulo.ilike.$busca,norma.ilike.$busca,data.ilike.$busca&order=id.asc";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
