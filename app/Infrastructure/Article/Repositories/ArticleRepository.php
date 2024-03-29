<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as ArticleRepositoryInterface;
use App\Domain\Article\Ids\ArticleId;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Repository;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * 記事リポジトリ実装クラス
 */
final class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    /**
     * @var ArticleDTO
     */
    private ArticleDTO $articleDTO;

    /**
     * @param ArticleDTO $articleDTO
     */
    public function __construct(ArticleDTO $articleDTO)
    {
        $this->articleDTO = $articleDTO;
    }

    /**
     * @param ArticleId $articleId
     * @return Article|null
     */
    public function findById(ArticleId $articleId): ?Article
    {
        $articleDTO = $this->articleDTO
            ->find($articleId->id);

        if (!$articleDTO) {
            return null;
        }

        // DTOのデータをドメインモデルに詰め替えます．
        return $articleDTO->toArticle();
    }

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAll(ArticleCriteria $criteria): array
    {
        $articlesDTO = $this->articleDTO
            ->where('user_id', $criteria->userId->id)
            ->orderBy($criteria->target, $criteria->order)
            ->get();

        $articles = [];
        foreach ($articlesDTO as $articleDTO) {
            // DTOのデータをドメインモデルに詰め替えます．
            $articles[] = $articleDTO->toArticle();
        }

        return $articles;
    }

    /**
     * @param Article $article
     * @return void
     * @throws Throwable
     */
    public function create(Article $article): void
    {
        DB::transaction(function () use ($article) {

            // ドメインモデルのデータをDTOに詰め替えます．
            $this->articleDTO
                ->create([
                    'user_id' => $article->userId->id,
                    'title'   => $article->articleTitle->title,
                    'type'    => $article->articleType->value,
                    'content' => $article->articleContent->content
                ]);
        });
    }

    /**
     * @param Article $article
     * @return void
     * @throws Throwable
     */
    public function update(Article $article): void
    {
        DB::transaction(function () use ($article) {

            // ドメインモデルのデータをDTOに詰め替えます．
            $this->articleDTO
                ->find($article->id->id)
                ->fill([
                    'title'   => $article->articleTitle->title,
                    'type'    => $article->articleType->value,
                    'content' => $article->articleContent->content
                ])
                ->save();
        });
    }

    /**
     * @param ArticleId $articleId
     * @return void
     * @throws Throwable
     */
    public function delete(ArticleId $articleId): void
    {
        DB::transaction(function () use ($articleId) {
            $this->articleDTO->destroy($articleId->id);
        });
    }
}
