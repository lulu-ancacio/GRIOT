<?php

function baseUri($endpoint = '') {
    return 'https://cdhjzkmlucahtllfpdlx.supabase.co/auth/v1/' . $endpoint;
}

function getHeader(){
    return [
        'apikey' => 'sb_publishable_UrRqF6xuKo4rHwfw_zWfHQ_dbhsn4hy',
        'Content-Type' => 'application/json'
    ];
}

?>