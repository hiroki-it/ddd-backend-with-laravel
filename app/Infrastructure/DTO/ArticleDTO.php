<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO;

use App\Domain\Entity\Article\ArticleContent;
use App\Domain\Entity\Article\ArticleTitle;
use App\Domain\ValueObject\Id\ArticleId;
use App\Domain\ValueObject\Type\ArticleType;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends DTO
{
    /**
     * 記事IDクラス
     *
     * @var ArticleId
     */
    private ArticleId $id;

    /**
     * 記事タイトルクラス
     *
     * @var ArticleTitle
     */
    private ArticleTitle $title;

    /**
     * 記事区分クラス
     *
     * @var ArticleType
     */
    private ArticleType $type;

    /**
     * 記事本文クラス
     *
     * @var ArticleContent
     */
    private ArticleContent $content;
}