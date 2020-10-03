<?php

namespace App\Criteria;

use App\Domain\ValueObject\Id\ArticleId;
use BenSampo\Enum\Exceptions\InvalidEnumMemberException;

/**
 * 記事検索条件クラス
 */
final class ArticleCriteria extends Criteria
{
    /**
     * コンストラクタインジェクション
     *
     * @param array $validated
     * @throws InvalidEnumMemberException
     */
    public function __construct(array $validated)
    {
        $this->id = new ArticleId($validated['id']);
        $this->order = $validated['order'];
        $this->limit = $validated['limit'];
    }
}
