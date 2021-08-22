<?php

declare(strict_types=1);

namespace App\Domain;

use App\Traits\ImmutableTrait;

/**
 * ドメイン検索条件クラス
 * NOTE: 検索条件パターンを採用しています．
 */
abstract class Criteria
{
    use ImmutableTrait;

    /**
     * @var string
     */
    protected string $limit;

    /**
     * @var string
     */
    protected string $order;
}
