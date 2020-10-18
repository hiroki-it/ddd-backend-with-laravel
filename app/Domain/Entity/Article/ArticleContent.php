<?php

declare(strict_types=1);

namespace App\Domain\Entity\Article;

use App\Domain\Entity\Entity;

/**
 * 記事本文クラス
 */
final class ArticleContent extends Entity
{
    /**
     * 記事本文
     *
     * @var string
     */
    private string $content;

    /**
     * コンストラクタインジェクション
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
