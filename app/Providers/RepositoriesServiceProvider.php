<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * リポジトリサービスプロバイダクラス
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにクラスをバインドします．
     *
     * NOTE：インターフェースリポジトリをバインドし，実装リポジトリをリゾルブすることによって，依存性逆転を実現します．
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Domain\Repositories\ArticleRepository',
            'App\Infrastructure\Repositories\ArticleRepository'
        );
    }
}
