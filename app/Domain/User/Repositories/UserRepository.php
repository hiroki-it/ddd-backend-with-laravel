<?php

declare(strict_types=1);

namespace App\Domain\User\Repositories;

use App\Domain\Repository;
use App\Domain\User\Entities\User;
use App\Domain\User\Ids\UserId;

interface UserRepository extends Repository
{
    /**
     * @param User $user
     * @return void
     */
    public function create(User $user): void;

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user): void;

    /**
     * @param UserId $userId
     * @return void
     */
    public function delete(UserId $userId): void;
}
