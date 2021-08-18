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

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
