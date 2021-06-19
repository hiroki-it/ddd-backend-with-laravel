<?php

declare(strict_types=1);

namespace App\Domain\Core;

use App\Traits\UnsupportedMagicMethodTrait;

/**
 * 値オブジェクト抽象クラス
 */
abstract class ValueObject
{
    use UnsupportedMagicMethodTrait;

    /**
     * @var string
     */
    private string $value;

    /**
     * @param string $value
     */
    public function __constructor(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
