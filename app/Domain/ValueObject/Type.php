<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Traits\UnsupportedMagicMethodTrait;
use BenSampo\Enum\Enum;

/**
 * 区分抽象クラス
 */
abstract class Type extends Enum
{
    use UnsupportedMagicMethodTrait;
}
