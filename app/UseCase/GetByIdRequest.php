<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

abstract class GetByIdRequest
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
