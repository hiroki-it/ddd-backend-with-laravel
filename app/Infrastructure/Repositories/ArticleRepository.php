<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;
use Illuminate\Database\Eloquent\Collection;

/**
 * 記事リポジトリ実装クラス
 */
class ArticleRepository extends Repository implements DomainRepository
{
    /**
     * 記事クラス
     *
     * @var Article
     */
    private Article $article;

    /**
     * コンストラクタインジェクション
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->$article = $article;
    }

    /**
     * @return Collection
     */
    public function findAllEntity(): Collection
    {
        return $this->article->all();
    }

    /**
     * @param ArticleId $articleId
     * @return Collection
     */
    public function findEntityById(ArticleId $articleId): Collection
    {
        return $this->article->find($articleId);
    }

    /**
     * @param ArticleCriteria $criteria
     * @return Collection
     */
    public function findEntityByCriteria(ArticleCriteria $criteria): Collection
    {

    }

    /**
     * @param Article $article
     * @return void
     */
    public function createEntity(Article $article): void
    {
        $article->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updateEntity(Article $article): void
    {
        $article->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function deleteEntity(Article $article): void
    {
        $article->save();
    }
}
