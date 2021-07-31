<?php

declare(strict_types=1);

namespace App\Usecase\Article\Inputs;

use App\Domain\Article\ValueObjects\ArticleId;
use App\Usecase\GetCriteriaInput;

/**
 * 記事インプットクラス
 */
final class ArticleGetCriteriaInput extends GetCriteriaInput
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
    public function __construct(ArticleId $id, string $limit = self::DEFAULT_LIMIT,  string $order = self::DEFAULT_ORDER)
    {
        $this->id = $id;
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
        return $this->id;
    }
}
