<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\Immutable;

/**
 * 更新インプットクラス
 */
abstract class UpdateInput
{
    use Immutable;
}
