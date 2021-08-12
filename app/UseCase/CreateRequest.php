<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 作成インプットクラス
 */
abstract class CreateRequest
{
    use ImmutableTrait;
}
