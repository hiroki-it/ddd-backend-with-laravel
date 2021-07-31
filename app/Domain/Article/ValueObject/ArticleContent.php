<?php

declare(strict_types=1);

namespace App\Domain\Article\ValueObject;

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
     * コンストラクタインジェクション
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function content(): string
    {
      return $this->content;
    }
}
