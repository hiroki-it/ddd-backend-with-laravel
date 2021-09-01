<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 削除リクエストモデル基底クラス
 */
abstract class DeleteInput
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
