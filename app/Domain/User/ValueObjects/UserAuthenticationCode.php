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
    private string $authenticationCode;

    /**
     * @param string $authenticationCode
     */
    public function __constructor(string $authenticationCode)
    {
        $this->authenticationCode = $authenticationCode;
    }
}
