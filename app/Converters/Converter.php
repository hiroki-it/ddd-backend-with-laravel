<?php


namespace App\Converters;

/**
 * データ型変換抽象クラス
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
