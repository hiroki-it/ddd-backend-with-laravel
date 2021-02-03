<?php

declare(strict_types=1);

namespace App\Traits;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * DTOトレイト
 */
trait DTOTrait
{
    use SoftDeletes;
}
