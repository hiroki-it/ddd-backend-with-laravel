<?php
declare(strict_types=1);

namespace App\Criteria;

/**
 * 検索条件抽象クラス
 */
abstract class Criteria
{
    /**
     * 検索条件クラスを生成します．
     *
     * @param array $validated
     * @return Criteria
     */
    abstract static function build(array $validated): Criteria;
}
