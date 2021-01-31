<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\ValueObject;

/**
 * ユーザ電話番号クラス
 */
final class UserPhoneNumber extends ValueObject
{
    /**
     * ユーザ電話番号
     *
     * @var string
     */
    private string $phoneNumber;

    /**
     * コンストラクタインジェクション
     *
     * @param string $phoneNumber
     */
    public function __constructor(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}
