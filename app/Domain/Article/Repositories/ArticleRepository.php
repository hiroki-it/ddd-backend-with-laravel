<?php

declare(strict_types=1);

namespace App\Domain\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\ValueObjects\ArticleId;
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
    public function findById(ArticleId $id): Article;

    /**
     * READ：記事エンティティを全て読み出します．
     *
     * @return array
     */
    public function findAll(): array;

    /**
     * READ：指定した条件の記事エンティティを全て読み出します．
     *
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAllByCriteria(ArticleCriteria $criteria): array;

    /**
     * CREATE：記事エンティティを作成します．
     *
     * @param Article $article
     * @return Article
     */
    public function create(Article $article): Article;

    /**
     * UPDATE：記事エンティティを更新します．
     *
     * @param Article $article
     * @return Article
     */
    public function update(Article $article): Article;

    /**
     * DELETE：記事エンティティを削除します．
     *
     * @param Article $article
     * @return bool
     */
    public function delete(Article $article): bool;
}
