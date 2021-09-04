<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

use App\Domain\ValueObject;

/**
 * ユーザ認証コードクラス
 */
final class UserAuthenticationCode extends ValueObject
{
    /**
     * @var string
     */
    protected string $authenticationCode;

    /**
     * @param string $authenticationCode
     */
    public function __construct(string $authenticationCode)
    {
        $this->authenticationCode = $authenticationCode;
    }
}
