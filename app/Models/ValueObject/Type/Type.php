<?php

namespace App\Models\ValueObject\Type;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 区分抽象クラス
 */
abstract class Type extends Enum
{
    /**
     * @param string $value
     * @throws InvalidEnumMemberException
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
