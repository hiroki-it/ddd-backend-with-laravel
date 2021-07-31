<?php

declare(strict_types=1);

namespace App\Domain\Article\ValueObject;

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
     * コンストラクタインジェクション
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}
