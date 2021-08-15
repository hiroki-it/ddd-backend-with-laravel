<?php

declare(strict_types=1);

namespace App\UseCase\Article\Requests;

use App\Constant\CriteriaConstant;
use App\UseCase\GetAllRequest;

/**
 * 記事インプットクラス
 */
final class ArticleGetAllRequest extends GetAllRequest
{
    /**
     * コンストラクタインジェクション
     *
     * @param int $limit
     * @param string $order
     */
    public function __construct(int $limit = CriteriaConstant::DEFAULT_LIMIT, string $order = CriteriaConstant::DEFAULT_ORDER)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
