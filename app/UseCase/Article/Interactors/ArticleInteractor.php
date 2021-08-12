<?php

declare(strict_types=1);

namespace App\UseCase\Article\Interactors;

use App\Domain\Article\Criterion\ArticleCriteria;
use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\UseCase\Article\Requests\ArticleCreateRequest;
use App\UseCase\Article\Requests\ArticleGetRequest;
use App\UseCase\Article\Requests\ArticleUpdateRequest;
use App\UseCase\Interactor;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 記事ユースケースクラス
 */
final class ArticleInteractor extends Interactor
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
     * @param ArticleId $id
     * @return Article
     */
    public function getArticle(ArticleId $id): Article
    {
        return $this->articleRepository
            ->findById($id);
    }

    /**
     * @param ArticleGetRequest $input
     * @return array
     */
    public function getArticles(ArticleGetRequest $input): array
    {
        $criteria = new ArticleCriteria($input->order, $input->limit);

        return $this->articleRepository
            ->findAllByCriteria($criteria);
    }

    /**
     * @param ArticleCreateRequest $input
     * @throws InvalidEnumMemberException
     */
    public function createArticle(ArticleCreateRequest $input)
    {
        $article = new Article(
            null,
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository->create($article);
    }

    /**
     * @param ArticleUpdateRequest $input
     * @param ArticleId            $id
     * @throws InvalidEnumMemberException
     */
    public function updateArticle(ArticleUpdateRequest $input, ArticleId $id)
    {
        $article = new Article(
            $id,
            new ArticleTitle($input->title),
            new ArticleType($input->type),
            new ArticleContent($input->content)
        );

        $this->articleRepository
            ->update($article);
    }

    /**
     * @param ArticleId $id
     */
    public function deleteArticle(ArticleId $id)
    {
        $article = $this->articleRepository
            ->findById($id);

        $this->articleRepository
            ->delete($article);
    }
}
