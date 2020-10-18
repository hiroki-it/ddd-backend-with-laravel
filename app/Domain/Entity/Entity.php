<?php

declare(strict_types=1);

namespace App\Domain\Entity;

/**
 * エンティティ抽象クラス
 */
abstract class Entity
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
