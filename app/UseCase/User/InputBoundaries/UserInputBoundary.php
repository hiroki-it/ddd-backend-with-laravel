<?php

declare(strict_types=1);

namespace App\UseCase\User\InputBoundaries;

use App\UseCase\User\Requests\UserCreateRequest;
use App\UseCase\User\Responses\UserCreateResponse;

/**
 * ユーザインプットバウンダリインターフェース
 */
interface UserInputBoundary
{
    /**
     * ユーザを作成します．
     *
     * @param UserCreateRequest $request
     */
    public function createUser(UserCreateRequest $request): UserCreateResponse;
}
