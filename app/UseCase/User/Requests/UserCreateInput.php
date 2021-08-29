<?php

declare(strict_types=1);

namespace App\UseCase\User\Requests;

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
    protected string $phoneNumber;

    /**
     * @var string
     */
    protected string $password;

    /**
     * @param string $name
     * @param string $emailAddress
     * @param string $phoneNumber
     * @param string $password
     */
    public function __construct(string $name, string $emailAddress, string $phoneNumber, string $password)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->password = $password;
    }
}
