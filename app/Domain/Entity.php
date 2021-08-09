<?php

declare(strict_types=1);

namespace App\Domain;

use App\Traits\Immutable;

/**
 * エンティティ抽象クラス
 */
abstract class Entity
{
    use Immutable;

    /**
     * IDクラス
     *
     * @var Id|null
     */
    protected $id;

    /**
     * エンティティの等価性を検証します．
     *
     * @param Entity $entity
     * @return bool
     */
    public function equals(Entity $entity): bool
    {
        return ($entity instanceof $this || $this instanceof $entity) // エンティティのデータ型の等価性
            && $this->id->equals($entity->id()); // IDオブジェクトの等価性
    }

    /**
     * IDクラスを返却します．
     */
    public function id(): Id
    {
        return $this->id;
    }
}
