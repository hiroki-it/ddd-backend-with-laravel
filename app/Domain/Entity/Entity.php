<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * エンティティ抽象クラス
 *
 * NOTE: エンティティ内でEloquentをコールしないこと．
 */
abstract class Entity extends Model
{

}
