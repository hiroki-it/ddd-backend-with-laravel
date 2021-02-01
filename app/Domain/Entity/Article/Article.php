<?php

declare(strict_types=1);

namespace App\Domain\Entity\Article;

use App\Domain\Entity\Entity;
use App\Domain\ValueObject\Article\ArticleContent;
use App\Domain\ValueObject\Article\ArticleId;
use App\Domain\ValueObject\Article\ArticleTitle;
use App\Domain\ValueObject\Article\ArticleType;

/**
 * 記事クラス
 *
 * ドメイン貧血症にならないように注意してください．
 */
final class Article extends Entity
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

    /**
     * コンストラクタインジェクション
     *
     * @param ArticleId      $articleId
     * @param ArticleTitle   $title
     * @param ArticleType    $type
     * @param ArticleContent $content
     */
    public function __construct(ArticleId $articleId, ArticleTitle $title, ArticleType $type, ArticleContent $content)
    {
        $this->id = $articleId;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * 記事IDクラスを返却します．
     *
     * @return ArticleId
     */
    public function id(): ArticleId
    {
        return $this->id;
    }

    /**
     * 記事タイトルクラスを返却します．
     *
     * @return ArticleTitle
     */
    public function title(): ArticleTitle
    {
        return $this->title;
    }

    /**
     * 記事区分クラスを返却します．
     *
     * @return ArticleType
     */
    public function type(): ArticleType
    {
        return $this->type;
    }

    /**
     * 記事本文クラスを返却します．
     *
     * @return ArticleContent
     */
    public function content(): ArticleContent
    {
        return $this->content;
    }
}

