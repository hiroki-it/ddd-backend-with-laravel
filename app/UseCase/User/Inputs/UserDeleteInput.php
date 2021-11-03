<?php

namespace App\UseCase\User\Inputs;

use App\UseCase\DeleteInput;

final class UserDeleteInput extends DeleteInput
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
