<?php

namespace App\UseCase;

/**
 * レスポンスモデル
 */
abstract class Output
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
