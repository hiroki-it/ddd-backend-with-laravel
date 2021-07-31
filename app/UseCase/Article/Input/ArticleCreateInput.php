<?php

declare(strict_types=1);

namespace App\UseCase\Inputs;

class ArticleCreateInput
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

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }

}
