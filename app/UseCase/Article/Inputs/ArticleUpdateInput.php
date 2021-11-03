<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\UpdateInput;

final class ArticleUpdateInput extends UpdateInput
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
     * @var string
     */
    protected string $title;

    /**
     * @var int
     */
    protected int $type;

    /**
     * @var string
     */
    protected string $content;

    /**
     * @param int    $articleId
     * @param int    $authId
     * @param string $title
     * @param int    $type
     * @param string $content
     */
    public function __construct(int $articleId, int $authId, string $title, int $type, string $content)
    {
        $this->articleId = $articleId;
        $this->authId = $authId;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
