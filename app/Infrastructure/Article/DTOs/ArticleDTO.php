<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\Traits\DTOTrait;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends Model
{
    use DTOTrait;
    use HasFactory;

    protected $table = "articles";

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * 更新可能なカラム
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'content',
    ];

    /**
     * DTOを記事エンティティに変換します．
     *
     * @return Article
     */
    public function toArticle(): Article
    {
        return new Article(
            new ArticleId($this->article_id),
            new ArticleTitle($this->article_title),
            new ArticleType($this->article_type),
            new ArticleContent($this->article_content)
        );
    }
}
