<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository
{
    /**
     * READ
     *
     * @param ArticleCriteria $criteria
     * @return array
     */
    function find(ArticleCriteria $criteria): array;

    /**
     * CREATE
     *
     * @param ArticleId $id
     * @return array
     */
    function create(ArticleId $id): array;

    /**
     * UPDATE
     *
     * @param ArticleId $id
     * @return array
     */
    function update(ArticleId $id): array;

    /**
     * DELETE
     *
     * @param ArticleId $id
     * @return array
     */
    function delete(ArticleId $id): array;
}
