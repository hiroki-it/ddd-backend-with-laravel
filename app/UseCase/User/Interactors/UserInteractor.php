<?php

declare(strict_types=1);

namespace App\UseCase\User\Interactors;

use App\Domain\User\Entities\User;
use App\Domain\User\Events\UserCreatedEvent;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\UseCase\User\InputBoundaries\UserInputBoundary;
use App\UseCase\User\Requests\UserCreateInput;
use App\UseCase\User\Responses\UserCreateOutput;

/**
* ユーザユースケースクラス
*/
final class UserInteractor implements UserInputBoundary
{
    /**
     * リポジトリクラス
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**

     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserCreateInput $input
     * @return UserCreateOutput
     */
    public function createUser(UserCreateInput $input): UserCreateOutput
    {
        $user = new User(
            null,
            new UserName($input->name),
            new UserEmailAddress($input->emailAddress),
            new UserPassword($input->password),
        );

        $this->userRepository->create($user);

        // リスナーにイベントを発行します．
        event(new UserCreatedEvent($user));

        return new UserCreateOutput(
            $user->id->id,
            $user->userName->name
        );
    }
}
