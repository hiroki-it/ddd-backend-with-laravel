<?php

declare(strict_types=1);

namespace App\Criteria;

use App\Constants\CriteriaConstant;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * コンストラクタインジェクション
     *
     * @param ArticleId $id
     * @param string    $order
     * @param int       $limit
     */
    public function __construct(ArticleId $id, int $limit = CriteriaConstant::DEFAULT_LIMIT,  string $order = CriteriaConstant::DEFAULT_ORDER)
    {
        $this->id = $id;
        $this->limit = $limit;
        $this->order = $order;
    }
}
