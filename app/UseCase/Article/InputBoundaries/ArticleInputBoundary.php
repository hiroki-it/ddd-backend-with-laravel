<?php

declare(strict_types=1);

namespace App\UseCase\Article\InputBoundaries;

use App\UseCase\Article\Requests\ArticleCreateRequest;
use App\UseCase\Article\Requests\ArticleDeleteRequest;
use App\UseCase\Article\Requests\ArticleGetByCriteriaRequest;
use App\UseCase\Article\Requests\ArticleGetByIdRequest;
use App\UseCase\Article\Requests\ArticleUpdateRequest;
use App\UseCase\Article\Responses\ArticleCreateResponse;
use App\UseCase\Article\Responses\ArticleGetAllResponse;
use App\UseCase\Article\Responses\ArticleGetByIdResponse;
use App\UseCase\Article\Responses\ArticleUpdateResponse;

/**
 * 記事インプットバウンダリインターフェース
 */
interface ArticleInputBoundary
{
    /**
     * 記事を作成します．
     *
     * @param ArticleCreateRequest $request
     * @return ArticleCreateResponse
     */
    public function createArticle(ArticleCreateRequest $request): ArticleCreateResponse;

    /**
     * 記事を取得します．
     *
     * @param ArticleGetByIdRequest $request
     * @return ArticleGetByIdResponse
     */
    public function getArticle(ArticleGetByIdRequest $request): ArticleGetByIdResponse;

    /**
     * 複数の記事を取得します
     *
     * @param ArticleGetByCriteriaRequest $request
     * @return ArticleGetAllResponse
     */
    public function getAllArticlesByCriteria(ArticleGetByCriteriaRequest $request): ArticleGetAllResponse;

    /**
     * 記事を更新します
     *
     * @param ArticleUpdateRequest $request
     * @return ArticleUpdateResponse
     */
    public function updateArticle(ArticleUpdateRequest $request): ArticleUpdateResponse;

    /**
     * 記事を削除します．
     *
     * @param ArticleDeleteRequest $request
\     */
    public function deleteArticle(ArticleDeleteRequest $request);
}
