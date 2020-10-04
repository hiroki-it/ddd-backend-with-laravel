<?php
declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
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
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 記事を全てを表示します．
     *
     * @return Response
     */
    public function index()
    {
        // 読み出し
        $article = app()->make(ArticleRepository::class)->findAll()->toArray();

        return response()
            ->view('article.article-list', $article)
            ->setStatusCode(200);
    }

    /**
     * 記事を検索して表示します．
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function findArticleWithCriteria(ArticleRequest $request)
    {
        // リクエストボディを取得
        $validated = $request->validated();

        // Articleエンティティを生成
        $criteria = new ArticleCriteria($validated);

        // 読み出し
        $criteria = new ArticleCriteria($id, $validated['order'], $validated['limit']);
        $article = app()->make(ArticleRepository::class)->findWithCriteria($criteria)->toArray();

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

        // Articleエンティティを生成
        $criteria = new ArticleCriteria($validated);
        $article = $this->repository->findWithCriteria($criteria);

        // 作成
        $article = app()->make(ArticleRepository::class)->create($validated);

        return response()
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

        // Articleエンティティを生成
        $article = $this->repository->findWithId($id);
        $article->id = new ArticleId($validated('id'));
        $article->title = new ArticleTitle($validated('title'));
        $article->type = new ArticleType($validated('type'));
        $article->cotent = new ArticleContent($validated('content'));

        // 更新
        app()->make(ArticleRepository::class)->update($validated, $id);

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
        app()->make(ArticleRepository::class)->delete($id);

        return response()
            ->setStatusCode(200);
    }
}
