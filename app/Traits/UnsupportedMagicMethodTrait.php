<?php

declare(strict_types=1);

namespace App\Traits;

/**
 * 使用制限マジックメソッドトレイト
 */
trait UnsupportedMagicMethodTrait
{
    /**
     * パフォーマンスの観点から，マジックゲッターメソッドの使用を制限します．
     *
     * @throws \Exception
     */
    public function __get()
    {
        throw new \Exception('This method is not supported');
    }

    /**
     * パフォーマンスの観点から，マジックセッターメソッドの使用を制限します．
     *
     * @throws \Exception
     */
    public function __set()
    {
        throw new \Exception('This method is not supported');
    }
}
