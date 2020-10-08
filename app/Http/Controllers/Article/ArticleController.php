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
     * 記事を全てを表示します．
     *
     * @return Response
     */
    public function index()
    {
        // 読み出し
        $article = app()->make(ArticleRepository::class)->findAllEntity();

        return response()
            ->view('article.article-list', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を検索して表示します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $id
     * @return Response
     */
    public function findArticleWithCriteria(ArticleRequest $request, ArticleId $id)
    {
        // リクエストボディを取得
        $validated = $request->validated();

        // 読み出し
        $criteria = new ArticleCriteria($id, $validated['order'], $validated['limit']);
        $article = app()->make(ArticleRepository::class)->findEntityWithCriteria($criteria);

        return response()
            ->view('article.article-list', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function createArticle(ArticleRequest $request)
    {
        // リクエストボディを取得
        $validated = $request->validated();

        $article = new Article(
            new ArticleId(),
            new ArticleTitle($validated['title']),
            new ArticleType($validated['type']),
            new ArticleContent($validated['content'])
        );

       app()->make(ArticleRepository::class)->createEntity($article);

        return response()
            ->view('article.article-list', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $id
     * @return Response
     */
    public function updateArticle(ArticleRequest $request, ArticleId $id)
    {
        // リクエストボディを取得
        $validated = $request->validated();

        // 更新
        app()->make(ArticleRepository::class)->updateEntity($article);

        return response()
            ->setStatusCode(200);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $id
     * @return Response
     */
    public function deleteArticle(ArticleId $id)
    {
        // 削除
        app()->make(ArticleRepository::class)->deleteEntity($article);

        return response()
            ->setStatusCode(200);
    }
}
