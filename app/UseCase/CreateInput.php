<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 作成リクエストモデル基底クラス
 */
abstract class CreateInput
{
    use ImmutableTrait;
}
