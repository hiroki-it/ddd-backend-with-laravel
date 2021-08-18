<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\GetByIdInput;

/**
 * 記事リクエストモデル
 */
final class ArticleGetByIdInput extends GetByIdInput
{
    /**
     * @param int $articleId
     */
    public function __construct(int $articleId)
    {
        parent::__construct($articleId);
    }
}
