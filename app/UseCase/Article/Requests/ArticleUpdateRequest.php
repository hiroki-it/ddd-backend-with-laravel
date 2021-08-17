<?php

declare(strict_types=1);

namespace App\UseCase\Article\Requests;

use App\UseCase\UpdateRequest;

class ArticleUpdateRequest extends UpdateRequest
{
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
