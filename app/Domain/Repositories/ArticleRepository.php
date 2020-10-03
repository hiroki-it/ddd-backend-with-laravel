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
     * @return Article
     */
    function findAll(): Article;

    /**
     * READ
     *
     * @param ArticleId $id
     * @return Article
     */
    function findWithId(ArticleId $id): Article;

    /**
     * READ
     *
     * @param ArticleCriteria $criteria
     * @return Article
     */
    function findWithCriteria(ArticleCriteria $criteria): Article;

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
     * @param Article $article
     * @return void
     */
    function update(Article $article): void;

    /**
     * DELETE
     *
     * @param ArticleId $id
     * @return void
     */
    function delete(ArticleId $id): void;
}
