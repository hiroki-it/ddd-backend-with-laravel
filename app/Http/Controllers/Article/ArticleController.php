<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Constant\StatusCodeConstant;
use App\Exceptions\UnauthorizedAccessException;
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
     * @param int $id
     * @return JsonResponse
     */
    public function showArticle(int $id): JsonResponse
    {
        try {
            $articleShowInput = new ArticleShowInput(
                $id,
                (int)auth()->id(),
            );

            $articleGetByOutput = $this->articleInteractor->showArticle($articleShowInput);
        } catch (UnauthorizedAccessException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => '記事の閲覧に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        return response()->json($articleGetByOutput->toArray());
    }

    /**
     * @param ArticleIndexRequest $articleIndexRequest
     * @return JsonResponse
     */
    public function indexArticle(ArticleIndexRequest $articleIndexRequest): JsonResponse
    {
        $validated = $articleIndexRequest->validated();

        $articleIndexInput = new ArticleIndexInput(
            (int)auth()->id(),
            $validated['target'],
            $validated['limit'],
            $validated['order']
        );

        $articleGetAllOutput = $this->articleInteractor->indexArticle($articleIndexInput);

        return response()->json($articleGetAllOutput->toArray());
    }

    /**
     * @param ArticleCreateRequest $articleCreateRequest
     * @return JsonResponse
     */
    public function createArticle(ArticleCreateRequest $articleCreateRequest): JsonResponse
    {
        try {
            $validated = $articleCreateRequest->validated();

            $articleCreateInput = new ArticleCreateInput(
                (int)auth()->id(),
                $validated['title'],
                $validated['type'],
                $validated['content'],
            );

            $articleCreateOutput = $this->articleInteractor->createArticle($articleCreateInput);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => '記事の作成に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        return response()->json($articleCreateOutput->toArray());
    }

    /**
     * @param ArticleUpdateRequest $articleUpdateRequest
     * @param int                  $id
     * @return JsonResponse
     */
    public function updateArticle(ArticleUpdateRequest $articleUpdateRequest, int $id): JsonResponse
    {
        try {
            $validated = $articleUpdateRequest->validated();

            $articleUpdateInput = new ArticleUpdateInput(
                $id,
                auth()->id(),
                $validated['title'],
                $validated['type'],
                $validated['content']
            );

            $articleUpdateResponse = $this->articleInteractor->updateArticle($articleUpdateInput);
        } catch (UnauthorizedAccessException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => '記事の更新に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        return response()->json($articleUpdateResponse->toArray());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deleteArticle(int $id): JsonResponse
    {
        try {
            $articleDeleteInput = new ArticleDeleteInput(
                $id,
                auth()->id(),
            );

            $this->articleInteractor->deleteArticle($articleDeleteInput);
        } catch (UnauthorizedAccessException $e) {
            return response()->json(['error' => $e->getMessage()], StatusCodeConstant::FORBIDDEN);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => '記事の削除に失敗しました'], StatusCodeConstant::BAD_REQUEST);
        }

        return response()->json([], StatusCodeConstant::NO_CONTENT);
    }
}
