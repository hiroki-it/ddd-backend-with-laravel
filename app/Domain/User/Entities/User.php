<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\Entity;
use App\Domain\User\ValueObjects\UserAuthenticationCode;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserId;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Domain\User\ValueObjects\UserPhoneNumber;

/**
 * ユーザクラス
 *
 * ドメイン貧血症にならないように注意してください．
 */
final class User extends Entity
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
     * 認証コード
     *
     * @var UserAuthenticationCode
     */
    private UserAuthenticationCode $authenticationCode;

    /**
     * コンストラクタインジェクション
     *
     * @param UserId                 $id
     * @param UserName               $name
     * @param UserEmailAddress       $emailAddress
     * @param UserPhoneNumber        $phoneNumber
     * @param UserPassword           $password
     * @param UserAuthenticationCode $authenticationCode
     */
    public function __construct(UserId $id, UserName $name, UserEmailAddress $emailAddress, UserPhoneNumber $phoneNumber, UserPassword $password, UserAuthenticationCode $authenticationCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->password = $password;
        $this->authenticationCode = $authenticationCode;
    }
}
