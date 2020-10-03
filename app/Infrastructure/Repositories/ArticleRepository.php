<?php


namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリ実装クラス
 */
class ArticleRepository implements DomainRepository
{
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
     * @param Article $article
     * @return void
     */
    public function create(Article $article): void
    {

    }

    /**
     * @param Article $article
     * @return void
     */
    public function update(Article $article): void
    {

    }

    /**
     * @param ArticleId $id
     * @return void
     */
    public function delete(ArticleId $id): void
    {

    }
}
