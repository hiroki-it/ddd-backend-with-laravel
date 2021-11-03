<?php

namespace App\UseCase\User\Services\Authorizers;

use App\Domain\User\Ids\UserId;
use App\Exceptions\UnauthorizedAccessException;

final class UserAuthorizer
{
    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canShowUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new UnauthorizedAccessException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canUpdateUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new UnauthorizedAccessException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canDeleteUser(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new UnauthorizedAccessException("削除権限がありません");
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
