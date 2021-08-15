<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\UseCase\Article\Requests\ArticleCreateRequest;
use App\UseCase\Article\Requests\ArticleDeleteRequest;
use App\UseCase\Article\Requests\ArticleGetAllRequest;
use App\UseCase\Article\Requests\ArticleGetByIdRequest;
use App\UseCase\Article\Requests\ArticleUpdateRequest;
use App\UseCase\Article\Interactors\ArticleInteractor;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;
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
     * @var ArticleInteractor
     */
    private ArticleInteractor $articleInteractor;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleInteractor $articleInteractor
     */
    public function __construct(ArticleInteractor $articleInteractor)
    {
        $this->articleInteractor = $articleInteractor;
    }

    /**
     * 記事を返却します．
     *
     * @param int $id
     * @return Response
     */
    public function getArticle(int $id): Response
    {
        $articleGetByRequest = new ArticleGetByIdRequest($id);

        $article = $this->articleInteractor->getArticle($articleGetByRequest);

        // ここにレスポンス処理
    }

    /**
     * 記事の一覧を返却します．
     *
     * @param ArticleRequest $articleRequest
     * @return Response
     */
    public function getAllArticles(ArticleRequest $articleRequest): Response
    {
        $validated = $articleRequest->validated();

        $request = new ArticleGetAllRequest(
            $validated['limit'],
            $validated['order']
        );

        $article = $this->articleInteractor->getAllArticles($request);

        // ここにレスポンス処理
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     * @throws InvalidEnumMemberException
     */
    public function createArticle(ArticleRequest $articleRequest): RedirectResponse
    {
        // クエリパラメータのバリデーション
        $validated = $articleRequest->validated();

        $articleInput = new ArticleCreateRequest($validated);

        $this->articleInteractor->createArticle($articleInput);

        // ここにレスポンス処理
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     */
    public function updateArticle(ArticleRequest $articleRequest): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $articleUpdateRequest = new ArticleUpdateRequest($validated);

        $this->articleInteractor->updateArticle($articleUpdateRequest);

        // ここにレスポンス処理
    }

    /**
     * 記事を削除します．
     *
     * @param int $id
     */
    public function deleteArticle(int $id): RedirectResponse
    {
        $articleDeleteRequest = new ArticleDeleteRequest($id);

        $this->articleInteractor->deleteArticle($articleDeleteRequest);

        // ここにレスポンス処理
    }
}
