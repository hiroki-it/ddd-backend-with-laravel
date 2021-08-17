<?php

declare(strict_types=1);

namespace App\Domain\Article\ValueObjects;

use App\Domain\ValueObject;

/**
 * 記事タイトルクラス
 */
final class ArticleTitle extends ValueObject
{
    /**
     * @var string
     */
    private string $title;

    /**

     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
