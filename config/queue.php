<?php

declare(strict_types = 1);

return [

    /*
    |--------------------------------------------------------------------------
    | Nome da Conexão de Fila Padrão
    |--------------------------------------------------------------------------
    |
    | A fila do Laravel oferece suporte a diversos backends por meio de uma
    | API unificada, fornecendo acesso conveniente a cada backend usando
    | a mesma sintaxe. A conexão padrão de fila é definida abaixo.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Conexões de Fila
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar as opções de conexão para cada backend de fila
    | utilizado pela sua aplicação. Uma configuração de exemplo é fornecida
    | para cada backend suportado pelo Laravel. Você pode adicionar mais.
    |
    | Drivers suportados: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver'       => 'database',
            'connection'   => env('DB_QUEUE_CONNECTION'),
            'table'        => env('DB_QUEUE_TABLE', 'jobs'),
            'queue'        => env('DB_QUEUE', 'default'),
            'retry_after'  => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver'       => 'beanstalkd',
            'host'         => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue'        => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after'  => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for'    => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver'       => 'sqs',
            'key'          => env('AWS_ACCESS_KEY_ID'),
            'secret'       => env('AWS_SECRET_ACCESS_KEY'),
            'prefix'       => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue'        => env('SQS_QUEUE', 'default'),
            'suffix'       => env('SQS_SUFFIX'),
            'region'       => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver'       => 'redis',
            'connection'   => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue'        => env('REDIS_QUEUE', 'default'),
            'retry_after'  => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for'    => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Agrupamento de Jobs (Job Batching)
    |--------------------------------------------------------------------------
    |
    | As opções a seguir configuram o banco de dados e a tabela que armazenam
    | as informações de agrupamento de jobs. Você pode atualizar essas opções
    | para qualquer conexão e tabela definida pela sua aplicação.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table'    => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Jobs de Fila com Falha
    |--------------------------------------------------------------------------
    |
    | Estas opções configuram o comportamento do registro de jobs com falha,
    | permitindo controlar como e onde os jobs com falha são armazenados.
    | O Laravel oferece suporte para armazenamento em arquivo ou banco de dados.
    |
    | Drivers suportados: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver'   => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table'    => 'failed_jobs',
    ],

];
