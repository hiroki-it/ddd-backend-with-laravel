<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Requests\Article\ArticleIndexRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\UseCase\Article\Inputs\ArticleCreateInput;
use App\UseCase\Article\Inputs\ArticleDeleteInput;
use App\UseCase\Article\Inputs\ArticleIndexInput;
use App\UseCase\Article\Inputs\ArticleShowInput;
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
    public function showArticle(int $id): JsonResponse
    {
        $articleShowInput = new ArticleShowInput($id);

        $articleGetByOutput = $this->articleInteractor->showArticle($articleShowInput);

        return response()->json($articleGetByOutput->toArray());
    }

    /**
     * 記事の一覧を返却します．
     *
     * @param ArticleIndexRequest $articleIndexRequest
     * @return JsonResponse
     */
    public function indexArticle(ArticleIndexRequest $articleIndexRequest): JsonResponse
    {
        $validated = $articleIndexRequest->validated();

        $articleIndexInput = new ArticleIndexInput(
            $validated['target'],
            $validated['limit'],
            $validated['order']
        );

        $articleGetAllOutput = $this->articleInteractor->indexArticle($articleIndexInput);

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
