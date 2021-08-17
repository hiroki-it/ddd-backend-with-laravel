<?php

declare(strict_types=1);

namespace App\UseCase\User\Requests;

use App\UseCase\CreateRequest;

class UserCreateRequest extends CreateRequest
{
    /**
     * ユーザ名
     *
     * @var string
     */
    private string $name;

    /**
     * ユーザメールアドレス
     *
     * @var string
     */
    private string $emailAddress;

    /**
     * ユーザ電話番号
     *
     * @var string
     */
    private string $phoneNumber;

    /**
     * ユーザ電話番号
     *
     * @var string
     */
    private string $password;

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
