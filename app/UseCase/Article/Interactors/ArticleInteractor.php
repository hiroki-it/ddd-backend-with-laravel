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
use App\UseCase\Article\Requests\ArticleCreateRequest;
use App\UseCase\Article\Requests\ArticleDeleteRequest;
use App\UseCase\Article\Requests\ArticleGetByCriteriaRequest;
use App\UseCase\Article\Requests\ArticleGetByIdRequest;
use App\UseCase\Article\Requests\ArticleUpdateRequest;
use App\UseCase\Article\Responses\ArticleCreateResponse;
use App\UseCase\Article\Responses\ArticleGetByCriteriaResponse;
use App\UseCase\Article\Responses\ArticleGetByIdResponse;
use App\UseCase\Article\Responses\ArticleUpdateResponse;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

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
     * コンストラクタインジェクション
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param ArticleGetByIdRequest $request
     * @return ArticleGetByIdResponse
     */
    public function getArticle(ArticleGetByIdRequest $request): ArticleGetByIdResponse
    {
        $article = $this->articleRepository
            ->findById(new ArticleId($request->id));

        return new ArticleGetByIdResponse(
            $article->id->value(),
            $article->title->title,
            $article->type->value(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleGetByCriteriaRequest $request
     * @return ArticleGetByCriteriaResponse
     */
    public function getArticles(ArticleGetByCriteriaRequest $request): ArticleGetByCriteriaResponse
    {
        $article = $this->articleRepository
            ->findAllByCriteria(
                new ArticleCriteria(
                    $request->order,
                    $request->limit
                )
            );

        return new ArticleGetByCriteriaResponse(
            $article->id->value(),
            $article->title->title,
            $article->type->value(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleCreateRequest $request
     * @return ArticleCreateResponse
     * @throws InvalidEnumMemberException
     */
    public function createArticle(ArticleCreateRequest $request): ArticleCreateResponse
    {
        $article = new Article(
            new ArticleId(0),
            new ArticleTitle($request->title),
            new ArticleType($request->type),
            new ArticleContent($request->content)
        );

        $this->articleRepository->create($article);

        return new ArticleCreateResponse(
            $article->id->value(),
            $article->title->title,
            $article->type->value(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleUpdateRequest $request
     * @return ArticleUpdateResponse
     */
    public function updateArticle(ArticleUpdateRequest $request): ArticleUpdateResponse
    {
        $article = $this->articleRepository->findById(new ArticleId($request->id));

        $this->articleRepository->update($article);

        return new ArticleUpdateResponse(
            $article->id->value(),
            $article->title->title,
            $article->type->value(),
            $article->content->content,
        );
    }

    /**
     * @param ArticleDeleteRequest $request
     */
    public function deleteArticle(ArticleDeleteRequest $request)
    {
        $this->articleRepository->delete(new ArticleId($request->id));
    }
}
