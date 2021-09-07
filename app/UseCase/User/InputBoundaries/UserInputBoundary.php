<?php

declare(strict_types=1);

namespace App\UseCase\User\InputBoundaries;

use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Outputs\UserCreateOutput;

/**
 * ユーザインプットバウンダリインターフェース
 */
interface UserInputBoundary
{
    /**
     * @param UserCreateInput $input
     */
    public function createUser(UserCreateInput $input): UserCreateOutput;
}
