<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const UNAUTHENTHICATED = '/'; // 認証前URL
    public const AUTHENTHICATED = '/home'; // 認証後URL

    /**
     * @return void
     */
    public function boot()
    {
        Route::pattern('id', '[0-9]+');

        Route::group(['middleware' => 'web'], function () {
            // ヘルスチェックエンドポイント
            Route::namespace($this->namespace)
                ->group(base_path('routes/healthcheck.php'));

            // 認証不要エンドポイント
            Route::namespace($this->namespace)
                ->group(base_path('routes/authentication.php'));

            // 認証必須エンドポイント
            Route::namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }
}
