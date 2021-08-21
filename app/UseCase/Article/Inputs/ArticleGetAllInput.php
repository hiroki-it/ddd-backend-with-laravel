<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

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
    public function __construct(int $limit, string $order)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
