<?php

declare(strict_types=1);

namespace App\UseCase\User\InputBoundaries;

use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Inputs\UserDeleteInput;
use App\UseCase\User\Inputs\UserShowInput;
use App\UseCase\User\Inputs\UserUpdateInput;
use App\UseCase\User\Outputs\UserCreateOutput;
use App\UseCase\User\Outputs\UserShowOutput;
use App\UseCase\User\Outputs\UserUpdateOutput;

/**
 * ユーザインプットバウンダリインターフェース
 */
interface UserInputBoundary
{
    /**
     * @param UserShowInput $input
     * @return UserShowOutput
     */
    public function showUser(UserShowInput $input): UserShowOutput;

    /**
     * @param UserCreateInput $input
     */
    public function createUser(UserCreateInput $input): UserCreateOutput;

    /**
     * @param UserUpdateInput $input
     * @return UserUpdateOutput
     */
    public function updateUser(UserUpdateInput $input): UserUpdateOutput;

    /**
     * @param UserDeleteInput $input
     */
    public function deleteUser(UserDeleteInput $input): void;
}
