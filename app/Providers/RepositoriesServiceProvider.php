<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * NOTE: DomainRepository名をエイリアスとして，InfrastructureRepositoryをコールすることによって，依存性逆転を実現します．
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
