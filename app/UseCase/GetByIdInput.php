<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 取得リクエストモデル
 */
abstract class GetByIdInput
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
