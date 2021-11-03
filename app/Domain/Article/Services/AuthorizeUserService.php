<?php

namespace App\Domain\Article\Services;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\User\Ids\UserId;
use App\Exceptions\UnauthorizedAccessException;

final class AuthorizeUserService
{
    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;

    /**
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param UserId    $authId
     * @param ArticleId $articleId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canShowArticle(UserId $authId, ArticleId $articleId): bool
    {
        if (!$this->equalsById($authId, $articleId)) {
            throw new UnauthorizedAccessException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param UserId    $authId
     * @param ArticleId $articleId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canUpdateArticle(UserId $authId, ArticleId $articleId): bool
    {
        if (!$this->equalsById($authId, $articleId)) {
            throw new UnauthorizedAccessException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param UserId    $authId
     * @param ArticleId $articleId
     * @return bool
     * @throws UnauthorizedAccessException
     */
    public function canDeleteArticle(UserId $authId, ArticleId $articleId): bool
    {
        if (!$this->equalsById($authId, $articleId)) {
            throw new UnauthorizedAccessException("削除権限がありません");
        }

        return true;
    }

    /**
     * @param UserId    $authId
     * @param ArticleId $articleId
     * @return bool
     */
    private function equalsById(UserId $authId, ArticleId $articleId): bool
    {
        return $this->articleRepository
            ->findById($articleId)
            ->userId
            ->equals($authId);
    }
}
