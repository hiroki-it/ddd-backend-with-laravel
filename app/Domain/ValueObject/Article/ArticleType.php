<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Article;

use App\Domain\ValueObject\Type;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 記事区分クラス
 */
final class ArticleType extends Type
{
    /**
     * 記事区分
     */
    private const PHP = '1';

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
