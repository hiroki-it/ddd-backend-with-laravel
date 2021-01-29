<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Article;

use App\Domain\ValueObject\Id;

/**
 * 記事IDクラス
 */
final class ArticleId extends Id
{
    /**
     * 記事ID
     *
     * @var string
     */
    private string $id;

    /**
     * コンストラクタインジェクション
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
