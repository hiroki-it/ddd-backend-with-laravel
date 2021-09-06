<?php

namespace App\Domain\User\Events;

use App\Domain\Event;
use App\Domain\User\Entities\User;

final class UserCreatedEvent extends Event
{
    /**
     * @var User
     */
    protected User $user;

    /**
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
