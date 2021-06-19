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

    /**
     * 値オブジェクトの等価性を検証します．
     *
     * @param ValueObject $VO
     * @return bool
     */
    public function equals(ValueObject $VO): bool
    {
        return ($VO instanceof $this|| $this instanceof $VO) // 値オブジェクトのデータ型の等価性
            && $this->value() === $VO->value(); // 値の等価性
    }
}
