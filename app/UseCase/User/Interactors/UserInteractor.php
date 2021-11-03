<?php

declare(strict_types=1);

namespace App\UseCase\User\Interactors;

use App\Domain\User\Entities\User;
use App\Domain\User\Events\UserCreatedEvent;
use App\Domain\User\Ids\UserId;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Services\CheckDuplicateUserService;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Exceptions\AlreadyExistException;
use App\UseCase\User\InputBoundaries\UserInputBoundary;
use App\UseCase\User\Inputs\UserCreateInput;
use App\UseCase\User\Inputs\UserDeleteInput;
use App\UseCase\User\Inputs\UserShowInput;
use App\UseCase\User\Inputs\UserUpdateInput;
use App\UseCase\User\Outputs\UserCreateOutput;
use App\UseCase\User\Outputs\UserShowOutput;
use App\UseCase\User\Outputs\UserUpdateOutput;

final class UserInteractor implements UserInputBoundary
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @var CheckDuplicateUserService
     */
    private CheckDuplicateUserService $checkDuplicateUserService;

    /**
     * @param UserRepository            $userRepository
     * @param CheckDuplicateUserService $checkDuplicateUserService
     */
    public function __construct(UserRepository $userRepository, CheckDuplicateUserService $checkDuplicateUserService)
    {
        $this->userRepository = $userRepository;
        $this->checkDuplicateUserService = $checkDuplicateUserService;
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
     * @throws AlreadyExistException
     */
    public function createUser(UserCreateInput $input): UserCreateOutput
    {
        $user = new User(
            new UserId(0),
            new UserName($input->name),
            new UserEmailAddress($input->emailAddress),
            new UserPassword($input->password),
        );

        $this->checkDuplicateUserService->exist($user);

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
