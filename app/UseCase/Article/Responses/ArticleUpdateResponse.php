<?php

namespace App\UseCase\Article\Responses;

/**
 * 記事更新レスポンスクラス
 */
class ArticleUpdateResponse
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
        $this->articleId = $articleId;
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
            'id'      => $this->articleId,
            'title'   => $this->articleTitle,
            'type'    => $this->articleType,
            'content' => $this->articleContent,
        ];
    }
}
