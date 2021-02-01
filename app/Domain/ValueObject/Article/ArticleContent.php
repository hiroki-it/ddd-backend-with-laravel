<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Article;

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
    private string $value;

    /**
     * コンストラクタインジェクション
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
