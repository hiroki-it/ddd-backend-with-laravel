<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\ValueObject\Id\ArticleId;
use App\Domain\ValueObject\Type\ArticleType;

/**
 * 記事クラス（ルートエンティティ）
 */
final class Article extends Entity
{
    /**
     * コンストラクタインジェクション
     *
     * @param ArticleId      $id
     * @param ArticleTitle   $title
     * @param ArticleType    $type
     * @param ArticleContent $content
     */
    public function __construct(ArticleId $id, ArticleTitle $title, ArticleType $type, ArticleContent $content)
    {
        parent::__construct($id, $title, $type, $content);
    }
}

