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
     * ユーザ電話番号を返却します．
     *
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
