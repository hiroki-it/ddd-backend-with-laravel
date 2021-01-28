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
     * READ：指定したIDの記事エンティティを読み出します．
     *
     * @param ArticleId $articleId
     * @return Article
     */
    function findOneById(ArticleId $articleId): Article;

    /**
     * READ：記事エンティティを全て読み出します．
     *
     * @return array
     */
    function findAll(): array;

    /**
     * READ：指定した条件の記事エンティティを全て読み出します．
     *
     * @param ArticleCriteria $criteria
     * @return array
     */
    function findAllByCriteria(ArticleCriteria $criteria): array;

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
     * @param ArticleId $articleId
     * @return void
     */
    function update(array $validated, ArticleId $articleId): void;

    /**
     * DELETE：記事エンティティを削除します．
     *
     * @param Article $article
     * @return void
     */
    function delete(Article $article): void;
}
