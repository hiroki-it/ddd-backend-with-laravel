<?php

declare(strict_types=1);

namespace App\Infrastructure\Factories;

use App\Domain\Entity\Article\Article;
use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\ValueObject\Id\ArticleId;
use App\Domain\ValueObject\Type\ArticleType;

/**
 * 記事ファクトリクラス
 */
class ArticleFactory extends Factory
{
    /**
     * 記事クラスのエンティティを生成します．
     *
     * @param string $id
     * @param array  $validated
     * @return Article
     */
    public static function createInstance(string $id, array $validated)
    {
        return new Article(
            new ArticleId($id),
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );
    }

}
