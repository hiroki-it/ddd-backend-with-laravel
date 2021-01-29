<?php

declare(strict_types=1);

namespace App\Criteria;

use App\Constants\CriteriaConstant;
use App\Domain\ValueObject\Article\ArticleId;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * @var ArticleId
     */
    private ArticleId $articleId;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleId $articleId
     * @param string    $limit
     * @param string    $order
     */
    public function __construct(ArticleId $articleId, string $limit = CriteriaConstant::DEFAULT_LIMIT,  string $order = CriteriaConstant::DEFAULT_ORDER)
    {
        $this->articleId = $articleId;
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
