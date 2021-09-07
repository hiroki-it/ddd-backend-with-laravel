<?php

namespace App\UseCase\Article\Outputs;

use App\UseCase\Output;

/**
 * レスポンスクラス
 */
final class ArticleIndexOutput extends Output
{
    /**
     * @var array
     */
    private array $ArticleGetOneOutputs;

    /**
     * @param array $ArticleGetOneOutputs
     */
    public function __construct(array $ArticleGetOneOutputs)
    {
        $this->ArticleGetOneOutputs = $ArticleGetOneOutputs;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $articles = [];

        foreach ($this->ArticleGetOneOutputs as $articleGetOneOutput) {
            $articles[] = $articleGetOneOutput->toArray();
        }

        return [
            'articles' => $articles
        ];
    }
}
