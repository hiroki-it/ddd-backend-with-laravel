<?php

declare(strict_types=1);

namespace App\Domain\Article\ValueObjects;

use App\Domain\ValueObject;

/**
 * 記事本文クラス
 */
final class ArticleContent extends ValueObject
{
    /**
     * @var string
     */
    private string $content;

    /**

     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
