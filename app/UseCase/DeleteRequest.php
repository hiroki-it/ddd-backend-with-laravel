<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 削除リクエストモデル
 */
abstract class DeleteRequest
{
    use ImmutableTrait;

    /**
     * @var int
     */
    private int $id;

    public function __constructor(int $id)
    {
        $this->id = $id;
    }
}
