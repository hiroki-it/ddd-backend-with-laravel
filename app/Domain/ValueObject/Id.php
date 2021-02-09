<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

/**
 * ID抽象クラス
 */
abstract class Id extends ValueObject
{
    /**
     * ID値
     *
     * @var string|null
     */
    protected ?string $value;

    /**
     * IDの等価性を検証します．
     *
     * @param Id $id
     * @return bool
     */
    public function equals(Id $id): bool
    {
        return ($id instanceof $this|| $this instanceof $id)
            && $this->value() === $id->value();
    }

    /**
     * ID値を返却します
     *
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
