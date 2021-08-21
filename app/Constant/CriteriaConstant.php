<?php

declare(strict_types=1);

namespace App\Constant;

/**
 * 検索条件定数クラス
 */
abstract class CriteriaConstant
{
    /**
     * @var int
     *
     * 表示件数
     */
    public const LIMIT_LIST = 10;

    /**
     * @var array
     *
     * 順序名のリスト
     */
    public const ORDER_LIST = [
        'asc',
        'desc'
    ];
}
