<?php

declare(strict_types=1);

namespace App\Domain\Article\Criterion;

use App\Domain\Criteria;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * @param string $key
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $key, string $limit, string $order)
    {
        $this->key = $key;
        $this->limit = $limit;
        $this->order = $order;
    }
}
