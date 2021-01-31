<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Traits\UnsupportedMagicMethodTrait;

/**
 * 値オブジェクト抽象クラス
 */
abstract class ValueObject
{
    use UnsupportedMagicMethodTrait;
}
