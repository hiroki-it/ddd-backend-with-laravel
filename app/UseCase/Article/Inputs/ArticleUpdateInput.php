<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\UpdateInput;

class ArticleUpdateInput extends UpdateInput
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
