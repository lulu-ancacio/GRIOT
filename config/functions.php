<?php

require_once "env.php";

function baseUri($endpoint = '')
{
    $q = $_ENV['SUPABASE_URL'] . '/auth/v1/' . $endpoint;
    $q = urldecode($q);
    return $q;
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
    $url = $_ENV['SUPABASE_URL'] . '/rest/v1/' . $endpoint;

    $headers = [
        "apikey: sb_publishable_UrRqF6xuKo4rHwfw_zWfHQ_dbhsn4hy",
        "Authorization: Bearer " . $_ENV['SUPABASE_DEFAULT_KEY'],
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    return json_decode($response, true);
}

function supabaseCreatePhotoPainting($bucket, $table)
{
    require_once './composer/vendor/autoload.php';

    $url = $_ENV['SUPABASE_URL'];
    $url = urlencode($url);
    $api_key = $_ENV['SUPABASE_SERVICE_ROLE'];
    $bucket;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $file = $_FILES['imagem'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];

        if ($file['error'] === 0) {

            $client = new GuzzleHttp\Client();

            // nome único do arquivo
            $fileName = uniqid() . '-' . basename($file['name']);

            // 1. upload para o storage
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


            // 2. URL pública
            $publicUrl = "$url/storage/v1/object/public/$bucket/$fileName";

            // 3. inserir no banco
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
    $url = urlencode($url);
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
        $bucket = 'Filmes/' . $tipomidia;

        if ($file['error'] === 0) {

            $client = new GuzzleHttp\Client();

            // nome único do arquivo
            $fileName = uniqid() . '-' . basename($file['name']);

            // 📦 1. upload para o storage
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

            // 🔗 2. URL pública
            $publicUrl = "$url/storage/v1/object/public/$bucket/$fileName";

            // 🗄️ 3. inserir no banco
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
    $url = $url . '/rest/v1/usuarios?id_usuario=eq.' . $user_id;
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
