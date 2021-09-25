<?php

namespace App\Exceptions;

use Exception;

class AuthorizationException extends Exception
{
    /**
     * @var int
     */
    protected $code = 403;
}
