<?php
declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Criteria\ArticleCriteria;
use App\Domain\Repositories\ArticleRepository;
use App\Domain\ValueObject\Id\ArticleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Response;

/**
 * 記事コントローラクラス
 *
 * NOTE: ドメイン層のインターフェースを介してエンティティに依存するようにするため，ここでインスタンスを生成しない．
 */
class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * 記事投稿フォームを表示します．
     *
     * @return Response
     */
    public function index()
    {
        return response()
            ->view('create-form')
            ->setStatusCode(200);
    }

    /**
     * 記事を表示します．
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function findArticle(ArticleRequest $request)
    {
        $validated = $request->validated();
        $articleCriteria = ArticleCriteria::build($validated);
        $article = $this->articleRepository->findWithCriteria($articleCriteria)->toArray();

        return response()
            ->view('article-list', $article)
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
        $validated = $request->validated();
        $articleCriteria = ArticleCriteria::build($validated);

        $article = $this->articleRepository->findWithCriteria($articleCriteria);
        $this->articleRepository->create($article);

        return response()
            ->setStatusCode(200);
    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $request
     * @param ArticleId      $articleId
     * @return Response
     */
    public function updateArticle(ArticleRequest $request, ArticleId $articleId)
    {
        $validated = $request->validated();
        $article = $this->articleRepository->findWithId($articleId);
        $article->content = $validated['content'];
        $this->articleRepository->update($article);

        return response()
            ->setStatusCode(200);
    }

    /**
     * 記事を削除します．
     *
     * @param ArticleId $articleId
     * @return Response
     */
    public function deleteArticle(ArticleId $articleId)
    {
        $this->articleRepository->delete($articleId);

        return response()
            ->setStatusCode(200);
    }
}
