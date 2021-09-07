<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\IndexInput;

final class ArticleIndexInput extends IndexInput
{
    /**
     * @param string $target
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $target, string $limit, string $order)
    {
        $this->key = $target;
        $this->limit = $limit;
        $this->order = $order;
    }
}
