<?php


namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article;
use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;
use App\Domain\ValueObject\Type\ArticleType;

/**
 * 記事リポジトリ実装クラス
 */
class ArticleRepository implements DomainRepository
{
    /**
     * @return Article
     */
    public function findAll(): Article
    {

    }

    /**
     * @param ArticleId $articleId
     * @return Article
     */
    public function findWithId(ArticleId $articleId): Article
    {

    }

    /**
     * @param ArticleCriteria $criteria
     * @return Article
     */
    public function findWithCriteria(ArticleCriteria $criteria): Article
    {

    }

    /**
     * @param array $validated
     * @return void
     */
    public function create(array $validated): void
    {

    }

    /**
     * @param array     $validated
     * @param ArticleId $id
     * @return void
     */
    public function update(array $validated, ArticleId $id): void
    {
        // Articleエンティティを生成
        $article = new Article(
            $id,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

    }

    /**
     * @param ArticleId $id
     * @return void
     */
    public function delete(ArticleId $id): void
    {

    }
}
