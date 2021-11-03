<?php

declare(strict_types=1);

namespace App\UseCase\User\Inputs;

use App\UseCase\ShowInput;

final class UserShowInput extends ShowInput
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $authId;

    /**
     * @param int $id
     * @param int $authId
     */
    public function __construct(int $id, int $authId)
    {
        $this->id = $id;
        $this->authId = $authId;
    }
}
