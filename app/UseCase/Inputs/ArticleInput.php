<?php

declare(strict_types=1);

namespace App\UseCase\Inputs;

use App\Domain\Article\ValueObject\ArticleContent;
use App\Domain\Article\ValueObject\ArticleTitle;
use App\Domain\Article\ValueObject\ArticleType;

class ArticleInput
{
    /**
     * 記事タイトルクラス
     *
     * @var ArticleTitle
     */
    private ArticleTitle $title;

    /**
     * 記事区分クラス
     *
     * @var ArticleType
     */
    private ArticleType $type;

    /**
     * 記事本文クラス
     *
     * @var ArticleContent
     */
    private ArticleContent $content;

    /**
     * コンストラクタインジェクション
     *
     * @param array $validated
     */
    public function __construct(array $validated)
    {
        $this->title = $validated['title'];
        $this->type = $validated['type'];
        $this->content = $validated['content'];
    }

}
