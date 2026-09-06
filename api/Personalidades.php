<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');
$colunas = 'id,nome,url,prof,bio,dedicatoria';

if ($busca === '') {

    $endpoint =
        "personalidades?select={$colunas}&order=nome.asc";

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "personalidades?select={$colunas}&or=(nome.ilike.$busca,prof.ilike.$busca,bio.ilike.$busca)&order=nome.asc";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
