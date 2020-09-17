<?php
if (!empty($_SERVER['APP_ENV']) && $_SERVER['APP_ENV'] == 'local') {
    return [
        'SITE_NAME' => 'Syncboat',
        'INFO_EMAIL' => 'ravikumarrajput123@gmail.com',
        'SERVER_URL' => 'http://localhost:8000',
        'FROM_EMAIL' => 'ravikumarrajput123@gmail.com',
        'FROM_NAME' => 'Syncboat'
    ];
} else {
    return [
        'SITE_NAME' => 'Syncboat',
        'INFO_EMAIL' => 'ravikumarrajput123@gmail.com',
        'SERVER_URL' => 'http://localhost:8000',
        'FROM_EMAIL' => 'ravikumarrajput123@gmail.com',
        'FROM_NAME' => 'Syncboat'
    ];
}