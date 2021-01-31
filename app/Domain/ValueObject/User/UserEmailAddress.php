<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\ValueObject;

/**
 * メールアドレスクラス
 */
final class UserEmailAddress extends ValueObject
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
