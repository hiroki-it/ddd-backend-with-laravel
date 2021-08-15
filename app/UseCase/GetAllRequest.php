<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 取得リクエストモデル
 */
abstract class GetAllRequest
{
    use ImmutableTrait;

    /**
     * 件数
     *
     * @var int
     */
    protected int $limit;

    /**
     * 順序
     *
     * @var string
     */
    protected string $order;
}
