<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\ValueObject;

/**
 * ユーザ名クラス
 */
final class UserName extends ValueObject
{
    /**
     * ユーザ名
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
}
