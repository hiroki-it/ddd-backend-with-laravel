<?php

declare(strict_types=1);

namespace App\Domain\Article\Criterion;

use App\Domain\Criteria;
use App\Domain\User\Ids\UserId;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * @param UserId $userId
     * @param string $target
     * @param string $limit
     * @param string $order
     */
    public function __construct(UserId $userId, string $target, string $limit, string $order)
    {
        $this->userId = $userId;
        $this->target = $target;
        $this->limit = $limit;
        $this->order = $order;
    }
}
