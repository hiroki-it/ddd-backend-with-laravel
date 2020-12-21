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
}
