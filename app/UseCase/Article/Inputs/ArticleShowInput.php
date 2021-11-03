<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\ShowInput;

final class ArticleShowInput extends ShowInput
{
    /**
     * @var int
     */
    protected int $articleId;

    /**
     * @var int
     */
    protected int $userId;

    /**
     * @param int $articleId
     * @param int $userId
     */
    public function __construct(int $articleId, int $userId)
    {
        $this->articleId = $articleId;
        $this->userId = $userId;
    }
}
