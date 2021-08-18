<?php

declare(strict_types=1);

namespace App\UseCase\Article\InputBoundaries;

use App\UseCase\Article\Inputs\ArticleCreateInput;
use App\UseCase\Article\Inputs\ArticleDeleteInput;
use App\UseCase\Article\Inputs\ArticleGetAllInput;
use App\UseCase\Article\Inputs\ArticleGetByIdInput;
use App\UseCase\Article\Inputs\ArticleUpdateInput;
use App\UseCase\Article\Outputs\ArticleCreateOutput;
use App\UseCase\Article\Outputs\ArticleGetAllOutput;
use App\UseCase\Article\Outputs\ArticleGetByIdOutput;
use App\UseCase\Article\Outputs\ArticleUpdateOutput;

/**
 * 記事インプットバウンダリインターフェース
 */
interface ArticleInputBoundary
{
    /**
     * 記事を作成します．
     *
     * @param ArticleCreateInput $input
     * @return ArticleCreateOutput
     */
    public function createArticle(ArticleCreateInput $input): ArticleCreateOutput;

    /**
     * 記事を取得します．
     *
     * @param ArticleGetByIdInput $input
     * @return ArticleGetByIdOutput
     */
    public function getArticle(ArticleGetByIdInput $input): ArticleGetByIdOutput;

    /**
     * 複数の記事を取得します
     *
     * @param ArticleGetAllInput $input
     * @return ArticleGetAllOutput
     */
    public function getAllArticles(ArticleGetAllInput $input): ArticleGetAllOutput;

    /**
     * 記事を更新します
     *
     * @param ArticleUpdateInput $input
     * @return ArticleUpdateOutput
     */
    public function updateArticle(ArticleUpdateInput $input): ArticleUpdateOutput;

    /**
     * 記事を削除します．
     *
     * @param ArticleDeleteInput $input
* \     */
    public function deleteArticle(ArticleDeleteInput $input);
}
