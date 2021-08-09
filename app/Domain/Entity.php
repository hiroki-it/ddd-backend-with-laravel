<?php

declare(strict_types=1);

namespace App\Domain;

use _PHPStan_8f2e45ccf\Symfony\Component\Console\Exception\LogicException;
use App\Traits\UnsupportedMagicMethodTrait;

/**
 * エンティティ抽象クラス
 */
abstract class Entity
{
    use UnsupportedMagicMethodTrait;

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

    /**
     * ゲッターが定義されていなくとも，プロパティにアクセスできるようにします．
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        if (!property_exists($this, $name)) {
            throw new LogicException(sprintf(
                "property %s is not found in %s",
                $name,
                get_class($this)
            ));
        }

        return $this->{$name};
    }
}
