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
    protected string $emailAddress;

    /**
     * @param string $emailAddress
     */
    public function __construct(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}
