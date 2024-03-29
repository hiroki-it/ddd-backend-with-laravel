<?php

declare(strict_types=1);

namespace App\UseCase\User\Inputs;

use App\UseCase\UpdateInput;

final class UserUpdateInput extends UpdateInput
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $authId;

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
     * @param int    $id
     * @param int    $authId
     * @param string $name
     * @param string $emailAddress
     * @param string $password
     */
    public function __construct(int $id, int $authId, string $name, string $emailAddress, string $password)
    {
        $this->id = $id;
        $this->authId = $authId;
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
    }
}
