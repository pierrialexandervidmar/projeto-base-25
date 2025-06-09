<?php

declare(strict_types = 1);

return [

    'enabled' => env('AUDITING_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Implementação da Auditoria
    |--------------------------------------------------------------------------
    |
    | Define qual implementação do modelo de Auditoria deve ser usada.
    |
    */
    'implementation' => OwenIt\Auditing\Models\Audit::class,

    /*
    |--------------------------------------------------------------------------
    | Prefixo de Morph e Guards do Usuário
    |--------------------------------------------------------------------------
    |
    | Define o prefixo do relacionamento morph e os guards de autenticação
    | para o resolvedor de usuário.
    |
    */
    'user' => [
        'morph_prefix' => 'user',
        'guards'       => [
            'web',
            'api',
        ],
        'resolver' => OwenIt\Auditing\Resolvers\UserResolver::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resolvedores de Auditoria
    |--------------------------------------------------------------------------
    |
    | Define as implementações responsáveis por resolver o endereço IP,
    | o agente do usuário e a URL.
    |
    */
    'resolvers' => [
        'ip_address' => OwenIt\Auditing\Resolvers\IpAddressResolver::class,
        'user_agent' => OwenIt\Auditing\Resolvers\UserAgentResolver::class,
        'url'        => OwenIt\Auditing\Resolvers\UrlResolver::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Eventos da Auditoria
    |--------------------------------------------------------------------------
    |
    | Eventos do Eloquent que disparam a criação de uma auditoria.
    |
    */
    'events' => [
        'created',
        'updated',
        'deleted',
        'restored',
    ],

    /*
    |--------------------------------------------------------------------------
    | Modo Estrito
    |--------------------------------------------------------------------------
    |
    | Ativar o modo estrito na auditoria?
    |
    */
    'strict' => false,

    /*
    |--------------------------------------------------------------------------
    | Exclusões Globais
    |--------------------------------------------------------------------------
    |
    | Tem algo que você sempre quer excluir da auditoria? Adicione aqui.
    | Isso será sobrescrito (não mesclado) com as exclusões locais.
    |
    */
    'exclude' => [],

    /*
    |--------------------------------------------------------------------------
    | Valores Vazios
    |--------------------------------------------------------------------------
    |
    | Os registros de auditoria devem ser salvos mesmo quando os valores
    | antigos e novos estiverem ambos vazios?
    |
    | Alguns eventos podem ser vazios propositalmente. Use allowed_empty_values
    | para ignorar esses eventos na verificação.
    |
    */
    'empty_values'         => true,
    'allowed_empty_values' => [
        'retrieved',
    ],

    /*
    |--------------------------------------------------------------------------
    | Valores de Array Permitidos
    |--------------------------------------------------------------------------
    |
    | Os valores do tipo array devem ser auditados?
    |
    | Por padrão, arrays não são permitidos para evitar problemas de
    | desempenho. Para permitir, defina como true.
    |
    */
    'allowed_array_values' => false,

    /*
    |--------------------------------------------------------------------------
    | Timestamps da Auditoria
    |--------------------------------------------------------------------------
    |
    | Os campos created_at, updated_at e deleted_at devem ser auditados?
    |
    */
    'timestamps' => true,

    /*
    |--------------------------------------------------------------------------
    | Limite de Auditorias
    |--------------------------------------------------------------------------
    |
    | Define um limite para a quantidade de registros de auditoria que
    | um modelo pode ter. Zero significa sem limite.
    |
    */
    'threshold' => 0,

    /*
    |--------------------------------------------------------------------------
    | Driver de Auditoria
    |--------------------------------------------------------------------------
    |
    | Driver padrão usado para registrar as alterações.
    |
    */
    'driver' => 'database',

    /*
    |--------------------------------------------------------------------------
    | Configurações dos Drivers de Auditoria
    |--------------------------------------------------------------------------
    |
    | Configurações dos drivers disponíveis para auditoria.
    |
    */
    'drivers' => [
        'database' => [
            'table'      => 'audits',
            'connection' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações da Fila de Auditoria
    |--------------------------------------------------------------------------
    |
    | Configurações para usar filas no processamento da auditoria.
    |
    */
    'queue' => [
        'enable'     => true,
        'connection' => 'database',
        'queue'      => 'default',
        'delay'      => 0,
    ],

    /*
    |--------------------------------------------------------------------------
    | Auditoria via Console
    |--------------------------------------------------------------------------
    |
    | Eventos executados via console (ex: php artisan db:seed) devem ser auditados?
    |
    */
    'console' => true,
];
