<?php

declare(strict_types=1);

namespace App\Domain\User\Entities;

use App\Domain\Entity;
use App\Domain\User\Ids\UserId;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;

/**
 * ユーザクラス
 *
 * ドメイン貧血症にならないように注意してください．
 */
final class User extends Entity
{
    /**
     * @var UserName
     */
    protected UserName $userName;

    /**
     * @var UserEmailAddress
     */
    protected UserEmailAddress $userEmailAddress;

    /**
     * @var UserPassword
     */
    protected UserPassword $userPassword;

    /**
     * @param UserId           $userId
     * @param UserName         $userName
     * @param UserEmailAddress $userEmailAddress
     * @param UserPassword     $userPassword
     */
    public function __construct(UserId $userId, UserName $userName, UserEmailAddress $userEmailAddress, UserPassword $userPassword)
    {
        $this->id = $userId;
        $this->userName = $userName;
        $this->userEmailAddress = $userEmailAddress;
        $this->userPassword = $userPassword;
    }
}
