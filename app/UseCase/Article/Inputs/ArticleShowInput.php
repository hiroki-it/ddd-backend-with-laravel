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
