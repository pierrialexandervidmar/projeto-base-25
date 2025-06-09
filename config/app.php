<?php

declare(strict_types = 1);

return [

    /*
    |--------------------------------------------------------------------------
    | Nome da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor é o nome da sua aplicação. Ele será usado quando o framework
    | precisar exibir o nome da aplicação em notificações ou outros elementos
    | da interface onde o nome da aplicação precisa ser mostrado.
    |
    */
    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Ambiente da Aplicação
    |--------------------------------------------------------------------------
    |
    | Este valor define o "ambiente" no qual sua aplicação está sendo executada.
    | Isso pode influenciar como você configura vários serviços utilizados pela
    | aplicação. Defina esse valor no seu arquivo ".env".
    |
    */
    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuração da Aplicação
    |--------------------------------------------------------------------------
    |
    | Quando sua aplicação está em modo de depuração, mensagens de erro detalhadas
    | com rastreamentos de pilha (stack trace) serão exibidas em cada erro que
    | ocorrer. Se estiver desativado, será exibida uma página de erro genérica.
    |
    */
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL da Aplicação
    |--------------------------------------------------------------------------
    |
    | Esta URL é usada pela linha de comando do Artisan para gerar URLs corretamente.
    | Você deve definir isso como a URL raiz da sua aplicação para que esteja
    | disponível nos comandos Artisan.
    |
    */
    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Fuso Horário da Aplicação
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o fuso horário padrão da sua aplicação, que será
    | usado pelas funções de data e hora do PHP. O padrão é "UTC", mas você pode
    | definir conforme a sua região.
    |
    */
    'timezone' => 'America/Sao_Paulo',

    /*
    |--------------------------------------------------------------------------
    | Configuração de Localização da Aplicação
    |--------------------------------------------------------------------------
    |
    | A localização (locale) determina o idioma padrão que será usado pelos
    | métodos de tradução/localização do Laravel. Você pode definir para qualquer
    | idioma que tenha arquivos de tradução disponíveis.
    |
    */
    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Chave de Criptografia
    |--------------------------------------------------------------------------
    |
    | Esta chave é usada pelos serviços de criptografia do Laravel e deve ser
    | uma string aleatória de 32 caracteres para garantir a segurança dos valores
    | criptografados. Defina essa chave antes de publicar a aplicação.
    |
    */
    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver de Modo de Manutenção
    |--------------------------------------------------------------------------
    |
    | Estas opções determinam o driver usado para definir e gerenciar o status
    | do "modo de manutenção" do Laravel. O driver "cache" permite controlar
    | o modo de manutenção em múltiplas máquinas.
    |
    | Drivers suportados: "file", "cache"
    |
    */
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store'  => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
