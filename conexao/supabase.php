<?php

function supabaseRequest($endpoint) {
    $url = "https://cdhjzkmlucahtllfpdlx.supabase.co/rest/v1/" . $endpoint;

    $headers = [
        "apikey: sb_publishable_UrRqF6xuKo4rHwfw_zWfHQ_dbhsn4hy",
        "Authorization: Bearer sb_publishable_UrRqF6xuKo4rHwfw_zWfHQ_dbhsn4hy",
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    return json_decode($response, true);
}


function supabasePost($table, $bucket){

    $i = supabaseRequest("$table?select=*");

    require 'conexao/config.php';
    require './composer/vendor/autoload.php';

    $SUPABASE_URL = 'https://cdhjzkmlucahtllfpdlx.supabase.co';
    $API_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc3NTI0ODE3MywiZXhwIjoyMDkwODI0MTczfQ.adPVCz1kuiC0M6Du7axunnXaySAfYV2hy7lpoplCY64'; // ⚠️ use service_role aqui (backend)
    $BUCKET = $bucket;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['imagem'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    if ($file['error'] === 0) {

        $client = new GuzzleHttp\Client();

        // nome único do arquivo
        $fileName = uniqid() . '-' . basename($file['name']);

        // 📦 1. upload para o storage
        $response = $client->post(
        "$SUPABASE_URL/storage/v1/object/$BUCKET/$fileName",
        [
            'headers' => [
            'apikey' => $API_KEY,
            'Authorization' => "Bearer $API_KEY",
            'Content-Type' => $file['type']
            ],
            'body' => fopen($file['tmp_name'], 'r')
        ]
        );

        // 🔗 2. URL pública
        $publicUrl = "$SUPABASE_URL/storage/v1/object/public/$BUCKET/$fileName";

        // 🗄️ 3. inserir no banco
        $dbResponse = $client->post(
        "$SUPABASE_URL/rest/v1/pinturas",
        [
            'headers' => [
            'apikey' => $API_KEY,
            'Authorization' => "Bearer $API_KEY",
            'Content-Type' => 'application/json',
            'Prefer' => 'return=minimal'
            ],
            'json' => [
            'titulo' => $titulo,
            'autor' => $autor,
            'ano' => $ano,
            'url' => $publicUrl
            ]
        ]
        );

        header("Location: Pinturas.php");
        exit;
    }
    }
}

?>
