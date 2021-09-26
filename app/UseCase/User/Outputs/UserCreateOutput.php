<?php

declare(strict_types=1);

namespace App\UseCase\User\Outputs;

use App\UseCase\Output;

final class UserCreateOutput extends Output
{
    /**
     * @var string
     */
    private string $userName;

    /**
     * @param string $userName
     */
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->userName,
        ];
    }
}
