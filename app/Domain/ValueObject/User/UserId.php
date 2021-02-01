<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\ValueObject;

/**
 * ユーザIDクラス
 */
final class UserId extends ValueObject
{
    /**
     * ユーザID
     *
     * @var string|null
     */
    private ?string $value;

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
