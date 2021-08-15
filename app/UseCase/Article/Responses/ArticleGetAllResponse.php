<?php

namespace App\UseCase\Article\Responses;

/**
 * 条件に基づく記事取得レスポンスクラス
 */
class ArticleGetAllResponse
{
    /**
     * @var array
     */
    private array $articles;

    public function __construct(array $articles)
    {
        $this->articles=$articles;
    }
}
