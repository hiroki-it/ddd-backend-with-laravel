<?php

declare(strict_types=1);

namespace App\Domain\Entity\User;

use App\Domain\Entity\Entity;
use App\Domain\ValueObject\User\UserEmailAddress;
use App\Domain\ValueObject\User\UserId;
use App\Domain\ValueObject\User\UserName;
use App\Domain\ValueObject\User\UserPassword;

/**
 * ユーザクラス
 */
final class User extends Entity
{
    /**
     * @var UserId
     */
    private UserId $id;

    /**
     * @var UserName
     */
    private UserName $name;

    /**
     * @var UserEmailAddress
     */
    private UserEmailAddress $emailAddress;

    /**
     * @var UserPassword
     */
    private UserPassword $password;

    /**
     * コンストラクタインジェクション
     *
     * @param UserId           $id
     * @param UserName         $name
     * @param UserEmailAddress $emailAddress
     * @param UserPassword     $password
     */
    public function __construct(UserId $id, UserName $name, UserEmailAddress $emailAddress, UserPassword $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $emailAddress;
        $this->password = $password;
    }

    /**
     * ユーザIDクラスを返却します．
     *
     * @return UserId
     */
    public function id(): UserId
    {
        return $this->id;
    }

    /**
     * ユーザ名前クラスを返却します．
     *
     * @return UserName
     */
    public function name(): UserName
    {
        return $this->name;
    }

    /**
     * ユーザメールクラスを返却します．
     *
     * @return UserEmailAddress
     */
    public function emailAddress(): UserEmailAddress
    {
        return $this->emailAddress;
    }

    /**
     * ユーザパスワードクラスを返却します．*
     *
     * @return UserPassword
     */
    public function password(): UserPassword
    {
        return $this->password;
    }

}
