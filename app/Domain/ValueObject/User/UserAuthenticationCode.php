<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\ValueObject;

/**
 * ユーザ認証コードクラス
 */
final class UserAuthenticationCode extends ValueObject
{
    /**
     * ユーザ認証コード
     *
     * @var string
     */
    private string $value;

    /**
     * コンストラクタインジェクション
     *
     * @param string $value
     */
    public function __constructor(string $value)
    {
        $this->value = $value;
    }

    /**
     * ユーザ認証コードを返却します．
     *
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
