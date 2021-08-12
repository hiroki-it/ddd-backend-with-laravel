<?php

declare(strict_types=1);

namespace App\UseCase\Article\Requests;

use App\UseCase\GetByIdRequest;

/**
 * 記事インプットクラス
 */
final class ArticleGetByIdRequest extends GetByIdRequest
{
    /**
     * コンストラクタインジェクション
     *
     * @param int $articleId
     */
    public function __construct(int $articleId)
    {
        parent::__constructor($articleId);
    }
}
