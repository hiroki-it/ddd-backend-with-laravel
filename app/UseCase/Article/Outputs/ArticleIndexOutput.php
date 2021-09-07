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
    private array $articleShowOutputs;

    /**
     * @param array $articleShowOutputs
     */
    public function __construct(array $articleShowOutputs)
    {
        $this->articleShowOutputs = $articleShowOutputs;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $articles = [];

        foreach ($this->articleShowOutputs as $articleShowOutput) {
            $articles[] = $articleShowOutput->toArray();
        }

        return [
            'articles' => $articles
        ];
    }
}
