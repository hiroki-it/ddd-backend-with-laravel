<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repository\ArticleRepository;
use App\Domain\ValueObject\Article\ArticleContent;
use App\Domain\ValueObject\Article\ArticleId;
use App\Domain\ValueObject\Article\ArticleTitle;
use App\Domain\ValueObject\Article\ArticleType;

/**
 * 記事ユースケースクラス
 */
final class ArticleUsecase extends Usecase
{
    /**
     * リポジトリクラス
     *
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param ArticleCriteria $criteria
     * @return array
     */
    public function showArticleListed(ArticleCriteria $criteria): array
    {
        return $this->articleRepository
            ->findAllByCriteria($criteria);
    }

    /**
     * @param ArticleId $articleId
     * @return Article
     */
    public function showArticleDetailed(ArticleId $articleId): Article
    {
        return $this->articleRepository
            ->findOneById($articleId);
    }

    /**
     * @param ArticleId $articleId
     * @return Article
     */
    public function showArticleUpdated(ArticleId $articleId): Article
    {
        return $this->articleRepository
            ->findOneById($articleId);
    }

    /**
     * @param array $validated
     */
    public function createArticle(array $validated)
    {
        $article = new Article(
            new ArticleId(null),
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        $this->articleRepository->create($article);
    }

    /**
     * @param array     $validated
     * @param ArticleId $articleId
     */
    public function updateArticle(array $validated, ArticleId $articleId)
    {
        $article = new Article(
            $articleId,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        $this->articleRepository
            ->update($article);
    }

    /**
     * @param ArticleId $articleId
     */
    public function deleteArticle(ArticleId $articleId)
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        $this->articleRepository
            ->delete($article);
    }
}
