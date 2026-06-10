<?php

require_once '../config/functions.php';


$filtro = "fotografias?select=*";
$quadros = supabaseRequest($filtro);
$quadros = json_encode($quadros, JSON_PRETTY_PRINT);

#echo '<pre>'. $quadros .'</pre>';

return $quadros;
