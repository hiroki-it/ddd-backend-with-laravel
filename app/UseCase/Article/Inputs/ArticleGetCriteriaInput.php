<?php

declare(strict_types=1);

namespace App\Usecase\Article\Inputs;

use App\Usecase\GetCriteriaInput;

/**
 * 記事インプットクラス
 */
final class ArticleGetCriteriaInput extends GetCriteriaInput
{
    /**
     * コンストラクタインジェクション
     *
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $limit = self::DEFAULT_LIMIT, string $order = self::DEFAULT_ORDER)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
