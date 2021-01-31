<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * リポジトリサービスプロバイダクラス
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにクラスをバインドします．
     *
     * インターフェースリポジトリをバインドし，実装リポジトリをリゾルブすることによって，依存性逆転を実現します．
     *
     * @return void
     */
    public function register()
    {
        $binds = [
            'App\Domain\Repositories\ArticleRepository' => 'App\Infrastructure\Repositories\ArticleRepository', // 記事リポジトリ
            'App\Domain\Repositories\UserRepository'    => 'App\Infrastructure\Repositories\UserRepository' // ユーザリポジトリ
        ];

        foreach ($binds as $abstract => $concrete) {

            $this->app->bind($abstract, $concrete);
        }
    }
}
