<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Entity\Article\Article;
use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\Repositories\ArticleRepository;
use App\Domain\ValueObject\Id\ArticleId;
use App\Domain\ValueObject\Type\ArticleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Response;

/**
 * 記事コントローラクラス
 *
 * NOTE: ドメイン層のインターフェースを介してエンティティに依存するようにするため，ここでインスタンスを生成しない．
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
     * 記事を検索します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $articleId
     * @return Response
     */
    public function findArticle(ArticleRequest $request, ArticleId $articleId): Response
    {
        $validated = $request->validated();

        $criteria = new ArticleCriteria(
            $articleId,
            $validated['order'],
            $validated['limit']
        );

        $article = $this->articleRepository
            ->findAllByCriteria($criteria);

        return response()->view('article.find-article', $article)
            ->setStatusCode(200);
    }

    /**
     * 指定した記事を表示します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function showArticle(ArticleId $articleId): Response
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        return response()->view('article.show-article', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function createArticle(ArticleRequest $request): Response
    {
        // リクエストボディを取得
        $validated = $request->validated();

        $article = new Article(
            null,
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

        $this->articleRepository->create($article);

        return response()->view('article.create-article', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $articleId
     * @return Response
     */
    public function updateArticle(ArticleRequest $request, ArticleId $articleId): Response
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

        return response()->setStatusCode(200);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function deleteArticle(ArticleId $articleId)
    {
        $article = $this->articleRepository
            ->findOneById($articleId);

        $this->articleRepository
            ->delete($article);

        return response()->setStatusCode(200);
    }
}
