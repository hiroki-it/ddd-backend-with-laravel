<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\ShowInput;

/**
 * 記事リクエストモデル
 */
final class ArticleShowInput extends ShowInput
{
    /**
     * @param int $articleId
     */
    public function __construct(int $articleId)
    {
        parent::__construct($articleId);
    }
}