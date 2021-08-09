<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

use App\Domain\ValueObject;

/**
 * ユーザ名クラス
 */
final class UserName extends ValueObject
{
    /**
     * @var string
     */
    private string $name;

    /**
     * コンストラクタ
     *
     * @param string $name
     */
    public function __constructor(string $name)
    {
        $this->name = $name;
    }
}
