<?php

require_once "env.php";

function baseUri($endpoint = '')
{
    
    $cleanEndpoint = basename($endpoint);
    return $_ENV['SUPABASE_URL'] . '/auth/v1/' . $cleanEndpoint;
}

function getHeader()
{
    return [
        'apikey' => $_ENV['SUPABASE_DEFAULT_KEY'],
        'Content-Type' => 'application/json'
    ];
}

function supabaseRequest($endpoint)
{
  
    $cleanEndpoint = basename($endpoint);
    $url = $_ENV['SUPABASE_URL'] . '/rest/v1/' . $cleanEndpoint;

    $headers = [
       "apikey: " . $_ENV['SUPABASE_DEFAULT_KEY'],
        "Authorization: Bearer " . $_ENV['SUPABASE_DEFAULT_KEY'],
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function supabaseCreatePhotoPainting($bucket, $table)
{
    require_once './composer/vendor/autoload.php';

   
    $url = $_ENV['SUPABASE_URL'];
    $api_key = $_ENV['SUPABASE_SERVICE_ROLE'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $file = $_FILES['imagem'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];

        if ($file['error'] === 0) {

            $client = new GuzzleHttp\Client();

            $extension = preg_replace('/[^a-zA-Z0-9]/', '', pathinfo($file['name'], PATHINFO_EXTENSION));
            $fileName = uniqid('img_', true) . '.' . $extension;

           
            $client->post(
                "$url/storage/v1/object/$bucket/$fileName",
                [
                    'headers' => [
                        'apikey' => $api_key,
                        'Authorization' => "Bearer $api_key",
                        'Content-Type' => $file['type']
                    ],
                    'body' => fopen($file['tmp_name'], 'r')
                ]
            );

           
            $publicUrl = "$url/storage/v1/object/public/$bucket/$fileName";

            
            $client->post(
                "$url/rest/v1/$table",
                [
                    'headers' => [
                        'apikey' => $api_key,
                        'Authorization' => "Bearer $api_key",
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
            echo "<script>alert('Mídia submetida!');</script>";
        }
    }
}

function supabaseCreateFilm($table)
{
    require_once './composer/vendor/autoload.php';
    $url = $_ENV['SUPABASE_URL'];
    $api_key = $_ENV['SUPABASE_SERVICE_ROLE'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $file = $_FILES['imagem'];
        $link = $_POST['link'];
        $titulo = $_POST['titulo'];
        $desc = $_POST['desc'];
        $tipomidia = $_POST['tipomidia'];
        
        $tiposPermitidos = [
            'Curtas',
            'Filmes',
            'Desenhos',
            'Documentarios',
            'Series',
            'Biografias',
            'Clipes'
        ];
        
        if (!in_array($tipomidia, $tiposPermitidos)) {
            die('Tipo de mídia inválido.');
        }
        
       
        $bucket = 'Filmes/' . basename($tipomidia);

        if ($file['error'] === 0) {

            $client = new GuzzleHttp\Client();

            $extension = preg_replace('/[^a-zA-Z0-9]/', '', pathinfo($file['name'], PATHINFO_EXTENSION));
            $fileName = uniqid('mov_', true) . '.' . $extension;

           
            $client->post(
                "$url/storage/v1/object/$bucket/$fileName",
                [
                    'headers' => [
                        'apikey' => $api_key,
                        'Authorization' => "Bearer $api_key",
                        'Content-Type' => $file['type']
                    ],
                    'body' => fopen($file['tmp_name'], 'r')
                ]
            );

          
            $publicUrl = "$url/storage/v1/object/public/$bucket/$fileName";

          
            $client->post(
                "$url/rest/v1/$table",
                [
                    'headers' => [
                        'apikey' => $api_key,
                        'Authorization' => "Bearer $api_key",
                        'Content-Type' => 'application/json',
                        'Prefer' => 'return=minimal'
                    ],
                    'json' => [
                        'titulo' => $titulo,
                        'desc' => $desc,
                        'link' => $link,
                        'url' => $publicUrl,
                        'tipo' => $tipomidia
                    ]
                ]
            );
            echo "<script>alert('Mídia submetida!');</script>";
        }
    }
}

function getUserAdm($user_id, $token)
{
    require_once '../composer/vendor/autoload.php';
    $client = new GuzzleHttp\Client();

    $url = $_ENV['SUPABASE_URL'];
    $url = $url . '/rest/v1/usuarios?id_usuario=eq.' . urlencode($user_id);
    
    try {
        $response = $client->get($url, [
            'headers' => [
                'apikey' => $_ENV['SUPABASE_SERVICE_ROLE'],
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $data = json_decode($response->getBody());

        if (!empty($data) && isset($data[0]->adm)) {
            return (bool)$data[0]->adm;
        }

        return false;
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
        exit;
    }
}
