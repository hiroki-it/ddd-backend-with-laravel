<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as DomainArticleRepository;
use App\Domain\Article\Ids\ArticleId;
use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Repository;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;
use Illuminate\Support\Facades\DB;
use Throwable;

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

        // DTOのデータをドメインモデルに詰め替えます．
        return $articleDTO->toArticle();
    }

    /**
     * READ
     *
     * @return array
     * @throws InvalidEnumMemberException
     */
    public function findAll(): array
    {
        $articlesDTO = $this->articleDTO
            ->all();

        $articles = [];
        foreach ($articlesDTO as $articleDTO) {
            // DTOのデータをドメインモデルに詰め替えます．
            $articles[] = $articleDTO->toArticle();
        }

        return $articles;
    }

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function findAllByCriteria(ArticleCriteria $criteria): array
    {
        $articlesDTO = $this->articleDTO
            ->sortBy($criteria->order)
            ->take($criteria->limit)
            ->all();

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
                    'title'   => $article->title,
                    'type'    => $article->type,
                    'content' => $article->content
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
        // NOTE:
        // UPDATE処理前のfindによるモデル取得のために，Eloquentモデルではなく，Repositoryパターンのfindメソッドを使用する．

        DB::transaction(function () use ($article) {
            // ドメインモデルのデータをDTOに詰め替えます．
            $this->articleDTO->fill([
            'title'   => $article->title,
            'type'    => $article->type,
            'content' => $article->content
        ]);

            $this->articleDTO->save();
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
            $this->articleDTO->destroy($articleId->id());
        });
    }
}
