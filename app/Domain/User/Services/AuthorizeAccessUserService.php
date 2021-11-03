<?php

namespace App\Domain\User\Services;

use App\Domain\User\Ids\UserId;
use App\Exceptions\UnauthorizedAccessException;

final class AuthorizeAccessUserService
{
    /**
     * @param UserId $authedId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canShowUser(UserId $authedId, UserId $userId): bool
    {
        if (!$this->equalsById($authedId, $userId)) {
            throw new UnauthorizedAccessException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authedId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canUpdateUser(UserId $authedId, UserId $userId): bool
    {
        if (!$this->equalsById($authedId, $userId)) {
            throw new UnauthorizedAccessException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authedId
     * @param UserId $userId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canDeleteUser(UserId $authedId, UserId $userId): bool
    {
        if (!$this->equalsById($authedId, $userId)) {
            throw new UnauthorizedAccessException("削除権限がありません");
        }

        return true;
    }

    /**
     * @param UserId $authedId
     * @param UserId $userId
     * @return bool
     */
    private function equalsById(UserId $authedId, UserId $userId): bool
    {
        return ($authedId)->equals($userId);
    }
}
