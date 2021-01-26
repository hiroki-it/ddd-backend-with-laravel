<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * 認証用ユーザクラス
 */
class UserDTO extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 照合するテーブル名
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * 主キーのカラム名
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
