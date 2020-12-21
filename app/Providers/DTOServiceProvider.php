<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * DTOサービスプロバイダクラス
 */
class DTOServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにクラスをバインドします．
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Domain\Infrastructure\DTO\ArticleDTO',
            'App\Domain\Infrastructure\DTO\ArticleDTO'
        );
    }
}
