<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\User\Events\UserCreatedEvent;
use App\Infrastructure\User\Listeners\UserCreatedEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        UserCreatedEvent::class => [
            UserCreatedEventListener::class,
        ],
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
