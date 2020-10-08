<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\ValueObject\Id\ArticleId;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{
    /**
     * READ：全ての記事エンティティを読み出します．
     *
     * @return Article
     */
    function findAllEntity(): Article;

    /**
     * READ：指定したIDの記事エンティティを読み出します．
     *
     * @param ArticleId $id
     * @return Article
     */
    function findEntityWithId(ArticleId $id): Article;

    /**
     * READ：指定した条件の記事エンティティを読み出します．
     *
     * @param ArticleCriteria $criteria
     * @return Article
     */
    function findEntityWithCriteria(ArticleCriteria $criteria): Article;

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
