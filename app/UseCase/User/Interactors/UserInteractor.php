<?php

declare(strict_types=1);

namespace App\UseCase\User\Interactors;

use App\Domain\User\Entities\User;
use App\Domain\User\Events\UserCreatedEvent;
use App\Domain\User\Ids\UserId;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\UseCase\User\InputBoundaries\UserInputBoundary;
use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Outputs\UserCreateOutput;

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
     * @param UserShowInput $input
     * @return UserShowOutput
     */
    public function showUser(UserShowInput $input): UserShowOutput
    {
        $user = $this->userRepository->findById(new UserId($input->id));

        return new UserShowOutput(
            $user->userName->name,
        );
    }

    /**
     * @param UserCreateInput $input
     * @return UserCreateOutput
     */
    public function createUser(UserCreateInput $input): UserCreateOutput
    {
        $user = new User(
            new UserId(0),
            new UserName($input->name),
            new UserEmailAddress($input->emailAddress),
            new UserPassword($input->password),
        );

        $this->userRepository->create($user);

        // リスナーにイベントを発行します．
        event(new UserCreatedEvent($user));

        return new UserCreateOutput(
            $user->userName->name
        );
    }

    /**
     * @param UserUpdateInput $input
     * @return UserUpdateOutput
     */
    public function updateUser(UserUpdateInput $input): UserUpdateOutput
    {
        $user = new User(
            new UserId($input->id),
            new UserName($input->name),
            new UserEmailAddress($input->emailAddress),
            new UserPassword($input->password),
        );

        $this->userRepository->update($user);

        return new UserUpdateOutput(
            $user->userName->name
        );
    }

    /**
     * @param UserDeleteInput $input
     */
    public function deleteUser(UserDeleteInput $input): void
    {
        $this->userRepository->delete(new UserId($input->id));
    }
}
