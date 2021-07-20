<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\Core\Repository;
use App\Domain\User\Entity\User;

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
    function create(User $user): void;

    /**
     * UPDATE：ユーザエンティティを更新します．
     *
     * @param User $user
     * @return void
     */
    function update(User $user): void;

    /**
     * DELETE：ユーザエンティティを削除します．
     *
     * @param User $user
     * @return void
     */
    function delete(User $user): void;
}
