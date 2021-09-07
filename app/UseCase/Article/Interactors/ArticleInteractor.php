<?php

declare(strict_types=1);

namespace App\UseCase\Article\Interactors;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
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
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param ArticleShowInput $input
     * @return ArticleShowOutput
     */
    public function showArticle(ArticleShowInput $input): ArticleShowOutput
    {
        $article = $this->articleRepository->findById(new ArticleId($input->id));

        return new ArticleShowOutput(
            $article->id->id,
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
                $input->target,
                $input->limit,
                $input->order
            )
        );

        $articleShowOutputs = [];

        foreach ($articles as $article) {
            $articleShowOutputs[] = new ArticleShowOutput(
                $article->id->id,
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
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository->create($article);

        return new ArticleCreateOutput(
            $article->id->id,
            $article->articleTitle->title,
            $article->articleType->description(),
            $article->articleContent->content,
        );
    }

    /**
     * @param ArticleUpdateInput $input
     * @return ArticleUpdateOutput
     */
    public function updateArticle(ArticleUpdateInput $input): ArticleUpdateOutput
    {
        $article = new Article(
            new ArticleId($input->id),
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository->update($article);

        return new ArticleUpdateOutput(
            $article->id->id,
            $article->articleTitle->title,
            $article->articleType->description(),
            $article->articleContent->content,
        );
    }

    /**
     * @param ArticleDeleteInput $input
     */
    public function deleteArticle(ArticleDeleteInput $input)
    {
        $this->articleRepository->delete(new ArticleId($input->id));
    }
}
