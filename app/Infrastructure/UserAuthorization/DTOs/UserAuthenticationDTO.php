<?php

namespace App\Infrastructure\UserAuthorization\DTOs;

use App\Traits\DTOTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * ユーザ認証DTO
 *
 * NOTE:
 * ユーザDTOに関連する認証の責務をユーザ認証DTOに持たせます．
 */
class UserAuthenticationDTO extends Authenticatable
{
    use DTOTrait;

    /**
     * @var string
     */
    protected $table = "users";
}
