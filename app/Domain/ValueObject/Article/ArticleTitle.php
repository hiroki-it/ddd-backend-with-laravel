<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Article;

use App\Domain\Entity\Entity;

/**
 * 記事タイトルクラス
 */
final class ArticleTitle extends Entity
{
    /**
     * 記事タイトル
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
