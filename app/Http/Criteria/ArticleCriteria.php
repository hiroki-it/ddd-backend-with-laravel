<?php

declare(strict_types=1);

namespace App\Criteria;

use App\Constant\CriteriaConstant;
use App\Domain\Article\ValueObject\ArticleId;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * @var ArticleId
     */
    private ArticleId $id;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleId $id
     * @param string    $limit
     * @param string    $order
     */
    public function __construct(ArticleId $id, string $limit = CriteriaConstant::DEFAULT_LIMIT,  string $order = CriteriaConstant::DEFAULT_ORDER)
    {
        $this->articleId = $id;
        $this->limit = $limit;
        $this->order = $order;
    }

    /**
     * 記事IDクラスを返却します．
     *
     * @return ArticleId
     */
    public function id(): ArticleId
    {
        return $this->articleId;
    }
}
