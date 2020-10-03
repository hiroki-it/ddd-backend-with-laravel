<?php

namespace App\Domain\ValueObject\Id;

use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 記事IDクラス
 */
final class ArticleId extends Id
{
    /**
     * コンストラクタインジェクション
     *
     * @param string $value
     * @throws InvalidEnumMemberException
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
