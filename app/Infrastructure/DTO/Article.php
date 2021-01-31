<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO;

/**
 * 記事DTOクラス
 */
final class Article extends DTO
{
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
