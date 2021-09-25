<?php

namespace App\UseCase\Article\Outputs;

use App\UseCase\Output;

/**
 * IDに基づく記事取得レスポンスクラス
 */
final class ArticleShowOutput extends Output
{
    /**
     * @var string
     */
    private string $articleTitle;

    /**
     * @var string
     */
    private string $articleType;

    /**
     * @var string
     */
    private string $articleContent;

    /**
     * @param string $articleTitle
     * @param string $articleType
     * @param string $articleContent
     */
    public function __construct(string $articleTitle, string $articleType, string $articleContent)
    {
        $this->articleTitle = $articleTitle;
        $this->articleType = $articleType;
        $this->articleContent = $articleContent;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'   => $this->articleTitle,
            'type'    => $this->articleType,
            'content' => $this->articleContent,
        ];
    }
}
