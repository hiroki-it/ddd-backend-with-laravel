<?php

namespace App\Domain\ValueObject\Type;

use App\Traits\UnsupportedMagicMethodTrait;
use BenSampo\Enum\Enum;

/**
 * 区分抽象クラス
 */
abstract class Type extends Enum
{
    use UnsupportedMagicMethodTrait;
}
