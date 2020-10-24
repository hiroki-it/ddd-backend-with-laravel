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
     * @param $name
     * @throws \Exception
     */
    public function __get($name)
    {
        throw new \Exception('This method is not supported');
    }

    /**
     * パフォーマンスの観点から，マジックセッターメソッドの使用を制限します．
     *
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value)
    {
        throw new \Exception('This method is not supported');
    }
}
