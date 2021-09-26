<?php

namespace App\UseCase\User\Services\Authorizers;

use App\Domain\User\Ids\UserId;
use App\Exceptions\AuthorizationException;

final class UserAuthorizer
{
    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canShowUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canUpdateUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canDeleteUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("削除権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     */
    private function equalsById(int $userId, int $targetId): bool
    {
        return (new UserId($userId))->equals(new UserId($targetId));
    }
}
