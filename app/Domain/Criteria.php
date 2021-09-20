<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\User\Ids\UserId;
use App\Traits\ImmutableTrait;

/**
 * ドメイン検索条件クラス
 * NOTE: 検索条件パターンを採用しています．
 */
abstract class Criteria
{
    use ImmutableTrait;

    /**
     * @var UserId
     */
    protected UserId $userId;

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
