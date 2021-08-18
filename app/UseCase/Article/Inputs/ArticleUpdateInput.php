<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\UpdateInput;

class ArticleUpdateInput extends UpdateInput
{
    /**
     * @var int
     */
    private int $id;

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
     * @param int    $id
     * @param string $title
     * @param string $type
     * @param string $content
     */
    public function __construct(int $id, string $title, string $type, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
