<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\ShowInput;

final class ArticleShowInput extends ShowInput
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $authId;

    /**
     * @param int $id
     * @param int $authId
     */
    public function __construct(int $id, int $authId)
    {
        $this->id = $id;
        $this->authId = $authId;
    }
}
