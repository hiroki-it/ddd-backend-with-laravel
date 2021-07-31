<?php

declare(strict_types=1);

namespace App\Usecase;

use App\Traits\UnsupportedMagicMethodTrait;

/**
 * 取得条件クラス
 * NOTE: 検索条件パターンを採用しています．
 */
abstract class GetCriteriaInput
{
    use UnsupportedMagicMethodTrait;

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

    /**
     * 件数を返却します．
     *
     * @return string
     */
    public function limit(): string
    {
        return $this->limit;
    }

    /**
     * 順序を返却します．
     *
     * @return string
     */
    public function order(): string
    {
        return $this->order;
    }
}
