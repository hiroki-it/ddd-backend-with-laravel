<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 取得インプットクラス
 */
abstract class GetAllRequest
{
    use ImmutableTrait;

    /**
     * @var string
     *
     * 順序のデフォルト値
     */
    public const DEFAULT_ORDER = 'asc';

    /**
     * @var int
     *
     * 件数のデフォルト値
     */
    public const DEFAULT_LIMIT = 10;

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
