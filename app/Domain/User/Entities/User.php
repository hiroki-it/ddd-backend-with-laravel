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
    protected UserName $name;

    /**
     * @var UserEmailAddress
     */
    protected UserEmailAddress $emailAddress;

    /**
     * @var UserPassword
     */
    protected UserPassword $password;

    /**
     * @param UserId           $id
     * @param UserName         $name
     * @param UserEmailAddress $emailAddress
     * @param UserPassword     $password
     */
    public function __construct(UserId $id, UserName $name, UserEmailAddress $emailAddress,UserPassword $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }
}
