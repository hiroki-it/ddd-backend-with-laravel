<?php

declare(strict_types=1);

namespace App\UseCase\Article\Requests;

use App\UseCase\GetAllByCriteriaRequest;

/**
 * 記事インプットクラス
 */
final class ArticleGetAllByCriteriaRequest extends GetAllByCriteriaRequest
{
    /**
     * コンストラクタインジェクション
     *
     * @param int $limit
     * @param string $order
     */
    public function __construct(int $limit = self::DEFAULT_LIMIT, string $order = self::DEFAULT_ORDER)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
