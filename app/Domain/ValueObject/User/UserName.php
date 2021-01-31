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
    private string $name;

    /**
     * コンストラクタインジェクション
     *
     * @param string $name
     */
    public function __constructor(string $name)
    {
        $this->name = $name;
    }
}
