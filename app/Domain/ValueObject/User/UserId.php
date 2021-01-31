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
    private ?string $id;

    /**
     * コンストラクタインジェクション
     *
     * @param string|null $id
     */
    public function __constructor(?string $id)
    {
        $this->id = $id;
    }
}
