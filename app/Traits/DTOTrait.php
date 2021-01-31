<?php

declare(strict_types=1);

namespace App\Traits;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * DTOトレイト
 */
trait DTOTrait
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
