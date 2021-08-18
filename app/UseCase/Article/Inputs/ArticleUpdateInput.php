<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\UpdateInput;

class ArticleUpdateInput extends UpdateInput
{
    /**
     * 記事タイトルクラス
     *
     * @var int
     */
    private int $id;

    /**
     * 記事タイトルクラス
     *
     * @var string
     */
    private string $title;

    /**
     * 記事区分クラス
     *
     * @var string
     */
    private string $type;

    /**
     * 記事本文クラス
     *
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
