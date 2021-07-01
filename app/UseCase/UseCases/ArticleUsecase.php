<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Criteria\ArticleCriteria;
use App\Domain\Article\Entity\Article;
use App\Domain\Repositories\ArticleRepository;
use App\Domain\Article\ValueObject\ArticleContent;
use App\Domain\Article\ValueObject\ArticleId;
use App\Domain\Article\ValueObject\ArticleTitle;
use App\Domain\Article\ValueObject\ArticleType;
use App\UseCase\Inputs\ArticleInput;

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
     * @param ArticleInput $input
     */
    public function createArticle(ArticleInput $input)
    {
        $article = new Article(
            null,
            new ArticleTitle($input->title()),
            new ArticleType($input->type()),
            new ArticleContent($input->content())
        );

        $this->articleRepository->create($article);
    }

    /**
     * @param ArticleInput $input
     * @param ArticleId    $articleId
     */
    public function updateArticle(ArticleInput $input, ArticleId $articleId)
    {
        $article = new Article(
            $articleId,
            new ArticleTitle($input->title()),
            new ArticleType($input->type()),
            new ArticleContent($input->content())
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
