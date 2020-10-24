<?php

declare(strict_types=1);

namespace App\Criteria;

use App\Domain\ValueObject\Id\Id;
use App\Traits\UnsupportedMagicMethodTrait;

/**
 * 検索条件抽象クラス
 */
abstract class Criteria
{
    use UnsupportedMagicMethodTrait;

    /**
     * ID
     *
     * @var Id
     */
    protected Id $id;

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
     * IDクラスを返却します．
     *
     * @return Id
     */
    public function id(): Id
    {
        return $this->id;
    }

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
