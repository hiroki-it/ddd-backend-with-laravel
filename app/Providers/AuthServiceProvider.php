<?php

declare(strict_types=1);

namespace App\Providers;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Authorization\Policies\ArticlePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $policies = [
        ArticleDTO::class => ArticlePolicy::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
