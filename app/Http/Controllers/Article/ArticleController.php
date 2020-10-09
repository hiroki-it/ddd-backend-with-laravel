<?php
declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Repositories\ArticleRepository;
use App\Domain\ValueObject\Id\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Infrastructure\Factories\ArticleFactory;
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
     * 記事を全てを表示します．
     *
     * @return Response
     */
    public function index()
    {
        // 読み出し
        $article = $this->articleRepository->findAllEntity();

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
        $article = $this->articleRepository->findEntityWithCriteria($criteria);

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

        $article = ArticleFactory::createInstance($id, $validated);

        $this->articleRepository->createEntity($article);

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
        $this->articleRepository->updateEntity($article);

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
        $this->articleRepository->deleteEntity($article);

        return response()
            ->setStatusCode(200);
    }
}
