<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\EmailAddress;

/**
 * メールアドレスクラス
 */
final class UserEmailAddress extends EmailAddress
{
    /**
     * メールアドレス
     *
     * @var string
     */
    private string $emailAddress;

    /**
     * コンストラクタインジェクション
     *
     * @param string $emailAddress
     */
    public function __constructor(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}
