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
    curl_close($ch);

    return json_decode($response, true);
}