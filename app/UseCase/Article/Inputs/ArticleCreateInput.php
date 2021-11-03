<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\CreateInput;

final class ArticleCreateInput extends CreateInput
{
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
     * @param int    $authId
     * @param string $title
     * @param int    $type
     * @param string $content
     */
    public function __construct(int $authId, string $title, int $type, string $content)
    {
        $this->authId = $authId;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
