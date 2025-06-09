<?php

declare(strict_types = 1);

return [

    /*
    |--------------------------------------------------------------------------
    | Serviços de Terceiros
    |--------------------------------------------------------------------------
    |
    | Este arquivo é utilizado para armazenar as credenciais de serviços de
    | terceiros como Mailgun, Postmark, AWS e outros. Ele serve como local
    | padrão para esse tipo de informação, permitindo que pacotes tenham
    | um arquivo convencional para localizar essas credenciais de serviço.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel'              => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
