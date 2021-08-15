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
     * 件数のデフォルト値
     */
    public const DEFAULT_LIMIT = 10;

    /**
     * @var string
     *
     * 順序名のデフォルト値
     */
    public const DEFAULT_ORDER = 'asc';

    /**
     * @var array
     *
     * 件数のリスト
     */
    public const LIMIT_LIST = [10, 20, 30];

    /**
     * @var array
     *
     * 順序名のリスト
     */
    public const ORDER_LIST = ['asc', 'desc'];

}
