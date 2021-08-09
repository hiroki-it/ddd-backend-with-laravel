<?php

declare(strict_types=1);

namespace App\Domain;

/**
 * 値オブジェクト抽象クラス
 */
abstract class ValueObject
{
    /**
     * 値オブジェクトの等価性を検証します．
     *
     * @param ValueObject $VO
     * @return bool
     */
    public function equals(ValueObject $VO): bool
    {
        // 全ての属性を反復的に検証します．
        foreach (get_object_vars($this) as $key => $value) {
            if ($this->$key() !== $VO->$key()) {
                return false;
            }
        }

        return true;
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
                static::class // メソッドが実行されたクラスを取得
            ));
        }

        return $this->{$name};
    }
}
