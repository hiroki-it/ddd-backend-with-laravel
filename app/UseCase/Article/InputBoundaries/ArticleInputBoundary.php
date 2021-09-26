<?php

declare(strict_types=1);

namespace App\UseCase\Article\InputBoundaries;

use App\UseCase\Article\Inputs\ArticleCreateInput;
use App\UseCase\Article\Inputs\ArticleDeleteInput;
use App\UseCase\Article\Inputs\ArticleIndexInput;
use App\UseCase\Article\Inputs\ArticleShowInput;
use App\UseCase\Article\Inputs\ArticleUpdateInput;
use App\UseCase\Article\Outputs\ArticleCreateOutput;
use App\UseCase\Article\Outputs\ArticleIndexOutput;
use App\UseCase\Article\Outputs\ArticleShowOutput;
use App\UseCase\Article\Outputs\ArticleUpdateOutput;
use phpDocumentor\Reflection\Types\Void_;

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
     * @param ArticleShowInput $input
     * @return ArticleShowOutput
     */
    public function showArticle(ArticleShowInput $input): ArticleShowOutput;

    /**
     * 複数の記事を取得します
     *
     * @param ArticleIndexInput $input
     * @return ArticleIndexOutput
     */
    public function indexArticle(ArticleIndexInput $input): ArticleIndexOutput;

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
    public function deleteArticle(ArticleDeleteInput $input): void;
}
