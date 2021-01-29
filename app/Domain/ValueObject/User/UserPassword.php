<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\Password;

/**
 * ユーザパスワードクラス
 */
final class UserPassword extends Password
{
    /**
     * ユーザパスワード
     *
     * @var string
     */
    private string $password;

    /**
     * コンストラクタインジェクション
     *
     * @param string $password
     */
    public function __constructor(string $password)
    {
        $this->password = $password;
    }
}
