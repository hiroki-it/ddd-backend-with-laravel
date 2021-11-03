<?php

declare(strict_types=1);

namespace App\UseCase\User\Inputs;

use App\UseCase\ShowInput;

final class UserShowInput extends ShowInput
{
    /**
     * @var int
     */
    protected int $userId;

    /**
     * @var int
     */
    protected int $authId;

    /**
     * @param int $userId
     * @param int $authId
     */
    public function __construct(int $userId, int $authId)
    {
        $this->userId = $userId;
        $this->authId = $authId;
    }
}
