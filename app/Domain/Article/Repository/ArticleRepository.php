<?php

declare(strict_types=1);

namespace App\Domain\Article\Repository;

use App\Domain\Article\Entity\Article;
use App\Domain\Article\ValueObject\ArticleId;
use App\Domain\Repository;

/**
 * 記事リポジトリインターフェース
 */
interface ArticleRepository extends Repository
{

    /**
     * READ：指定したIDの記事エンティティを読み出します．
     *
     * @param ArticleId $id
     * @return Article
     */
    function findById(ArticleId $id): Article;

    /**
     * READ：記事エンティティを全て読み出します．
     *
     * @return array
     */
    function findAll(): array;

    /**
     * READ：指定した条件の記事エンティティを全て読み出します．
     *
     * @param string $order
     * @param string $limit
     * @return array
     */
    function findAllByCriteria(string $order, string $limit): array;

    /**
     * CREATE：記事エンティティを作成します．
     *
     * @param Article $article
     * @return void
     */
    function create(Article $article): void;

    /**
     * UPDATE：記事エンティティを更新します．
     *
     * @param Article $article
     * @return void
     */
    function update(Article $article): void;

    /**
     * DELETE：記事エンティティを削除します．
     *
     * @param Article $article
     * @return void
     */
    function delete(Article $article): void;
}
