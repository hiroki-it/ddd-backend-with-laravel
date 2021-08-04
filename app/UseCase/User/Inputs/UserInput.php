<?php

declare(strict_types=1);

namespace App\UseCase\Inputs;

use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Domain\User\ValueObjects\UserPhoneNumber;

class UserInput
{
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
     * @var UserPhoneNumber
     */
    private UserPhoneNumber $phoneNumber;

    /**
     * ユーザ電話番号
     *
     * @var UserPassword
     */
    private UserPassword $password;

    /**
     * コンストラクタインジェクション
     *
     * @param array $validated
     */
    public function __construct(array $validated)
    {
        $this->name = $validated['name'];
        $this->emailAddress = $validated['emailAddress'];
        $this->phoneNumber = $validated['phoneNumber'];
        $this->password = $validated['password'];
    }

    /**
     * @return UserName
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return UserEmailAddress
     */
    public function emailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return UserPhoneNumber
     */
    public function phoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return UserPassword
     */
    public function password()
    {
        return $this->password;
    }
}
