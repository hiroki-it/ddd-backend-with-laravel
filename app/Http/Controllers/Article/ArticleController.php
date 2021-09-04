<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Requests\Article\ArticleGetRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
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

        $articleGetByOutput = $this->articleInteractor->getArticle($articleGetByIdInput);

        return response()->json($articleGetByOutput->toArray());
    }

    /**
     * 記事の一覧を返却します．
     *
     * @param ArticleGetRequest $articleGetRequest
     * @return JsonResponse
     */
    public function getAllArticles(ArticleGetRequest $articleGetRequest): JsonResponse
    {
        $validated = $articleGetRequest->validated();

        $articleGetAllInput = new ArticleGetAllInput(
            $validated['target'],
            $validated['limit'],
            $validated['order']
        );

        $articleGetAllOutput = $this->articleInteractor->getAllArticles($articleGetAllInput);

        return response()->json($articleGetAllOutput->toArray());
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleCreateRequest $articleCreateRequest
     * @return JsonResponse
     */
    public function createArticle(ArticleCreateRequest $articleCreateRequest): JsonResponse
    {
        try {
            $validated = $articleCreateRequest->validated();

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
     * @param ArticleUpdateRequest $articleUpdateRequest
     * @param int               $id
     * @return JsonResponse
     */
    public function updateArticle(ArticleUpdateRequest $articleUpdateRequest, int $id): JsonResponse
    {
        try {
            $validated = $articleUpdateRequest->validated();

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
