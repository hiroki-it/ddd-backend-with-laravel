<?php

declare(strict_types=1);

namespace App\Domain\Entity\User;

use App\Domain\Entity\Entity;
use App\Domain\ValueObject\PhoneNumber;
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
     * ユーザID
     *
     * @var UserId
     */
    private UserId $id;

    /**
     * ユーザ名
     *
     * @var UserName
     */
    private UserName $name;

    /**
     * ユーザメールアドレス
     *
     * @var UserEmailAddress
     */
    private UserEmailAddress $emailAddress;

    /**
     * ユーザ電話番号
     *
     * @var PhoneNumber
     */
    private PhoneNumber $phoneNumber;

    /**
     * ユーザ電話番号
     *
     * @var UserPassword
     */
    private UserPassword $password;

    /**
     * コンストラクタインジェクション
     *
     * @param UserId           $id
     * @param UserName         $name
     * @param UserEmailAddress $emailAddress
     * @param PhoneNumber      $phoneNumber
     * @param UserPassword     $password
     */
    public function __construct(UserId $id, UserName $name, UserEmailAddress $emailAddress, PhoneNumber $phoneNumber, UserPassword $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $emailAddress;
        $this->phoneNumber = $phoneNumber;
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
     * ユーザ電話番号クラスを返却します．
     *
     * @return PhoneNumber
     */
    public function phoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    /**
     * ユーザパスワードクラスを返却します．
     *
     * @return UserPassword
     */
    public function password(): UserPassword
    {
        return $this->password;
    }
}
