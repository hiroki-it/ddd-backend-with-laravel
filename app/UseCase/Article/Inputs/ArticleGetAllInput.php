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
     * @param string $key
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $key, string $limit, string $order)
    {
        $this->key = $key;
        $this->limit = $limit;
        $this->order = $order;
    }
}
