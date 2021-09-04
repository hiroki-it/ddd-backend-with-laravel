<?php

declare(strict_types=1);

namespace App\UseCase\User\Responses;

use App\UseCase\Output;

class UserCreateOutput extends Output
{
    /**
     * @var int
     */
    private int $userId;

    /**
     * @var string
     */
    private string $userName;

    /**
     * @param int    $userId
     * @param string $userName
     */
    public function __construct(int $userId, string $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'      => $this->userId,
            'name'   => $this->userName,
        ];
    }
}
