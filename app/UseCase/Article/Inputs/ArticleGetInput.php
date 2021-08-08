<?php

declare(strict_types=1);

namespace App\UseCase\Article\Inputs;

use App\UseCase\GetInput;

/**
 * 記事インプットクラス
 */
final class ArticleGetInput extends GetInput
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
