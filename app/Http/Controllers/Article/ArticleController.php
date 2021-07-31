<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Domain\Article\ValueObjects\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Usecase\Article\Inputs\ArticleGetCriteriaInputInput;
use App\UseCase\Inputs\ArticleCreateInput;
use App\UseCase\Inputs\ArticleUpdateInput;
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
     * @param ArticleId $id
     * @return Response
     */
    public function getArticle(ArticleId $id): Response
    {
        $article = $this->articleUsecase->getArticle($id);

        // ここにレスポンス処理
    }

    /**
     * 記事の一覧を返却します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $id
     * @return Response
     */
    public function getArticles(ArticleRequest $articleRequest, ArticleId $id): Response
    {
        $validated = $articleRequest->validated();

        $input = new ArticleGetCriteriaInputInput(
            $id,
            $validated['order'],
            $validated['limit']
        );

        $article = $this->articleUsecase->getArticles($input);

        // ここにレスポンス処理
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     * @throws \BenSampo\Enum\Exceptions\InvalidEnumMemberException
     */
    public function createArticle(ArticleRequest $articleRequest): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $articleInput = new ArticleCreateInput($validated);

        $this->articleUsecase->createArticle($articleInput);

        return redirect('article.article-list')->with(['success' => '記事を作成しました']);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $id
     * @return RedirectResponse
     * @throws \BenSampo\Enum\Exceptions\InvalidEnumMemberException
     */
    public function updateArticle(ArticleRequest $articleRequest, ArticleId $id): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $articleInput = new ArticleUpdateInput($validated);

        $this->articleUsecase->updateArticle($articleInput, $id);

        return redirect('article.article-listed')->with(['success', '記事を更新しました']);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $id
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $id): RedirectResponse
    {
        $this->articleUsecase->deleteArticle($id);

        return redirect('article.article-listed')->with(['success', '記事を削除しました']);
    }
}
