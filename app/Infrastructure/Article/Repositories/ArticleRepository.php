<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as DomainArticleRepository;
use App\Domain\Article\Ids\ArticleId;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Repository;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * 記事リポジトリ実装クラス
 */
final class ArticleRepository extends Repository implements DomainArticleRepository
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
     * @return Article
     */
    public function findById(ArticleId $articleId): Article
    {
        $articleDTO = $this->articleDTO
            ->find($articleId->id);

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
            ->orderBy("article_" . $criteria->key, $criteria->order)
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
                ->create($this->fillArray($article));
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
                ->fill($this->fillArray($article))
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

    /**
     * @param Article $article
     * @return array
     */
    private function fillArray(Article $article): array
    {
        return [
            'title'   => $article->title->title,
            'type'    => $article->type->value,
            'content' => $article->content->content
        ];
    }
}
