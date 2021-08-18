<?php

declare(strict_types=1);

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * ID抽象クラス
 */
abstract class Id
{
    use ImmutableTrait;

    /**
     * @var int
     */
    protected int $id;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * ハッシュ値を返却します．
     *
     * NOTE: 複合主キーを持つオブジェクトの等価性を正しく検証するために，標準の関数をオーバーライドします．
     *
     * @return int
     */
    public function hash(): int
    {
        return $this->id;
    }

    /**
     * オブジェクトの等価性を検証します．
     *
     * NOTE: 複合主キーを持つオブジェクトの等価性を正しく検証するために，標準の関数をオーバーライドします．．
     *
     * @param Id $id
     * @return bool
     */
    public function equals(Id $id): bool
    {
        return ($id instanceof $this || $this instanceof $id) // IDオブジェクトのデータ型の等価性
            && $this->hash() == $id->hash(); // ハッシュ値の等価性
    }
}
