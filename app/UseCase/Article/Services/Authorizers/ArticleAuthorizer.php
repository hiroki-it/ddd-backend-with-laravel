<?php

namespace App\UseCase\Article\Services\Authorizers;

use App\Domain\Article\Ids\ArticleId;
use App\Domain\Article\Repositories\ArticleRepository;
use App\Domain\User\Ids\UserId;
use App\Exceptions\AuthorizationException;

final class ArticleAuthorizer
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
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canShowArticle(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("閲覧権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canUpdateArticle(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("更新権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     * @throws AuthorizationException
     */
    public function canDeleteArticle(int $userId, int $targetId): bool
    {
        if (!$this->equalsById($userId, $targetId)) {
            throw new AuthorizationException("削除権限がありません");
        }

        return true;
    }

    /**
     * @param int $userId
     * @param int $targetId
     * @return bool
     */
    private function equalsById(int $userId, int $targetId): bool
    {
        return $this->articleRepository
            ->findById(new ArticleId($targetId))
            ->userId
            ->equals(new UserId($userId));
    }
}
