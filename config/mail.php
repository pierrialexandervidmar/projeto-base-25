<?php

declare(strict_types = 1);

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção controla o mailer padrão que será usado para enviar todas as
    | mensagens de e-mail, a menos que outro mailer seja explicitamente
    | especificado ao enviar a mensagem. Todos os mailers adicionais podem
    | ser configurados dentro do array "mailers". Exemplos de cada tipo
    | de mailer estão disponíveis.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Configurações dos Mailers
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar todos os mailers usados pela sua aplicação
    | juntamente com suas respectivas configurações. Vários exemplos já
    | foram configurados para você, e você está livre para adicionar os seus
    | próprios conforme a necessidade da aplicação.
    |
    | O Laravel suporta diversos drivers de transporte de e-mail que podem ser
    | usados para enviar um e-mail. Você pode especificar qual deles está
    | usando para seus mailers abaixo. Também pode adicionar mailers adicionais
    | se precisar.
    |
    | Suportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |             "postmark", "resend", "log", "array",
    |             "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport'    => 'smtp',
            'scheme'       => env('MAIL_SCHEME'),
            'url'          => env('MAIL_URL'),
            'host'         => env('MAIL_HOST', '127.0.0.1'),
            'port'         => env('MAIL_PORT', 2525),
            'username'     => env('MAIL_USERNAME'),
            'password'     => env('MAIL_PASSWORD'),
            'timeout'      => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path'      => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel'   => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers'   => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers'   => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Endereço Global "From"
    |--------------------------------------------------------------------------
    |
    | Você pode desejar que todos os e-mails enviados pela sua aplicação
    | sejam enviados do mesmo endereço. Aqui você pode especificar um nome
    | e um endereço que serão usados globalmente para todos os e-mails
    | enviados pela sua aplicação.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name'    => env('MAIL_FROM_NAME', 'Example'),
    ],

];
