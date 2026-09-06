<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$busca = trim($_GET['q'] ?? '');
$colunas = 'id,url,autor,titulo,ano,tags';

if ($busca === '') {

    $endpoint =
        "pinturas?select={$colunas}&order=autor.asc";

} else {

    $buscaNaoEncodada = $busca;
    $busca = urlencode("*{$busca}*");

    $endpoint =
        "pinturas?select={$colunas}&or=(titulo.ilike.$busca,autor.ilike.$busca,tags.cs.{{$buscaNaoEncodada}})&order=autor.asc";
}

$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
