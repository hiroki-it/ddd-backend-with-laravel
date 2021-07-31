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
     * インターフェースリポジトリと実装リポジトリをバインドし，実装リポジトリのインスタンスをリゾルブします．
     * これにより，依存性逆転を実現します．
     *
     * @return void
     */
    public function register()
    {
        $binds = [
            'App\Domain\Article\Repositories\ArticleRepository' => 'App\Infrastructure\Repositories\ArticleRepository', // 記事リポジトリ
            'App\Domain\User\Repository\UserRepository'    => 'App\Infrastructure\Repositories\UserRepository' // ユーザリポジトリ
        ];

        foreach ($binds as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
