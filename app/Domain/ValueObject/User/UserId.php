<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\Id;

/**
 * ユーザIDクラス
 */
final class UserId extends Id
{
    /**
     * コンストラクタインジェクション
     *
     * @param string|null $value
     */
    public function __constructor(?string $value)
    {
        $this->value = $value;
    }
}
