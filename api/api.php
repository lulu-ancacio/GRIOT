<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');

if ($busca === '') {

    $endpoint =
        'pinturas?select=*';

} else {

    $busca = urlencode("*{$busca}*");

    $endpoint =
        "pinturas?select=*&or=(titulo.ilike.$busca,autor.ilike.$busca)";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
