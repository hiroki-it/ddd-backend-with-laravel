<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

use App\Domain\ValueObject;

/**
 * メールアドレスクラス
 */
final class UserEmailAddress extends ValueObject
{
    /**
     * @var string
     */
    private string $emailAddress;

    /**
     * コンストラクタ
     *
     * @param string $emailAddress
     */
    public function __constructor(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}
