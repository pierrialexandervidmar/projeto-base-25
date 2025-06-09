<?php

declare(strict_types = 1);

use Opcodes\LogViewer\Enums\FolderSortingMethod;
use Opcodes\LogViewer\Enums\SortingOrder;
use Opcodes\LogViewer\Enums\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Visualizador de Logs
    |--------------------------------------------------------------------------
    | O Visualizador de Logs pode ser desabilitado, para que não fique mais acessível via navegador.
    |
    */

    'enabled' => env('LOG_VIEWER_ENABLED', true),

    'api_only' => env('LOG_VIEWER_API_ONLY', false),

    'require_auth_in_production' => true,

    /*
    |--------------------------------------------------------------------------
    | Domínio do Visualizador de Logs
    |--------------------------------------------------------------------------
    | Você pode alterar o domínio onde o Visualizador de Logs deve estar ativo.
    | Se o domínio estiver vazio, todos os domínios serão válidos.
    |
    */

    'route_domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Rota do Visualizador de Logs
    |--------------------------------------------------------------------------
    | O Visualizador de Logs estará disponível sob esta URL.
    |
    */

    'route_path' => 'logs',

    /*
    |--------------------------------------------------------------------------
    | URL para voltar ao sistema
    |--------------------------------------------------------------------------
    | Quando configurada, exibe um link para retornar facilmente a esta URL.
    | Defina como `null` para ocultar esse link.
    |
    | Rótulo opcional para exibir junto com a URL acima.
    |
    */

    'back_to_system_url' => config('app.url', null),

    'back_to_system_label' => null, // Por padrão exibe: "Back to {{ app.name }}"

    /*
    |--------------------------------------------------------------------------
    | Fuso horário do Visualizador de Logs.
    |--------------------------------------------------------------------------
    | O fuso horário para exibir os horários na interface. Por padrão usa o fuso horário
    | da aplicação definido em config/app.php.
    |
    */

    'timezone' => null,

    /*
    |--------------------------------------------------------------------------
    | Formato de data e hora do Visualizador de Logs.
    |--------------------------------------------------------------------------
    | O formato usado para exibir os timestamps na interface.
    |
    */

    'datetime_format' => 'Y-m-d H:i:s',

    /*
    |--------------------------------------------------------------------------
    | Middleware da rota do Visualizador de Logs.
    |--------------------------------------------------------------------------
    | Middleware opcional para usar ao carregar a página inicial do Visualizador de Logs.
    |
    */

    'middleware' => [
        'web',
        Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware da API do Visualizador de Logs.
    |--------------------------------------------------------------------------
    | Middleware opcional para usar em todas as requisições da API. A mesma API
    | também é usada pela interface do Visualizador de Logs.
    |
    */

    'api_middleware' => [
        Opcodes\LogViewer\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    'api_stateful_domains' => env('LOG_VIEWER_API_STATEFUL_DOMAINS') ? explode(',', env('LOG_VIEWER_API_STATEFUL_DOMAINS')) : null,

    /*
    |--------------------------------------------------------------------------
    | Hosts remotos do Visualizador de Logs.
    |--------------------------------------------------------------------------
    | O Visualizador de Logs suporta visualização de logs Laravel de hosts remotos.
    | Eles também devem estar rodando o Visualizador de Logs. Abaixo você pode definir
    | os hosts que deseja mostrar nesta instância do Visualizador de Logs.
    |
    */

    'hosts' => [
        'local' => [
            'name' => ucfirst(env('APP_ENV', 'local')),
        ],

        // 'staging' => [
        //     'name' => 'Staging',
        //     'host' => 'https://staging.example.com/log-viewer',
        //     'auth' => [      // Exemplo de autenticação HTTP Basic
        //         'username' => 'username',
        //         'password' => 'password',
        //     ],
        //     'verify_server_certificate' => true,
        // ],
        //
        // 'production' => [
        //     'name' => 'Production',
        //     'host' => 'https://example.com/log-viewer',
        //     'auth' => [      // Exemplo de autenticação Bearer token
        //         'token' => env('LOG_VIEWER_PRODUCTION_TOKEN'),
        //     ],
        //     'headers' => [
        //         'X-Foo' => 'Bar',
        //     ],
        //     'verify_server_certificate' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Padrões de arquivos incluídos
    |--------------------------------------------------------------------------
    |
    */

    'include_files' => [
        '*.log',
        '**/*.log',

        // Você pode incluir caminhos para outros tipos de logs também, como apache, nginx e mais.
        // Este par chave => valor pode ser usado para renomear e agrupar múltiplos caminhos em uma pasta na UI.
        '/var/log/httpd/*' => 'Apache',
        '/var/log/nginx/*' => 'Nginx',

        // Logs MacOS Apple Silicon
        '/opt/homebrew/var/log/nginx/*',
        '/opt/homebrew/var/log/httpd/*',
        '/opt/homebrew/var/log/php-fpm.log',
        '/opt/homebrew/var/log/postgres*log',
        '/opt/homebrew/var/log/redis*log',
        '/opt/homebrew/var/log/supervisor*log',

        // '/absolute/paths/supported',
    ],

    /*
    |--------------------------------------------------------------------------
    | Padrões de arquivos excluídos.
    |--------------------------------------------------------------------------
    | Isso tem prioridade sobre os arquivos incluídos.
    |
    */

    'exclude_files' => [
        // 'my_secret.log'
    ],

    /*
    |--------------------------------------------------------------------------
    | Ocultar arquivos desconhecidos.
    |--------------------------------------------------------------------------
    | As opções de incluir/excluir acima podem capturar arquivos que não são
    | suportados pelo Visualizador de Logs. Neste caso, você pode ocultá-los
    | da interface e das chamadas da API definindo isso como true.
    |
    */

    'hide_unknown_files' => true,

    /*
    |--------------------------------------------------------------------------
    | Filtros para rastreamento de pilha mais curto.
    |--------------------------------------------------------------------------
    | Linhas contendo qualquer uma dessas strings serão excluídas do log completo.
    | Esta configuração só está ativa quando a função é habilitada via interface.
    |
    */

    'shorter_stack_trace_excludes' => [
        '/vendor/symfony/',
        '/vendor/laravel/framework/',
        '/vendor/barryvdh/laravel-debugbar/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Driver de cache
    |--------------------------------------------------------------------------
    | Driver de cache a ser usado para armazenar os índices de logs.
    | Os índices são usados para acelerar a navegação nos logs.
    | Por padrão, usa o driver de cache padrão da aplicação.
    |
    */

    'cache_driver' => env('LOG_VIEWER_CACHE_DRIVER', null),

    /*
    |--------------------------------------------------------------------------
    | Prefixo da chave de cache
    |--------------------------------------------------------------------------
    | O Visualizador de Logs prefixa todas as chaves de cache criadas com este valor.
    | Se por algum motivo você quiser mudar esse prefixo, pode fazê-lo aqui.
    | O formato das chaves de cache do Visualizador de Logs é:
    | {prefix}:{versão}:{resto-da-chave}
    |
    */

    'cache_key_prefix' => 'lv',

    /*
    |--------------------------------------------------------------------------
    | Tamanho do chunk ao escanear arquivos de log de forma preguiçosa
    |--------------------------------------------------------------------------
    | O tamanho em MB de arquivos a escanear antes de atualizar a barra de progresso ao pesquisar em todos os arquivos.
    |
    */

    'lazy_scan_chunk_size_in_mb' => 50,

    'strip_extracted_context' => true,

    /*
    |--------------------------------------------------------------------------
    | Opções de resultados por página
    |--------------------------------------------------------------------------
    | Define as opções disponíveis para número de resultados por página
    |
    */

    'per_page_options' => [10, 25, 50, 100, 250, 500],

    /*
    |--------------------------------------------------------------------------
    | Configurações padrão do Visualizador de Logs
    |--------------------------------------------------------------------------
    | Essas configurações determinam o comportamento padrão do Visualizador de Logs.
    | Muitas delas podem ser persistidas para o usuário no localStorage do navegador,
    | caso a opção `use_local_storage` esteja ativada.
    |
    */

    'defaults' => [

        // Usar o localStorage do navegador para armazenar preferências do usuário.
        // Se true, as preferências salvas no navegador terão precedência sobre os padrões abaixo.
        'use_local_storage' => true,

        // Método para ordenar as pastas. Outras opções: `Alphabetical`, `ModifiedTime`
        'folder_sorting_method' => FolderSortingMethod::ModifiedTime,

        // Ordem para ordenar as pastas. Outras opções: `Ascending`, `Descending`
        'folder_sorting_order' => SortingOrder::Descending,

        // Ordem para ordenar os logs. Outras opções: `Ascending`, `Descending`
        'log_sorting_order' => SortingOrder::Descending,

        // Número de resultados por página. Deve ser um dos valores definidos em `per_page_options`
        'per_page' => 25,

        // Esquema de cores para o Visualizador de Logs. Outras opções: `System`, `Light`, `Dark`
        'theme' => Theme::System,

        // Se a opção `Shorter Stack Traces` deve estar ativada por padrão
        'shorter_stack_traces' => false,

    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixo da pasta raiz
    |--------------------------------------------------------------------------
    | Prefixo para os arquivos de log dentro da pasta `storage/logs` do Laravel.
    | O Visualizador de Logs não mostra o caminho completo desses arquivos na interface,
    | mostrando apenas o nome do arquivo com este prefixo.
    |
    */

    'root_folder_prefix' => 'root',
];
