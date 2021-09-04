<?php

namespace App\Infrastructure\User\Listeners;

use App\Domain\User\Events\UserCreatedEvent;
use App\Infrastructure\Listener;
use App\Infrastructure\User\Notifications\UserCreatedEventNotification;
use Illuminate\Support\Facades\Notification;

class UserCreatedEventListener extends Listener
{
    /**
     * @param UserCreatedEvent $userEvent
     * @return void
     */
    public function handle(UserCreatedEvent $userEvent)
    {
        Notification::route('mail', $userEvent->user->emailAddress->emailAddress)
            ->notify(new UserCreatedEventNotification($userEvent->user));
    }
}
