<?php

declare(strict_types=1);

namespace App\Domain\Article\ValueObjects;

use App\Domain\Type;

/**
 * 記事区分クラス
 */
final class ArticleType extends Type
{
    private const PHP = 1;
    private const Go = 2;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function description(): string
    {
        switch ($this->value) {
            case self::PHP:
                return "PHP";
            case self::Go:
                return "Go";
            default:
                return "Unknown";
        }
    }
}
