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
    protected int $authId;

    /**
     * @param int $articleId
     * @param int $authId
     */
    public function __construct(int $articleId, int $authId)
    {
        $this->articleId = $articleId;
        $this->authId = $authId;
    }
}
