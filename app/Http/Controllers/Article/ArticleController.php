<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\ValueObject\Article\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\UseCase\UseCases\ArticleUsecase;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

/**
 * 記事コントローラクラス
 */
final class ArticleController extends Controller
{
    /**
     * ユースケースクラス
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

        $article = $this->articleUsecase->showArticleListed($criteria);

        return response()->view('article.article-listed', ['article' => $article], 200);
    }

    /**
     * 記事の作成画面を表示します．
     *
     * @return Response
     */
    public function showArticleCreated(): Response
    {
        return response()->view('article.article-created', 200);
    }

    /**
     * 記事の詳細画面を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticleDetailed(ArticleId $articleId): Response
    {
        $article = $this->articleUsecase->showArticleDetailed($articleId);

        return response()->view('article.article-detailed', ['article' => $article]);
    }

    /**
     * 記事の更新画面を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticleUpdated(ArticleId $articleId): Response
    {
        $article = $this->articleUsecase->showArticleUpdated($articleId);

        return response()->view('article.article-updated', ['article' => $article]);
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

        $this->articleUsecase->createArticle($validated);

        return redirect('article.article-list')->with(['success' => '記事を作成しました']);
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

        $this->articleUsecase->updateArticle($validated, $articleId);

        return redirect('article.article-listed')->with(['success', '記事を更新しました']);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $articleId
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $articleId): RedirectResponse
    {
        $this->articleUsecase->deleteArticle($articleId);

        return redirect('article.article-listed')->with(['success', '記事を削除しました']);
    }
}
