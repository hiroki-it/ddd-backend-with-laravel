<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
use App\Domain\Article\ValueObjects\ArticleContent;
use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\ValueObjects\ArticleTitle;
use App\Domain\Article\ValueObjects\ArticleType;
use App\Traits\DTOTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 記事DTOクラス
 */
final class ArticleDTO extends Model
{
    use DTOTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "articles";

    /**
     * @var string
     */
    protected $primaryKey = 'article_id';

    /**
     * @var array
     */
    protected $cast = [
        'article_id' => 'integer'
    ];

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
     * @var array
     */
    protected $fillable = [
        'article_title',
        'article_type',
        'article_content',
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
