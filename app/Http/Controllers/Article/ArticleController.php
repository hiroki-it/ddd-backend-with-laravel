<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\UseCase\Article\Inputs\ArticleCreateInput;
use App\UseCase\Article\Inputs\ArticleDeleteInput;
use App\UseCase\Article\Inputs\ArticleGetAllInput;
use App\UseCase\Article\Inputs\ArticleGetByIdInput;
use App\UseCase\Article\Inputs\ArticleUpdateInput;
use App\UseCase\Article\Interactors\ArticleInteractor;
use Illuminate\Http\JsonResponse;
use Throwable;

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
     * @return JsonResponse
     */
    public function getArticle(int $id): JsonResponse
    {
        $articleGetByIdInput = new ArticleGetByIdInput($id);

        $article = $this->articleInteractor->getArticle($articleGetByIdInput);

        // ここにレスポンス処理
    }

    /**
     * 記事の一覧を返却します．
     *
     * @param ArticleRequest $articleRequest
     * @return JsonResponse
     */
    public function getAllArticles(ArticleRequest $articleRequest): JsonResponse
    {
        $validated = $articleRequest->validated();

        $articleGetAllInput = new ArticleGetAllInput(
            $validated['limit'],
            $validated['order']
        );

        $article = $this->articleInteractor->getAllArticles($articleGetAllInput);

        // ここにレスポンス処理
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $articleRequest
     * @return JsonResponse
     */
    public function createArticle(ArticleRequest $articleRequest): JsonResponse
    {
        try {
            $validated = $articleRequest->validated();

            $articleCreateInput = new ArticleCreateInput(
                $validated['title'],
                $validated['type'],
                $validated['content'],
            );

            $articleCreateOutput = $this->articleInteractor->createArticle($articleCreateInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json($articleCreateOutput->toArray());
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $articleRequest
     * @param int            $id
     * @return JsonResponse
     */
    public function updateArticle(ArticleRequest $articleRequest, int $id): JsonResponse
    {
        try {
            $validated = $articleRequest->validated();

            $articleUpdateInput = new ArticleUpdateInput(
                $id,
                $validated['title'],
                $validated['type'],
                $validated['content']
            );

            $articleUpdateResponse = $this->articleInteractor->updateArticle($articleUpdateInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json($articleUpdateResponse->toArray());
    }

    /**
     * 記事を削除します．
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteArticle(int $id): JsonResponse
    {
        try {
            $articleDeleteInput = new ArticleDeleteInput($id);

            $this->articleInteractor->deleteArticle($articleDeleteInput);
        } catch (Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json([], 204);
    }
}
