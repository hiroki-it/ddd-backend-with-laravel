<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 詳細リクエストモデル基底クラス
 */
abstract class ShowInput
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
}
