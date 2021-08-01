<?php

declare(strict_types=1);

namespace App\Infrastructure\Article\DTOs;

use App\Domain\Article\Entities\Article;
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
     * @var mixed
     */
    private $id;

    /**
     * @var mixed
     */
    private $title;

    /**
     * @var mixed
     */
    private $type;

    /**
     * @var mixed
     */
    private $content;

    /**
     * DTOを記事エンティティに変換します．
     *
     * @return Article
     */
    public function toArticle(): Article
    {
        return new Article(
            $this->id,
            $this->title,
            $this->type,
            $this->content
        );
    }
}
