<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\ValueObject\Article\ArticleContent;
use App\Domain\ValueObject\Article\ArticleId;
use App\Domain\ValueObject\Article\ArticleTitle;
use App\Domain\ValueObject\Article\ArticleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Usecase\ArticleUsecase;
use Illuminate\Http\Response;
use \Illuminate\Http\RedirectResponse;

/**
 * 記事コントローラクラス
 */
final class ArticleController extends Controller
{
    /**
     * リポジトリクラス
     *
     * @var ArticleUsecase
     */
    private ArticleUsecase $articleUsecase;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleUsecase $articleUsecase
     */
    public function __construct(ArticleUsecase $articleUsecase)
    {
        $this->articleUsecase = $articleUsecase;
    }

    /**
     * 記事の一覧画面を表示します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $articleId
     * @return Response
     */
    public function showArticleListed(ArticleRequest $articleRequest, ArticleId $articleId): Response
    {
        $validated = $articleRequest->validated();

        $criteria = new ArticleCriteria(
            $articleId,
            $validated['order'],
            $validated['limit']
        );

        return $this->articleUsecase->showArticleListed($criteria);
    }

    /**
     * 記事の作成画面を表示します．
     *
     * @return Response
     */
    public function showArticleCreated(): Response
    {
        return $this->articleUsecase->showArticleCreated();
    }

    /**
     * 記事の詳細画面を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticleDetailed(ArticleId $articleId): Response
    {
        return $this->articleUsecase->showArticleDetailed($articleId);
    }

    /**
     * 記事の更新画面を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticleUpdated(ArticleId $articleId): Response
    {
        return $this->articleUsecase->showArticleUpdated($articleId);
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     */
    public function createArticle(ArticleRequest $articleRequest): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $article = new Article(
            new ArticleId(null),
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        return $this->articleUsecase->createArticle($article);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $articleId
     * @return RedirectResponse
     */
    public function updateArticle(ArticleRequest $articleRequest, ArticleId $articleId): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $article = new Article(
            $articleId,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        return $this->articleUsecase->updateArticle($article);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $articleId
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $articleId): RedirectResponse
    {
        return $this->articleUsecase->deleteArticle($articleId);
    }
}
