<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\Repositories\ArticleRepository;
use App\Domain\ValueObject\Article\ArticleId;
use App\Domain\ValueObject\Article\ArticleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * 記事コントローラクラス
 */
final class ArticleController extends Controller
{
    /**
     * リポジトリクラス
     *
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * 記事の一覧画面を表示します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $articleId
     * @return Response
     */
    public function showArticleListed(ArticleRequest $request, ArticleId $articleId): Response
    {
        $validated = $request->validated();

        $criteria = new ArticleCriteria(
            $articleId,
            $validated['order'],
            $validated['limit']
        );

        $article = $this->articleRepository
            ->findAllByCriteria($criteria);

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
        $article = $this->articleRepository
            ->findOneById($articleId);

        return response()->view('article.article-detailed', ['article' => $article], 200);
    }

    /**
     * 記事の更新画面を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticleUpdated(ArticleId $articleId): Response
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        return response()->view('article.article-updated', ['article' => $article], 200);
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function createArticle(ArticleRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $article = new Article(
            null,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        $this->articleRepository->create($article);

        return redirect('article.article-list', 302)->with(['success' => '記事を作成しました']);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $articleId
     * @return RedirectResponse
     */
    public function updateArticle(ArticleRequest $request, ArticleId $articleId): RedirectResponse
    {
        $validated = $request->validated();

        $article = new Article(
            $articleId,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        $this->articleRepository
            ->update($article);

        return redirect('article.article-listed', 302)->with(['success', '記事を更新しました']);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $articleId
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $articleId): RedirectResponse
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        $this->articleRepository
            ->delete($article);

        return redirect('article.article-listed', 302)->with(['success', '記事を削除しました']);
    }
}
