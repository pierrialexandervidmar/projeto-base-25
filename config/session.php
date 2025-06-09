<?php

declare(strict_types = 1);

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver de Sessão Padrão
    |--------------------------------------------------------------------------
    |
    | Esta opção determina o driver de sessão padrão utilizado para as
    | requisições recebidas. O Laravel suporta várias opções de armazenamento
    | para persistir dados de sessão. O armazenamento em banco de dados é uma
    | ótima escolha padrão.
    |
    | Suportado: "file", "cookie", "database", "memcached",
    |            "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Tempo de Vida da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o número de minutos que a sessão poderá ficar
    | ociosa antes de expirar. Se quiser que expire ao fechar o navegador, use
    | a opção de configuração expire_on_close.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Criptografia da Sessão
    |--------------------------------------------------------------------------
    |
    | Esta opção permite especificar se todos os dados da sessão devem ser
    | criptografados antes de serem armazenados. Toda a criptografia é feita
    | automaticamente pelo Laravel, e você usará a sessão normalmente.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Local de Armazenamento dos Arquivos de Sessão
    |--------------------------------------------------------------------------
    |
    | Ao utilizar o driver "file", os arquivos de sessão são armazenados
    | em disco. O local padrão está definido aqui, mas você pode alterá-lo.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexão com Banco de Dados da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar os drivers "database" ou "redis", você pode especificar a
    | conexão que será usada para gerenciar essas sessões. Deve corresponder
    | a uma das conexões definidas na configuração de banco de dados.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabela do Banco de Dados para Sessões
    |--------------------------------------------------------------------------
    |
    | Ao usar o driver "database", você pode definir a tabela utilizada para
    | armazenar as sessões. Um valor padrão razoável já está definido, mas
    | você pode mudar conforme necessário.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Armazenamento de Cache da Sessão
    |--------------------------------------------------------------------------
    |
    | Ao usar drivers de sessão baseados em cache, você pode definir qual
    | armazenamento de cache será usado para guardar os dados da sessão entre
    | requisições. Isso deve corresponder a uma store definida no cache.
    |
    | Afeta: "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Loteria para Limpeza de Sessões
    |--------------------------------------------------------------------------
    |
    | Alguns drivers de sessão precisam varrer manualmente os dados antigos
    | para removê-los. Aqui você define a chance disso acontecer a cada
    | requisição. O padrão é 2 em 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nome do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Aqui você pode alterar o nome do cookie de sessão criado pelo Laravel.
    | Geralmente, não é necessário alterar este valor, pois não traz ganhos
    | significativos de segurança.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_') . '_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Caminho do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | O caminho define onde o cookie será considerado válido. Normalmente
    | é a raiz da aplicação, mas você pode modificar conforme necessário.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Domínio do Cookie da Sessão
    |--------------------------------------------------------------------------
    |
    | Este valor define o domínio e subdomínios nos quais o cookie estará
    | disponível. Por padrão, estará disponível para o domínio raiz e todos
    | os subdomínios. Normalmente, isso não precisa ser alterado.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Apenas via HTTPS
    |--------------------------------------------------------------------------
    |
    | Com esta opção ativada, os cookies de sessão só serão enviados ao
    | servidor se a conexão for HTTPS, o que aumenta a segurança.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Acesso Apenas via HTTP
    |--------------------------------------------------------------------------
    |
    | Se verdadeiro, impede que scripts JavaScript acessem o valor do cookie.
    | Ele estará disponível apenas via protocolo HTTP.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookies com Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opção define o comportamento dos cookies em requisições entre sites
    | (cross-site), podendo ajudar a mitigar ataques CSRF. O valor padrão é
    | "lax", permitindo requisições seguras entre sites.
    |
    | Veja: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Suportado: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Particionados
    |--------------------------------------------------------------------------
    |
    | Ativar esta opção vincula o cookie ao site de nível superior no contexto
    | entre sites (cross-site). Cookies particionados são aceitos quando
    | marcados como "secure" e com Same-Site definido como "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
