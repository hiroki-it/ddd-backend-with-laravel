<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO;

use App\Traits\DTOTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class Article extends Model
{
    use DTOTrait;

    /**
     * 更新可能なカラム
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'content',
    ];
}
