<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Traits\ImmutableTrait;

/**
 * 一覧リクエストモデル基底クラス
 */
abstract class IndexInput
{
    use ImmutableTrait;

    /**
     * @var int
     */
    protected int $authId;

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
