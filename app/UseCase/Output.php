<?php

namespace App\UseCase;

/**
 * レスポンスモデル基底クラス
 */
abstract class Output
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
