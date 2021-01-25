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
     * @param ArticleId $articleId
     * @return Collection
     */
    public function findOneById(ArticleId $articleId): Collection
    {
        return $this->articleDto
            ->find($articleId);
    }

    /**
     * @param ArticleCriteria $criteria
     * @return Collection
     */
    public function findAllByCriteria(ArticleCriteria $criteria): Collection
    {
        return $this->articleDto
            ->sortBy($criteria->order())
            ->take($criteria->limit())
            ->all();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function create(Article $article): void
    {
        $this->articleDto
            ->create([
                'id'      => $article->id(),
                'title'   => $article->title(),
                'type'    => $article->type(),
                'content' => $article->content()
            ]);
    }

    /**
     * @param Article $article
     * @return void
     */
    public function update(Article $article): void
    {
        $this->articleDto
            ->fill([
                'id'      => $article->id(),
                'title'   => $article->title(),
                'type'    => $article->type(),
                'content' => $article->content()
            ])->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function delete(Article $article): void
    {
        $this->articleDto
            ->destroy($article->id());
    }
}
