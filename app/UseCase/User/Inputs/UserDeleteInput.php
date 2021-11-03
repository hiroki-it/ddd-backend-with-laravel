<?php

namespace App\UseCase\User\Inputs;

use App\UseCase\DeleteInput;

final class UserDeleteInput extends DeleteInput
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
