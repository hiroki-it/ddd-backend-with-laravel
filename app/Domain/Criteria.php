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
     * 件数
     *
     * @var int
     */
    protected int $limit;

    /**
     * 順序
     *
     * @var string
     */
    protected string $order;

    /**
     * 件数を返却します．
     *
     * @return int
     */
    public function limit(): int
    {
        return $this->limit;
    }

    /**
     * 順序を返却します．
     *
     * @return string
     */
    public function order(): string
    {
        return $this->order;
    }
}
