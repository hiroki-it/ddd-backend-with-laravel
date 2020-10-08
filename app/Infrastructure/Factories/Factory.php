<?php

declare(strict_types=1);

namespace App\Infrastructure\Factories;

/**
 * ファクトリ抽象クラス
 */
abstract class Factory
{
    /**
     * エンティティのインスタンスを生成します
     *
     * @param string $id
     * @param array  $validated
     * @return mixed
     */
    abstract static function createInstance(string $id, array $validated);
}
