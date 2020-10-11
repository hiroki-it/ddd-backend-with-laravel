<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\ValueObject\Id\ArticleId;
use Illuminate\Database\Eloquent\Collection;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{
    /**
     * READ：全ての記事エンティティを読み出します．
     *
     * @return Collection
     */
    function findAllEntity(): Collection;

    /**
     * READ：指定したIDの記事エンティティを読み出します．
     *
     * @param ArticleId $id
     * @return Collection
     */
    function findEntityById(ArticleId $id): Collection;

    /**
     * READ：指定した条件の記事エンティティを読み出します．
     *
     * @param ArticleCriteria $criteria
     * @return Collection
     */
    function findEntityByCriteria(ArticleCriteria $criteria): Collection;

    /**
     * CREATE：記事エンティティを作成します．
     *
     * @param Article $article
     * @return void
     */
    function createEntity(Article $article): void;

    /**
     * UPDATE：記事エンティティを更新します．
     *
     * @param Article $article
     * @return void
     */
    function updateEntity(Article $article): void;

    /**
     * DELETE：記事エンティティを削除します．
     *
     * @param Article $article
     * @return void
     */
    function deleteEntity(Article $article): void;
}
