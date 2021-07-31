<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Article\ValueObject\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\UseCase\Inputs\ArticleInput;
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
     * 記事を返却します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $articleId
     * @return Response
     */
    public function getArticle(ArticleRequest $articleRequest, ArticleId $articleId): Response
    {
        // ここにレスポンス処理
    }

    /**
     * 記事の一覧画面を返却します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $articleId
     * @return Response
     */
    public function getArticles(ArticleRequest $articleRequest, ArticleId $articleId): Response
    {
        $validated = $articleRequest->validated();

        $criteria = new ArticleCriteria(
            $articleId,
            $validated['order'],
            $validated['limit']
        );

        $article = $this->articleUsecase->getArticles($criteria);

        // ここにレスポンス処理
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

        $articleInput = new ArticleInput($validated);

        $this->articleUsecase->createArticle($articleInput);

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

        $articleInput = new ArticleInput($validated);

        $this->articleUsecase->updateArticle($articleInput, $articleId);

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
