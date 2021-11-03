<?php

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 削除リクエストモデル基底クラス
 */
abstract class DeleteInput
{
    use ImmutableTrait;
}
