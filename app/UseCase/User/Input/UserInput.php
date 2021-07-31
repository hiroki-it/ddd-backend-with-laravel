<?php

declare(strict_types=1);

namespace App\UseCase\Inputs;

use App\Domain\User\ValueObject\UserEmailAddress;
use App\Domain\User\ValueObject\UserName;
use App\Domain\User\ValueObject\UserPassword;
use App\Domain\User\ValueObject\UserPhoneNumber;

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
}
