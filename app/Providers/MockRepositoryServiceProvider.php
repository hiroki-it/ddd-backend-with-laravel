<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * モックリポジトリサービスプロバイダクラス
 */
class MockRepositoryServiceProvider extends ServiceProvider
{
    /**
     * サービスコンテナにクラスをバインドします．
     *
     * インターフェースリポジトリと実装リポジトリをバインドし，モック実装リポジトリのインスタンスをリゾルブします．
     * これにより，インメモリなユニットテストを実現します．
     *
     * @return void
     */
    public function register()
    {
        $binds = [
            'App\Domain\Article\Repositories\ArticleRepository' => 'App\Infrastructure\Article\Repositories\MockArticleRepository', // 記事リポジトリ
            'App\Domain\User\Repositories\UserRepository' => 'App\Infrastructure\Use\Repositories\MockUserRepository' // ユーザリポジトリ
        ];

        foreach ($binds as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
