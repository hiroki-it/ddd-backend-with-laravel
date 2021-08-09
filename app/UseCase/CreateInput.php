<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\Immutable;

/**
 * 作成インプットクラス
 */
abstract class CreateInput
{
    use Immutable;
}
