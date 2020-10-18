<?php

namespace App\Domain\ValueObject\Type;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 区分抽象クラス
 */
abstract class Type extends Enum
{
    /**
     * パフォーマンスの観点からマジックゲッターメソッドの使用を禁止します．
     *
     * @throws \Exception
     */
    public function __get()
    {
        throw new \Exception('This method is not supported');
    }

    /**
     * パフォーマンスの観点からマジックセッターメソッドの使用を禁止します．
     *
     * @throws \Exception
     */
    public function __set()
    {
        throw new \Exception('This method is not supported');
    }
}
