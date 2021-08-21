<?php

namespace App\UseCase\Article\Outputs;

use App\UseCase\Output;

/**
 * 条件に基づく記事取得レスポンスクラス
 */
final class ArticleGetAllOutput extends Output
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
