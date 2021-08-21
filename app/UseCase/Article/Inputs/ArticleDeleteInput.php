<?php

namespace App\UseCase\Article\Inputs;

use App\UseCase\DeleteInput;

/**
 * 記事削除リクエストクラス
 */
final class ArticleDeleteInput extends DeleteInput
{
    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct($id);
    }
}
