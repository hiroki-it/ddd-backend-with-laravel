<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\CreateInput;

final class ArticleCreateInput extends CreateInput
{
    /**
     * @var int
     */
    protected int $userId;

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
     * @param int    $userId
     * @param string $title
     * @param int    $type
     * @param string $content
     */
    public function __construct(int $userId, string $title, int $type, string $content)
    {
        $this->userId = $userId;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
