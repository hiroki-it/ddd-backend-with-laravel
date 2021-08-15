<?php

namespace App\UseCase\Article\Responses;

/**
 * IDに基づく記事取得レスポンスクラス
 */
class ArticleGetByIdResponse
{
    /**
     * @var int
     */
    private int $articleId;

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

    public function __construct(int $articleId, string $articleTitle, string $articleType, string $articleContent)
    {
        $this->articleId=$articleId;
        $this->articleTitle=$articleTitle;
        $this->articleType=$articleType;
        $this->articleContent=$articleContent;
    }
}
