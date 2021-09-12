<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\UpdateInput;

final class ArticleUpdateInput extends UpdateInput
{
    /**
     * @var int
     */
    protected int $id;

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
     * @param int    $id
     * @param int    $userId
     * @param string $title
     * @param int    $type
     * @param string $content
     */
    public function __construct(int $id, int $userId, string $title, int $type, string $content)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
