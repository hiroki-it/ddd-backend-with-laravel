<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

use App\Domain\ValueObject;

/**
 * ユーザパスワードクラス
 */
final class UserPassword extends ValueObject
{
    /**
     * @var string
     */
    protected string $password;

    /**
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }
}
