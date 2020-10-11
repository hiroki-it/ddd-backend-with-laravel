<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリ実装クラス
 */
class ArticleRepository extends Repository implements DomainRepository
{
    /**
     * @return Article
     */
    public function findAllEntity(): Article
    {

    }

    /**
     * @param ArticleId $articleId
     * @return Article
     */
    public function findEntityById(ArticleId $articleId): Article
    {

    }

    /**
     * @param ArticleCriteria $criteria
     * @return Article
     */
    public function findEntityByCriteria(ArticleCriteria $criteria): Article
    {

    }

    /**
     * @param Article $article
     * @return void
     */
    public function createEntity(Article $article): void
    {


    }

    /**
     * @param Article $article
     * @return void
     */
    public function updateEntity(Article $article): void
    {


    }

    /**
     * @param Article $article
     * @return void
     */
    public function deleteEntity(Article $article): void
    {

    }
}
