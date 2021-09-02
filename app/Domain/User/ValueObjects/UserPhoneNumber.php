<?php

declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

use App\Domain\ValueObject;

/**
 * ユーザ電話番号クラス
 */
final class UserPhoneNumber extends ValueObject
{
    /**
     * @var string
     */
    protected string $phoneNumber;

    /**
     * @param string $phoneNumber
     */
    public function __constructor(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}
