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
        // UserクラスがNotifiableトレイトに依存せずに通知を実行できるように，オンデマンド通知機能を使用します．
        Notification::route('mail', $userEvent->user->userEmailAddress->emailAddress)
            ->notify(new UserCreatedEventNotification($userEvent->user));
    }
}
