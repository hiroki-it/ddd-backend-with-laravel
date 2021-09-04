<?php

namespace App\Infrastructure;

use App\Traits\ImmutableTrait;
use Illuminate\Notifications\Notification as LaravelNotification;

abstract class Notification extends LaravelNotification
{
    use ImmutableTrait;
}
