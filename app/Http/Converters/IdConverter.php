<?php

declare(strict_types=1);

namespace App\Http\Converters;

use App\Domain\Id;

/**
 * ID値変換抽象クラス
 */
abstract class IdConverter
{
    /**
     * ID値をIdクラスに変換します．
     *
     * @param string $id
     * @return Id
     */
    abstract static function convert(string $id): Id;
}
