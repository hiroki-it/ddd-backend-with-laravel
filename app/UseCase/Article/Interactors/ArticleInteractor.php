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
use App\UseCase\Article\Inputs\ArticleGetAllInput;
use App\UseCase\Article\Inputs\ArticleGetByIdInput;
use App\UseCase\Article\Inputs\ArticleUpdateInput;
use App\UseCase\Article\Outputs\ArticleCreateOutput;
use App\UseCase\Article\Outputs\ArticleGetAllOutput;
use App\UseCase\Article\Outputs\ArticleGetByIdOutput;
use App\UseCase\Article\Outputs\ArticleUpdateOutput;

/**
 * 記事ユースケースクラス
 */
final class ArticleInteractor implements ArticleInputBoundary
{
    /**
     * リポジトリクラス
     *
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
     * @param ArticleGetByIdInput $input
     * @return ArticleGetByIdOutput
     */
    public function getArticle(ArticleGetByIdInput $input): ArticleGetByIdOutput
    {
        $article = $this->articleRepository->findById(new ArticleId($input->id));

        return new ArticleGetByIdOutput(
            $article->id->id,
            $article->title->title,
            $article->type->description(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleGetAllInput $input
     * @return ArticleGetAllOutput
     */
    public function getAllArticles(ArticleGetAllInput $input): ArticleGetAllOutput
    {
        $articles = $this->articleRepository->findAllByCriteria(
            new ArticleCriteria(
                $input->limit,
                $input->order
            )
        );

        return new ArticleGetAllOutput($articles);
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
            $article->title->title,
            $article->type->description(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleUpdateInput $input
     * @return ArticleUpdateOutput
     */
    public function updateArticle(ArticleUpdateInput $input): ArticleUpdateOutput
    {
        $article = $this->articleRepository->findById(new ArticleId($input->id));

        $this->articleRepository->update($article);

        return new ArticleUpdateOutput(
            $article->id->id,
            $article->title->title,
            $article->type->description(),
            $article->content->content,
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
