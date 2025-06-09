<?php

declare(strict_types = 1);

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Domínios com Estado (Stateful)
    |--------------------------------------------------------------------------
    |
    | Requisições provenientes dos seguintes domínios / hosts receberão
    | cookies de autenticação de API com estado. Normalmente, devem incluir
    | seus domínios locais e de produção que acessam a API via uma SPA.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort(),
        // Sanctum::currentRequestHost(),
    ))),

    /*
    |--------------------------------------------------------------------------
    | Guards do Sanctum
    |--------------------------------------------------------------------------
    |
    | Este array contém os "guards" de autenticação que serão verificados
    | quando o Sanctum tentar autenticar uma requisição. Se nenhum deles
    | for capaz de autenticar, será usado o token bearer da requisição.
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Expiração dos Tokens (em minutos)
    |--------------------------------------------------------------------------
    |
    | Este valor define quantos minutos um token emitido será considerado
    | válido. Isso sobrescreve o atributo "expires_at" do token, mas não
    | afeta sessões de primeira parte (first-party sessions).
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Prefixo do Token
    |--------------------------------------------------------------------------
    |
    | O Sanctum pode adicionar um prefixo aos novos tokens para aproveitar
    | iniciativas de escaneamento de segurança que notificam os devs
    | caso tokens sejam cometidos em repositórios inadvertidamente.
    |
    | Veja: https://docs.github.com/en/code-security/secret-scanning/about-secret-scanning
    |
    */

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Middleware do Sanctum
    |--------------------------------------------------------------------------
    |
    | Ao autenticar sua SPA de primeira parte com o Sanctum, talvez você
    | precise personalizar alguns dos middlewares usados durante a
    | requisição. Você pode alterar abaixo conforme necessário.
    |
    */

    'middleware' => [
        'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class,
        'encrypt_cookies'      => Illuminate\Cookie\Middleware\EncryptCookies::class,
        'validate_csrf_token'  => Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ],

];
