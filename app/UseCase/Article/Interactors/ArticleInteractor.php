<?php

declare(strict_types=1);

namespace App\UseCase\Article\Interactors;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\Article\Services\AuthorizeArticleService;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\Domain\User\Ids\UserId;
use App\Exceptions\AuthorizationException;
use App\UseCase\Article\InputBoundaries\ArticleInputBoundary;
use App\UseCase\Article\Inputs\ArticleCreateInput;
use App\UseCase\Article\Inputs\ArticleDeleteInput;
use App\UseCase\Article\Inputs\ArticleIndexInput;
use App\UseCase\Article\Inputs\ArticleShowInput;
use App\UseCase\Article\Inputs\ArticleUpdateInput;
use App\UseCase\Article\Outputs\ArticleCreateOutput;
use App\UseCase\Article\Outputs\ArticleIndexOutput;
use App\UseCase\Article\Outputs\ArticleShowOutput;
use App\UseCase\Article\Outputs\ArticleUpdateOutput;

/**
 * 記事ユースケースクラス
 */
final class ArticleInteractor implements ArticleInputBoundary
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * @var AuthorizeArticleService
     */
    private AuthorizeArticleService $authorizeArticleService;

    /**
     * @param ArticleRepository       $articleRepository
     * @param AuthorizeArticleService $authorizeArticleService
     */
    public function __construct(ArticleRepository $articleRepository, AuthorizeArticleService $authorizeArticleService)
    {
        $this->articleRepository = $articleRepository;
        $this->authorizeArticleService = $authorizeArticleService;
    }

    /**
     * @param ArticleShowInput $input
     * @return ArticleShowOutput
     * @throws AuthorizationException
     */
    public function showArticle(ArticleShowInput $input): ArticleShowOutput
    {
        $articleId = new ArticleId($input->id);

        $this->authorizeArticleService->canShowArticle((int)auth()->id(), $articleId);

        $article = $this->articleRepository->findById($articleId);

        return new ArticleShowOutput(
            $article->articleTitle->title,
            $article->articleType->description(),
            $article->articleContent->content,
        );
    }

    /**
     * @param ArticleIndexInput $input
     * @return ArticleIndexOutput
     */
    public function indexArticle(ArticleIndexInput $input): ArticleIndexOutput
    {
        $articles = $this->articleRepository->findAll(
            new ArticleCriteria(
                new UserId($input->userId),
                $input->target,
                $input->limit,
                $input->order
            )
        );

        $articleShowOutputs = [];

        foreach ($articles as $article) {
            $articleShowOutputs[] = new ArticleShowOutput(
                $article->articleTitle->title,
                $article->articleType->description(),
                $article->articleContent->content,
            );
        }

        return new ArticleIndexOutput($articleShowOutputs);
    }

    /**
     * @param ArticleCreateInput $input
     * @return ArticleCreateOutput
     */
    public function createArticle(ArticleCreateInput $input): ArticleCreateOutput
    {
        $article = new Article(
            new ArticleId(0),
            new UserId($input->userId),
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository->create($article);

        return new ArticleCreateOutput(
            $article->articleTitle->title,
            $article->articleType->description(),
            $article->articleContent->content,
        );
    }

    /**
     * @param ArticleUpdateInput $input
     * @return ArticleUpdateOutput
     * @throws AuthorizationException
     */
    public function updateArticle(ArticleUpdateInput $input): ArticleUpdateOutput
    {
        $articleId = new ArticleId($input->id);

        $this->authorizeArticleService->canUpdateArticle((int)auth()->id(), $articleId);

        $article = new Article(
            $articleId,
            new UserId($input->userId),
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository->update($article);

        return new ArticleUpdateOutput(
            $article->articleTitle->title,
            $article->articleType->description(),
            $article->articleContent->content,
        );
    }

    /**
     * @param ArticleDeleteInput $input
     * @throws AuthorizationException
     */
    public function deleteArticle(ArticleDeleteInput $input): void
    {
        $articleId = new ArticleId($input->id);

        $this->authorizeArticleService->canDeleteArticle((int)auth()->id(), $articleId);

        $this->articleRepository->delete($articleId);
    }
}
