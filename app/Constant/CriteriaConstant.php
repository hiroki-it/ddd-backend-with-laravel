<?php

declare(strict_types=1);

namespace App\Constant;

/**
 * 検索条件定数クラス
 */
abstract class CriteriaConstant
{
    /**
     * @var array
     *
     * 並び替え基準カラム名
     */
    public const TARGET_LIST = [
        'id',
    ];

    /**
     * @var string
     *
     * 表示件数
     */
    public const LIMIT_LIST = [
        "10"
    ];

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
