<?php

declare(strict_types=1);

namespace App\UseCase\User\InputBoundaries;

use App\Domain\User\Entity\User;
use App\UseCase\User\Requests\UserCreateRequest;

/**
 * ユーザインプットバウンダリインターフェース
 */
interface UserInputBoundary
{
    /**
     * ユーザを作成します．
     *
     * @param UserCreateRequest $input
     */
    public function createUser(UserCreateRequest $input): User;
}
