<?php

declare(strict_types=1);

namespace App\Http\Converters;

use App\Domain\Article\ValueObject\ArticleId;

/**
 * 記事ID値変換クラス
 */
final class ArticleIdConverter extends IdConverter
{
    /**
     * 記事ID値を記事IDクラスに変換します．
     *
     * @param string $id
     * @return ArticleId
     */
    static function convert(string $id): ArticleId
    {
        return new ArticleId($id);
    }
}
