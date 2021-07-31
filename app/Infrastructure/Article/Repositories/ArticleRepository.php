<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as DomainArticleRepository;
use App\Domain\Article\ValueObjects\ArticleId;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Repository;
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
     * @param ArticleId $id
     * @return Article
     */
    public function findById(ArticleId $id): Article
    {
        $articleDTO = $this->articleDTO
            ->find($id);

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
        $articlesDTO = $this->articleDTO
            ->all();

        $articles = [];
        foreach ($articlesDTO as $articleDTO) {
            $articles[] = new Article(
                $articleDTO->id(),
                $articleDTO->title(),
                $articleDTO->type(),
                $articleDTO->content()
            );
        }

        return $articles;
    }

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAllByCriteria(ArticleCriteria $criteria): array
    {
        $usersDTO = $this->articleDTO
            ->sortBy($criteria->order())
            ->take($criteria->limit())
            ->all();

        $articles = [];
        foreach ($usersDTO as $userDTO) {
            $articles[] = new Article(
                $userDTO->id(),
                $userDTO->title(),
                $userDTO->type(),
                $userDTO->content()
            );
        }

        return $articles;
    }

    /**
     * @param Article $article
     * @return void
     * @throws \Throwable
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
     * @throws \Throwable
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
     * @throws \Throwable
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
