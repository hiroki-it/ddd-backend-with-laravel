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
            'App\Domain\Repository\ArticleRepository' => 'App\Infrastructure\Repository\ArticleRepository', // 記事リポジトリ
            'App\Domain\Repository\UserRepository'    => 'App\Infrastructure\Repository\UserRepository' // ユーザリポジトリ
        ];

        foreach ($binds as $abstract => $concrete) {

            $this->app->bind($abstract, $concrete);
        }
    }
}
