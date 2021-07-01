<?php

declare(strict_types=1);

namespace App\Domain\Core;

/**
 * 値オブジェクト抽象クラス
 */
abstract class ValueObject
{
    /**
     * 値オブジェクトの等価性を検証します．
     *
     * @param ValueObject $VO
     * @return bool
     */
    public function equals(ValueObject $VO): bool
    {
        // 全ての属性を反復的に検証します．
        foreach (get_object_vars($this) as $key => $value) {
            if ($this->$key() !== $VO->$key()) {
                return false;
            }
        }

        return true;
    }
}
