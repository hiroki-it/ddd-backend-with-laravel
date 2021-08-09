<?php

declare(strict_types=1);

namespace App\UseCase;

use LogicException;

/**
 * 作成インプットクラス
 */
abstract class CreateInput
{
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
