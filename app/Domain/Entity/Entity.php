<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * エンティティ抽象クラス
 */
abstract class Entity extends Model
{
    /**
     * コンストラクタインジェクション
     *
     * 親Modelクラスのコンストラクタは配列型引数を一つのみ受け付けるため
     * 可変個引数を使用してそれを配列型につめて渡すようにしています．
     *
     * @param mixed ...$properties
     */
    protected function __construct(...$properties)
    {
        parent::__construct(array(...$properties));
    }
}
