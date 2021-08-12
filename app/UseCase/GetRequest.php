<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 取得インプットクラス
 */
abstract class GetRequest
{
    use ImmutableTrait;

    /**
     * @var string
     *
     * 順序のデフォルト値
     */
    public const DEFAULT_ORDER = 'asc';

    /**
     * @var string
     *
     * 件数のデフォルト値
     */
    public const DEFAULT_LIMIT = '10';

    /**
     * 件数
     *
     * @var string
     */
    protected string $limit;

    /**
     * 順序
     *
     * @var string
     */
    protected string $order;
}
