<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\Repository;
use App\Domain\User\Entities\User;

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
    public function create(User $user): User;

    /**
     * UPDATE：ユーザエンティティを更新します．
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool;

    /**
     * DELETE：ユーザエンティティを削除します．
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool;
}
