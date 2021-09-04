<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 取得リクエストモデル基底クラス
 */
abstract class GetAllInput
{
    use ImmutableTrait;

    /**
     * @var string
     */
    protected string $target;

    /**
     * @var string
     */
    protected string $limit;

    /**
     * @var string
     */
    protected string $order;
}
