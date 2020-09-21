<?php
declare(strict_types=1);

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Response;

/**
 * 記事コントローラクラス
 */
class ArticleController extends Controller
{
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
     */
    public function getArticle(ArticleRequest $request)
    {

    }

    /**
     * 記事を作成します．
     *
     * @param ArticleRequest $request
     */
    public function createArticle(ArticleRequest $request)
    {

    }

    /**
     * 記事を更新します．
     *
     * @param ArticleRequest $request
     */
    public function updateArticle(ArticleRequest $request)
    {

    }

    /**
     * 記事を削除します．
     *
     * @param ArticleRequest $request
     */
    public function deleteArticle(ArticleRequest $request)
    {

    }
}
