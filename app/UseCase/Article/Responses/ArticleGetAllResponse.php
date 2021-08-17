<?php

namespace App\UseCase\Article\Responses;

use App\UseCase\Response;

/**
 * 条件に基づく記事取得レスポンスクラス
 */
class ArticleGetAllResponse extends Response
{
    /**
     * @var array
     */
    private array $articles;

    /**
     * @param array $articles
     */
    public function __construct(array $articles)
    {
        $this->articles = $articles;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'articles' => $this->articles,
        ];
    }
}
