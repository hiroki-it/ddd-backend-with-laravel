<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 更新リクエストモデル基底クラス
 */
abstract class UpdateInput
{
    use ImmutableTrait;
}
