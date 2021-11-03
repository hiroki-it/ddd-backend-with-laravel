<?php

namespace App\Domain\User\Services;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use App\Exceptions\AlreadyExistException;

class CheckDuplicateUserService
{
    /**
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
     * @param User $user
     * @return bool
     * @throws AlreadyExistException
     */
    public function exist(User $user)
    {
        if ($this->userRepository->findByEmail($user->userEmailAddress)) {
            throw new AlreadyExistException("すでに登録されたメールアドレスです");
        }

        return false;
    }
}
