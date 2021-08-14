<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * 全てのHTTPリクエストに適用するミドルウェアを定義します．
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\Auth\TrustProxies::class,
        \App\Http\Middleware\Auth\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\Auth\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * エイリアス名とミドルウェアグループを定義します．
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * エイリアス名と個別のミドルウェアを定義します．
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'                 => \App\Http\Middleware\Auth\Authenticate::class,
        'auth.basic'           => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'             => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers'        => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'                  => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'                => \App\Http\Middleware\Auth\RedirectIfAuthenticated::class,
        'password.confirm'     => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'               => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'             => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'             => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // IdConverterクラス
        'article.id.converter' => \App\Http\Middleware\Before\Converters\ArticleIdConverterMiddleware::class
    ];

    /**
     * ミドルウェアをコールする順番を定義します．
     *
     * @var string[]
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Auth\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
