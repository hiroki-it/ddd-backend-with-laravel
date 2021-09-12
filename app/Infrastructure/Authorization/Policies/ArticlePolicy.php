<?php

namespace App\Infrastructure\Authorization\Policies;

use App\Infrastructure\Article\DTOs\ArticleDTO;
use App\Infrastructure\Policy;
use App\Infrastructure\User\DTOs\UserDTO;

final class ArticlePolicy extends Policy
{
    /**
     * @param ArticleDTO $articleDTO
     * @param UserDTO    $userDTO
     * @return bool
     */
    public function update(ArticleDTO $articleDTO, UserDTO $userDTO): bool
    {
        return $articleDTO->user_id === $userDTO->id;
    }
}
