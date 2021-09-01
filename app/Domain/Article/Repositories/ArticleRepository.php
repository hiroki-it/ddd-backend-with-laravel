<?php

declare(strict_types=1);

namespace App\Domain\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Repository;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{
    /**
     * @param ArticleId $id
     * @return Article
     */
    public function findById(ArticleId $id): Article;

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAll(ArticleCriteria $criteria): array;

    /**
     * @param Article $article
     * @return void
     */
    public function create(Article $article): void;

    /**
     * @param Article $article
     * @return void
     */
    public function update(Article $article): void;

    /**
     * @param ArticleId $articleId
     * @return void
     */
    public function delete(ArticleId $articleId): void;
}
