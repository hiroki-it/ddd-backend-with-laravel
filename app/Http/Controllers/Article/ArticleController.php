<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Domain\Article\ValueObjects\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Usecase\Article\Inputs\ArticleGetInput;
use App\UseCase\Article\Interactors\ArticleInteractor;
use App\UseCase\Inputs\ArticleCreateInput;
use App\UseCase\Inputs\ArticleUpdateInput;
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
     * @param ArticleId $id
     * @return Response
     */
    public function getArticle(ArticleId $id): Response
    {
        $article = $this->articleInteractor->getArticle($id);

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

        $input = new ArticleGetInput(
            $validated['order'],
            $validated['limit']
        );

        $article = $this->articleInteractor->getArticles($input);

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
        $validated = $articleRequest->validated();

        $articleInput = new ArticleCreateInput($validated);

        $this->articleInteractor->createArticle($articleInput);

        // ここにレスポンス処理
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $articleRequest
     * @param ArticleId      $id
     * @return RedirectResponse
     * @throws InvalidEnumMemberException
     */
    public function updateArticle(ArticleRequest $articleRequest, ArticleId $id): RedirectResponse
    {
        $validated = $articleRequest->validated();

        $articleInput = new ArticleUpdateInput($validated);

        $this->articleInteractor->updateArticle($articleInput, $id);

        // ここにレスポンス処理
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $id
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $id): RedirectResponse
    {
        $this->articleInteractor->deleteArticle($id);

        // ここにレスポンス処理
    }
}
