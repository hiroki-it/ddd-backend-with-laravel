<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Article;

use App\Domain\ValueObject\ValueObject;

/**
 * 記事IDクラス
 */
final class ArticleId extends ValueObject
{

    /**
     * コンストラクタインジェクション
     *
     * @param string|null $value
     */
    public function __construct(?string $value)
    {
        $this->value = $value;
    }
}
