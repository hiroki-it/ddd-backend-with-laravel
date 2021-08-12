<?php

declare(strict_types=1);

namespace App\UseCase\Article\Requests;

use App\UseCase\GetRequest;

/**
 * 記事インプットクラス
 */
final class ArticleGetRequest extends GetRequest
{
    /**
     * コンストラクタインジェクション
     *
     * @param string $limit
     * @param string $order
     */
    public function __construct(string $limit = self::DEFAULT_LIMIT, string $order = self::DEFAULT_ORDER)
    {
        $this->limit = $limit;
        $this->order = $order;
    }
}
