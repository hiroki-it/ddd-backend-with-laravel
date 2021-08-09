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
    private string $password;

    /**
     * コンストラクタ
     *
     * @param string $password
     */
    public function __constructor(string $password)
    {
        $this->password = $password;
    }
}
