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
    private ArticleTitle $title;

    /**
     * @var ArticleType
     */
    private ArticleType $type;

    /**
     * @var ArticleContent
     */
    private ArticleContent $content;

    /**
     * @param ArticleId      $id
     * @param ArticleTitle   $title
     * @param ArticleType    $type
     * @param ArticleContent $content
     */
    public function __construct(ArticleId $id, ArticleTitle $title, ArticleType $type, ArticleContent $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }
}
