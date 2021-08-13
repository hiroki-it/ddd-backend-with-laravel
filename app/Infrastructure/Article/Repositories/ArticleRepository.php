<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\Repositories;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository as DomainArticleRepository;
use App\Domain\Article\ValueObjects\ArticleId;
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
     * @return Article
     * @throws Throwable
     */
    public function create(Article $article): Article
    {
        return DB::transaction(function () use ($article) {
            // ドメインモデルのデータをDTOに詰め替えます．
            $articleDTO = $this->articleDTO
                ->create([
                    'title'   => $article->title,
                    'type'    => $article->type,
                    'content' => $article->content
                ]);

            // DBアクセス後のDTOをドメインモデルに変換します．
            return $articleDTO->toArticle();
        });
    }

    /**
     * @param Article $article
     * @return Article
     * @throws Throwable
     */
    public function update(Article $article): Article
    {
        $articleDTO = $this->articleDTO
            ->find($article->id());

        // ドメインモデルのデータをDTOに詰め替えます．
        $articleDTO->fill([
            'title'   => $article->title,
            'type'    => $article->type,
            'content' => $article->content
        ]);

        return DB::transaction(function () use ($articleDTO) {
            $articleDTO->save();

            // DBアクセス後のDTOをドメインモデルに変換します．
            return $articleDTO->toArticle();
        });
    }

    /**
     * @param Article $article
     * @return bool
     * @throws Throwable
     */
    public function delete(Article $article): bool
    {
        $articleDTO = $this->articleDTO
            ->find($article->id());

        return DB::transaction(function () use ($articleDTO) {
            return $articleDTO->delete();
        });
    }
}
