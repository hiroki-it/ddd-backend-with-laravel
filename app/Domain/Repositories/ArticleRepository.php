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
     * READ：全ての記事エンティティを読み出します．
     *
     * @return Article
     */
    function findAll(): Article;

    /**
     * READ：指定したIDの記事エンティティを読み出します．
     *
     * @param ArticleId $id
     * @return Article
     */
    function findWithId(ArticleId $id): Article;

    /**
     * READ：指定した条件の記事エンティティを読み出します．
     *
     * @param ArticleCriteria $criteria
     * @return Article
     */
    function findWithCriteria(ArticleCriteria $criteria): Article;

    /**
     * CREATE：記事エンティティを作成します．
     *
     * @param array $validated
     * @return void
     */
    function create(array $validated): void;

    /**
     * UPDATE：記事エンティティを更新します．
     *
     * @param array     $validated
     * @param ArticleId $id
     * @return void
     */
    function update(array $validated, ArticleId $id): void;

    /**
     * DELETE：記事エンティティを削除します．
     *
     * @param ArticleId $id
     * @return void
     */
    function delete(ArticleId $id): void;
}
