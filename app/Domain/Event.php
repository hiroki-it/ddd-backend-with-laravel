<?php

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * 利便性のため，Laravelの機能に依存することを許容します．
 */
abstract class Event
{
    use ImmutableTrait;
}
