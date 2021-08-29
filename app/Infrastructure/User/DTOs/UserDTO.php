<?php

declare(strict_types=1);

namespace App\Infrastructure\User\DTOs;

use App\Traits\DTOTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * ユーザDTOクラス
 */
class UserDTO extends Authenticatable
{
    use DTOTrait;
    use Notifiable;
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
}
