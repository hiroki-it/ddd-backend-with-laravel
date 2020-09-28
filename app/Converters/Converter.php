<?php


namespace App\Converters;

use App\Domain\ValueObject\Type\Type;

/**
 * データ型変換抽象クラス
 */
abstract class Converter
{
    /**
     * 区分クラスに変換します．
     *
     * @param string $value
     * @return Type
     */
    abstract public function convert(string $value): Type;
}
