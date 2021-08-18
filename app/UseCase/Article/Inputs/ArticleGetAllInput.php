<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\Constant\CriteriaConstant;
use App\UseCase\GetAllInput;

/**
 * 記事リクエストモデル
 */
final class ArticleGetAllInput extends GetAllInput
{
    /**
     * @param int $limit
     * @param string $order
     */
    public function __construct(int $limit = CriteriaConstant::DEFAULT_LIMIT, string $order = CriteriaConstant::DEFAULT_ORDER)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
