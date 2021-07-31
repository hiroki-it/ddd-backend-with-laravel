<?php

declare(strict_types=1);

namespace App\Domain;

/**
 * ドメイン検索条件クラス
 * NOTE: 検索条件パターンを採用しています．
 */
abstract class Criteria
{
    /**
     * 件数
     *
     * @var string
     */
    protected string $limit;

    /**
     * 順序
     *
     * @var string
     */
    protected string $order;

    /**
     * 件数を返却します．
     *
     * @return string
     */
    public function limit(): string
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
