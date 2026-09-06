<?php

require_once '../config/functions.php';

header('Content-Type: application/json; charset=utf-8');

$endpoint = 'termos_uso?select=*&order=autor.asc';
$dados = supabaseRequest($endpoint);

echo json_encode(
    $dados,
    JSON_UNESCAPED_UNICODE
);
