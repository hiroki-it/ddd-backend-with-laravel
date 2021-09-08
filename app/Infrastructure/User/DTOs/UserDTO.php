<?php

declare(strict_types=1);

namespace App\Infrastructure\User\DTOs;

use App\Domain\User\Entities\User;
use App\Domain\User\Ids\UserId;
use App\Domain\User\ValueObjects\UserEmailAddress;
use App\Domain\User\ValueObjects\UserName;
use App\Domain\User\ValueObjects\UserPassword;
use App\Traits\DTOTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * ユーザDTOクラス
 */
final class UserDTO extends Authenticatable
{
    use DTOTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "users";

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email_address',
        'password',
    ];

    /**
     * 読み出し不可能なカラム
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * DTOをユーザエンティティに変換します．
     *
     * @return User
     */
    public function toUser(): User
    {
        return new User(
            new UserId($this->id),
            new UserName($this->name),
            new UserEmailAddress($this->email_address),
            new UserPassword($this->password),
        );
    }
}
