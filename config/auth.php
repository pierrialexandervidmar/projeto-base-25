<?php

declare(strict_types = 1);

return [

    /*
    |--------------------------------------------------------------------------
    | Padrões de Autenticação
    |--------------------------------------------------------------------------
    |
    | Esta opção define o "guard" de autenticação padrão e o "broker" de
    | redefinição de senha para sua aplicação. Você pode alterar esses valores
    | conforme necessário, mas são um bom ponto de partida para a maioria das aplicações.
    |
    */

    'defaults' => [
        'guard'     => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards de Autenticação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todos os guards de autenticação para sua aplicação.
    | Uma configuração padrão já foi definida para você, utilizando armazenamento
    | de sessão e o provider de usuários baseado em Eloquent.
    |
    | Todos os guards de autenticação têm um provider de usuários, que define como
    | os usuários serão recuperados do banco de dados ou outro sistema de armazenamento
    | utilizado pela aplicação. Normalmente, o Eloquent é usado.
    |
    | Suportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Providers de Usuários
    |--------------------------------------------------------------------------
    |
    | Todos os guards de autenticação têm um provider de usuários, que define como
    | os usuários são realmente recuperados do banco de dados ou outro sistema
    | de armazenamento utilizado pela aplicação. Normalmente, o Eloquent é usado.
    |
    | Se você tiver múltiplas tabelas ou modelos de usuários, pode configurar múltiplos
    | providers para representar cada modelo/tabela. Esses providers podem então
    | ser atribuídos a quaisquer guards de autenticação adicionais que você definir.
    |
    | Suportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model'  => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redefinição de Senhas
    |--------------------------------------------------------------------------
    |
    | Estas opções de configuração especificam o comportamento da funcionalidade
    | de redefinição de senha do Laravel, incluindo a tabela utilizada para armazenar
    | os tokens e o provider de usuários que será chamado para recuperá-los.
    |
    | O tempo de expiração define o número de minutos que cada token de redefinição
    | será considerado válido. Essa é uma medida de segurança para manter os tokens
    | com tempo de vida curto e dificultar sua adivinhação.
    |
    | A configuração "throttle" define o número de segundos que o usuário deve esperar
    | antes de gerar novos tokens de redefinição de senha, prevenindo abusos.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table'    => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tempo de Expiração da Confirmação de Senha
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir o número de segundos antes que a confirmação de senha
    | expire e os usuários precisem digitar novamente a senha na tela de confirmação.
    | Por padrão, essa confirmação dura três horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
