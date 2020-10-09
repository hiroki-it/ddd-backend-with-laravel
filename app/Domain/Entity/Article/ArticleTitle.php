<?php

declare(strict_types=1);

namespace App\Domain\Entity\Article;

use App\Domain\Entity\Entity;

/**
 * 記事タイトルクラス
 */
final class ArticleTitle extends Entity
{
    /**
     * コンストラクタインジェクション
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        parent::__construct($title);
    }
}
