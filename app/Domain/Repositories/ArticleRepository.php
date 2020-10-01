<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{
    /**
     * READ
     *
     * @param ArticleCriteria $criteria
     * @return Article
     */
    function find(ArticleCriteria $criteria): Article;

    /**
     * CREATE
     *
     * @param Article $article
     * @return void
     */
    function create(Article $article): void;

    /**
     * UPDATE
     *
     * @param ArticleId $id
     * @return void
     */
    function update(ArticleId $id): void;

    /**
     * DELETE
     *
     * @param ArticleId $id
     * @return void
     */
    function delete(ArticleId $id): void;
}
