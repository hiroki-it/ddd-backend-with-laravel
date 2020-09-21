<?php


namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリ実装クラス
 */
class ArticleRepository implements DomainRepository
{
    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function find(ArticleCriteria $criteria): array
    {

    }

    /**
     * @param ArticleId $id
     * @return array
     */
    public function create(ArticleId $id): array
    {

    }

    /**
     * @param ArticleId $id
     * @return array
     */
    public function update(ArticleId $id): array
    {

    }

    /**
     * @param ArticleId $id
     * @return array
     */
    public function delete(ArticleId $id): array
    {

    }
}
