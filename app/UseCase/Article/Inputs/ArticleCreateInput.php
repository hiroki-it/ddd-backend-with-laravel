<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\CreateInput;

class ArticleCreateInput extends CreateInput
{
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
     * @param string $title
     * @param int $type
     * @param string $content
     */
    public function __construct(string $title, int $type, string $content)
    {
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
