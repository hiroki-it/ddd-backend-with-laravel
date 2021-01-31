<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SMS Client
    |--------------------------------------------------------------------------
    */

    'sns' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
];
