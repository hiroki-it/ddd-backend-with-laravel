<?php

declare(strict_types=1);

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * 区分基底クラス
 */
abstract class Type
{
    use ImmutableTrait;

    /**
     * @var int
     */
    protected int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }
}
