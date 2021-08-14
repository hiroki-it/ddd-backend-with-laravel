<?php

declare(strict_types=1);

namespace App\Domain\User\Repositories;

use App\Domain\Repository;
use App\Domain\User\Entities\User;
use App\Domain\User\ValueObjects\UserId;

/**
 * ユーザリポジトリインターフェース
 */
interface UserRepository extends Repository
{
    /**
     * CREATE：ユーザエンティティを作成します．
     *
     * @param User $user
     * @return void
     */
    public function create(User $user): void;

    /**
     * UPDATE：ユーザエンティティを更新します．
     *
     * @param User $user
     * @return void
     */
    public function update(User $user): void;

    /**
     * DELETE：ユーザエンティティを削除します．
     *
     * @param UserId $userId
     * @return void
     */
    public function delete(User $user): bool;
}
