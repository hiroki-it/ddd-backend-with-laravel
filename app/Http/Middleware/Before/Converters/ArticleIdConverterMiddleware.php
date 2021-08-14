<?php

declare(strict_types=1);

namespace App\Http\Middleware\Before\Converters;

use App\Domain\Article\Ids\ArticleId;
use Closure;

/**
 * 記事ID変換ミドルウェアクラス
 */
final class ArticleIdConverterMiddleware extends IdConverterMiddleware
{
    /**
     * @param         $request
     * @param int     $id
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, int $id, Closure $next)
    {
        return $next($request, $this->convert($id));
    }

    /**
     * 記事ID値を記事IDクラスに変換します．
     *
     * @param int $id
     * @return ArticleId
     */
    private function convert(int $id): ArticleId
    {
        return new ArticleId($id);
    }
}
