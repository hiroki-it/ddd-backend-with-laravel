<?php

namespace App\Criteria;

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
    public function __construct(ArticleId $id, string $order, int $limit)
    {
        $this->id = $id;
        $this->limit = $limit;
        $this->order = $order;
    }
}
