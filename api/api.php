<?php

require_once '../config/functions.php';


$filtro = "fotografias?select=*";
$quadros = supabaseRequest($filtro);
echo json_encode($quadros, JSON_UNESCAPED_UNICODE);

