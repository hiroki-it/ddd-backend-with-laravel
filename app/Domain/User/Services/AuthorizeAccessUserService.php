<?php

namespace App\Domain\User\Services;

use App\Domain\User\Ids\UserId;
use App\Exceptions\UnauthorizedAccessException;

final class AuthorizeAccessUserService
{
    /**
     * @param UserId $authId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canShowUser(UserId $authId, UserId $userId): bool
    {
        if (!$this->equalsById($authId, $userId)) {
            throw new UnauthorizedAccessException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canUpdateUser(UserId $authId, UserId $userId): bool
    {
        if (!$this->equalsById($authId, $userId)) {
            throw new UnauthorizedAccessException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canDeleteUser(UserId $authId, UserId $userId): bool
    {
        if (!$this->equalsById($authId, $userId)) {
            throw new UnauthorizedAccessException("削除権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authId
     * @param UserId $userId
     * @return bool
     */
    private function equalsById(UserId $authId, UserId $userId): bool
    {
        return ($authId)->equals($userId);
    }
}
