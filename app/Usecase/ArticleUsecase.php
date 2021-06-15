<?php

declare(strict_types=1);

namespace App\Usecase;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Repository\ArticleRepository;
use App\Domain\ValueObject\Article\ArticleId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * 記事ユースケースクラス
 */
final class ArticleUsecase extends Usecase
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
     * @param ArticleCriteria $criteria
     * @return Response
     */
    public function showArticleListed(ArticleCriteria $criteria): Response
    {
        $article = $this->articleRepository
            ->findAllByCriteria($criteria);

        return response()->view('article.article-listed', ['article' => $article], 200);
    }

    /**
     * @return Response
     */
    public function showArticleCreated(): Response
    {
        return response()->view('article.article-created', 200);
    }

    /**
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
     * @param Article $article
     * @return RedirectResponse
     */
    public function createArticle(Article $article): RedirectResponse
    {
        $this->articleRepository->create($article);

        return redirect('article.article-list')->with(['success' => '記事を作成しました']);
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function updateArticle(Article $article): RedirectResponse
    {
        $this->articleRepository
            ->update($article);

        return redirect('article.article-listed')->with(['success', '記事を更新しました']);
    }

    /**
     * @param ArticleId $articleId
     * @return RedirectResponse
     */
    public function deleteArticle(ArticleId $articleId): RedirectResponse
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        $this->articleRepository
            ->delete($article);

        return redirect('article.article-listed')->with(['success', '記事を削除しました']);
    }
}
