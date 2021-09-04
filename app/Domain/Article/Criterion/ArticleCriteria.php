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
     * @param string $target
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $target, string $limit, string $order)
    {
        $this->target = $target;
        $this->limit = $limit;
        $this->order = $order;
    }
}
