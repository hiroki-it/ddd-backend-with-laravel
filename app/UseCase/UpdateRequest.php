<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 更新リクエストモデル
 */
abstract class UpdateRequest
{
    use ImmutableTrait;
}
