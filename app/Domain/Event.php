<?php

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * Laravelのイベントに依存することを許容します．
 */
abstract class Event
{
    use ImmutableTrait;
}
