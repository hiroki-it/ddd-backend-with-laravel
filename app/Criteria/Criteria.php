<?php
declare(strict_types=1);

namespace App\Criteria;

use App\Domain\ValueObject\Id\Id;

/**
 * 検索条件抽象クラス
 */
abstract class Criteria
{
    /**
     * ID
     *
     * @var Id
     */
    protected Id $id;

    /**
     * 件数
     *
     * @var int
     */
    protected int $limit;

    /**
     * 並び順
     *
     * @var string
     */
    protected string $order;
}
