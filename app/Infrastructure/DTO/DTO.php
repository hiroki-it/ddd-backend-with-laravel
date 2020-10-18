<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO;

use App\Traits\UnsupportedMagicMethodTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * DTO抽象クラス
 */
abstract class DTO extends Model
{
    use SoftDeletes, UnsupportedMagicMethodTrait;

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
