<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

if ($busca === '') {

    $endpoint =
        'personalidades?select=*';

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "personalidades?select=*&or=(nome.ilike.$busca,prof.ilike.$busca,bio.ilike.$busca)";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
