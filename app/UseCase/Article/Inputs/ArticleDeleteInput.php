<?php

namespace App\UseCase\Article\Inputs;

use App\UseCase\DeleteInput;

final class ArticleDeleteInput extends DeleteInput
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
