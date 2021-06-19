<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repositories\ArticleRepository as DomainArticleRepository;
use App\Domain\ValueObject\Article\ArticleId;
use App\Infrastructure\DTO\Article as ArticleDTO;
use Illuminate\Support\Facades\DB;

/**
 * 記事リポジトリ実装クラス
 */
final class ArticleRepository extends Repository implements DomainArticleRepository
{
    /**
     * 記事DTOクラス
     *
     * @var ArticleDTO
     */
    private ArticleDTO $articleDTO;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleDTO $articleDTO
     */
    public function __construct(ArticleDTO $articleDTO)
    {
        $this->articleDTO = $articleDTO;
    }

    /**
     * @param ArticleId $articleId
     * @return Article
     */
    public function findOneById(ArticleId $articleId): Article
    {
        $articleDTO = $this->articleDTO
            ->find($articleId);

        return new Article(
            $articleDTO->id(),
            $articleDTO->title(),
            $articleDTO->type(),
            $articleDTO->content()
        );
    }

    /**
     * READ
     *
     * @return array
     */
    public function findAll(): array
    {
        $articleDTOs = $this->articleDTO
            ->all();

        $articles = [];
        foreach ($articleDTOs as $articleDTO)
            $articles = new Article(
                $articleDTO->id(),
                $articleDTO->title(),
                $articleDTO->type(),
                $articleDTO->content()
            );

        return $articles;
    }

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAllByCriteria(ArticleCriteria $criteria): array
    {
        $userDTOs = $this->articleDTO
            ->sortBy($criteria->order())
            ->take($criteria->limit())
            ->all();

        $articles = [];
        foreach ($userDTOs as $userDTO)
            $articles = new Article(
                $userDTO->id(),
                $userDTO->title(),
                $userDTO->type(),
                $userDTO->content()
            );

        return $articles;
    }

    /**
     * @param Article $article
     * @return void
     */
    public function create(Article $article): void
    {
        DB::transaction(function () use ($article) {

            $this->articleDTO
                ->create([
                    'title'   => $article->title(),
                    'type'    => $article->type(),
                    'content' => $article->content()
                ]);
        });
    }

    /**
     * @param Article $article
     * @return void
     */
    public function update(Article $article): void
    {
        $articleDTO = $this->articleDTO
            ->find($article->id());

        $articleDTO->fill([
            'title'   => $article->title(),
            'type'    => $article->type(),
            'content' => $article->content()
        ]);

        DB::transaction(function () use ($articleDTO) {

            $articleDTO->save();
        });
    }

    /**
     * @param Article $article
     * @return void
     */
    public function delete(Article $article): void
    {
        $articleDTO = $this->articleDTO
            ->find($article->id());

        DB::transaction(function () use ($articleDTO) {

            $articleDTO->delete();
        });
    }
}
