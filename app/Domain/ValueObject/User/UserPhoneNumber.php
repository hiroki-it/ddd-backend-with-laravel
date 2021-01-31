<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\PhoneNumber;

/**
 * ユーザ電話番号クラス
 */
final class UserPhoneNumber extends PhoneNumber
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
