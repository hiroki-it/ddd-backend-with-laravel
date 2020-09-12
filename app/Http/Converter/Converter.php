<?php


namespace App\Http\Converter;

use App\Models\ValueObject\Type\Type;

/**
 * データ型変換抽象クラス
 *
 * @package App\Http\Converter
 */
abstract class Converter
{
    /**
     * 区分クラスに変換します．
     *
     * @param string $value
     */
    abstract public function convert(string $value);
}
