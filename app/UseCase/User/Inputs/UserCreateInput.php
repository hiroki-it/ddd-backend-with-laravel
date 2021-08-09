<?php

declare(strict_types=1);

namespace App\UseCase\User\Inputs;

use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Domain\User\ValueObjects\UserPhoneNumber;
use App\UseCase\CreateInput;

class UserCreateInput extends CreateInput
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
