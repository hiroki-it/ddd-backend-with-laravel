<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repositories\ArticleRepository as DomainRepository;
use App\Domain\ValueObject\Id\ArticleId;
use App\Infrastructure\DTO\ArticleDTO;
use Illuminate\Database\Eloquent\Collection;

/**
 * 記事リポジトリ実装クラス
 */
final class ArticleRepository extends Repository implements DomainRepository
{
    /**
     * 記事DTOクラス
     *
     * @var ArticleDTO
     */
    private ArticleDTO $articleDto;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleDTO $articleDto
     */
    public function __construct(ArticleDTO $articleDto)
    {
        $this->articleDto = $articleDto;
    }

    /**
     * @return Collection
     */
    public function findAllEntity(): Collection
    {
        return $this->articleDto->all();
    }

    /**
     * @param ArticleId $articleId
     * @return Collection
     */
    public function findEntityById(ArticleId $articleId): Collection
    {
        return $this->articleDto->find($articleId);
    }

    /**
     * @param ArticleCriteria $criteria
     * @return Collection
     */
    public function findEntityByCriteria(ArticleCriteria $criteria): Collection
    {
        return $this->articleDto->orderby($criteria->order())
            ->take($criteria->limit())
            ->get();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function createEntity(Article $article): void
    {
        $this->articleDto->id = $article->id();
        $this->articleDto->title = $article->title();
        $this->articleDto->type = $article->type();
        $this->articleDto->content = $article->content();
        $this->articleDto->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updateEntity(Article $article): void
    {
        $this->articleDto->id = $article->id();
        $this->articleDto->title = $article->title();
        $this->articleDto->type = $article->type();
        $this->articleDto->content = $article->content();
        $this->articleDto->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function deleteEntity(Article $article): void
    {
        $this->articleDto->delete();
    }
}
