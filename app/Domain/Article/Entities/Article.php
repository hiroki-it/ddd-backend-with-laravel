<?php

declare(strict_types=1);

namespace App\Domain\Article\Entities;

use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\Domain\Entity;
use App\Traits\ImmutableTrait;

/**
 * 記事クラス
 *
 * ドメイン貧血症にならないように注意してください．
 */
final class Article extends Entity
{
    use ImmutableTrait;

    /**
     * @var ArticleTitle
     */
    private ArticleTitle $articleTitle;

    /**
     * @var ArticleType
     */
    private ArticleType $articleType;

    /**
     * @var ArticleContent
     */
    private ArticleContent $articleContent;

    /**
     * @param ArticleId      $articleId
     * @param ArticleTitle   $articleTitle
     * @param ArticleType    $articleType
     * @param ArticleContent $articleContent
     */
    public function __construct(ArticleId $articleId, ArticleTitle $articleTitle, ArticleType $articleType, ArticleContent $articleContent)
    {
        $this->id = $articleId;
        $this->articleTitle = $articleTitle;
        $this->articleType = $articleType;
        $this->articleContent = $articleContent;
    }
}
