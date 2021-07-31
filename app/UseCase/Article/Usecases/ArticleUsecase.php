<?php

declare(strict_types=1);

namespace App\UseCase\UseCases;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\ValueObjects\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\Usecase\Article\Inputs\ArticleGetCriteriaInput;
use App\UseCase\Inputs\ArticleCreateInput;
use App\UseCase\Inputs\ArticleUpdateInput;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

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
     * @param ArticleId $id
     * @return Article
     */
    public function getArticle(ArticleId $id): Article
    {
        return $this->articleRepository
            ->findById($id);
    }

    /**
     * @param ArticleGetCriteriaInput $input
     * @return array
     */
    public function getArticles(ArticleGetCriteriaInput $input): array
    {
        return $this->articleRepository
            ->findAllByCriteria($input->order(), $input->limit());
    }

    /**
     * @param ArticleCreateInput $input
     * @throws InvalidEnumMemberException
     */
    public function createArticle(ArticleCreateInput $input)
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
     * @param ArticleUpdateInput $input
     * @param ArticleId          $id
     * @throws InvalidEnumMemberException
     */
    public function updateArticle(ArticleUpdateInput $input, ArticleId $id)
    {
        $article = new Article(
            $id,
            new ArticleTitle($input->title()),
            new ArticleType($input->type()),
            new ArticleContent($input->content())
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
