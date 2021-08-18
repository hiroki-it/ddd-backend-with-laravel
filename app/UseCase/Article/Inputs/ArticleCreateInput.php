<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\CreateInput;

class ArticleCreateInput extends CreateInput
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $content;

    /**
     * @param string $title
     * @param string $type
     * @param string $content
     */
    public function __construct(string $title, string $type, string $content)
    {
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
