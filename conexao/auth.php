<?php
require 'E:/xampp/htdocs/GRIOT/composer/vendor/autoload.php';

function getUserAdm($user_id, $token) {
    $client = new GuzzleHttp\Client();

    $url = 'https://cdhjzkmlucahtllfpdlx.supabase.co/rest/v1/usuarios?id_usuario=eq.' . $user_id;

    try {
        $response = $client->get($url, [
            'headers' => [
                'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImNkaGp6a21sdWNhaHRsbGZwZGx4Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzUyNDgxNzMsImV4cCI6MjA5MDgyNDE3M30.ZaP_y-A2t32z8FRT4vAA8xsMqjhsdA0QuQIGTP5f36g',
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


?>