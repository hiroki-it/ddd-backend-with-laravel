<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Traits\UnsupportedMagicMethodTrait;

/**
 * エンティティ抽象クラス
 */
abstract class Entity
{
    use UnsupportedMagicMethodTrait;
}
