<?php

declare(strict_types=1);

namespace App\UseCase\User\Inputs;

use App\UseCase\CreateInput;

final class UserCreateInput extends CreateInput
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $emailAddress;

    /**
     * @var string
     */
    protected string $password;

    /**
     * @param string $name
     * @param string $emailAddress
     * @param string $password
     */
    public function __construct(string $name, string $emailAddress, string $password)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }
}
