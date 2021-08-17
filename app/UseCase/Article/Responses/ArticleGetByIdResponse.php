<?php

namespace App\UseCase\Article\Responses;

use App\UseCase\Response;

/**
 * IDに基づく記事取得レスポンスクラス
 */
class ArticleGetByIdResponse extends Response
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

    /**
     * @param int    $articleId
     * @param string $articleTitle
     * @param string $articleType
     * @param string $articleContent
     */
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
